<div class="row sem_margin">

	<?php

		 	$arrayE = array();
							 $arrayC = array();
							 $arrayQuali = array('A','B','C','D');
							 $arrayUnidade = array('A','B','C','D');


							 foreach ($estados as $estado): {
							    		
							    $arrayE[] = $estado->nome;

							  }endforeach;

							 foreach ($cidades as $cidade): { /*Implementar ajax aqui!!!!*/
							    		
							   $arrayC[] = $cidade->nome;

							 }endforeach;




	?>

	<script>
			$(function() {

			$( "#datepicker" ).datepicker();
			$.datepicker.formatDate( "yy-mm-dd" );
			});
	</script>

	<?php

	 	foreach ($documento as $doc) {
	 				
	?>

	<h2>Alteração dos dados do documento : <?php echo $doc->IPL; ?></h2>


	 <div class="col-md-12 col-sm-12 col-xs-12 lista-menu well">

	 	  <!-- abre o formulário de cadastro -->
			<?php echo form_open('login/atualizar_documento/atualizaDoc', 'id="form-update-ipl"'); ?>		

	 		<label for="qualificacao">Estado da ocorrencia:</label><br/>
			<?php echo form_dropdown('qualificacao', $arrayQuali); ?>
			<div class="error"><?php echo form_error('qualificacao'); ?></div>

			<label for="unidade_seguranca">Unidade de segurança:</label><br/>
			<?php echo form_dropdown('unidade_seguranca', $arrayUnidade); ?>
			<div class="error"><?php echo form_error('unidade_seguranca'); ?></div>

			<label for="dataOps">Data da apreenção:</label><br/>
			<input id="datepicker" type="text" name="dataOps" value="<?php echo  $doc->arrest_date;  ?> "/>
			<div class="error"><?php echo form_error('dataOps'); ?></div>

			<label for="linkOps">Link da operação:</label><br/>
			<input type="text" name="linkOps" value="<?php echo  $doc->link_arrest; ?>"/>
			<div class="error"><?php echo form_error('linkOps'); ?></div>

			<label for="resumoOps">Resumo da operação :</label><br/>
			<textarea name="resumoOps" ><?php echo  $doc->summary;  ?></textarea>
			<div class="error"><?php echo form_error('resumoOps'); ?></div>

			<label for="nomeOps">Nome da operação :</label><br/>
			<input name="nomeOps" value="<?php echo  $doc->operation;  ?>"/>
			<div class="error"><?php echo form_error('nomeOps'); ?></div>

			<label for="destinoCarga">Destino da apreenção :</label><br/>
			<?php echo form_dropdown('unidade_seguranca', $arrayUnidade); ?>
			<div class="error"><?php echo form_error('destinoCarga'); ?></div>

			 <input type="hidden" name="IPLValue" value="<?php echo  $doc->IPL;  ?>"/>
			 <input type="hidden" name="Row_id" value="<?php echo  $ROW_id;  ?>"/>

			<input type="submit" name="Cadastrar" value="Cadastrar ocorrencia" />


			<?php echo form_close(); ?>
			<!-- fecha o formulário de cadastro -->
	                       



	 


	 		
	 
	                       
	</div>


                

	</div>


<?php
		//fim do foreach
	 }


?>

	       


</div>