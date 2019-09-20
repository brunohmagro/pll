<div class="container">
	<h2><i class="fas fa-bars"></i> Relatório Mensal</h2>

	<div id=""></div>

	<form method="POST" id="formCadMedicamento">

		<div class="form-group w-50 p-2 float-left">
			<label for="ano">SELECIONE O ANO:</label>
			<select class="form-control" name="ano" id="ano" required>
				<option Value=""></option>
				<?php
					$ano = Relatorios::pegaAnos();
					foreach ($ano as $key => $value) {
					?>
				<option Value="<?php echo $value['ano']; ?>"><?php echo $value['ano'] ?></option>
				<?php } ?>
			</select>
		</div><!--form-group-->

		<div class="form-group w-50 p-2 float-left">
			<label for="selectMes">SELECIONE O MÊS:</label>
			<select class="form-control" name="selectMes" id="selectMes"></select>
		</div><!--form-group-->

	</form>
<div class="clear"></div>
	<div class="table-responsive">
	    	<table id="data-table" class="table table-striped table-hover" style="width:100%; text-align: center;">
	            <thead>
	                <tr>
	                    <th>DIA</th>
	                    <th>TICKET MÉDIO</th>
	                    <th>VL. TOTAL</th>
	                    <th>QDE. COMPRAS</th>
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
						<th>DIA</th>
	                    <th>TICKET MÉDIO</th>
	                    <th>VL. TOTAL</th>
	                    <th>QDE. COMPRAS</th>
	                </tr>
	            </tfoot>
	        </table>
	    </div>
</div><!--box-content-->
<script src="<?php echo INCLUDE_PATH_PORTAL ?>Controlador/RelatoriosControlador.js"></script>
</div><!--container-->