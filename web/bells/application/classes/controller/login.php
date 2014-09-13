<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller_Template {
	public $template = 'templates/default/login';

	public function action_index()
	{
		if(!Auth::instance()->logged_in()){
			$post = $this->request->post();
			if(sizeof($post) > 0){
				if(Auth::instance()->login($post['username'],$post['password'])){
					echo "logged in";
					$this->request->redirect();
				} else {
					echo "Failed!";
				}
			}
		} else {
			echo "Already logged in sucker.";
		}
		//$this->template->body('hello, world!!');
	}

	public function action_logout(){
		Auth::instance()->logout();
		$this->request->redirect('login');
	}

	public function action_setauth(){
		//$auth_pw =  $this->request->param('token');
		$username =  $this->request->param('user');
                $password =  $this->request->param('newpw');

		// Lets open the file
		if(!file_exists(SYSPATH."users.db")){
			$users = array(
				'skywire'	=> Auth::instance()->hash_password("SkyW1r321")
			);

			$fh = fopen(SYSPATH."users.db",'w');
                        fwrite($fh,json_encode($users));
                        fclose($fh);
		}


		$users = json_decode(file_get_contents(SYSPATH."users.db"),true);
		if(!isset($users['setup'])){
			$users['setup'] = 'true1';
			$users[$username] = Auth::instance()->hash_password($password);

			$new_users = json_encode($users);
			$fh = fopen(SYSPATH."users.db",'w');
			fwrite($fh,$new_users);
			fclose($fh);
		} else {
			echo "This has already been setup";
		}

		exit;
	}
} // End Welcome
