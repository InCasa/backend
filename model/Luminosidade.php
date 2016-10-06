<?php

	class Luminosidade {
	
		private $idLuminosidade;
		private $nome;
		private $descricao;
		private $valor;
		
		public function __construct() {
			
		}
		
		public function getIdLuminosidade() {
			return $this->idLuminosidade;
		}
		
		public function getNome() {
			return $this->nome;		
		}
		
		public function getDescricao() {
			return $this->descricao;
		}
		
		public function getValor() {
			return $this->valor;
		}	
		
		function setIdLuminosidade($idLuminosidade) {
			$this->idLuminosidade = $idLuminosidade;
		}

		function setNome($nome) {
			$this->nome = $nome;
		}

		function setDescricao($descricao) {
			$this->descricao = $descricao;
		}

		function setValor($valor) {
			$this->valor = $valor;
		}
	
	}