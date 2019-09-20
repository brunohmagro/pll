<?php
	
	include('../config.php');

	switch ($_POST || $_GET) {

	    case isset($_POST['selecionarMeses']):
			
			$ano = $_POST['ano'];

			$selectMes = Relatorios::pegaMeses($ano);

			foreach ($selectMes as $key => $value) {

				$nome = Relatorios::pegaNomeMeses($value['mes']);

				$data[] = array(

					"mes" => $value['mes'],
					"nome_mes" => $nome

				);
			}

			echo json_encode(Array($data));
	    break;

	    case isset($_GET['listarInfoCompras']) && $_GET['listarInfoCompras'] == 1:

	    	$relMes = $_GET['mes'];
	    	$relAno = $_GET['ano'];

	    	$diasMes = Relatorios::pegaDiasMes($relAno,$relMes);

	    	foreach ($diasMes as $key => $value) {

	    		$valor = Relatorios::pegaValorCompras($value['dia'],$relMes,$relAno);
	    		$qdeComprasDia = Relatorios::pegaQdeComprasDia($value['dia'],$relMes,$relAno);
	    		
	    		$data[] = array(

	    			"diaMes" => $value['dia'].'/'.$relMes.'/'.$relAno,
	    			"ticketMedio" => 'R$ '.number_format($valor['valor']/$qdeComprasDia['qdeCompras'], 2, ',', '.'),
	    			"vlTotaL" => 'R$ '.number_format($valor['valor'], 2, ',', '.'),
	    			"qdeCompras" => $qdeComprasDia['qdeCompras']
	    		);

	    	}

			echo json_encode(array("data" => $data));
	    break;

	    case isset($_GET['listartops']) && $_GET['listartops'] == 1:

	    	$listarTop = Relatorios::pegaTop100();

	    	foreach ($listarTop as $key => $value) {
	    		
	    		$data[] = array(

	    			"cpfCliente" => $value['cpf_cliente'],
	    			"nomeCliente" => $value['nome_cliente'],
	    			"ticketMedio" => 'R$ '.number_format($value['ticket'], 2, ',', '.')
	    		);

	    	}

			echo json_encode(array("data" => $data));
	    break;

	    
	}

?>