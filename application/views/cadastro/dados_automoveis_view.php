<div class="row sem_margin">

	<?php

		//$id_Row

		$arrayE = array();
		$arrayC = array();
		$arrayCategoria = array('A','B','C','D');
		$arrayModelo = array('A','B','C','D');
		$arrayMarca = array('A','B','C','D');

		foreach ($documento as $doc) {
			$Ipl = $doc->IPL;
		}

		foreach ($estados as $estado): {
							    		
			$arrayE[] = $estado->nome;

		}endforeach;

		foreach ($cidades as $cidade): { /*Implementar ajax aqui!!!!*/
							    		
			$arrayC[] = $cidade->nome;

		}endforeach;
	?>



	<h2>Cadastro de automoveis : <?php echo $Ipl; ?></h2>

	<a href="<?php echo base_url("/index.php/detalhes_documento/getTheRow/".$id_Row.""); ?>">Cancelar</a>


	 <div class="col-md-12 col-sm-12 col-xs-12 lista-menu">

	 	  <!-- abre o formulário de cadastro -->
	   <?php echo form_open('login/novo_documento/cadatrar_veiculo', 'id="form-new-ipl"'); ?>

		<label for="cat_veiculo">Categoria do veiculo :</label><br/>
		<?php echo form_dropdown('cat_veiculo', $arrayCategoria); ?>
		<div class="error"><?php echo form_error('pais_apr'); ?></div>

		<label for="mod_veiculo">Modelo veiculo:</label><br/>
		<?php echo form_dropdown('mod_veiculo', $arrayModelo); ?>
		<div class="error"><?php echo form_error('estado_apr'); ?></div>

		<label for="mark_veiculo">Marca do veiculo:</label><br/>
		<?php echo form_dropdown('mark_veiculo', $arrayMarca); ?>
		<div class="error"><?php echo form_error('cidade_apr'); ?></div>

		<label for="chassi">Chassi:</label><br/>
		<input type="text" name="chassi" value=""/>
		<div class="error"><?php echo form_error('chassi'); ?></div>

		<label for="renavan">Renavan :</label><br/>
		<input type="text" name="renavan" value=""/>
		<div class="error"><?php echo form_error('renavan'); ?></div>

		<label for="placa_n">Placa :</label><br/>
		<input type="text" name="placa_n" value=""/>
		<div class="error"><?php echo form_error('placa_n'); ?></div>

		<label for="estado">Estado :</label><br/>
		<?php echo form_dropdown('estado', $arrayE); ?>
		<br>

		<label for="cidade">Cidade :</label><br/>
		<?php echo form_dropdown('cidade', $arrayC); ?>
		<br>
		<br>

		<input type="hidden" name="row_id" value="<?php echo $id_Row; ?>" />

		<input type="submit" name="Cadastrar" value="Atualizar endereço da ocorrencia" />
		<br>
		<br>

	                       
	</div>
	                       

	</div>





</div>