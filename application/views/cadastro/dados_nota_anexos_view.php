<div class="row sem_margin">
	
	<?php

		if($row_anexo != null)
		{	
	?>
			<a href="<?php echo base_url("/index.php/detalhes_documento/getTheRow/".$id_Row.""); ?>">Cancelar</a>
			<br>
	<?php

			
			echo "Tela para update anexo";
		}

		else
		{
	?>

	<?php

	foreach ($documento as $doc) {
		$Ipl = $doc->IPL;
	}

	?>


	<h2>Notas e anexos : <?php echo $Ipl; ?></h2>
	<hr>

	<a href="<?php echo base_url("/index.php/detalhes_documento/getTheRow/".$id_Row.""); ?>">Cancelar</a>

	   <!-- abre o formulário de cadastro -->
	   <?php// echo form_open('novo_documento/cadastrarProtocolo', 'id="form-new-ipl"'); ?>

	<?php //echo $error;?>

	<?php echo form_open_multipart('login/novo_documento/cadastrar_anexo_arquivo');?>

	<label for="file_name">Nome do arquivo:</label><br/>
	<input type="text" name="file_name" value="<?php echo set_value('file_name'); ?>"/>
	<div class="error"><?php echo form_error('file_name'); ?></div>

	<label for="file_send">Indique o caminho para o arquivo:</label><br/>
	<input type="file" name="file_send" value="<?php echo set_value('file_send'); ?>"/>
	<div class="error"><?php echo form_error('file_send'); ?></div>

	<input type="hidden" name="row_id" value="<?php echo $id_Row; ?>" />
	<BR>
	<br>
	<br>

	<input type="submit" name="Cadastrar" value="Cadastrar nota e anexo" />



<?php

	}

?>


</div>