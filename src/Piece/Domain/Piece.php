<?php

namespace Piece\Domain;

use BoundingBox;
use Point\Domain\PointBuilder;

abstract class Piece
{
    /** @var  BoundingBox */
    private $boundingBox;

    /** @var  PointBuilder */
    private $pointBuilder;

    /**
     * Piece constructor.
     *
     * @param BoundingBox $boundingBox
     * @param PointBuilder $pointBuilder
     */
    public function __construct(BoundingBox $boundingBox, PointBuilder $pointBuilder)
    {
        $this->boundingBox = $boundingBox;
        $this->pointBuilder = $pointBuilder;
    }

    public function moveLeft()
    {

    }

    public function moveRight()
    {

    }

    public function moveUp()
    {

    }

    public function moveDown()
    {

    }

    public function rotateCW()
    {

    }

    public function rotateCCW()
    {

    }

    public function getBoundingBox()
    {

    }

    public function getBottomLinePositions()
    {

    }

}