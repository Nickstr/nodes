<?php namespace Nodes\StorageProviders;

class FileStorage implements StorageProviderInterface
{
    public function __construct($config)
    {
        $this->folderPath = $config['path'];
    }

    public function get($type, $page, $key)
    {
        if(is_file($this->getFilePath($type, $page, $key))) {
            return file_get_contents($this->getFilePath($type, $page, $key), 'r');
        }
    }

    public function put($type, $page, $key)
    {
        if(! $this->dirExists($page)) {
            $this->createPageFolder($page);
        }

        file_put_contents($this->getFilePath($type, $page, $key), $key);
    }

    public function delete()
    {

    }

    protected function getFilePath($type, $page, $key)
    {
        return "{$this->getBasePath()}/{$page}/{$type} - {$key}.md";
    }

    protected function getBasePath()
    {
        return "{$_SERVER['DOCUMENT_ROOT']}/{$this->folderPath}";
    }

    protected function createPageFolder($page)
    {
        mkdir($this->getBasePath(). '/'. $page);
    }

    protected function dirExists($page)
    {
        $dir = $this->getBasePath() . '/' . $page;
        return is_dir($dir);
    }
}