<?php
    require_once 'Cliente.php';
    require_once 'ItemVenda.php';

    class Venda{
        private $id, $data, $valortotal, $status, $cliente;
        /*
            Status da venda
            1    Pedido pelo cliente
            2   Confirmado pela loja
            3   Cancelado pelo cliente
            4   Cancelado pela loja – falta de estoque
            5   Venda finalizada – produtos enviados

        */

        // lista de itens da venda
        private $listaitemvenda = [];

        public function __construct(){
            $this->cliente = new Cliente();
        }

        public function getId(){
            return $this->id;
        }
        public function getValorTotal(){
            return $this->valortotal;
        }
        public function getData(){
            return $this->data;
        }
        public function getStatus(){
            return $this->status;
        }
        public function getCliente(){
            return $this->cliente;
        }
        public function getListaItem(){
            return $this->listaitemvenda;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function setValorTotal($valortotal){
            $this->valortotal = $valortotal;
        }
        public function setData($data){
            $this->data = $data;
        }
        public function setStatus($status){
            $this->status = $status;
        }
        public function setCliente($cliente){
            $this->cliente = $cliente;
        }
        public function setListaItem($listaitemvenda){
            $this->listaitemvenda = $listaitemvenda;
        }
    }