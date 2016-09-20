<?php

    class AplicativoDAO {
        private $con;

        public function __construct(){

        }

        public function create($aplicativo) {
            $con = database::getInstance();
            $sql = $con->prepare("INSERT INTO aplicativo(mac) VALUES (?)");
            $sql->bindParam(1, $aplicativo->getMAC());
            $sql->execute();            
        }

        public function update($aplicativo) {
            $con = database::getInstance();
            $sql = $con->prepare("UPDATE aplicativo SET mac = ? WHERE idConfig = ?");
            $sql->bindParam(1, $aplicativo->getMAC());
            $sql->bindParam(2, $aplicativo->getIdAplicativo());
            $sql->execute();             
        }

        public function delete($aplicativo) {
            $con = database::getInstance();
            $sql = $con->prepare("DELETE FROM aplicativo WHERE idConfig = ?");
            $sql->bindParam(1, $aplicativo->getIdAplicativo());
            $sql->execute();
        }

        public function getAplicativo() {
            
        }

}
    