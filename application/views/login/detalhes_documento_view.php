<?php
	foreach ($Ultimo_documento as $documento) {
		$ROW_ID = $documento->ROW_ID;
		$IPL = $documento->IPL;
		$qualificação = $documento->qualification;
		$unidade_de_segurança = $documento->security_unit;
		$nome_operacao = $documento->operation;
		$dataOp = $documento->arrest_date;
		$dataF = $dataOp;
		$linkOp = $documento->link_arrest;
		$destino = $documento->arrest_destination;
		$resumo = $documento->summary;
	}


?>

<div class="row sem_margin">
	<h2>Detalhes da apreenção</h2>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>IPL : <?php echo $IPL; ?></h3>
		<br>


		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/continueDoc/".$ROW_ID.""); ?>"><i class="fa fa-pencil"></i> Editar</a> - <a href="<?php echo base_url("index.php/deletar_documento/".$ROW_ID.""); ?>"><i class="fa fa-ban"></i> Excluir documeto</a></h4>
		 <?php
		 	}
		 ?>
			<table class="detalhesIpl">
				<tr>
					<th>Qualificação</th><th>Unidade de segurança</th><th>Nome da operação</th><th>Data da apreensão</th><th>Link para a operação/apreensão:</th>
				</tr>

				<tr>
					<td><?php echo $qualificação ?></td><td><?php echo $unidade_de_segurança ?></td><td><?php echo $nome_operacao ?></td><td><?php echo $dataF ?></td><td><?php echo $linkOp; ?></td>
				</tr>
				<tr>
					<th>Resumo :</th><th>Destino da carga:</th>
				</tr>
				<tr>
					<td><?php echo $resumo; ?></td><td><?php echo $destino; ?></td>
				</tr>


			</table>

		<hr>
	</div>

	<?php  

		foreach ($endereco as $end) {
			$EndRowid = $end->ROW_ID;
			$logradouro = $end->address;
			$numero = $end->nunber;
			$complemento = $end->complement;
			$bairro = $end->district;
			$cidade = $end->cidade_nome;
			$estado = $end->nome;
			$CEP = $end->zipcode;
			$pais = $end->country;
		}

	?>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Endereço</h3>

		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/Endereco/".$ROW_ID.""); ?>"><i class="fa fa-pencil"></i> Editar</a></h4>
		 <?php
		 	}
		 ?>


			<table class="table endereco_Doct">
				<tr>
					<th>Endereço :</th><th>Numero :</th><th>Complemento:</th><th>Bairro:</th><th>Cidade:</th><th>Estado :</th><th>CEP :</th>
				</tr>
				<tr>
					<td><?php echo $logradouro; ?></td><td><?php echo $numero; ?></td><td><?php echo $complemento; ?></td><td><?php echo $bairro; ?></td><td><?php echo $cidade; ?></td><td><?php echo $estado; ?></td><td><?php echo $CEP; ?></td>
				</tr>

			</table>

		<hr>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Mercadorias</h3>

		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/Mercadorias/".$ROW_ID.""); ?>"><i class="fa fa-plus-square-o"></i> Adicionar</a></h4>
		 <?php
		 	}
		 ?>

		 <table class="table table-striped mercadorias_list">
			<tr>
				<th>Ações</th><th>Mercadorias</th><th>Unidade</th><th>Quantidade</th><th>Marca</th><th>Tabacalera</th>
			</tr>

		<?php  
		foreach ($mercadorias as $merc) {
			$IdMerc = $merc->ID_HAUL;
			$produto = $merc->product;
			$unidadeMedida = $merc->unit;
			$quantidade = $merc->qty;
			$marcaMercadoria = $merc->brand;
			$marcaTabacalera = $merc->tabacalera;
		?>
			<tr>
				<td>
					<?php 
						//trecho para habilitar ou não a edição de conteudo
						if( ($this->session->userdata('status')) <= 1 )
						{ 
						?>
						 	<a href="<?php echo base_url("index.php/detalhes_documento/atualizar_mercadoria/".$ROW_ID."/".$IdMerc.""); ?>"><i class="fa fa-pencil"></i> Editar</a> | <a href="<?php echo base_url("index.php/deletar_mercadoria/".$ROW_ID."/".$IdMerc.""); ?>"><i class="fa fa-ban"></i> Excluir</a></li>
						 <?php
						} 
					 ?>
				</td>
				<td><?php echo $produto; ?></td>
				<td><?php echo $unidadeMedida; ?></td>
				<td><?php echo $quantidade; ?></td>
				<td><?php echo $marcaMercadoria; ?></td>
				<td><?php echo $marcaTabacalera; ?></td>
			</tr>


		<?php
		} //fim do foreach

		?>
		</table>
		<hr>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Pessoas envolvidas</h3>

		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/Detidos/".$ROW_ID.""); ?>"><i class="fa fa-plus-square-o"></i> Adicionar</a></h4>
		 <?php
		 	}
		 ?>

		<table class="table table-striped mercadorias_list">
			<tr>
				<th>Ações</th><th>Nome do envolvido</th><th>RG</th><th>CPF</th><th>Data de nascimento</th><th>Mâe do envolvido</th><th>Pai do envolvido</th>
			</tr>

		<?php  
		foreach ($envolvidos as $envol) {
			$IdEnvol = $envol->ID_contact;
			$nomeEnvolvido = $envol->name;
			$CPFEnvol = $envol->CPF;
			$RGEnvol = $envol->rg;
			$paiEnvol = $envol->father;
			$motherEnvol = $envol->mother;
			$nascimentoEnvol = $envol->birth_dt;
			$cidadeEnvol = $envol->birth_city;
			$estadoEnvol = $envol->birth_state;
			$paisEnvol = $envol->birth_country;

		?>

			<tr>
				<td>
					<?php 
						//trecho para habilitar ou não a edição de conteudo
						if( ($this->session->userdata('status')) <= 1 )
						{ 
						?>
						 	<a href="<?php echo base_url("index.php/detalhes_documento/atualizar_contato/".$ROW_ID."/".$IdEnvol.""); ?>"><i class="fa fa-pencil"></i> Editar</a> | <a href="<?php echo base_url("index.php/deletar_pessoas/".$ROW_ID."/".$IdEnvol.""); ?>"><i class="fa fa-ban"></i> Excluir</a></li>
						 <?php
						}
					 ?>
				</td>
				<td><?php echo $nomeEnvolvido; ?></td>
				<td><?php echo $RGEnvol; ?></td>
				<td><?php echo $CPFEnvol; ?></td>
				<td><?php echo $nascimentoEnvol; ?></td>
				<td><?php echo $motherEnvol; ?></td>
				<td><?php echo $paiEnvol; ?></td>
			</tr> 

		<?php
			
		} //Fim do foreach

		?>
		</table>
		<hr>
	</div> 


	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Automoveis envolvidos</h3>

		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/Veiculos/".$ROW_ID.""); ?>"><i class="fa fa-plus-square-o"></i> Adicionar</a></h4>
		 <?php
		 	}
		 ?>


		<table class="table automoveis_list table-striped">
			<tr>
				<th>Ações</th><th>Veículo</th><th>Marca</th><th>Modelo</th><th>Chassi</th><th>Renavam</th><th>Placa</th><th>Cidade PLaca</th><th>UF Placa</th>
			</tr>
		<?php  
		foreach ($automoveis as $carro) {
			$id_carro = $carro->ID_vehicle;
			$carroRowid = $carro->ROW_ID;
			$categoria = $carro->category;
			$modelo = $carro->model;
			$marca = $carro->brand;
			$chassi = $carro->chassi;
			$renavan = $carro->renavan;
			$placa = $carro->placa;
			$cidade = $carro->cidade_nome;
			$estado = $carro->nome_estado;

			?>

			<tr>
				<td>
					<?php 
						//trecho para habilitar ou não a edição de conteudo
						if( ($this->session->userdata('status')) <= 1 )
						{ 
						?>
							<a href="<?php echo base_url("index.php/detalhes_documento/atualizar_auto/".$ROW_ID."/".$id_carro.""); ?>"><i class="fa fa-pencil"></i> Editar</a> | <a href="<?php echo base_url("index.php/deletar_automoveis/".$ROW_ID."/".$id_carro.""); ?>"><i class="fa fa-ban"></i> Excluir</a> </li>
						<?php
						} 

					 ?>
				</td>
				<td><?php echo $categoria; ?></td>
				<td><?php echo $modelo; ?></td>
				<td><?php echo $marca; ?></td>
				<td><?php echo $chassi; ?></td>
				<td><?php echo $renavan; ?></td>
				<td><?php echo $placa; ?></td>
				<td><?php echo $cidade; ?></td>
				<td><?php echo $estado; ?></td>
			</tr>
			
			<?php
		}// fim do foreach

		?>
		</table>
		<hr>
	</div>

	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Armazem/Casa/Locais da aprensão</h3>


		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/Depositos/".$ROW_ID.""); ?>"><i class="fa fa-plus-square-o"></i> Adicionar</a></h4>
		 <?php
		 	}
		 ?>
		 <table class="table automoveis_list table-striped">
			<tr>
				<th>Ações</th><th>Endereço</th><th>Cidade</th><th>UF</th>
			</tr>

		<?php  
		foreach ($locais as $local) {
			$IdLocal = $local->ID_wrs;
			$produtoWRS = $local->product;
			$unidadeMedida = $local->unit;
			$quantidade = $local->qty;
			$tabacaleira = $local->tabacalera;

		?>
		<tr>
			<td>
			<?php 
				//trecho para habilitar ou não a edição de conteudo
				if( ($this->session->userdata('status')) <= 1 )
				{ 
				?>
				 	<a href="<?php echo base_url("index.php/detalhes_documento/atualizar_warehouse/".$ROW_ID."/".$IdLocal.""); ?>"><i class="fa fa-pencil"></i> Editar</a> | <a href="<?php echo base_url("index.php/deletar_warehouse/".$ROW_ID."/".$IdLocal.""); ?>"><i class="fa fa-ban"></i> Excluir</a></li>
				 <?php
				}
			?>
				</td>
				<td><?php echo $produtoWRS; ?></td>
				<td><?php echo $unidadeMedida; ?></td>
				<td><?php echo $quantidade; ?></td>
		</tr>

		<?php

		} //Fim do foreach

		?>
		</table>
		<hr>
	</div> 

	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Notas e anexos</h3>


		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/NotasAnexos/".$ROW_ID.""); ?>"><i class="fa fa-plus-square-o"></i> Adicionar</a></h4>
		 <?php
		 	}
		 ?>

		<?php  
		foreach ($anexos as $anexo) {
			$Idanexos = $anexo->ID_anexos;
			$ID_row = $anexo->id_row;
			$nome_do_arquivo = $anexo->nome_arquivo;
			$local_arquivo = $anexo->location;
		?>

			<li>Nome do arquivo : <?php echo $nome_do_arquivo; ?> |  <a href="<?php echo base_url()."/uploads/".$local_arquivo; ?>"><i class="fa fa-download"></i></a> | 
			<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
			?>
			 	<a href="<?php echo base_url("index.php/detalhes_documento/atualizar_anexos/".$ROW_ID."/".$Idanexos.""); ?>"><i class="fa fa-pencil"></i> Editar</a> | <a href="<?php echo base_url("index.php/deletar_anexo/".$ROW_ID."/".$Idanexos.""); ?>"><i class="fa fa-ban"></i> Excluir</a></li>
			 <?php
			} else
			{
				echo "</li>";
			}
			?>

			
			<?php

		}

		?>

		<hr>
	</div> 




</div>