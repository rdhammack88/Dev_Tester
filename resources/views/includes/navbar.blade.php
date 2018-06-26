<?php

if(isset($_SESSION["category"]) && $_SESSION["category"] != '') {
	$title = strtoupper($_SESSION["category"]) + ' Tester';
} else {
	$title = 'Dev Tester';
}

?>

<header>
	<a href="./"><h1><?php echo $title; ?></h1></a>
</header>
