<?php namespace Nodes\StorageProviders;

use PDO;

class MysqlStorage implements StorageProviderInterface
{
    protected $config;
    protected $connection;

    public function __construct($config = null)
    {
        $this->setConfig($config);
        $this->setConnection();
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

    protected function setConnection()
    {
        $this->connection = new PDO("mysql:host={$this->config['host']};dbname={$this->config['database']}", $this->config['username'], $this->config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function setConfig($config)
    {
        $this->config = $config;
    }
}