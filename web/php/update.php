<?php

if(isset($_POST['firstname']) && isset($_POST['name']) && 
isset($_POST['email']) && isset($_POST['street']) && 
isset($_POST['zipcode']) && isset($_POST['city']) && isset($_GET['id'])){

    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $id = isset($_GET['id']);

    require_once('database.php');

    $db = new DB;

    $result = $db->update_address($id,$firstname,$name,$email,$street,$zipcode,$city);

    if($result){
        header("Location: ../?message=Address updated successfully."); 
    }else{
        header("Location: ../?error=An unexpected error happened. Please try again.");
    }

}else{
    header("Location: ../?error=Wrong Parameters!");
}

?>