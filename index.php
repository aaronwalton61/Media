<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
         "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Aaron Walton</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
  <link rel="apple-touch-icon" href="apple-touch-icon.png"/>
  <!-- <meta name="apple-touch-fullscreen" content="YES" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
-->
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
  <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>

</head>

<body>
<div data-role="page">
<!-- Here is the toolbar for iUI with back button and Add button -->
    <div data-role="header">
        <h1>Media</h1>
    </div>
<article data-role="content">
	<ul data-role="listview">
	    <li><a href="#DVD-BluRay"><span>DVD - BluRay</span><span class="bubble"><?php echo $dvds; ?></span></a></li>
	    <li><a href="#Books"><span>Books</span><span class="bubble"><?php echo $books; ?></span></a></li>
	    <li><a href="#CD-Vinyl"><span>CDs - Vinyl</span><span class="bubble"><?php echo $cds; ?></span></a></li>
	</ul>
	</article>
<footer data-role="footer" data-position="fixed">
<nav data-role="navbar">
<ul>
<li><a href="#All">All</a></li>
<li><a href="#DVD-BluRay">DVDs</a></li>
<li><a href="#CD-Vinyl">CDs</a></li>
<li><a href="#Books">Books</a></li>
</lu></nav></footer>
</div> <!-- Page -->

<?php 
include 'common.php';

//function setmycookie()
//{
//$expire=time()+60*60*24*30;
//
//    setcookie( "myview", $t , $expire );
//}

//if ( isset($_COOKIE["myview"] ))
//   $myview=$_COOKIE["myview"];
//else
//   $myview="edit";

include 'config.php';
include 'opendb.php';

// Query of DVD
$query  = "SELECT * FROM Media WHERE (MediaType='DVD' or MediaType='BluRay') ORDER BY Title";
$result = mysql_query($query);

$dvds = mysql_num_rows($result);

$last = ' ';
?>

<div data-role='page' id='DVD-BluRay' title='DVD-BluRay - {$dvds}'>
    <div data-role="header">
        <h1>DVD-BluRay<?php echo " - {$dvds}"; ?></h1>
    </div>
<ul data-role='listview' id='DVD-BluRay' data-filter="true" title='DVD-BluRay - {$dvds}'>

<?php
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
   //  Line with Item and possibly link to URL
   echo "<li><a href='{$row['URL']}'><img src='images/{$row['MediaType']}.png'><h1>{$row['Title']}</h1><p>{$row['Directors']} {$row['Year']} {$row['Release Date (month/day/year)']} {$row['PurchaseDate']} {$row['MediaType']}</p></a></li>";
}
?>
</ul>

<footer data-role="footer" data-position="fixed">
<nav data-role="navbar">
<ul>
<li><a href="#">All</a></li>
<li><a href="#DVD-BluRay">DVD - BluRay</a></li>
<li><a href="#CD-Vinyl">CD - Vinyl</a></li>
<li><a href="#Books">Books</a></li>
</lu></nav></footer>
</div>

<?php
// Query of Books
$query  = "SELECT * FROM Media WHERE MediaType='Book' ORDER BY Title";
$result = mysql_query($query);

$books = mysql_num_rows($result);

$last = ' ';
?>

<div data-role='page' id='Books' title='Books - {$books}'>
    <div data-role="header">
        <h1>Books<?php echo " - {$books}"; ?></h1>
    </div>
<ul data-role='listview' id='Books' data-filter="true" title='Books - {$books}'>

<?php
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
   //  Line with Item and possibly link to URL
   echo "<li><img src='images/{$row['MediaType']}.png'><h1>{$row['Title']}</h1><p>{$row['Directors']} {$row['Year']} {$row['PurchaseDate']} {$row['MediaType']}</p></li>";
}
?>

</ul>
<footer data-role="footer" data-position="fixed">
<nav data-role="navbar">
<ul>
<li><a href="#">All</a></li>
<li><a href="#DVD-BluRay">DVD - BluRay</a></li>
<li><a href="#CD-Vinyl">CD - Vinyl</a></li>
<li><a href="#Books">Books</a></li>
</lu></nav></footer>
</div>

<?php
// Query of Music CDs
$query  = "SELECT * FROM Media WHERE MediaType='CD' or MediaType='Vinyl' ORDER BY Title";
$result = mysql_query($query);

$cds = mysql_num_rows($result);

$last = ' ';
?>
<div data-role='page' id='CD-Vinyl' title='CD-Vinyl - {$cds}'>
    <div data-role="header">
        <h1>CD-Vinyl<?php echo " - {$cds}"; ?></h1>
    </div>
<ul data-role="listview" id='CD-Vinyl' data-filter="true" title='CD-Vinyl - {$cds}'>

<?php
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
   //  Line with Item and possibly link to URL
   echo "<li><img src='images/{$row['MediaType']}.png'><h1>{$row['Title']} - {$row['Directors']}</h1><p>{$row['Year']} {$row['PurchaseDate']} {$row['MediaType']}</p></li>";
}
?>

</ul>
<footer data-role="footer" data-position="fixed">
<nav data-role="navbar">
<ul>
<li><a href="#">All</a></li>
<li><a href="#DVD-BluRay">DVD - BluRay</a></li>
<li><a href="#CD-Vinyl">CD - Vinyl</a></li>
<li><a href="#Books">Books</a></li>
</lu></nav></footer>
</div>

<?php

include 'closedb.php';
?>

</body>
</html> 