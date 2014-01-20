<?php
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL);

// Include autoloader
require_once './../vendor/autoload.php';

$file = [
    'path' => 'storage/nodes'
];

$database = [
    'host'  => 'localhost',
    'database' => 'workshop_development',
    'username' => 'root',
    'password' => 'password'
];

$nodes = new Nodes\Node(new Nodes\StorageProviders\FileStorage($file));

echo $nodes->header('foo', 'bar');

echo $nodes->header('foo', 'bar2');
?>
<img width="100" height="auto" src="images/<? echo $nodes->image('foo', 'bar3'); ?>">
