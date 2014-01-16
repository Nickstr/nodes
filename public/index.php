<?php
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL);

// Include autoloader
require_once './../vendor/autoload.php';

$config = [
    'host'  => 'localhost',
    'database' => 'workshop_development',
    'username' => 'root',
    'password' => 'password'
];

$nodes = new Nodes\Node(new Nodes\StorageProviders\MysqlStorage($config));

echo $nodes->getHeader('foo', 'bar');

echo $nodes->getHeader('foo', 'bar2');
?>