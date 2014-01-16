<?php namespace Nodes\StorageProviders;

use PDO;

class MysqlStorage implements StorageProviderInterface
{
    public function __construct($config)
    {
        $this->connection = new PDO("mysql:host={$config['host']};dbname={$config['database']}", $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function get($type, $page, $key)
    {
        $query = $this->connection->prepare('SELECT * FROM nodes WHERE type = :type AND page = :page AND `key` = :key');
        $query->execute(['type' => $type, 'page' => $page, 'key' => $key]);

        $results = $query->fetch();
        return $results['content'];
    }

    public function put($type, $page, $key)
    {
        $query = $this->connection->prepare('INSERT INTO nodes (type,page,`key`,content) VALUES (:type,:page,:key,:key)');
        $query->execute(['type' => $type, 'page' => $page, 'key' => $key]);
    }

    public function delete()
    {
    }
}