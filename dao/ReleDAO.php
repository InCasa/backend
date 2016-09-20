<?php

    class ReleDAO{

        public function __construct(){

        }

        public function create($rele) {
            $con = database::getInstance();
            $sql = $con->prepare("INSERT INTO rele(nome, descricao, porta) VALUES (?, ?, ?)");
            $sql->bindParam(1, $rele->getNome());
            $sql->bindParam(2, $rele->getDescricao());
            $sql->bindParam(3, $rele->getPorta());
            $sql->execute();            
        }

        public function update($rele) {
            $con = database::getInstance();
            $sql = $con->prepare("UPDATE rele SET nome = ?, descricao = ?, porta = ? WHERE idRele = ?");
            $sql->bindParam(1, $rele->getNome());
            $sql->bindParam(2, $rele->getDescricao());
            $sql->bindParam(3, $rele->getPorta());
            $sql->bindParam(4, $rele->getIdRele());
            $sql->execute();             
        }

        public function delete($rele) {
            $con = database::getInstance();
            $sql = $con->prepare("DELETE FROM rele WHERE idRele = ?");
            $sql->bindParam(1, $rele->getIdRele());
            $sql->execute();
        }

        public function getRele() {
            
        }

    }