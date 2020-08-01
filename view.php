

<?php
require_once("db.php");
$con = createdb();
    $sql = "select p.kennung, p.titel, k.icon, b.name, sum(s.spendenbetrag) as sume from projekt p left  join benutzer b on p.ersteller=b.name left join kategorie k on p.kategorie=k.id left join spenden s on s.projekt=p.kennung where p.status='offen' group by p.kennung ";
    $results = mysqli_query($GLOBALS['con'], $sql);
    echo " <h1>offene Projekte</h1>";
    if(mysqli_num_rows($results) >0){
  while($row = mysqli_fetch_assoc($results)){
  echo $row['icon'] . "<br>";
  echo"<a href='view_project.php?id=".$row['kennung']."'> {$row['titel']}</a> .<br>";
  echo "von: " . $row['name'] ."<br>" ;
  echo "amount:     "   . $row['sume'] . "<br>";
  
  
} 
    }   
    
    else
    {

        echo "No project found";
    }
