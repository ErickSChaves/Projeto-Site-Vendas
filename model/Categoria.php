<?php
    
    class categoria{

        private $idCategoria;
        private $nomeCategoria;

        public function getidCategoria(){
            return $this->idCategoria;
        }
        public function getnomeCategoria(){
            return $this->nomeCategoria;
        }
        public function setidCategoria($idCategoria){
            $this->idCategoria = $idCategoria;
        }
        public function setnomeCategoria($nomeCategoria){
            $this->nomeCategoria = $nomeCategoria;
        }
    
    }

?>