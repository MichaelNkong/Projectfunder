<?php
require_once("db.php");
$connection=createdb();
if(isset($_POST['submit'])){
   
    $id=$_POST['foo'];
    $amount=$_POST['amoun'];
    $anonymous=$_GET['myanonym'];
    $new_anonym="";
    if($anonymous=="anonym")
    {
        $new_anonym="privat";

    }
    elseif(empty($anonymous))  {

        $new_anonym="oeffentlich";
    }
    echo "$amount". "<br>";
    echo "$id";
    $konto_status="select * from konto where inhaber='alan@turing.com'";
    $project_status="select * from projekt where kennung='$id'";
    $konto_result=mysqli_query($GLOBALS['connection'], $konto_status);
    $row_result_konto=mysqli_fetch_assoc($konto_result);
    $project_result=mysqli_query($GLOBALS['connection'], $project_status);
    $row_result_project=mysqli_fetch_assoc($project_result);
    

    $spende=" insert into spenden(spender,projekt,spendenbetrag,sichtbarkeit) values('nkongho.ndip@yahoo.com','$id','$amount','$new_anonym')";
   
    if($row_result_konto['guthaben']<$amount||$row_result_project['status']=='geschlossen'||$row_result_project['finanzierungslimit']<$amount){

echo "cannot donate contact administrator";
        }
else
        {
   mysqli_query($GLOBALS['connection'],$spende); 
   
   echo "you donated";
 }
 $som=$row_result_project['finanzierungslimit']-$amount;
 echo "$som";
 $pr_update="update projekt set status='geschlossen' where kennung='$id'";
 if($som==0){
     mysqli_query($GLOBALS['connection'],$pr_update);
 }

echo "<a href='myindex.php' >Home</a>";
}