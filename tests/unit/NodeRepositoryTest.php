<?php namespace Nodes;

class NodeRepositoryTest extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        @unlink(__DIR__.'/foo/bar.md');
        @rmdir(__DIR__.'/foo');
    }

    // tests
    public function testCanCreate()
    {
        $this->assertInstanceOf('Nodes\NodeRepository', $this->createNode());
    }

    public function testCanGetNode()
    {
        $node = $this->createNode();
        $header = $node->createNode('header', 'foo', 'bar');

        $this->assertEquals('bar', $node->getNode('header', 'foo', 'bar'));
    }


    // Helpers
    private function createNode()
    {
        return new NodeRepository(new StorageProviders\FileStorage(['path' => __DIR__]));
    }

}
