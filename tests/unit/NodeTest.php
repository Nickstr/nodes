<?php namespace Nodes;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    // tests
    public function testCanCreate()
    {
        $this->assertInstanceOf('Nodes\Node', $this->createNode());
    }

    public function testGetHeader()
    {
        $node = $this->createNode();
        $header = $node->getHeader('foo', 'bar');

        $this->assertInstanceOf('Nodes\Node', $header);
    }

    // Helpers
    private function createNode()
    {
        return new Node(new StorageProviders\FileStorage);
    }
}
