<?php

if(isset($_POST['firstname']) && isset($_POST['name']) && 
isset($_POST['email']) && isset($_POST['street']) && 
isset($_POST['zipcode']) && isset($_POST['city'])){

    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];

    require_once('database.php');

    $db = new DB;

    $result = $db->insert_address($firstname,$name,$email,$street,$zipcode,$city);

    if($result){
        header("Location: ../?message=Address inserted successfully."); 
    }else{
        header("Location: ../?error=An unexpected error happened. Please try again.");
    }

}else{
    header("Location: ../?error=Wrong parameters!"); 
}

?>
