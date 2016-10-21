<?php

namespace TeamA\Point\Domain;


class PointBuilder
{
    /**
     * @param int $x
     * @param int $y
     *
     * @return Point
     */
    public function build($x, $y)
    {
        return new Point($x, $y);
    }
}