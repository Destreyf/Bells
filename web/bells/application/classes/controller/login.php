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

} // End Welcome
