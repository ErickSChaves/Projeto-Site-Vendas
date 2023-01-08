<?php
    require_once 'Produto.php';

    class ItemVenda{

        private $idItemvenda, $qtde, $subtotal, $produto;

        public function __construct(){
            $this->produto = new Produto();
        }

        public function setId($idItemvenda){
            $this->id = $idItemvenda;
        }

        public function setQtde($qtde){
            $this->qtde = $qtde;
        }

        public function setSubtotal($subtotal){
            $this->subtotal = $subtotal;
        }

        public function setProduto($produto){
            $this->produto = $produto;
        }

        public function getId(){
            return $this->idItemvenda;
        }

        public function getQtde(){
            return $this->qtde;
        }

        public function getSubtotal(){
            return $this->subtotal;
        }

        public function getProduto(){
            return $this->produto;
        }

    }