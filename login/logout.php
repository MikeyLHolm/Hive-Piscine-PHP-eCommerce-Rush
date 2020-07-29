<?php

/*
	Cancel session and redirect to index page.
*/

session_start();
session_destroy();
header('Location: ../index.php');
