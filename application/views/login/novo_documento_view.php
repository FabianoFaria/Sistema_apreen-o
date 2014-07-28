<div class="row sem_margin">
        <div class="col-md-12 col-sm-12 col-xs-12 main-menu">

                <h2>Área restrita - Novo documento</h2>
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


						$stringD = $IPL;
							
					?>
					 <script>
						$(function() {

						$( "#datepicker" ).datepicker();
						$.datepicker.formatDate( "yy-mm-dd" );
						});
					</script>


	                <div class="col-md-12 col-sm-12 col-xs-12 lista-menu">
	                	<h3>Detalhes do documento</h3>
	                	<hr>
	                       
	                	*Adenndo - Ao serem inseridos no BD, os dados desta sessão tambem atualizam os dados na tabela TBL MAIN
	                </div>

	                <div class="col-md-12 col-sm-12 col-xs-12 lista-menu">
	                	<h3>Detalhes da apreensão</h3>
	                	<hr>
	                	  <!-- abre o formulário de cadastro -->
							    <?php echo form_open('novo_documento/cadastrarProtocolo', 'id="form-new-ipl"'); ?>

							    <h3>IPL : <?php echo  $stringD;  ?></h3>
							    <br>

							    <label for="Ipl_manual">IPL:</label><br/>
							    <input type="text" name="Ipl_manual" value="<?php echo set_value('Ipl_manual'); ?>"/>
							    <div class="error"><?php echo form_error('Ipl_manual'); ?></div>

							    <label for="qualificacao">Estado da ocorrencia:</label><br/>
							    <?php echo form_dropdown('qualificacao', $arrayQuali); ?>
							    <div class="error"><?php echo form_error('qualificacao'); ?></div>

							    <label for="unidade_seguranca">Unidade de segurança:</label><br/>
							    <?php echo form_dropdown('unidade_seguranca', $arrayUnidade); ?>
							    <div class="error"><?php echo form_error('unidade_seguranca'); ?></div>

							    <label for="dataOps">Data da apreenção:</label><br/>
							    <input id="datepicker" type="text" name="dataOps" value="<?php echo set_value('dataOps'); ?>"/>
							    <div class="error"><?php echo form_error('dataOps'); ?></div>

							    <label for="linkOps">Link da operação:</label><br/>
							    <input type="text" name="linkOps" value="<?php echo set_value('linkOps'); ?>"/>
							    <div class="error"><?php echo form_error('linkOps'); ?></div>

							    <label for="resumoOps">Resumo da operação :</label><br/>
							    <textarea name="resumoOps"></textarea>
							    <div class="error"><?php echo form_error('resumoOps'); ?></div>

							    <label for="nomeOps">Nome da operação :</label><br/>
							    <input name="nomeOps" value="<?php echo set_value('nomeOps'); ?>"/>
							    <div class="error"><?php echo form_error('nomeOps'); ?></div>

							    <label for="destinoCarga">Destino da apreenção :</label><br/>
							    <?php echo form_dropdown('unidade_seguranca', $arrayUnidade); ?>
							    <div class="error"><?php echo form_error('destinoCarga'); ?></div>




	                </div>


	                <div class="col-md-12 col-sm-12 col-xs-12 lista-menu">
	                	<h3>Local da apreensão</h3>
	                	<hr>
							    

							    <label for="pais_apr">Pais da ocorrencia:</label><br/>
							    <input type="text" name="pais_apr" value="<?php echo set_value('pais_apr'); ?>"/>
							    <div class="error"><?php echo form_error('pais_apr'); ?></div>

							    <label for="estado_apr">Estado da ocorrencia:</label><br/>
							    <?php echo form_dropdown('estado_apr', $arrayE); ?>

							    
							    <div class="error"><?php echo form_error('estado_apr'); ?></div>

							     <label for="cidade_apr">Cidade da ocorrencia:</label><br/>
							    <?php echo form_dropdown('cidade_apr', $arrayC); ?>
							    <div class="error"><?php echo form_error('cidade_apr'); ?></div>

							    <label for="endereco">Endereço da ocorrencia:</label><br/>
							    <input type="text" name="endereco" value="<?php echo set_value('endereco'); ?>"/>
							    <div class="error"><?php echo form_error('endereco'); ?></div>

							    <label for="numero_addr">Numero:</label><br/>
							    <input type="text" name="numero_addr" value="<?php echo set_value('numero_addr'); ?>"/>
							    <div class="error"><?php echo form_error('numero_addr'); ?></div>

							    <label for="complemento">Complemento:</label><br/>
							    <input type="text" name="complemento" value="<?php echo set_value('complemento'); ?>"/>
							    <div class="error"><?php echo form_error('complemento'); ?></div>

							    <label for="bairro">Bairro:</label><br/>
							    <input type="text" name="cidade_apr" value="<?php echo set_value('bairro'); ?>"/>
							    <div class="error"><?php echo form_error('bairro'); ?></div>

							    <label for="CEP">CEP:</label><br/>
							    <input type="text" name="CEP" value="<?php echo set_value('CEP'); ?>"/>
							    <div class="error"><?php echo form_error('CEP'); ?></div>

							    <input type="hidden" name="IPLValue" value="<?php echo  $stringD;  ?>"/>

							    <input type="submit" name="Cadastrar" value="Cadastrar ocorrencia" />


							    <?php echo form_close(); ?>
							    <!-- fecha o formulário de cadastro -->
	                       

	                </div>
	               
	               


	            </div>
	        
        </div>

</div>