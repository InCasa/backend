<?php

    class DataFormat{

        //método retorna a data e hora no formato dd/mm/YYYY hh:mm:ss
        public static function formatDateTime($data){
            $fDate = date('d/m/Y H:i:s', strtotime($data));
            return $fDate;
        }

        //método retorna a somente a data no formato dd/mm/YYYY
        public static function formatDate($data){
            $fDate = date('d/m/Y', strtotime($data));
            return $fDate;
        }

    }