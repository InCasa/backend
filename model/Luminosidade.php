<?php

	class Luminosidade {
	
		private $idLuminosidade;
		private $nome;
		private $descricao;		
		
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
							
		function setIdLuminosidade($idLuminosidade) {
			$this->idLuminosidade = $idLuminosidade;
		}

		function setNome($nome) {
			$this->nome = $nome;
		}

		function setDescricao($descricao) {
			$this->descricao = $descricao;
		}		
	
	}