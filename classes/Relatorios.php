<?php
	

	class Relatorios {
		
		private $idCompra;
		private $cpfCliente;
		private $dtCompra;
		private $vlCompra;

		public function getIdCompra() {
		    return $this->idCompra;
		}
		 
		public function setIdCompra($idCompra) {
		    $this->idCompra = $idCompra;
		}

		public function getCpfCliente() {
		    return $this->cpfCliente;
		}
		 
		public function setCpfCliente($cpfCliente) {
		    $this->cpfCliente = $cpfCliente;
		}

		public function getDtCompra() {
		    return $this->dtCompra;
		}
		 
		public function setDtCompra($dtCompra) {
		    $this->dtCompra = $dtCompra;
		}

		public function getVlCompra() {
		    return $this->vlCompra;
		}
		 
		public function setVlCompra($vlCompra) {
		    $this->vlCompra = $vlCompra;
		}


		public static function pegaAnos() {
			$sql = MySql::conectar()->prepare("SELECT DISTINCT YEAR(dt_compra) AS ano FROM tb_compras;");
			if($sql->execute()) {
		  		return $sql->fetchAll();
		  	}else {
		  		return false;
		  	}
        }

        public static function pegaMeses($ano) {
        	$sql = MySql::conectar()->prepare("SELECT DISTINCT MONTH(dt_compra) AS mes FROM tb_compras WHERE YEAR(dt_compra) = ?");
        	if($sql->execute(array($ano))) {
        		return $sql->fetchAll();
        	}else {
        		return false;
        	}
        }

        public static function pegaNomeMeses($mes) {
        	$sql = MySql::conectar()->prepare("SELECT nome_mes FROM tb_meses WHERE id_mes = ?");
        	if($sql->execute(array($mes))) {
        		return $sql->fetch();
        	}else {
        		return false;
        	}
        }

        public static function pegaDiasMes($ano,$mes) {
        	$sql = MySql::conectar()->prepare("SELECT DISTINCT DAY(dt_compra) AS dia FROM tb_compras WHERE YEAR(dt_compra) = ? AND MONTH(dt_compra) = ?");
        	if($sql->execute(array($ano,$mes))) {
        		return $sql->fetchAll();
        	}else {
        		return false;
        	}
        }

        public static function pegaQdeComprasDia($dia,$mes,$ano) {
        	$sql = MySql::conectar()->prepare("SELECT COUNT(*) as qdeCompras FROM tb_compras WHERE DAY(dt_compra) = ? AND MONTH(dt_compra) = ? AND YEAR(dt_compra) = ?");
        	if($sql->execute(array($dia,$mes,$ano))) {
        		return $sql->fetch();
        	}else {
        		return false;
        	}
        }

        public static function pegaValorCompras($dia,$mes,$ano) {
        	$sql = MySql::conectar()->prepare("SELECT SUM(vl_compra) as valor FROM tb_compras WHERE DAY(dt_compra) = ? AND MONTH(dt_compra) = ? AND YEAR(dt_compra) = ?");
        	if($sql->execute(array($dia,$mes,$ano))) {
        		return $sql->fetch();
        	}else {
        		return false;
        	}
        }

        public static function pegaTop100() {
        	$sql = MySql::conectar()->prepare("SELECT C.cpf_cliente, CLI.nome_cliente, SUM(vl_compra)/COUNT(C.cpf_cliente) AS ticket FROM tb_compras AS C INNER JOIN tb_clientes AS CLI ON C.cpf_cliente = CLI.cpf_cliente GROUP BY C.cpf_cliente ORDER BY ticket DESC LIMIT 100");
        	if($sql->execute()) {
        		return $sql->fetchAll();
        	}else {
        		return false;
        	}
        }


	}

?>