<?php

namespace TeamA\BoundingBox\Domain;

use Point;

class BoundingBox
{

    private $leftTop;
    private $rightBottom;

    /**
     * @param Point $point
     *
     * @return Point
     */
    public function setLeftTop($point)
    {
        $this->leftTop = $point;
    }

    /**
     * @param Point $point
     *
     * @return Point
     */
    public function setRightBottom($point)
    {
        $this->rightBottom = $point;
    }

    public function getLeftTop()
    {
        return $this->leftTop;
    }

    public function getRightBottom()
    {
        return $this->rightBottom;
    }
}