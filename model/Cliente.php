<?php 

    class cliente{

        private $idCliente;

        private $nomeCliente;

        private $senhaCliente;

        private $cpfCliente;

        private $emailCliente;

        private $logradouroCliente;

        private $numlogCliente;

        private $compCliente;

        private $cidadeCliente;

        private $bairroCliente;

        private $ufCliente;

        private $cepCliente;

        public function setIdCliente($idCliente){
            $this->idCliente = $idCliente;
        }
        
        public function getIdCliente(){
            return $this->idCliente;
        }

        public function setNomeCliente($nomeCliente){
            $this->nomeCliente = $nomeCliente;
        }
        
        public function getNomeCliente(){
            return $this->nomeCliente;
        }

        public function setSenhaCliente($senhaCliente){
            $this->senhaCliente = $senhaCliente;
        }
        
        public function getSenhaCliente(){
            return $this->senhaCliente;
        }

        public function setCidadeCliente($cidadeCliente){
            $this->cidadeCliente = $cidadeCliente;
        }
        
        public function getCidadeCliente(){
            return $this->cidadeCliente;
        }

        public function setEmailCliente($emailCliente){
            $this->emailCliente = $emailCliente;
        }
        
        public function getEmailCliente(){
            return $this->emailCliente;
        }

        public function setCpfCliente($cpfCliente){
            $this->cpfCliente = $cpfCliente;
        }
        
        public function getCpfCliente(){
            return $this->cpfCliente;
        }

        public function setLogradouroCliente($logradouroCliente){
            $this->logradouroCliente = $logradouroCliente;
        }
        
        public function getLogradouroCliente(){
            return $this->logradouroCliente;
        }

        public function setNumlogCliente($numlogCliente){
            $this->numlogCliente = $numlogCliente;
        }
        
        public function getNumlogCliente(){
            return $this->numlogCliente;
        }

        public function setCompCliente($compCliente){
            $this->compCliente = $compCliente;
        }
        
        public function getCompCliente(){
            return $this->compCliente;
        }

        public function setBairroCliente($bairroCliente){
            $this->bairroCliente = $bairroCliente;
        }
        
        public function getBairroCliente(){
            return $this->bairroCliente;
        }

        public function setUfCliente($ufCliente){
            $this->ufCliente = $ufCliente;
        }
        
        public function getUfCliente(){
            return $this->ufCliente;
        }

        public function setCepCliente($cepCliente){
            $this->cepCliente = $cepCliente;
        }
        
        public function getCepCliente(){
            return $this->cepCliente;
        }

    }   



?>