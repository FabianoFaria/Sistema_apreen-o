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

			foreach ($documento as $doc): {
							    		
				$IPL = $doc->IPL;

			}endforeach;
 


		foreach ($endereco as $end) {
			$ID_addr = $end->ID_addr;
			$EndRowid = $end->ROW_ID;
			$logradouro = $end->address;
			$numero = $end->nunber;
			$complemento = $end->complement;
			$bairro = $end->district;
			$cidade = $end->city;
			$estado = $end->state;
			$CEP = $end->zipcode;
			$pais = $end->country;

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

		<h2>Dados do endereço : <?php echo $IPL; ?></h2>
		<hr>
		<div class="lista-menu well">
			   <!-- abre o formulário de cadastro -->
			   <?php echo form_open('login/atualizar_documento/atualizaAddr', 'id="form-new-ipl"'); ?>

			<label for="pais_apr">Pais da ocorrencia:</label><br/>
			<input type="text" name="pais_apr" value="<?php echo $pais; ?>"/>
			<div class="error"><?php echo form_error('pais_apr'); ?></div>

			<label for="estado_apr">Estado da ocorrencia:</label><br/>
			<select name="estado_apr" onchange="mostraCidades(this.value)">
				<option value="">Selecione um estado:</option>
				<?php

					foreach ($estados as $estado): {
									    		
						// $arrayE[] = $estado->nome;
				?>

					<option value="<?php echo $estado->id; ?>"><?php echo $estado->nome; ?></option>

				<?php

					}endforeach;

				?>

										</select>
			<div class="error"><?php echo form_error('estado_apr'); ?></div>

			<label for="cidade_apr">Cidade da ocorrencia:</label><br/>
				<select id="listCidades" name="cidade_apr">
					<option value="">Selecione uma cidade:</option>
												
				</select>
			<div class="error"><?php echo form_error('cidade_apr'); ?></div>

			<label for="endereco">Endereço da ocorrencia:</label><br/>
			<input type="text" name="endereco" value="<?php echo $logradouro; ?>"/>
			<div class="error"><?php echo form_error('endereco'); ?></div>

			<label for="numero_addr">Numero:</label><br/>
			<input type="text" name="numero_addr" value="<?php echo $numero; ?>"/>
			<div class="error"><?php echo form_error('numero_addr'); ?></div>

			<label for="complemento">Complemento:</label><br/>
			<input type="text" name="complemento" value="<?php echo $complemento; ?>"/>
			<div class="error"><?php echo form_error('complemento'); ?></div>

			<label for="bairro">Bairro:</label><br/>
			<input type="text" name="bairro" value="<?php echo $bairro; ?>"/>
			<div class="error"><?php echo form_error('bairro'); ?></div>

			<label for="CEP">CEP:</label><br/>
			<input type="text" name="CEP" value="<?php echo $CEP; ?>"/>
			<div class="error"><?php echo form_error('CEP'); ?></div>

			<input type="hidden" name="Row_id" value="<?php echo  $ROW_id;  ?>"/>
			<input type="hidden" name="Addr_id" value="<?php echo  $ID_addr;  ?>"/>


			<input type="submit" name="Cadastrar" value="Atualizar endereço da ocorrencia" />




			<?php echo form_close(); ?>
			<!-- fecha o formulário de cadastro -->





			<?php

				}

			?>



	</div>



</div>