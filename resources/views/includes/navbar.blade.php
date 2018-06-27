<?php

// if(isset($_SESSION["category"]) && $_SESSION["category"] != '') {
// 	$title = strtoupper($_SESSION["category"]) + ' Tester';
// } else {
// 	$title = 'Dev Tester';
// }

// if(isset($_SESSION)) {
// 	var_dump($_SESSION);
// }

// $title = 'php';
//&& Session::get('category') != ''

if(null !== Session::get('category') ) {
	$session_category = Session::get('category');
	$title = ucfirst($session_category) . ' Tester'; //Session::get('category'); //strtoupper($session_category) + ' Tester';
} else {
	$title = 'Dev Tester';
}
// $title = 'php';

?>



<header>
	<a href="/"><h1><?php echo $title; ?></h1></a>
</header>
