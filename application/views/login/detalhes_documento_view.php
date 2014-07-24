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
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/continueDoc/".$ROW_ID.""); ?>">Editar</a> - <a href="">Excluir documeto</a></h4>
		 <?php
		 	}
		 ?>
			<table class="detalhesIpl">
				<tr>
					<td>Qualificação</td><td>Unidade de segurança</td><td>Nome da operação</td><td>Data da apreensão</td>
				</tr>

				<tr>
					<td><?php echo $qualificação ?></td><td><?php echo $unidade_de_segurança ?></td><td><?php echo $nome_operacao ?></td><td><?php echo $dataF ?></td>
				</tr>

				<tr>
					<td>Link para a operação/apreensão:</td><td>Destino da carga:</td>
				</tr>
				<tr>
					<td><?php echo $linkOp; ?></td><td><?php echo $destino; ?></td>
				</tr>
				<tr>
					<td>Resumo :</td>
				</tr>
				<tr>
					<td><?php echo $resumo; ?></td>
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
			$cidade = $end->city;
			$estado = $end->state;
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
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/Endereco/".$ROW_ID.""); ?>">Editar</a></h4>
		 <?php
		 	}
		 ?>


			<table>
				<tr>
					<td>Endereço :</td><td>Numero :</td><td>Complemento:</td>
				</tr>
				<tr>
					<td><?php echo $logradouro; ?></td><td><?php echo $numero; ?></td><td><?php echo $complemento; ?></td>
				</tr>

				<tr>
					<td>Bairro:</td><td>Cidade:</td><td>Estado :</td><td>CEP :</td>
				</tr>
				<tr>
					<td><?php echo $bairro; ?></td><td><?php echo $cidade; ?></td><td><?php echo $estado; ?></td><td><?php echo $CEP; ?></td>
				</tr>

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
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/Veiculos/".$ROW_ID.""); ?>">Adicionar</a></h4>
		 <?php
		 	}
		 ?>


		<ul>
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
			$cidade = $carro->city;
			$estado = $carro->state;

			?>


			<li>Marca : <?php echo $marca; ?> | Placa : <?php echo $placa; ?> | Estado : <?php echo $cidade; ?> | Cidade : <?php echo $estado; ?>| <a href="<?php echo base_url("index.php/detalhes_documento/atualizar_auto/".$ROW_ID."/".$id_carro.""); ?>">Editar</a> | <a href="">Excluir</a></li>



			<?php



		}

		?>
	</ul>

		<hr>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Mercadorias</h3>

		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/Mercadorias/".$ROW_ID.""); ?>">Adicionar</a></h4>
		 <?php
		 	}
		 ?>

		<?php  
		foreach ($mercadorias as $merc) {
			$IdMerc = $merc->ID_HAUL;
			$produto = $merc->product;
			$unidadeMedida = $merc->unit;
			$quantidade = $merc->qty;
			$marcaMercadoria = $merc->tabacalera;

		

		?>


			<li>Produto : <?php echo $produto; ?> | Medida : <?php echo $unidadeMedida; ?> | Quantidade : <?php echo $quantidade; ?> | Marca : <?php echo $marcaMercadoria; ?>| <a href="<?php echo base_url("index.php/detalhes_documento/atualizar_mercadoria/".$ROW_ID."/".$IdMerc.""); ?>">Editar</a> | <a href="">Excluir</a></li>



			<?php



		}

		?>

		<hr>
	</div> 
	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Pessoas envolvidas</h3>

		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/Detidos/".$ROW_ID.""); ?>">Adicionar</a></h4>
		 <?php
		 	}
		 ?>


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


			<li>Nome do envolvido : <?php echo $nomeEnvolvido; ?> | Nascimento : <?php echo $nascimentoEnvol; ?> | Mâe do envolvido : <?php echo $motherEnvol; ?>| <a href="<?php echo base_url("index.php/detalhes_documento/atualizar_contato/".$ROW_ID."/".$IdEnvol.""); ?>">Editar</a> | <a href="">Excluir</a></li>



			<?php



		}

		?>


		<hr>
	</div> 
	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Armazem/Casa/Locais da aprensão</h3>


		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/Depositos/".$ROW_ID.""); ?>">Adicionar</a></h4>
		 <?php
		 	}
		 ?>

		<?php  
		foreach ($locais as $local) {
			$IdLocal = $local->ID_wrs;
			$produtoWRS = $local->product;
			$unidadeMedida = $local->unit;
			$quantidade = $local->qty;
			$tabacaleira = $local->tabacalera;

		?>

			<li>Nome do envolvido : <?php echo $produtoWRS; ?> | Unidade de medida : <?php echo $unidadeMedida; ?> | Quantidade : <?php echo $quantidade; ?> | <a href="<?php echo base_url("index.php/detalhes_documento/atualizar_warehouse/".$ROW_ID."/".$IdLocal.""); ?>">Editar</a> | <a href="">Excluir</a></li>

			<?php

		}

		?>

		<hr>
	</div> 

	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Notas e anexos</h3>


		<?php
			//trecho para habilitar ou não a edição de conteudo
			if( ($this->session->userdata('status')) <= 1 )
			{ 
		?>
		 <h4><a href="<?php echo base_url("index.php/continuar_documento/NotasAnexos/".$ROW_ID.""); ?>">Adicionar</a></h4>
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

			<li>Nome do arquivo : <?php echo $nome_do_arquivo; ?> |  <a href="<?php echo base_url()."/uploads/".$local_arquivo; ?>">Baixar o arquivo</a> | <a href="<?php echo base_url("index.php/detalhes_documento/atualizar_anexos/".$ROW_ID."/".$Idanexos.""); ?>">Editar</a> | <a href="">Excluir</a></li>

			<?php

		}

		?>

		<hr>
	</div> 




</div>