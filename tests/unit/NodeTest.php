<?php namespace Nodes;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    protected $path;

    protected function setUp()
    {
        $this->path  = __DIR__;
    }

    protected function tearDown()
    {
        @unlink(__DIR__.'/foo/bar.md');
        @rmdir(__DIR__.'/foo');
    }

    // tests
    public function testCanCreate()
    {
        $this->assertInstanceOf('Nodes\Node', $this->createNode());
    }

    public function testCanGetHeader()
    {
        $node = $this->createNode();
        $header = $node->header('foo', 'bar');

        $this->assertEquals($header, 'bar');
    }


    // Helpers
    private function createNode()
    {
        return new Node(new StorageProviders\FileStorage(['path' => $this->path]));
    }

    private function removeDirectory($dir) {
        foreach(glob($dir . '/*') as $file) {
            if(is_dir($file)) rrmdir($file); else unlink($file);
          } rmdir($dir);
    }

}
