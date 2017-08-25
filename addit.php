<?php
include 'database/config.php';
include 'database/opendb.php';

//if(isset($_POST['add']))
{

$name = $_POST['title'];
$creator = $_POST['creator'];
$url = $_POST['link'];
$date = $_POST['date'];
$type =  $_POST['type'];
$year =  $_POST['year'];

switch ($date)
{
     case 0:
       $date = "0000-00-00";
       break;
     case 1:
       $date = date("Y-m-d");
       break;
     default:
       $date = "0000-00-00";
}

$query = "INSERT INTO Media (Title, Creator, Year, MediaType, PurchaseDate ) VALUES ('$name', '$creator', '$year', '$type', '$date' )";
$new = mysql_query($query) or die('Insert Error, insert query failed');

?>
<div id="Status" title="Status" class="panel">
    <h2>Add New</h2>
    <ul>
      <li>New <?php echo $name."<br>".$url; ?> added</li>
    </ul>
</div>
<!--
-->
<?php
}

include 'database/closedb.php';
?>