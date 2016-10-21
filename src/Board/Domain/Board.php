<?php

namespace TeamA\Board\Domain;

use TeamA\Piece\Domain;
use TeamA\BoundingBox\Domain;
use TeamA\Point\Domain;

class Board{

    private $pieces;
    private $actualPiece;
    private $hasActualPiece;

    public function Board() {
        $this->pieces = array();
    }

    public function addPiece(Piece $p) {

    }

    private function canMovePiece(Piece $p, $x, $y) {
        $boundingBox = $p->getBoundingBox();
        $leftTop = $boundingBox->getLeftTop();
        $rightBottom = $boundingBox->getRightBottom();


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