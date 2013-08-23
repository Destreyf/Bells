<?php
class Controller_Audio extends Controller_Admin {
	public function __construct(Request $request, Response $response){
		if(!Auth::instance()->logged_in()){
			$action = Request::current()->action();
			if($action != 'index'){
				echo json_encode(array('logged_out'=>true));
				exit;
			}
		}
		parent::__construct($request, $response);
	}
	
	public function before(){
		parent::before();
		if($this->auto_render){
			$audio = DB::query(Database::SELECT,"SELECT * FROM `BellAudio`")->as_object()->execute();
			$this->template->sidebar_data = $audio;
		}
	}
	
	public function action_index(){
		$this->template->data['audio'] = $this->template->sidebar_data;
	}
	
	public function _handle_audio($r){
		$file 	= Validation::factory($_FILES);
		$file->rule('filename', 'Upload::type', array(':value', array('mp3', 'wav')));
		$file->rule('filename', 'Upload::valid');
		$myfile = '';
		if($file->check()){
			$filename 	= Upload::save($file['filename'],$r->idBellAudio.'_tmp.'.strtolower(pathinfo($file['filename']['name'], PATHINFO_EXTENSION)),'/tmp/');
			if(strtolower(pathinfo($file['filename']['name'], PATHINFO_EXTENSION)) == 'mp3'){
				//Convert to wav first!
				exec('mpg123 -w /tmp/'.$r->idBellAudio.'_tmp.wav "'.$filename.'"');
			}
			if(realpath(APPPATH.'../'.$r->filename)){
				exec('rm '.realpath(APPPATH.'../'.$r->filename));
			}
			$new_name = str_replace(array('(',')'),'',str_replace('.wav','_'.$r->idBellAudio.'.wav',str_replace('mp3','wav',$file['filename']['name'])));
			exec('sox /tmp/'.$r->idBellAudio.'_tmp.wav -r 8000 -c 1 /tmp/'.$r->idBellAudio.'.wav');
			exec('mv /tmp/'.$r->idBellAudio.'.wav '.str_replace(' ','-',realpath(APPPATH.'../resources/audio/').'/'.$new_name));
			exec('rm /tmp/'.$r->idBellAudio.'_tmp.wav /tmp/'.$r->idBellAudio.'.wav '.$filename.' /tmp/'.$r->idBellAudio.'_tmp.'.strtolower(pathinfo($file['filename']['name'], PATHINFO_EXTENSION)));
			$myfile = 'resources/audio/'.str_replace(' ','-',$new_name);
		}
		return $myfile;
	}
	public function action_add(){
		$post	= $this->request->post('data');
		if(sizeof($post) > 0){
			
			if((string)@$post['default'] == "1"){
				DB::update('BellAudio')->set(array('default'=>0))->where('default', '=', 1)->execute();
			}
			
			$r = (object)$post;
			$r->idBellAudio = 'NEW';
			$r->filename 	= '';
			if(sizeof($_FILES) > 0){
				$post['filename'] = $this->_handle_audio($r);
			} else {
				$post['filename'] = '';
			}
			
			$id = DB::insert('BellAudio',array_keys($post))->values($post)->execute();			
			$this->request->redirect('audio/manage/'.$id[0]);
		}
	}
	
	public function action_manage(){
		//Nothing just load the main page!
		$idBellAudio = $this->request->param('id');
		$q		= DB::query(Database::SELECT,"SELECT * FROM `BellAudio` WHERE `idBellAudio` = :idBellAudio LIMIT 1");
		$q->parameters(array(
			':idBellAudio'	=> $idBellAudio,
		));
		$r		= $q->as_object()->execute();
		$r		= $r[0];
		if(is_null($r)){
			//File is now Missing
			$this->request->redirect('audio/index');
			exit;
		}
		
		$post	= $this->request->post('data');
		if(sizeof($post) > 0){
			if(sizeof($_FILES) > 0){
				$post['filename'] = $this->_handle_audio($r);
			} else {
				$post['filename'] = $r->filename;
			}
			
			if((string)@$post['default'] == "1"){
				DB::update('BellAudio')->set(array('default'=>0))->where('default', '=', 1)->execute();
			}
			
			DB::update('BellAudio')->set($post)->where('idBellAudio', '=', $idBellAudio)->execute();
			$this->request->redirect(str_replace('bells/','',Request::current()->url()));
		}
		
		$data	= array();
		$this->template->data['audio']		= $r;
	}
	
	public function action_delete(){
		$idBellAudio = $this->request->param('id');
		$q		= DB::query(Database::SELECT,"SELECT * FROM `BellAudio` WHERE `idBellAudio` = :idBellAudio LIMIT 1");
		$q->parameters(array(
			':idBellAudio'	=> $idBellAudio,
		));
		$r = $q->as_object()->execute();
		if($this->request->post('confirm') == 'Confirm'){
			if($r[0]->default == 0){
				DB::update('BellProfiles')->set(array('idBellAudio'=>0))->where('idBellAudio', '=', $idBellAudio)->execute();
				DB::update('BellTimes')->set(array('idBellAudio'=>0))->where('idBellAudio', '=', $idBellAudio)->execute();
				DB::delete('BellAudio')->where('idBellAudio', '=', $idBellAudio)->execute();
				$status = true;
			} else {
				$status = false;
			}
			if(Request::$current->is_ajax()){
				echo json_encode(array('status'=>$status,'message'=>(!$status ? 'The Audio you are trying to delete is marked as default, please select another default to delete this file.' : 'OK')));
				exit;
			} else {
				$this->request->redirect('audio/index');
			}
		} else {
			//Do nothing its all in the form!
			if(Request::$current->is_ajax()){
				echo json_encode(array('status'=>false,'message'=>'You must press OK to delete.'));
				exit;
			} else {
				$this->template->data['audio'] = $r[0];
			}
		}
	}
}
?>