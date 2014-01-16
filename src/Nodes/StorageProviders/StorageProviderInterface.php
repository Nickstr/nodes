<?php namespace Nodes\StorageProviders;

interface StorageProviderInterface
{
    public function get($type, $page, $key);
    public function delete();
}