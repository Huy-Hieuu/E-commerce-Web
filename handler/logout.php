<?php
session_start();
$dom = new DOMDocument();
$dom -> loadHTMLFile('../layouts/nav.php');
$modLink = $dom -> getElementById('inout');
$modLink -> setAttribute('href', '../page/login.php');
$modBtn = $dom -> getElementById('inout-text');
$modBtn -> nodeValue = 'log in';
$dom -> saveHTMLFile('../layouts/nav.php');

$dom -> loadHTMLFile('../layouts/product_section.php');
$modBtn = $dom -> getElementById('addProBtn');
$modBtn -> nodeValue = '';
$dom -> saveHTMLFile('../layouts/product_section.php');

session_destroy();



header('Location: ../page/home.php');
?>