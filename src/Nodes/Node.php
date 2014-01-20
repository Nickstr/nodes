<?php namespace Nodes;

class Node
{
    public function __construct($storageProvider)
    {
        $this->nodeRepository = new NodeRepository($storageProvider);
    }

    public function header($page, $key, array $attributes = [])
    {
        return $this->getNode('header', $page, $key, $attributes);
    }

    public function text($page, $key, array $attributes = [])
    {
        return $this->getNode('text', $page, $key, $attributes);
    }

    public function image($page, $key, array $attributes = [])
    {
        return $this->getNode('image', $page, $key, $attributes);
    }

    protected function getNode($type, $page, $key, $attributes = [])
    {
        if(! $this->nodeExists($type, $page, $key)) {
            $this->nodeRepository->createNode($type, $page, $key, $attributes);
        }

        return $this->nodeRepository->getNode($type, $page, $key, $attributes);
    }

    protected function nodeExists($type, $page, $key, $attributes = [])
    {
        return $this->nodeRepository->getNode($type, $page, $key);
    }
}