<?php	
   $snoopy = new Snoopy;
   $result = $snoopy->fetch('http://www.bravenewcode.com/custom/wordtwit-tweets.php');
   if ( $result ) {
   	  echo $snoopy->results;
   }
?>