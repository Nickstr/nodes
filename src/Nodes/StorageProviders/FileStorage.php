<?php namespace Nodes\StorageProviders;

class FileStorage implements StorageProviderInterface
{
    public function get($type, $page, $key)
    {
        if(file_exists($this->getFilePath($page, $key))) {
            return file_get_contents($this->getFilePath($page, $key), 'r');
        }
    }

    public function put($type, $page, $key)
    {
        $this->createPageFolder($page);
        file_put_contents($this->getFilePath($page, $key), $key, FILE_APPEND);
    }

    public function delete()
    {

    }

    protected function getFilePath($page, $key)
    {
        return "{$this->getBaseFolder()}{$page}/{$key}.md";
    }

    protected function getBaseFolder()
    {
        return "{$_SERVER['DOCUMENT_ROOT']}/storage/nodes/";
    }

    protected function createPageFolder($page)
    {
        mkdir($this->getBaseFolder(). '/'. $page);
    }
}