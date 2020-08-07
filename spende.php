<?php


$spenden_id=(int)$_REQUEST['id'];

echo"<form action='new_project_fund.php' method='post'>";
echo "<div >";
echo "<div>";
echo "<input type='hidden'  name='foo' value='$spenden_id'>";
echo "</div>";

echo "<div>";
echo "<input type='number'  step=0.01 name='amoun'  id='amount'>";
echo "</div>";

echo "<div class='checkbox'>";
echo "<label><input type='checkbox' name='myanonym' value='anonym'> anonym</label>";
 echo "</div>";
 echo "<input type='submit' name='submit' value='submit'>";

echo "</form>";


