<?php
	
	include('../config.php');

	$tbClientes = new GerarDatabase();
	$tbClientes->criarTabelaClientes();

	if($tbClientes == true) {

		echo 'Tabela de clientes criada com sucesso!';
		echo '<br>';
		$popTbClientes = new GerarDatabase();
		$popTbClientes->popularTabelaClientes();

			if($popTbClientes == true) {
				echo 'Tabela clientes populada com sucesso!';
				echo '<br>';

				$tbEstados = new GerarDatabase();
				$tbEstados->criarTabelaEstados();

				if($tbEstados == true) {
					echo 'Tabela de estados criada com sucesso!';
					echo '<br>';
					
					$popTbEstados = new GerarDatabase();
					$popTbEstados->popularTabelaEstados();

					if($popTbEstados == true) {

						echo 'Tabela estados populada com sucesso!';
						echo '<br>';

						$tbCompras = new GerarDatabase();
						$tbCompras->criarTabelaCompras();

						if($tbCompras == true) {
							echo 'Tabela de compras criada com sucesso!';
							echo '<br>';

							$popTbCompras = new GerarDatabase();
							$popTbCompras->popularTabelaCompras();

							if($popTbCompras ==  true) {
								echo 'Tabela de compras populada com sucesso!';
								echo '<br>';

								$tbMeses = new GerarDatabase();
								$tbMeses->criarTabelaMeses();

								if($tbMeses == true) {
									echo 'Tabela de meses criada com sucesso!';
									echo '<br>';

									$popTbMeses = new GerarDatabase();
									$popTbMeses->popularTabelaMeses();

									if($popTbMeses == true) {
										echo 'Tabela de meses populada com sucesso!';
										echo '<br>';
										echo '<br>';
										echo '<b>Todas as tabelas foram criadas com sucesso!</b>';
									}else {
										echo 'Ocorreu um erro ao popular a tabela de meses.';
										echo '<br>';
									}
								}else {
									echo 'Ocorreu um erro ao criar a tabela de meses.';
									echo '<br>';
								}

							}
						}

					}else {
						echo 'Ocorreu um erro ao popular a tabela de estados';
					}
				}

			}else {
				echo 'Ocorreu um erro ao popular a tabela de clientes';
			}

	}else {
		echo 'Ocorreu um erro ao criar a tabela';
	}

?>