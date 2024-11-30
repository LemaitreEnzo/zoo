<?php
function redirectTo($url)
{
	header("Location: $url");
}

function render($path, $data = [], $templates = false)
{
	if ($templates) {
		require "templates/$path.php";
	} else {
		require "views/$path.php";
	}
}