<?php namespace Nodes;

class NodeRepository
{
    public function __construct($storageProvider)
    {
        $this->storageProvider = $storageProvider;
    }

    public function getNode($type, $page, $key)
    {
        return $this->storageProvider->get($type, $page, $key);
    }

    public function createNode($type, $page, $key)
    {
        return $this->storageProvider->put($type, $page, $key);
    }
}