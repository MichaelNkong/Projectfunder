

<?php

require_once("db.php");
$con = createdb();
    $sql = "select * , (SELECT sum(s.spendenbetrag) from spenden s where p.kennung = s.projekt) as sume from projekt p  join kategorie k on p.kategorie = k.id   left join benutzer b on p.ersteller = b.email left join spenden s on p.kennung=s.projekt  where p.status = 'offen' group by p.kennung";
    $results = mysqli_query($GLOBALS['con'], $sql);

    
    
    echo " <div  style='text-align:center;background-color:black;color:white'><h1>offene Projekte</h1></div>";
    
    if(mysqli_num_rows($results) >0){
        echo "<div style='margin-left:400px';>";
      echo "<table style='border: 1px solid black;margin:0'>";
      echo"<tr><th>Icon</th><th>Titel</th><th>Von</th><th>Spenden</th></tr>";
  while($row = mysqli_fetch_assoc($results)){
   
  echo "<tr>";
  echo "<td>".$row['icon'] . "<td>";
  echo"<td> <a href='view_project.php?id=".$row['kennung']."'> {$row['titel']}</a>" ."<td>";
  echo "<td>" . $row['name'] ."<td>" ;
  echo"<td>  "   . $row['sume'] . "<td>";

 
  
  echo "</tr>";

}    echo "</table>";
    echo "</div>";

    }   
   
 
    else
    {

        echo "No project found";
    }
