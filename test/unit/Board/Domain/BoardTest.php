<?php

namespace TeamATest\Board\Domain;
use TeamA\Board\Domain\Board;

/**
 * Class BoardTest
 */
class BoardTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Board */
    private $sut;

    /** @var  Piece */
    private $pieceMock;

    public function setUp()
    {
        $this->generateStubs();
        $this->createSut();
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->sut = null;
        $this->pieceMock = null;
    }

    /**
     * @test
     */
    public function itShouldMoveAPieceToTheLeft()
    {
        $this->pieceMock->expects($this->once())
            ->method('moveLeft');
        $this->sut->movePieceLeft();
    }

    // Mover una ficha a la izquierda cuando esta ya está en el limite del tablero
    public function itShouldNotMoveAPieceToTheLeft()
    {
        $this->pieceMock->expects($this->once())
            ->method('getBoundingBox');
        $this->pieceMock->expects($this->never())
            ->method('moveLeft');
        $this->sut->movePieceLeft();
    }

    /**
     * @test
     */
    public function itShouldMoveAPieceToTheRight()
    {
        $this->pieceMock->expects($this->once())
            ->method('moveRight');
        $this->sut->movePieceRight();
    }

    /**
     * @test
     */
    public function itShouldNotMoveAPieceToTheRight()
    {
        $this->pieceMock->expects($this->once())
            ->method('getBoundingBox');
        $this->pieceMock->expects($this->never())
            ->method('moveRight');
        $this->sut->movePieceRight();
    }

    /**
     * @test
     */
    public function itShouldMoveAPieceDown()
    {
        $this->pieceMock->expects($this->once())
            ->method('moveDown');
        $this->sut->movePieceDown();
    }

    /**
     * @test
     */
    public function itShouldNotMoveAPieceDown()
    {
        $this->pieceMock->expects($this->once())
            ->method('getBottomLinePositions');
        $this->pieceMock->expects($this->never())
            ->method('moveDown');
        $canMoveIt = $this->sut->movePieceDown();

        $this->assertFalse($canMoveIt);
    }

    /**
     * @test
     */
    public function itShouldRotateAPieceCW()
    {
        $this->pieceMock->expects($this->once())
            ->method('rotateCW');
        $this->sut->rotatePieceCW();
    }

    /**
     * @test
     */
    public function itShouldRotateAPieceCWAndMoveToTheRight()
    {
        $this->pieceMock->expects($this->once())
            ->method('rotateCW');
        $this->pieceMock->expects($this->once())
            ->method('getBoundingBox');
        $this->pieceMock->expects($this->atLeastOnce())
            ->method('moveRight');
        $this->sut->rotatePieceCW();
    }

    /**
     * @test
     */
    public function itShouldRotateAPieceCWAndMoveUp()
    {
        $this->pieceMock->expects($this->once())
            ->method('rotateCW');
        $this->pieceMock->expects($this->once())
            ->method('getBoundingBox');
        $this->pieceMock->expects($this->atLeastOnce())
            ->method('moveUp');
        $this->sut->rotatePieceCW();
    }

    /**
     * @test
     */
    public function itShouldRotateAPieceCCW()
    {
        $this->pieceMock->expects($this->once())
            ->method('rotateCCW');
        $this->sut->rotatePieceCCW();
    }

    /**
     * @test
     */
    public function itShouldRotateAPieceCCWAndMoveToTheLeft()
    {
        $this->pieceMock->expects($this->once())
            ->method('rotateCW');
        $this->pieceMock->expects($this->once())
            ->method('getBoundingBox');
        $this->pieceMock->expects($this->atLeastOnce())
            ->method('moveLeft');
        $this->sut->rotatePieceCCW();
    }

    /**
     * @test
     */
    public function itShoudlRotateAPieceCCWAndMoveUp()
    {
        $this->pieceMock->expects($this->once())
            ->method('rotateCW');
        $this->pieceMock->expects($this->once())
            ->method('getBoundingBox');
        $this->pieceMock->expects($this->atLeastOnce())
            ->method('moveUp');
        $this->sut->rotatePieceCCW();
    }

    private function generateStubs()
    {
        $this->pieceMock = $this->getMockBuilder(Piece::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    private function createSut()
    {
        $this->sut = new Board();
        $this->sut->addPiece($this->pieceMock);
    }
}
