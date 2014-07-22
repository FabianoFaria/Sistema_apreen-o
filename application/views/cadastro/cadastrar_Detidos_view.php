<div class="row sem_margin">
	

	<?php
		$arrayE = array();
		$arrayC = array();
		$arrayCategoria = array('A','B','C','D');
		$arrayModelo = array('A','B','C','D');
		$arrayMarca = array('A','B','C','D');

		foreach ($documento as $doc) {
			$Ipl = $doc->IPL;
		}

		foreach ($endereco as $addr) {
			$id_addr = $addr->ID_addr;
		}

		foreach ($estados as $estado): {
							    		
			$arrayE[] = $estado->nome;

		}endforeach;

		foreach ($cidades as $cidade): { /*Implementar ajax aqui!!!!*/
							    		
			$arrayC[] = $cidade->nome;

		}endforeach;


	?>

	<script>
		$(function() {

		$( "#datapicker" ).datepicker();
		$.datepicker.formatDate( "yy-mm-dd" );
		});
	</script>


	<h2>Dados do detido do documento : <?php echo $Ipl; ?></h2>
	<hr>
	

	<a href="<?php echo base_url("/index.php/detalhes_documento/getTheRow/".$id_Row.""); ?>">Cancelar</a>


	 <div class="col-md-12 col-sm-12 col-xs-12 lista-menu">

	 	  <!-- abre o formulário de cadastro -->
	   <?php echo form_open('login/novo_documento/cadastrar_envolvido', 'id="form-new-ipl"'); ?>

	   	<label for="nomeD">Nome do detido:</label><br/>
		<input type="text" name="nomeD" value=""/>
		<div class="error"><?php echo form_error('nomeD'); ?></div>

		<label for="CPF">CPF :</label><br/>
		<input type="text" name="CPF" value=""/>
		<div class="error"><?php echo form_error('CPF'); ?></div>

		<label for="rg">RG :</label><br/>
		<input type="text" name="rg" value=""/>
		<div class="error"><?php echo form_error('rg'); ?></div>

		<label for="passaporte">Passaporte :</label><br/>
		<input type="text" name="passaporte" value=""/>
		<div class="error"><?php echo form_error('passaporte'); ?></div>

		<label for="nome_pai">Nome do pai :</label><br/>
		<input type="text" name="nome_pai" value=""/>
		<div class="error"><?php echo form_error('nome_pai'); ?></div>

		<label for="nome_mae">Nome do mâe :</label><br/>
		<input type="text" name="nome_mae" value=""/>
		<div class="error"><?php echo form_error('nome_mae'); ?></div>

		<label for="nascimento">Data de nascimento :</label><br/>
		<input id="datapicker" type="text" name="nascimento" value=""/>
		<div class="error"><?php echo form_error('nascimento'); ?></div>

		<label for="cidade_nascimento">Cidade de nascimento :</label><br/>
		<input type="text" name="cidade_nascimento" value=""/>
		<div class="error"><?php echo form_error('cidade_nascimento'); ?></div>

		<label for="estado_nascimento">Estado de nascimento :</label><br/>
		<input type="text" name="estado_nascimento" value=""/>
		<div class="error"><?php echo form_error('estado_nascimento'); ?></div>

		<label for="pais_nascimento">Pais de nascimento :</label><br/>
		<input type="text" name="pais_nascimento" value=""/>
		<div class="error"><?php echo form_error('pais_nascimento'); ?></div>
		<br>
		<br>

		<input type="hidden" name="row_id" value="<?php echo $id_Row; ?>" />
		<input type="hidden" name="addr_id" value="<?php echo $id_Row; ?>" />

		<input type="submit" name="Cadastrar" value="Atualizar endereço da ocorrencia" />
		<br>
		<br>

	                       
	</div>



</div>