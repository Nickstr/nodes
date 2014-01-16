<?php namespace Nodes;

class Node
{
    public function __construct($storageProvider)
    {
        $this->nodeRepository = new NodeRepository($storageProvider);
    }

    public function getHeader($page, $key, array $attributes = [])
    {
        if(! $this->nodeExists('header', $page, $key)) {
            $this->nodeRepository->createNode('header', $page, $key, $attributes);
        }

        return $this->nodeRepository->getNode('header', $page, $key, $attributes);
    }

    public function getText($page, $key, array $attributes = [])
    {
        if(! $this->nodeExists('text', $page, $key)) {
            $this->nodeRepository->createNode('text', $page, $key, $attributes);
        }

        return $this->nodeRepository->getNode('text', $page, $key, $attributes);
    }







    protected function nodeExists($type, $page, $key, $attributes = [])
    {
        return $this->nodeRepository->getNode($type, $page, $key);
    }
}