<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/22/14
 * Time: 2:01 PM
 */
class Main extends Controller
{
    protected $model;

    /*function __construct()
    {
        
    }*/
    function index()
    {
        $model = $this->model('post');
        //var_dump($_SESSION['user_name']);
        
        //$data['main']=$this->post->get_materials(10);
        //$data['categories']=$this->category->get_categories();
        $data['recents']=$model->get_materials(3);
        //echo"<pre>"; print_r($data['main']); echo "";
        $this->view('header',$data);
        $this->view('navbar',$data);
        $this->view('home',$data);
        $this->view('footer',$data);
    }
    function item($material_id)
    {
        $user_type = $_SESSION['user_type'];
        if(isset($_SESSION['user_type']))
        {
            $model = $this->model('post');
            $data['item']=$model->get_material($material_id);

            if($data['item'])
            {
                $category = $this->model('category');
                $data['categories']=$category->get_categories();

                $uploader_id = $data['item'][0]['uploader_id'];
                $users = $this->model('user');
                $data['user'] = $users->get_user($uploader_id);

                $permissions = $this->model('permissions');
                $data['permission'] = $permissions->check_permission($material_id,$_SESSION['user_id']);

                $data['requested'] = $permissions->check_request($material_id,$_SESSION['user_id'],$uploader_id);

                if( $data['item'][0]['privacy']==0 or $data['permission'] or $_SESSION['user_type']=='librarian')
                { 
                    $_SESSION['pdf_path']=$data['item'][0]['path'];
                    $this->view('header',$data);
                    $this->view('navbar',$data);
                    $this->view('item_view',$data);
                    $this->view('footer',$data);
                }
                else
                {
                    $this->view('header',$data);
                    $this->view('navbar',$data);
                    $this->view('request',$data);
                    $this->view('footer',$data);
                }
            }
            else
            {
                header("Location: ".ASSET_PATH);
            }

            
        }
        else
        {
            header("Location: ".ASSET_PATH);
        }
    }

    function browse()
    {
        $model = $this->model('post');
        
        $data['recents']=$model->get_materials(10);
        $this->view('header',$data);
        $this->view('navbar',$data);
        $this->view('browse',$data);
        $this->view('footer',$data);
    }

    function browse_call()
    {
        $model = $this->model('post');
        $return["json"] = $model->get_materials(10);
        //Function to check if the request is an AJAX request
        function is_ajax() 
        {
          return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        }
 
        function test_function($return)
        {
          
          echo json_encode($return);
        }

        if (is_ajax()) 
        {

            if (isset($_POST["action"]) && !empty($_POST["action"])) 
            { //Checks if action value exists
                $action = $_POST["action"];
                switch($action) 
                { //Switch case for value of action
                    case "recent": test_function($return); break;
                }
            }
        }
    }

    function category_call($id)
    {
        $category = $this->model('category');
        $return["json"] = $category->category_result($id);
        //Function to check if the request is an AJAX request
        function is_ajax() 
        {
          return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        }
 
        function test_function($return)
        {
          //$return = $_POST;
  
          //Do what you need to do with the info. The following are some examples.
          //if ($return["favorite_beverage"] == ""){
          //  $return["favorite_beverage"] = "Coke";
          //}
          //$return["favorite_restaurant"] = $this->post->get_materials(10);
  
          //$return["json"] = 
          echo json_encode($return);
        }

        if (is_ajax()) 
        {

            if (isset($_POST["action"]) && !empty($_POST["action"])) 
            { //Checks if action value exists
                $action = $_POST["action"];
                switch($action) 
                { //Switch case for value of action
                    case "recent": test_function($return); break;
                }
            }
        }
    }


}