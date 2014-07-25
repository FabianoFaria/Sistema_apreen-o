<div class="row sem_margin">

	<?php

		if($row_haul != null)
		{	
			$arrayE = array();
			$arrayC = array();
			$arrayProduto = array('A','B','C','D');
			$arrayModelo = array('A','B','C','D');
			$arrayUnidade = array('A','B','C','D');

			foreach ($documento as $doc) {
			 	$Ipl = $doc->IPL;
			}

			foreach($mercadoria as $merc)
			{
				$ID_haul = $merc->ID_HAUL;
				$ROW_ID = $merc->ROW_ID;
				$product = $merc->product;
				$unit = $merc->unit;
				$qty = $merc->qty;
				$brand = $merc->brand;
				$tabacalera = $merc->tabacalera;

			}


	?>
			<h2>Atualização da mercadorias : <?php echo $Ipl; ?></h2>


	 
	<a href="<?php echo base_url("/index.php/detalhes_documento/getTheRow/".$id_Row.""); ?>">Cancelar</a>


	 <div class="col-md-12 col-sm-12 col-xs-12 lista-menu">

	 	<!-- abre o formulário de cadastro -->
	   	<?php echo form_open('login/novo_documento/cadastrar_mercadoria', 'id="form-new-ipl"'); ?>

		<label for="produto">Produto :</label><br/>
		<?php echo form_dropdown('produto', $arrayProduto); ?>
		<div class="error"></div>

		<label for="medida">Unidade de medida:</label><br/>
		<?php echo form_dropdown('medida', $arrayUnidade); ?>
		<div class="error"></div>

		<label for="quantidade">Quantidade:</label><br/>
		<input type="text" name="quantidade" value="<?php echo $qty; ?>"/>
		<div class="error"><?php echo form_error('quantidade'); ?></div>

		<label for="marca">Marca :</label><br/>
		<input type="text" name="marca" value="<?php echo $brand; ?>"/>
		<div class="error"><?php echo form_error('marca'); ?></div>

		<label for="tabacalera">Tabacalera :</label><br/>
		<input type="text" name="tabacalera" value="<?php echo $tabacalera; ?>"/>
		<div class="error"><?php echo form_error('tabacalera'); ?></div>
		<br>
		<br>

		<input type="hidden" name="row_id" value="<?php echo $id_Row; ?>" />
		<input type="hidden" name="id_haul" value="<?php echo $ID_haul; ?>" />

		<input type="submit" name="Cadastrar" value="Atualizar o deposito cadastrado" />
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


	<h2>Cadastro de mercadorias : <?php echo $Ipl; ?></h2>


	 
	<a href="<?php echo base_url("/index.php/detalhes_documento/getTheRow/".$id_Row.""); ?>">Cancelar</a>


	 <div class="col-md-12 col-sm-12 col-xs-12 lista-menu">

	 	<!-- abre o formulário de cadastro -->
	   	<?php echo form_open('login/novo_documento/cadastrar_mercadoria', 'id="form-new-ipl"'); ?>

		<label for="produto">Produto :</label><br/>
		<?php echo form_dropdown('produto', $arrayProduto); ?>
		<div class="error"></div>

		<label for="medida">Unidade de medida:</label><br/>
		<?php echo form_dropdown('medida', $arrayUnidade); ?>
		<div class="error"></div>

		<label for="quantidade">Quantidade:</label><br/>
		<input type="text" name="quantidade" value=""/>
		<div class="error"><?php echo form_error('quantidade'); ?></div>

		<label for="marca">Marca :</label><br/>
		<input type="text" name="marca" value=""/>
		<div class="error"><?php echo form_error('marca'); ?></div>

		<label for="tabacalera">Tabacalera :</label><br/>
		<input type="text" name="tabacalera" value=""/>
		<div class="error"><?php echo form_error('tabacalera'); ?></div>
		<br>
		<br>

		<input type="hidden" name="row_id" value="<?php echo $id_Row; ?>" />

		<input type="submit" name="Cadastrar" value="Cadastrar mercadoria do deposito" />
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