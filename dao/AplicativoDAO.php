<?php

    class AplicativoDAO {
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }

        public function create($aplicativo) {
            $sql = $this->con->prepare("INSERT INTO aplicativo(mac) VALUES (?)");
            $sql->bindParam(1, $aplicativo->getMAC());
            $sql->execute();            
        }

        public function update($aplicativo) {
            $sql = $this->con->prepare("UPDATE aplicativo SET mac = ? WHERE idAplicativo = ?");
            $sql->bindParam(1, $aplicativo->getMAC());
            $sql->bindParam(2, $aplicativo->getIdAplicativo());
            $sql->execute();             
        }

        public function delete($aplicativo) {
            $sql = $this->con->prepare("DELETE FROM aplicativo WHERE idAplicativo = ?");
            $sql->bindParam(1, $aplicativo->getIdAplicativo());
            $sql->execute();
        }

        public function getAplicativo() {
            
        }

}
    