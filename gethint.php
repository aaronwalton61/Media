<?php
include 'common.php';
include 'config.php';
include 'opendb.php';

$q=$_GET["q"];

$query = "SELECT * FROM Media WHERE (Title Like '%".$q."%')";
$result = mysql_query($query);

//$query = "FLUSH PRIVILEGES";
//mysql_query($query) or die('Flush Error, insert query failed');

echo "<ul id='Search' title='Search'>";
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    $color = wherecolor($row['Date'], $row['Thoughts']);

    $iphone = "iPhone";

    if (stristr($_SERVER['HTTP_USER_AGENT'], $iphone)) 
    {
        echo "<li>{$row['Title']}</li>";
    }
    else
    {
        echo "<br>{$row['Title']}";
    }
} 
echo "</ul>";
include 'closedb.php';
?>
