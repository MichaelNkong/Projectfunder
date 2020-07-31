<?php
require_once("db.php");
//require_once("component.php");
$con = createdb();
//create buuton click
if(isset($_POST['create'])){

getData();
}
if(isset($_GET['view']))
{

    getData1();
}

function getData(){
$tit=textboxValidate("titel");
$finance=textboxValidate("limit");
$category=textboxValidate("category");
$dree=textboxValidate("describ");
$vor=textboxValidate("vorgang");
if($tit && $finance&&$dree ){

$sql="INSERT INTO projekt(titel,beschreibung,finanzierungslimit,vorgaenger,kategorie) VALUES ('$tit', '$dree','$finance','$vor','$category')";
if(mysqli_query($GLOBALS['con'],$sql)){

    echo "<h1 style color:red;>you created a project on the database</h1>";
    echo "<a href=view_main.html>Main</a>";
}
else {
    echo "error";
}
}
else {
    echo "provide data in the text field";
}

}

function textboxValidate($value){
    $textbox=mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(empty($textbox)){
        echo "you have to input a text please";
        return false;
    }
    else {
        return $textbox;
    }
 
}
 

 