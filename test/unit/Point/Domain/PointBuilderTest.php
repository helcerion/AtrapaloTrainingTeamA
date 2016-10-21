<?php

namespace TeamATest\Point\Domain;
use TeamA\Point\Domain\PointBuilder;

/**
 * Class PointBuilderTest
 */
class PointBuilderTest extends \PHPUnit_Framework_TestCase
{
    /** @var  PointBuilder */
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
    public function itShouldReturnAPoint()
    {
        $point = $this->sut->build(0,0);

        $this->assertEquals('Point', get_class($point));
    }

    private function createSut()
    {
        $this->sut = new PointBuilder();
    }
}
