<?php

namespace TeamATest\Point\Domain;

/**
 * Class PointTest
 */
class PointTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Point */
    private $sut;

    public function setUp()
    {
        $this->createSut();
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->sut = null;
    }

    /**
     * @test
     */
    public function itShouldReturnXZero()
    {
        $pointX = $this->sut->getX();
        $this->assertEquals(0, $pointX);
    }

    /**
     * @test
     */
    public function itShouldReturnXThree()
    {
        $point = new Point(3, 1);
        $this->assertEquals(3, $point->getX());
    }

    /**
     * @test
     */
    public function itShouldReturnYZero()
    {
        $pointY = $this->sut->getY();
        $this->assertEquals(0, $pointY);
    }

    /**
     * @test
     */
    public function itShouldReturnYThree()
    {
        $point = new Point(1, 3);
        $this->assertEquals(3, $point->getY());
    }

    /**
     * @test
     */
    public function itShouldIncreasePointXInOne()
    {
        $this->sut->increaseX(1);
        $this->assertEquals(1, $this->sut->getX());
    }

    /**
     * @test
     */
    public function itShouldDecreasePointXInOne()
    {
        $this->sut->decreaseX(1);
        $this->assertEquals(-1, $this->sut->getX());
    }

    /**
     * @test
     */
    public function itShouldIncreaseYInOne()
    {
        $this->sut->increaseY(1);
        $this->assertEquals(1, $this->sut->getY());
    }

    /**
     * @test
     */
    public function itShouldDecreaseYInOne()
    {
        $this->sut->decreaseY(1);
        $this->assertEquals(-1, $this->sut->getY());
    }

    /**
     * @test
     */
    public function itShouldUpdatePointToAnotherPoint()
    {
        $this->sut->updatePoint(3,4);
        $this->assertEquals(3, $this->sut->getX());
        $this->assertEquals(4, $this->sut->getY());
    }

    private function createSut()
    {
        $this->sut = new Point();
    }
}
