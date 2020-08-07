<?php

 require_once("db.php");
 $con=createdb();
 $id=(int)$_REQUEST['id'];
 echo "<h1> Willkommen zum Projekt Übersicht</h1>";
    $sql = "select * , (SELECT sum(s.spendenbetrag) from spenden s where s.projekt = $id) as sume from projekt p  join kategorie k on p.kategorie = k.id   left join benutzer b on p.ersteller = b.email left join spenden s on p.kennung=s.projekt  where p.kennung = $id group by p.kennung";
    $result=mysqli_query($GLOBALS['con'], $sql);
   $row=mysqli_fetch_assoc($result);
   
   if($row['vorgaenger'] != null ){
     $VorId = $row['vorgaenger'];
 
     $sq = "select titel from projekt where kennung = $VorId";
     $results=mysqli_query($GLOBALS['con'], $sq);
     $rows=mysqli_fetch_assoc($results);
     $titel = $rows['titel'];
     
   }
   
   
 
   if(!empty ($row )){
 echo"icon:  " .$row['icon']."<br>";
 echo"titel: " .$row['titel']."<br>";
 echo"Finanzierungslimit: " .$row['finanzierungslimit']."   " ."EUR"."<br>";
 
 if($row['name']){
   echo"von: " .$row['name']."<br>";
 
 }
 
 if(!empty($row['vorgaenger'])){
   echo"Vorgänger: " .$titel."". "<br>" ;
 }
 
 
 if(!empty($row['sume'])){
   echo"Aktualle Spendensumme: " .$row['sume']. "  " ."EUR"."<br>";
 }else{
   echo "Aktualle Spendensumme: Keine Beitrag <br>"; 
 }
 
 echo"Status: " .$row['status'] ."<br>";
 echo"<a href='view_project.php?id=".$row['kennung']."'> Delete Project</a>               ";
 echo"<a href='spende.php?id=".$row['kennung']."'> Spenden</a>";
 
   }

   
 