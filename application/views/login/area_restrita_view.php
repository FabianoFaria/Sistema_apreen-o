<div class="row sem_margin">
        <div class="col-md-12 col-sm-12 col-xs-12 main-menu">

                <h2>Área restrita</h2>

                <div class="col-md-6 col-sm-6 col-xs-6 lista-menu">

                        <ul>
                                
                                <?php
                                //trecho para habilitar ou não a edição de conteudo
                                if( ($this->session->userdata('status')) <= 1 )
                                { 
                                ?>
                                <li><a href="novo_documento">Inserir novo documento</a></li>
                                <?php
                                }
                                ?>
                                <li><a href="atualizar_documento">Atualizar documento já existente</a></li>
                                <li><a href="pesquisar_documento">Pesquisar documento já existente</a></li>
                                <li><a href="#">Efetuar pesquisa avançada</a></li>
                                
                                <!-- conforme for avançando eu adiciono novos itens -->

                                <br>
                                <br>


                        </ul>


                        <br>
                        <br>
                        <ul>
                                <?php 

                                        foreach ($result as $doc) {
                                        
                                 ?>
                                        <li><?php echo $doc->IPL; ?><a href="<?php echo base_url(); ?>index.php/detalhes_documento/getTheRow/<?php echo $doc->ROW_ID; ?>">Editar Documento</a> | <a href="#">Apagar documento</a> </li>

                                 <?php
                                        }

                                ?>
 
                        </ul>
        
  <?php echo $links; ?>

        
        
        </div>

</div>

