<?php namespace Nodes\StorageProviders;

interface StorageProviderInterface
{
    public function get($type, $page, $key);
    public function put($type, $page, $key);
}