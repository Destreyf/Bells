<?php

class Controller_Bulk extends Controller_Admin
{
    public function __construct(Request $request, Response $response)
    {
        if (!Auth::instance()->logged_in()) {
            $action = Request::current()->action();
            if ($action != 'index') {
                echo json_encode(array('logged_out' => true));
                exit;
            }
        }
        parent::__construct($request, $response);
    }

    public function action_index()
    {
        $this->template->data = array(
            'profiles' => DB::query(Database::SELECT,"SELECT * FROM `BellProfiles` ORDER BY `order` ASC")->as_object()->execute(),
            'zones'     => DB::query(Database::SELECT,"SELECT * FROM `BellZones`")->as_object()->execute()
        );
    }
}