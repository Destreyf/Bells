<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Template {
	public $template = 'templates/default/main';
	
	public function __construct(Request $request, Response $response){
		parent::__construct($request, $response);
		if(!Auth::instance()->logged_in()){
			//Lets redirect to the login page!
			$this->request->redirect('login');
			if($action != 'index'){
				echo json_encode(array('logged_out'=>true));
				exit;
			}
			exit;
		}
		$this->auto_render = ! Request::$current->is_ajax();
	}
	
	public function before(){
		parent::before();
		if ($this->auto_render){
			//Lets setup template variables
			$this->template->user 			= Auth::instance()->get_user();
			$this->template->title 			= '';
			$this->template->body 			= '';
			$this->template->sidebar		= '';
			$this->template->sidebar_data	= '';
			$this->template->zone			= '';
			$this->template->zones			= array();
			$this->template->data			= array();
			
			View::bind_global('user', $this->template->user);
			View::bind_global('title', $this->template->title);
			View::bind_global('body', $this->template->body);
			View::bind_global('sidebar', $this->template->sidebar);
			View::bind_global('sidebar_data', $this->template->sidebar_data);
			View::bind_global('zone', $this->template->zone);
			View::bind_global('zones', $this->template->zones);
			View::bind_global('data', $this->template->data);
			
  			$this->template->styles = array();
			$this->template->scripts = array();
			
			View::bind_global('styles', $this->template->styles);
			View::bind_global('scripts', $this->template->scripts);
		} else {
			//$stuff = ob_get_contents();
			//ob_end_clean();
			$this->request->headers('Content-type','application/json; charset='.Kohana::$charset);	
			//$this->response->body($stuff);
		}
	}
	public function after(){
		if ($this->auto_render){
			$styles = array(
				'default.css',
				'excite-bike/jquery-ui-1.8.21.custom.css',
				'fullcalendar.css',
				//'fullcalendar.print.css'
			);
			$scripts = array(
				'jquery-1.7.2.min.js',
				'jquery-ui-1.8.21.custom.min.js',
				'jquery-ui-touch-punch.js',
				'fullcalendar.min.js',
				'domready.js',
				'swfobject.js',
				'tinywav.js',
				'site.js'
			);
			$this->template->styles = array_merge( $this->template->styles, $styles );
			$this->template->scripts = array_merge( $this->template->scripts, $scripts );
			if($this->template->body == ''){
				//We need to load some content into this page...
				if(Kohana::find_file('views',Request::current()->controller().'/'.Request::current()->action())){
					$this->template->body = View::factory(Request::current()->controller().'/'.Request::current()->action());
				}
			}
			if($this->template->sidebar == ''){
				//try to find a "Sidebar" to include...
				if(Kohana::find_file('views',Request::current()->controller().'/'.Request::current()->action().'/sidebar')){
					//Sub method has one, we should match "specific" first.
					$this->template->sidebar = View::factory(Request::current()->controller().'/'.Request::current()->action().'/sidebar');
				} else if(Kohana::find_file('views',Request::current()->controller().'/sidebar')){
					//So i have a match, i'm going to take it!
					$this->template->sidebar = View::factory(Request::current()->controller().'/sidebar');
				} else if(Kohana::find_file('views','sidebar')){
					//Falling back to teh default sidebar "IF" it exsits.
					$this->template->sidebar = View::factory('sidebar');
				} else if(Kohana::find_file('views','templates/default/sidebar')){
					$this->template->sidebar = View::factory('templates/default/sidebar');
				}
			}
			if($this->template->title == ''){
				$action         = (Request::current()->action() != 'index' ? Request::current()->action() : '');
				$controller     = ($action != '' ? Inflector::singular(Request::current()->controller()) : Request::current()->controller());
				$this->template->title = ucwords(($action != '' ? $action.' ' : '').$controller);
			}
		}
		parent::after();
	}
}
?>