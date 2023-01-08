<?php

class produto{

        private $idProduto;
        private $nomeProduto;
        private $precoProduto;
        private $fotoProduto;


        private $categoria;

        public function setIdProduto($idProduto){
            $this->idProduto = $idProduto;
        }
        public function getIdProduto(){
            return $this->idProduto;
        }
        public function setNomeProduto($nomeProduto){
            $this->nomeProduto = $nomeProduto;
        }

        public function getNomeProduto(){
            return $this->nomeProduto;
        }

        public function setPrecoProduto($precoProduto){
            $this->precoProduto = $precoProduto;
        }

        public function getPrecoProduto(){
            return $this->precoProduto;
        }

        public function getCategoria(){
            return $this->categoria;
        }
        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

        public function getFotoProduto(){
            return $this->fotoProduto;
        }
        public function setFotoProduto($fotoProduto){
            $this->fotoProduto = $fotoProduto;
        }
}   

?>