<?php

namespace TeamATest\BoundingBox\Domain;

/**
 * Class BoundingBoxTest
 */
class BoundingBoxTest extends \PHPUnit_Framework_TestCase
{
    /** @var  BoundingBox */
    private $sut;

    /** @var  Point */
    private $pointTopMock;

    /** @var  Point */
    private $pointBottomMock;

    public function setUp()
    {
        $this->generateStub();
        $this->createSut();
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->sut = null;
        $this->pointBottomMock = null;
        $this->pointTopMock = null;
    }

    /**
     * @test
     */
    public function itShouldReturnLeftTopCorner()
    {
        $this->sut->setLeftTop($this->pointTopMock);
        $this->assertEquals($this->pointTopMock, $this->sut->getLeftTop());
    }

    /**
     * @test
     */
    public function itShouldReturnRightBottomCorner()
    {
        $this->sut->setRightBottom($this->pointBottomMock);
        $this->assertEquals($this->pointBottomMock, $this->sut->getRightBottom());
    }

    private function generateStub()
    {
        $this->pointTopMock = $this->getMockBuilder(BoundingBox::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->pointBottomMock = $this->getMockBuilder(BoundingBox::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    private function createSut()
    {
        $this->sut = new BoundingBox();
    }
}
