<?php
    class UserDAO{

        public function __construct(){

        }
             
        public function create($user) {
            $con = database::getInstance();
            $sql = $con->prepare("INSERT INTO userS (nome, login, senha) VALUES (?, ?, ?)");
            $sql->bindParam(1, $user->getNome());
            $sql->bindParam(2, $user->getLogin());
            $sql->bindParam(3, $user->getSenha());
            $sql->execute();            
        }

        public function update($user) {
            $con = database::getInstance();
            $sql = $con->prepare("UPDATE userS SET nome = ?, login = ?, senha = ? WHERE idUserS = ?");
            $sql->bindParam(1, $user->getNome());
            $sql->bindParam(2, $user->getLogin());
            $sql->bindParam(3, $user->getSenha());
            $sql->bindParam(4, $user->getId());
            $sql->execute();             
        }

        public function delete($user) {
            $con = database::getInstance();
            $sql = $con->prepare("DELETE FROM userS WHERE idUserS = ?");
            $sql->bindParam(1, $user->getId());
            $sql->execute();
        }

        public function getUser() {
            
        }
    }