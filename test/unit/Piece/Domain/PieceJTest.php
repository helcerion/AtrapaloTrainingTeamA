<?php
/**
 * Piece J
 *
 *   01  012  01  012
 *
 * 0  #  #    ##  ###
 * 1  #  ###  #     #
 * 2 ##       #
 */
namespace TeamATest\Piece\Domain;

/**
 * Class PieceJTest
 */
class PieceJTest extends \PHPUnit_Framework_TestCase
{
    /** @var  PieceJ */
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
    public function itShouldRotatePieceCWFromInitialPosition()
    {
        $this->boundingBoxMock->expects($this->once())
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->rotate(0, 0, 0, 0, 1, 2, 1, 2, 1);
        $this->boundingBoxMock->expects($this->once())
            ->method('setRightBottom')
            ->with($this->pointMock);
        $this->sut->rotateCW();
    }

    /**
     * @test
     */
    public function itShouldRotatePieceCWFromInitialPositionTwice()
    {
        $this->boundingBoxMock->expects($this->exactly(2))
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->rotate(0, 0, 0, 0, 1, 1, 1, 2, 1);
        $this->rotate(1, 0, 0, 1, 0, 0, 1, 0, 2);
        $this->boundingBoxMock->expects($this->exactly(2))
            ->method('setRightBottom')
            ->with($this->pointMock);
        $this->sut->rotateCW();
        $this->sut->rotateCW();
    }

    /**
     * @test
     */
    public function itShouldRotatePieceCWFromInitialPositionThreeTimes()
    {
        $this->boundingBoxMock->expects($this->exactly(3))
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->rotate(0, 0, 0, 0, 1, 1, 1, 2, 1);
        $this->rotate(1, 0, 0, 1, 0, 0, 1, 0, 2);
        $this->rotate(2, 0, 0, 1, 0, 2, 0, 2, 1);
        $this->boundingBoxMock->expects($this->exactly(3))
            ->method('setRightBottom')
            ->with($this->pointMock);
        $this->sut->rotateCW();
        $this->sut->rotateCW();
        $this->sut->rotateCW();
    }

    /**
     * @test
     */
    public function itShouldRotatePieceCWFromInitialPositionFourTimes()
    {
        $this->boundingBoxMock->expects($this->exactly(4))
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->rotate(0, 0, 0, 0, 1, 1, 1, 2, 1);
        $this->rotate(1, 0, 0, 1, 0, 0, 1, 0, 2);
        $this->rotate(2, 0, 0, 1, 0, 2, 0, 2, 1);
        $this->rotate(3, 1, 0, 1, 1, 0, 2, 1, 2);
        $this->boundingBoxMock->expects($this->exactly(4))
            ->method('setRightBottom')
            ->with($this->pointMock);
        $this->sut->rotateCW();
        $this->sut->rotateCW();
        $this->sut->rotateCW();
        $this->sut->rotateCW();
    }

    /**
     * @test
     */
    public function itShouldRotatePieceCCWFromInitialPosition()
    {
        $this->boundingBoxMock->expects($this->once())
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->rotate(0, 0, 0, 1, 0, 2, 0, 2, 1);
        $this->boundingBoxMock->expects($this->once())
            ->method('setRightBottom')
            ->with($this->pointMock);
        $this->sut->rotateCCW();
    }

    /**
     * @test
     */
    public function itShouldRotatePieceCCWFromInitialPositionTwice()
    {
        $this->boundingBoxMock->expects($this->exactly(2))
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->rotate(0, 0, 0, 1, 0, 2, 0, 2, 1);
        $this->rotate(1, 0, 0, 1, 0, 0, 1, 0, 2);
        $this->boundingBoxMock->expects($this->exactly(2))
            ->method('setRightBottom')
            ->with($this->pointMock);
        $this->sut->rotateCCW();
        $this->sut->rotateCCW();
    }

    /**
     * @test
     */
    public function itShouldRotatePieceCCWFromInitialPositionThreeTimes()
    {
        $this->boundingBoxMock->expects($this->exactly(3))
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->rotate(0, 0, 0, 1, 0, 2, 0, 2, 1);
        $this->rotate(1, 0, 0, 1, 0, 0, 1, 0, 2);
        $this->rotate(2, 0, 0, 0, 1, 1, 1, 2, 1);
        $this->boundingBoxMock->expects($this->exactly(3))
            ->method('setRightBottom')
            ->with($this->pointMock);
        $this->sut->rotateCCW();
        $this->sut->rotateCCW();
        $this->sut->rotateCCW();
    }

    /**
     * @test
     */
    public function itShouldRotatePieceCCWFromInitialPositionFourTimes()
    {
        $this->boundingBoxMock->expects($this->exactly(4))
            ->method('getLeftTop')
            ->will($this->returnValue($this->pointMock));
        $this->rotate(0, 0, 0, 1, 0, 2, 0, 2, 1);
        $this->rotate(1, 0, 0, 1, 0, 0, 1, 0, 2);
        $this->rotate(2, 0, 0, 0, 1, 1, 1, 2, 1);
        $this->rotate(3, 1, 0, 1, 1, 0, 2, 1, 2);
        $this->boundingBoxMock->expects($this->exactly(4))
            ->method('setRightBottom')
            ->with($this->pointMock);
        $this->sut->rotateCCW();
        $this->sut->rotateCCW();
        $this->sut->rotateCCW();
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

        $this->assertCount(2, $bottomLinePositions);
    }

    /**
     * @test
     */
    public function itShouldGetBottomLinePositionWhenRotatePiece()
    {
        $this->sut->rotateCW();
        /** @var Point[] $bottomLinePositions */
        $bottomLinePositions = $this->sut->getBottomLinePositions();

        $this->assertCount(3, $bottomLinePositions);
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
        $this->sut = new PieceJ($this->boundingBoxMock, $this->pointBuilderMock);
    }

    private function rotate($rotateNum, $point1X, $point1Y, $point2X, $point2Y, $point3X, $point3Y, $point4X, $point4Y)
    {
        $index = $rotateNum * 6;

        $this->pointMock->expects($this->at(0 + $index))
            ->method('getX')
            ->will($this->returnValue(0));
        $this->pointMock->expects($this->at(1 + $index))
            ->method('getY')
            ->will($this->returnValue(0));
        $this->pointMock->expects($this->at(2 + $index))
            ->method('updatePoint')
            ->with($this->equalTo($point1X), $this->equalTo($point1Y));
        $this->pointMock->expects($this->at(3 + $index))
            ->method('updatePoint')
            ->with($this->equalTo($point2X), $this->equalTo($point2Y));
        $this->pointMock->expects($this->at(4 + $index))
            ->method('updatePoint')
            ->with($this->equalTo($point3X), $this->equalTo($point3Y));
        $this->pointMock->expects($this->at(5 + $index))
            ->method('updatePoint')
            ->with($this->equalTo($point4X), $this->equalTo($point4Y));
    }
}
