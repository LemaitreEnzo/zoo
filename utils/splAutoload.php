<?php
spl_autoload_register(function ($class) {
	$class = str_replace('\\', '/', $class);

	require "$class.php";
});