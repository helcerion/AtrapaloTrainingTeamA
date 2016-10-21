<?php

namespace TeamA\Board\Domain;

use TeamA\Piece\Domain;

class Board{

    private $pieces;

    public function Board() {
        $this->pieces = array();
    }

    public function addPiece(Piece p) {
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