<?php 
	$diaUteis = 18;
	$horasNormais = 144;
	$horasExtras = 40;
	$horasNoturnas = 108;
	$valorHora = 1000;
	$valorHoraExtra = 1250;
	$adicionalNoturno = 250;
	$valorHoraNormalTotal = 140000;
	$valorHoraExtraTotal = 50000;
	$valorAdicionalTotal = 27000;
	$valorTotal = 0;

	$count = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Orçamento</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.css">
	<style type="text/css">
		.tabela {
			background-color: grey;
		}
	</style>
</head>
<body>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Codigo Funcional</th>
				<th scope="col">Nome do Funcionario</th>
				<th scope="col">Tipo</th>
				<th scope="col">Dias Uteis</th>
				<th scope="col">Normal (H)</th>
				<th scope="col">Extra (H)</th>
				<th scope="col">Noturno (H)</th>
				<th scope="col">Valor (H)</th>
				<th scope="col">Valor Extra (H)</th>
				<th scope="col">Adicional Noturno</th>
				<th scope="col">Valor Hora Normal Total</th>
				<th scope="col">Valor Hora Extra Total</th>
				<th scope="col">Valor Adcional Total</th>
				<th scope="col">Total</th>
				<th scope="col">Previsão Desconto</th>
			</tr>
		</thead>
			<tbody>
			<?php 
				for ($i=0; $i < 5; $i++) { 
					$count++;
			?>
			<tr>
				<td>658747</td>
				<td>隈園　ペドロ <?=$i  ?></td>
				<td>DW</td>
				<td>18</td>
				<td>144</td>
				<td>40</td>
				<td>108</td>
				<td>1,000</td>
				<td>1,250</td>
				<td>250</td>
				<td>140,000</td>
				<td>50,000</td>
				<td>27,000</td>
				<td>270,000</td>
				<td>50,000</td>
			</tr>
		<?php } ?>
		</tbody>
		 <thead>
		 	<tbody>
			 	<tr class="table-active">
					<th>Total</th>
					<th colspan="2">5 Pessoas</th>
					<th><?=$diaUteis * $count ?></th>
					<th><?=$horasNormais * $count ?></th>
					<th><?=$horasExtras * $count ?></th>
					<th><?=$horasNoturnas * $count ?></th>
					<th><?=$valorHora * $count ?></th>
					<th><?=$valorHoraExtra * $count ?></th>
					<th><?=$valorAdicionalTotal * $count ?></th>
					<th><?=$valorHoraNormalTotal * $count ?></th>
					<th><?=$valorHoraExtraTotal * $count ?></th>
					<th><?=$valorAdicionalTotal * $count ?></th>
					<th><?=($valorHoraNormalTotal + $valorHoraExtraTotal + $valorAdicionalTotal) * $count?></th>
					<th>0</th>
				</tr>
				<tr class="table-active">
					<th class="align-middle" rowspan="2">Detalhes</th>
					<th>Direct Worker</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
				</tr>
				<tr class="table-active">
					<th>Indirect Worker</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
				</tr>

			</tbody>
		</thead>

	</table>

</body>
</html>