<?php

class Point
{

    private $x = 0;
    private $y = 0;


    /**
     * Point constructor.
     * @param int $x
     * @param int $y
     */
    public function __construct($x, $y)
    {
        self::updatePoint($x, $y);
    }


    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }


    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }


    /**
     * @param int $units
     */
    public function increaseX($units)
    {
        $this->x += $units;
    }

    /**
     * @param int $units
     */
    public function decreaseX($units)
    {
        $this->x -= $units;
    }

    /**
     * @param int $units
     */
    public function increaseY($units)
    {
        $this->y += $units;
    }

    /**
     * @param int $units
     */
    public function decreaseY($units)
    {
        $this->y -= $units;
    }


    /**
     * @param int $x
     * @param int $y
     */
    public function updatePoint($x, $y){
        $this->x = $x;
        $this->y = $y;
    }
}