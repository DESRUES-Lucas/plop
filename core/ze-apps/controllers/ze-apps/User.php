<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data = array() ;

        $this->load->view('user/index', $data);
    }


    public function modal_user()
    {
        $data = array() ;

        $this->load->view('user/modalUser', $data);
    }




    public function getRightList() {
        require_once FCPATH . "core/ze-apps/config/right.php" ;


        /********** charge tous les espaces **********/
        $space = array();
        $folderSpace  = FCPATH . "space/" ;
        // charge tous les fichiers de conf des menus
        if($folder = opendir($folderSpace)) {
            while(false !== ($folderItem = readdir($folder)))
            {
                $fileSpace = $folderSpace . $folderItem ;
                if(is_file($fileSpace) && $folderItem != '.' && $folderItem != '..') {
                    require_once $fileSpace ;
                }
            }
        }
        /********** END : charge tous les espaces **********/


        $data = array() ;

        foreach ($space as $space_item) {
            $dataSpace = array() ;
            $dataSpace["info"] = $space_item;
            $dataSpace["section"] = array();


            $sections = array() ;
            foreach ($rightList as $rightItem) {
                if ($rightItem["space"] == $space_item["id"]) {

                    if (!in_array($rightItem["section"], $sections)) {
                        $sections[] = $rightItem["section"] ;
                    }
                }
            }


            foreach ($sections as $section) {
                $dataItem = array();
                $dataItem["info"] = $section ;
                $dataItem["item"] = array() ;

                foreach ($rightList as $rightItem) {
                    if ($rightItem["space"] == $space_item["id"] && $section == $rightItem["section"]) {
                        $dataItem["item"][] = $rightItem;
                    }
                }

                if (count($dataItem["item"])) {
                    $dataSpace["section"][] = $dataItem ;
                }
            }

            if (count($dataSpace["section"]) > 0) {
                $data[] = $dataSpace ;
            }
        }


        echo json_encode($data);
    }


    public function getAll() {
        $this->load->model("zeapps_users", "users");
        $users = $this->users->get_all();
        echo json_encode($users);
    }

    public function form()
    {
        $data = array() ;

        $this->load->view('user/form', $data);
    }


    public function get($id) {
        $this->load->model("zeapps_users", "users");
        echo json_encode($this->users->get($id));
    }


    public function save() {
        $this->load->model("zeapps_users", "users");

        // constitution du tableau
        $data = array() ;

        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'post') === 0 && stripos($_SERVER['CONTENT_TYPE'], 'application/json') !== FALSE) {
            // POST is actually in json format, do an internal translation
            $data = json_decode(file_get_contents('php://input'), true);
        }

        echo var_dump($data);

        if (isset($data["id"]) && is_numeric($data["id"])) {
            $this->users->update($data, $data["id"]);
        } else {
            $this->users->insert($data);
        }

        echo json_encode("OK");
    }


    public function delete($id) {
        $this->load->model("zeapps_users", "users");
        $this->users->delete($id);

        echo json_encode("OK");
    }



    public function getCurrentUser(){

        $this->load->library('session');
        $this->load->model("zeapps_users", "user");

        $user = $this->user->getUserByToken($this->session->userdata('token'));

        $data = [];
        $data["firstname"]  = $user->firstname;
        $data["lastname"] = $user->lastname;
        $data["email"] = $user->email;
        $data["lang"] = $user->lang;

        echo json_encode($data);

    }





}
