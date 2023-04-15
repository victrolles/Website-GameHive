<?php
include_once "database.php";

ConnectDatabase();

ModifyEachData("name");
ModifyEachData("surname");                     
ModifyEachData("datedenaissance");
ModifyEachData("description");

if (!CheckExistingPseudo()){

    ModifyEachData("pseudo");
}

if (!CheckExistingEmail()){
    
    ModifyEachData("email");
}

ModifyImage();


header("location: ../edit_profile.php");
?>
