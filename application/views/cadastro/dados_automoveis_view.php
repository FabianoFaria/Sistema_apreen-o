<div class="row sem_margin">

	<?php

		if($row_Auto != null)
		{

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

			foreach ($automoveis as $auto) {
				 $ID_auto = $auto->ID_vehicle;
				 $Chassi = $auto->chassi;
				 $Renavan = $auto->renavan;
				 $placa = $auto->placa;
			}

			//Passa as variavreis do objeto automovel para as variaveis no formulario...
	?>
							<script>
								function mostraCidades(str) {
								  if (str=="") {
								    document.getElementById("cidade_apr").innerHTML="";
								    return;
								  }
								  if (window.XMLHttpRequest) {
								    // code for IE7+, Firefox, Chrome, Opera, Safari
								    xmlhttp=new XMLHttpRequest();
								  } else { // code for IE6, IE5
								    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
								  }
								  xmlhttp.onreadystatechange=function() {
								    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
								      document.getElementById("listCidades").innerHTML=xmlhttp.responseText;
								    }
								  }
								  xmlhttp.open("GET","<?php echo base_url(); ?>index.php/login/novo_documento/chamaCidade/"+str,true);
								  xmlhttp.send();
								}
							</script>

			<a href="<?php echo base_url("/index.php/detalhes_documento/getTheRow/".$id_Row.""); ?>">Cancelar</a>
			<br>

			<h2>Cadastro de automoveis : <?php echo $Ipl; ?></h2>


			 <div class="col-md-12 col-sm-12 col-xs-12 lista-menu well">

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
				<input type="text" name="chassi" value="<?php echo $Chassi; ?>"/>
				<div class="error"><?php echo form_error('chassi'); ?></div>

				<label for="renavan">Renavan :</label><br/>
				<input type="text" name="renavan" value="<?php echo $Renavan; ?>"/>
				<div class="error"><?php echo form_error('renavan'); ?></div>

				<label for="placa_n">Placa :</label><br/>
				<input type="text" name="placa_n" value="<?php echo $placa; ?>"/>
				<div class="error"><?php echo form_error('placa_n'); ?></div>

				<label for="estado">Estado :</label><br/>
					<select name="estado_apr" onchange="mostraCidades(this.value)">
						<option value="">Selecione um estado:</option>
							<?php

								foreach ($estados as $estado): {
							    
							?>

								<option value="<?php echo $estado->id; ?>"><?php echo $estado->nome; ?></option>

							<?php

								 }endforeach;

							?>

					</select>
				<br>

				<label for="cidade">Cidade :</label><br/>
					<select id="listCidades" name="cidade_apr">
						<option value="">Selecione uma cidade:</option>			
					</select>
				<br>
				<br>

				<input type="hidden" name="row_id" value="<?php echo $id_Row; ?>" />
				<input type="hidden" name="id_auto" value="<?php echo $ID_auto ?>" />

				<input type="submit" name="Cadastrar" value="Atualizar dados do automovel" />
				<br>
				<br>

				</div>
		</div>

	</div>
	<?php

			
		} //Fim da parte de update de um automovel

		else
		{ //Inicio da parte de cadastro de um novo automovel
	?>



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

	<script>
		function mostraCidades(str) {
		if (str=="") {
		document.getElementById("cidade_apr").innerHTML="";
		return;
		}
		if (window.XMLHttpRequest) {
		 // code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("listCidades").innerHTML=xmlhttp.responseText;
		}
		}
		xmlhttp.open("GET","<?php echo base_url(); ?>index.php/login/novo_documento/chamaCidade/"+str,true);
		xmlhttp.send();
		}
	</script>



	<h2>Cadastro de automoveis : <?php echo $Ipl; ?></h2>

	<a href="<?php echo base_url("/index.php/detalhes_documento/getTheRow/".$id_Row.""); ?>">Cancelar</a>


	 <div class="col-md-12 col-sm-12 col-xs-12 lista-menu well">

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
					<select name="estado_apr" onchange="mostraCidades(this.value)">
						<option value="">Selecione um estado:</option>
							<?php

								foreach ($estados as $estado): {
							    
							?>

								<option value="<?php echo $estado->id; ?>"><?php echo $estado->nome; ?></option>

							<?php

								 }endforeach;

							?>

					</select>
				<br>

		<label for="cidade">Cidade :</label><br/>
			<select id="listCidades" name="cidade_apr">
				<option value="">Selecione uma cidade:</option>			
			</select>
		<br>
		<br>

		<input type="hidden" name="row_id" value="<?php echo $id_Row; ?>" />

		<input type="submit" name="Cadastrar" value="Cadastrar automovel" />
		<br>
		<br>

	                       
	</div>
	                       

	</div>





</div>

<?php

	}

?>