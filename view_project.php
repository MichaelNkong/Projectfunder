 <?php
 
require_once("db.php");
$con=createdb();
$id=(int)$_REQUEST['id'];
echo "<h1> Willkommen zum Projekt Übersicht</h1>";
   $sql = "select p.status, p.finanzierungslimit,p.kennung, p.vorgaenger, p.titel, k.icon, b.name, sum(s.spendenbetrag) as sume from projekt p left  join benutzer b on p.ersteller=b.name left join kategorie k on p.kategorie=k.id left join spenden s on s.projekt=p.kennung where $id=p.kennung group by p.kennung";
   $result=mysqli_query($GLOBALS['con'], $sql);
  while($row=mysqli_fetch_assoc($result)){
echo"icon:  " .$row['icon']."<br>";
echo"titel: " .$row['titel']."<br>";
echo"Finanzierungslimit: " .$row['finanzierungslimit']."   " ."EUR"."<br>";
echo"von: " .$row['name']."<br>";
echo"Aktualle Spendensumme: " .$row['sume']. "  " ."EUR"."<br>";
echo"Status: " .$row['status'] ."<br>";
echo"<a href='view_project.php?id=".$row['kennung']."'> Delete Project</a>               ";
echo"<a href='view_project.php?id=".$row['kennung']."'> Spenden</a>";

  }