<div class="row sem_margin">

	<?php

		if($row_local != null)
		{	
			$arrayE = array();
			$arrayC = array();
			$arrayProduto = array('A','B','C','D');
			$arrayModelo = array('A','B','C','D');
			$arrayUnidade = array('A','B','C','D');

			foreach ($documento as $doc) {
				$Ipl = $doc->IPL;
			}

			foreach($local as $loc)
			{
				$id_local = $loc->ID_wrs;
				$ROW_ID = $loc->ROW_ID;
				$product = $loc->product;
				$unit = $loc->unit;
				$qty = $loc->qty;
				$tabacalera = $loc->tabacalera;
			}


	?>
			<h2>Cadastro de locais/armazens/casas : <?php echo $Ipl; ?></h2>

		<a href="<?php echo base_url("/index.php/detalhes_documento/getTheRow/".$id_Row.""); ?>">Cancelar</a>
	 <div class="col-md-12 col-sm-12 col-xs-12 lista-menu well">

	 	<!-- abre o formulário de cadastro -->
	   	<?php echo form_open('login/novo_documento/cadastrar_deposito', 'id="form-new-ipl"'); ?>

		<label for="produto">Produto :</label><br/>
		<?php echo form_dropdown('produto', $arrayProduto); ?>
		<div class="error"><?php echo form_error('produto'); ?></div>

		<label for="medida">Unidade de medida:</label><br/>
		<?php echo form_dropdown('medida', $arrayUnidade); ?>
		<div class="error"><?php echo form_error('medida'); ?></div>

		<label for="quantidade">Quantidade:</label><br/>
		<input type="text" name="quantidade" value="<?php echo $qty; ?>"/>
		<div class="error"><?php echo form_error('quantidade'); ?></div>

		<label for="tabacalera">Tabacalera :</label><br/>
		<input type="text" name="tabacalera" value="<?php echo $tabacalera; ?>"/>
		<div class="error"><?php echo form_error('tabacalera'); ?></div>
		<br>
		<br>

		<input type="hidden" name="row_id" value="<?php echo $id_Row; ?>" />
		<input type="hidden" name="id_local" value="<?php echo $id_local; ?>" />

		<input type="submit" name="Cadastrar" value="Atualizar endereço da ocorrencia" />
		<br>
		<br>
		<br>
		<br>
	                       
	</div>
	                       

	</div>
	<?php
	
		}

		else
		{
	?>

	<?php

	$arrayE = array();
	$arrayC = array();
	$arrayProduto = array('A','B','C','D');
	$arrayModelo = array('A','B','C','D');
	$arrayUnidade = array('A','B','C','D');

	foreach ($documento as $doc) {
		$Ipl = $doc->IPL;
	}


	?>




	<h2>Cadastro de locais/armazens/casas : <?php echo $Ipl; ?></h2>

		<a href="<?php echo base_url("/index.php/detalhes_documento/getTheRow/".$id_Row.""); ?>">Cancelar</a>
	 <div class="col-md-12 col-sm-12 col-xs-12 lista-menu well">

	 	<!-- abre o formulário de cadastro -->
	   	<?php echo form_open('login/novo_documento/cadastrar_deposito', 'id="form-new-ipl"'); ?>

		<label for="produto">Produto :</label><br/>
		<?php echo form_dropdown('produto', $arrayProduto); ?>
		<div class="error"><?php echo form_error('produto'); ?></div>

		<label for="medida">Unidade de medida:</label><br/>
		<?php echo form_dropdown('medida', $arrayUnidade); ?>
		<div class="error"><?php echo form_error('medida'); ?></div>

		<label for="quantidade">Quantidade:</label><br/>
		<input type="text" name="quantidade" value=""/>
		<div class="error"><?php echo form_error('quantidade'); ?></div>

		<label for="tabacalera">Tabacalera :</label><br/>
		<input type="text" name="tabacalera" value=""/>
		<div class="error"><?php echo form_error('tabacalera'); ?></div>
		<br>
		<br>

		<input type="hidden" name="row_id" value="<?php echo $id_Row; ?>" />

		<input type="submit" name="Cadastrar" value="Atualizar endereço da ocorrencia" />
		<br>
		<br>
		<br>
		<br>
	                       
	</div>
	                       

	</div>


<?php
	
	}

?>


</div>