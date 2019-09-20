$(function() {


	$('#ano').on('change', function() {

		var infAno = $('#ano').val();

		$.ajax({
			url: include_path+'Processador/RelatoriosProcessador.php',
			type: 'POST',
			data: {ano:infAno,selecionarMeses:'true'},
			dataType: "json",
			beforeSend: function() {
				$('#selectMes').html("<option>Carregando...</option>");
			},
			success: function(json){

				var selectdoMes = $('#selectMes');
	            selectdoMes.find('option').remove();
	        	
	        	$('#selectMes').append('<option></option>');
	        	$.each(json[0], function(key, servico) {
	                $('#selectMes').append('<option value="'+servico['mes']+'">'+servico['nome_mes'][0]+'</option>');
	            });
	        },
			error: function(data) {
				$('#selectMes').html('<option>Houve erro no carregamento!</option>');
			}
		});
	});


	$('#selectMes').on('change', function() {

		var mes = $('#selectMes').val();
		var ano = $('#ano').val();

		$('#data-table').DataTable({
	        "ajax": include_path+'Processador/RelatoriosProcessador.php?listarInfoCompras=1&mes='+mes+'&ano='+ano+'',
	        "columns": [
	        	{ "data": "diaMes" },
	            { "data": "ticketMedio" },
	            { "data": "vlTotaL" },
	            { "data": "qdeCompras" }
        	],
        	destroy: true,
			searching: false,
        	"language": {
	                "lengthMenu": "Mostrando _MENU_ registros por página",
	                "zeroRecords": "Nada encontrado",
	                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
				    "sInfoPostFix": "",
				    "sInfoThousands": ".",
	                "info": "Mostrando página _PAGE_ de _PAGES_",
	                "sZeroRecords": "Nenhum registro encontrado",
	                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				    "sLoadingRecords": "Carregando...",
				    "sProcessing": "Processando...",
	    			"sSearch": "Pesquisar",
	                "infoFiltered": "(filtrado de _MAX_ registros no total)",
	                "oPaginate": {
				        "sNext": "Próximo",
				        "sPrevious": "Anterior",
				        "sFirst": "Primeiro",
				        "sLast": "Último"
				    },
				    "oAria": {
				        "sSortAscending": ": Ordenar colunas de forma ascendente",
				        "sSortDescending": ": Ordenar colunas de forma descendente"
				    }
	            }
	    });
	});


	$(document).ready(function() {

	    $('#data-table-ticket').DataTable({
	        "ajax": include_path+'Processador/RelatoriosProcessador.php?listartops=1',
	        "columns": [
	        	{ "data": "cpfCliente" },
	            { "data": "nomeCliente" },
	            { "data": "ticketMedio" }
        	],
        	"language": {
	                "lengthMenu": "Mostrando _MENU_ registros por página",
	                "zeroRecords": "Nada encontrado",
	                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
				    "sInfoPostFix": "",
				    "sInfoThousands": ".",
	                "info": "Mostrando página _PAGE_ de _PAGES_",
	                "sZeroRecords": "Nenhum registro encontrado",
	                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				    "sLoadingRecords": "Carregando...",
				    "sProcessing": "Processando...",
	    			"sSearch": "Pesquisar",
	                "infoFiltered": "(filtrado de _MAX_ registros no total)",
	                "oPaginate": {
				        "sNext": "Próximo",
				        "sPrevious": "Anterior",
				        "sFirst": "Primeiro",
				        "sLast": "Último"
				    },
				    "oAria": {
				        "sSortAscending": ": Ordenar colunas de forma ascendente",
				        "sSortDescending": ": Ordenar colunas de forma descendente"
				    }
	            }
	    });
	});


	

});