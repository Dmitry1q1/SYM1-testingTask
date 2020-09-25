<?php
class Model_Main extends Model{

	public function get_data(){	
        
        $filterValue = $_GET["filter"];
        $filterKey = $_GET["applications-column"];


        $result["SUCCESS"]="";
        $result["APPLICATION_TO_CHANGE"]="";
        $result["filter"]="";
        $result["applications-column"]="";
        if ($_GET["success"]){
            $result["SUCCESS"] = "Task successfully added!";
        }

        $mysqli = new mysqli("127.0.0.1", "mitsostl_bd", "jl*B8R7O", "mitsostl_bd");

        if ($mysqli->connect_errno) {
            return "Не удалось подключиться к MySQL: " . mysqli_connect_error();
        }
        
        if (isset($_GET['add-filter'])) {
            if(!empty($filterKey) && !empty($filterValue)){
                $result["filter"]=$filterValue;
                $result["applications-column"]=$filterKey;
                $res = $mysqli->query("SELECT * FROM applications WHERE $filterKey LIKE '%".$filterValue."%'");
            }else{
                $res = $mysqli->query("SELECT * FROM applications ORDER BY application_id desc");
            }
        } else if (isset($_GET['delete-filter'])) {
            $res = $mysqli->query("SELECT * FROM applications ORDER BY application_id desc");
        }else{
            $res = $mysqli->query("SELECT * FROM applications ORDER BY application_id desc");
        }


        foreach($res as $applications){
            $result["CONTENT"][] = $applications;
        }

        return $result; 	
    } 

    public function add_data() {

        $mysqli = new mysqli("127.0.0.1", "mitsostl_bd", "jl*B8R7O", "mitsostl_bd");
        $name = $_POST["name"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];


        if ($mysqli->connect_errno) {
            return "Не удалось подключиться к MySQL: " . mysqli_connect_error();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "email: ".$email." not valid";
        }
        if (!preg_match('/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/', $phone)){
            return "phone number: ".$phone." not valid";
        }

        if (!$mysqli->query("INSERT INTO applications(fio, address, email,phone_number) 
                VALUES ('".$name."','".$address."','".$email."','".$phone."');"))
            return $mysqli->errno . ") " . $mysqli->error;
    }
    
    public function find_item() {
        $mysqli = new mysqli("127.0.0.1", "mitsostl_bd", "jl*B8R7O", "mitsostl_bd");

        if ($mysqli->connect_errno) {
            return "Не удалось подключиться к MySQL: " . mysqli_connect_error();
        }
        $result["APPLICATION_TO_CHANGE"]="";
        $item_id = $_GET["ID"];

        $res = $mysqli->query("SELECT * FROM applications WHERE application_id = ".$item_id);
        foreach($res as $application){
            $result["APPLICATION_TO_CHANGE"][] = $application;
        }
        
        return $result;
    }

    public function edit_item() {
        $mysqli = new mysqli("127.0.0.1", "mitsostl_bd", "jl*B8R7O", "mitsostl_bd");

        if ($mysqli->connect_errno) {
            return "Не удалось подключиться к MySQL: " . mysqli_connect_error();
        }

        $name = $_POST["name"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $id = $_POST["ID"];
        
        if ($mysqli->connect_errno) {
            return "Не удалось подключиться к MySQL: " . mysqli_connect_error();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "email: ".$email." not valid";
        }
        if (!preg_match('/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/', $phone)){
            return "phone number: ".$phone." not valid";
        }
        
        if (!$mysqli->query("UPDATE applications SET fio = '".$name."', address= '".$address."',
         email = '".$email."', phone_number = '".$phone."' WHERE application_id = ".$id))
            return $mysqli->errno . ") " . $mysqli->error;

    }
}