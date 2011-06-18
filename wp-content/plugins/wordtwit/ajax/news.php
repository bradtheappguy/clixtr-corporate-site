<?php	
	global $wordtwit_version;
	
   $snoopy = new Snoopy;
   $result = $snoopy->fetch('http://www.bravenewcode.com/custom/wptouch-news.php?type=wordtwit&version=' . $wordtwit_version );
   if ( $result ) { 
		echo  $snoopy->results;
   }
?>