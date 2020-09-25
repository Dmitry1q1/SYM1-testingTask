<?php
class Controller_Main extends Controller
{
    function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}
	
	function action_index(){
        
        $data["SUCCESS"] = "";
        $data = $this->model->get_data();		
        
		$this->view->generate('main_view.php', 'template_view.php', $data);
    }
    
    function action_add() 
    {
        if(!empty($_POST)) {
            $data['error_email'] = $this->model->add_data();
            
            if ($data['error_email'] != NULL){   
                $this->view->generate('main_view.php', 'template_view.php', $data);
            } else{
                header("Location: /main/index/?success=true");
            }
        }
    }

    function action_get() {
        if(!empty($_GET)){
            $data = $this->model->get_data();
            $this->view->generate('main_view.php', 'template_view.php', $data);
        }

    }

    function action_find() {
        
        if(empty($_GET["ID"]) || !is_numeric ($_GET["ID"])) {
            var_dump("Error");
        } else { 
            $data1 = $this->model->get_data();
            $data2 = $this->model->find_item();
           
            $data = array_merge($data1, $data2);
            $this->view->generate('main_view.php', 'template_view.php', $data);
        }
        
    }

    function action_edit() {
        if(empty($_POST["name"]) || empty($_POST["address"]) || empty($_POST["email"]) || empty($_POST["phone"])) {
            var_dump("Error");
        } else {
            $data = $this->model->get_data();
            $this->model->edit_item();
            
            // $data = array_merge($data1, $data2);
            $this->view->generate('main_view.php', 'template_view.php', $data);
        }
    }
}