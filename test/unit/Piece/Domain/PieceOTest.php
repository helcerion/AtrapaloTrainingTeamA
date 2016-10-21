<?php
/**
 * Piece O
 *
 *   01  01  01  01  01
 *
 * 0 ##  ##  ##  ##  ##
 * 1 ##  ##  ##  ##  ##
 */
namespace TeamATest\Piece\Domain;

/**
 * Class PieceOTest
 */
class PieceOTest extends \PHPUnit_Framework_TestCase
{
    /** @var  PieceO */
    private $sut;

    /** @var  BoundingBox */
    private $boundingBoxMock;

    /** @var  PointBuilder */
    private $pointBuilderMock;

    /** @var  Point */
    private $pointMock;

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
        $this->boundingBoxMock = null;
        $this->pointBuilderMock = null;
        $this->pointMock = null;
    }

    /**
     * @test
     */
    public function itShouldMovePieceToLeft()
    {
        $this->boundingBoxMock->expects($this->once())
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->boundingBoxMock->expects($this->once())
            ->method('getRightBottom')
            ->will($this->returnValue($this->pointMock));
        $this->pointMock->expects($this->exactly(6))
            ->method('increaseX')
            ->with($this->equalTo(1));
        $this->boundingBoxMock->expects($this->once())
            ->method('setLeftTop');
        $this->boundingBoxMock->expects($this->once())
            ->method('setRightBottom');
        $this->sut->moveLeft(1);
    }

    /**
     * @test
     */
    public function itShouldMovePieceToRight()
    {
        $this->boundingBoxMock->expects($this->once())
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->boundingBoxMock->expects($this->once())
            ->method('getRightBottom')
            ->will($this->returnValue($this->pointMock));
        $this->pointMock->expects($this->exactly(6))
            ->method('decreaseX')
            ->with($this->equalTo(1));
        $this->boundingBoxMock->expects($this->once())
            ->method('setLeftTop');
        $this->boundingBoxMock->expects($this->once())
            ->method('setRightBottom');
        $this->sut->moveRight(1);
    }

    /**
     * @test
     */
    public function itShouldMovePieceDown()
    {
        $this->boundingBoxMock->expects($this->once())
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->boundingBoxMock->expects($this->once())
            ->method('getRightBottom')
            ->will($this->returnValue($this->pointMock));
        $this->pointMock->expects($this->exactly(6))
            ->method('increaseY')
            ->with($this->equalTo(1));
        $this->boundingBoxMock->expects($this->once())
            ->method('setLeftTop');
        $this->boundingBoxMock->expects($this->once())
            ->method('setRightBottom');
        $this->sut->moveDown(1);
    }

    /**
     * @test
     */
    public function itShouldMovePieceUp()
    {
        $this->boundingBoxMock->expects($this->once())
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->boundingBoxMock->expects($this->once())
            ->method('getRightBottom')
            ->will($this->returnValue($this->pointMock));
        $this->pointMock->expects($this->exactly(6))
            ->method('decreaseY')
            ->with($this->equalTo(1));
        $this->boundingBoxMock->expects($this->once())
            ->method('setLeftTop');
        $this->boundingBoxMock->expects($this->once())
            ->method('setRightBottom');
        $this->sut->moveUp(1);
    }

    /**
     * @test
     */
    public function itShouldRotatePieceCW()
    {
        $this->boundingBoxMock->expects($this->never())
            ->method('getLeftTop');
        $this->boundingBoxMock->expects($this->never())
            ->method('getRightBottom');
        $this->pointMock->expects($this->never())
            ->method('updatePoint');
        $this->boundingBoxMock->expects($this->never())
            ->method('setLeftTop');
        $this->boundingBoxMock->expects($this->never())
            ->method('setRightBottom');
        $this->sut->rotateCW();
    }

    /**
     * @test
     */
    public function itShouldRotatePieceCCW()
    {
        $this->boundingBoxMock->expects($this->never())
            ->method('getLeftTop');
        $this->boundingBoxMock->expects($this->never())
            ->method('getRightBottom');
        $this->pointMock->expects($this->never())
            ->method('updatePoints');
        $this->boundingBoxMock->expects($this->never())
            ->method('setLeftTop');
        $this->boundingBoxMock->expects($this->never())
            ->method('setRightBottom');
        $this->sut->rotateCCW();
    }

    /**
     * @test
     */
    public function itShouldGetBoundingBox()
    {
        $boundingBox = $this->sut->getBoundingBox();

        $this->assertEquals($boundingBox, $this->boundingBoxMock);
    }

    /**
     * @test
     */
    public function itShouldGetBottomLinePosition()
    {
        /** @var Point[] $bottomLinePositions */
        $bottomLinePositions = $this->sut->getBottomLinePositions();

        $this->assertCount(count($bottomLinePositions), 2);
    }

    private function generateStub()
    {
        $this->boundingBoxMock = $this->getMockBuilder(BoundingBox::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->pointBuilderMock = $this->getMockBuilder(PointBuilder::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->pointMock = $this->getMockBuilder(Point::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->pointBuilderMock->expects($this->exactly(4))
            ->method('build')
            ->will($this->returnValue($this->pointMock));
    }

    private function createSut()
    {
        $this->sut = new PieceO($this->boundingBoxMock, $this->pointBuilderMock);
    }
}
