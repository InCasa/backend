<?php

    class ReleDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }

        public function create($rele) {
            $sql = $this->con->prepare("INSERT INTO rele(nome, descricao, porta) VALUES (?, ?, ?)");
            $sql->bindParam(1, $rele->getNome());
            $sql->bindParam(2, $rele->getDescricao());
            $sql->bindParam(3, $rele->getPorta());
            $sql->execute();            
        }

        public function update($rele) {
            $sql = $this->con->prepare("UPDATE rele SET nome = ?, descricao = ?, porta = ? WHERE idRele = ?");
            $sql->bindParam(1, $rele->getNome());
            $sql->bindParam(2, $rele->getDescricao());
            $sql->bindParam(3, $rele->getPorta());
            $sql->bindParam(4, $rele->getIdRele());
            $sql->execute();             
        }

        public function delete($rele) {
            $sql = $this->con->prepare("DELETE FROM rele WHERE idRele = ?");
            $sql->bindParam(1, $rele->getIdRele());
            $sql->execute();
        }

        public function getRele() {
            
        }

    }