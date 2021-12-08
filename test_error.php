<?php
require_once('connect.php');
$q=mysqli_query($connect, "SELECT `value` FROM `expenses`;");
while ($key = mysqli_fetch_array($q))
{
  echo $key['value'];
}

?>