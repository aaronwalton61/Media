<?php
function wherecolor($fdate, $fstr)
{
   if ( $fdate == '0000-00-00 00:00:00' )
   {
      $fcolor = "'red'";
      switch ( $fstr )
      {
         case "Home":
	    $fcolor = "'green'";
            break;
         case "Mall":
	    $fcolor = "'blue'";
            break;
         case "Swan":
	    $fcolor = "'yellow'";
            break;
         case "Duluth":
	    $fcolor = "'purple'";
            break;
         case "Duluth":
	    $fcolor = "'orange'";
            break;
         default:
            break;
      }
   }
   else
   {
       if ( $fdate == null )
           $fcolor = "'grey'";
       else
           $fcolor = "''";
   }

   return $fcolor;
}

function grouprows( $char, $last )
{
   // Print headers/Groups for each letter as it shows up with # for everything before 'A'
   // begin with $last=' ';  Call this before every list entry for a row.
   if ( $last == ' ' || $last == '#' )
   {
      if ( $char >= 'A' && $char <='Z' )
      {
         $last = $char;
         echo "<li class='group' id='{$last}'>{$last}</li>";
      }
      else
      {
         if ( $last == ' ' )
            echo "<li class='group' id='#'>#</li>";
         $last = '#';
      }
   }
   else
   {
   if ( $char >$last )
      {
         while ( $char >$last )
            $last++;
         echo "<li class='group' id='{$last}'>{$last}</li>";
      }
   }
   return $last;
}
?>