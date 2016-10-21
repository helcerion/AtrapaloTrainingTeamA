<?php

namespace TeamA\Board\Domain;

use TeamA\Piece\Domain;
use TeamA\BoundingBox\Domain;
use TeamA\Point\Domain;

class Board{

    const HEIGHT = 20;
    const WIDTH = 10;

    private $pieces;
    private $actualPiece;
    private $hasActualPiece;

    private $boundingBox;

    public function Board() {
        // Initialize bounding box
        $bb = new BoundingBox();
        $pointBuilder = new PointBuilder();
        $leftTop = $pointBuilder->build(0, 0);
        $rightBottom = $pointBuilder->build(WIDTH, HEIGHT);
        $bb->setLeftTop($leftTop);
        $bb->setRightBottom($rightBottom);

        // Initialize attrs
        $this->pieces = array();
        $this->boundingBox = $bb;
    }

    public function addPiece(Piece $p) {

    }

    private function canMovePiece(Piece $p, $x, $y) {
        $boundingBox = $p->getBoundingBox();
        $leftTop = $boundingBox->getLeftTop();
        $rightBottom = $boundingBox->getRightBottom();

        $leftTop->increaseX($x);
        $leftTop->increaseY($y);
        $rightBottom->increaseX($x);
        $rightBottom->increaseY($y);

        $newBb = new BoundingBox();
        $newBb->setLeftTop($leftTop);
        $newBb->setRightBottom($rightBottom);

        return isInside($newBb, $boundingBox);
    }

    private function isInside(BoundingBox $a, BoundingBox $b) {

    }

    public function movePieceDown() {
    }

    public function movePieceLeft() {
    }

    public function movePieceRight() {
    }

    public function rotatePieceCW() {
    }

    public function rotatePieceCCW() {
    }

}