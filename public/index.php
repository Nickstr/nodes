<?php
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL);

// Include autoloader
require_once './../vendor/autoload.php';

$node = new Nodes\Node(new Nodes\StorageProviders\FileStorage);

$header = $node->getHeader('home', 'test');

var_dump($header);
