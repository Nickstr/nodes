<?php
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL);

// Include autoloader
require_once './../vendor/autoload.php';

$config = [
    'path'  => 'storage/nodes'
];

$nodes = new Nodes\Node(new Nodes\StorageProviders\FileStorage($config));
echo $nodes->getHeader('foo', 'bar');
echo $nodes->getText('foo', 'bar');
?>


<h1>Hoi! <?php echo $nodes->getHeader('home', 'groet naam'); ?></h1>