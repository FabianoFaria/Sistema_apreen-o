<div class="row sem_margin">
        <div class="col-md-12 col-sm-12 col-xs-12 main-menu">

                <h2>Área restrita</h2>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 lista-menu">

                        <ul>
                                
                                <?php
                                //trecho para habilitar ou não a edição de conteudo
                                if( ($this->session->userdata('status')) <= 1 )
                                { 
                                ?>
                                <li><a href="<?php echo base_url(); ?>index.php/novo_documento">Inserir novo documento</a></li>
                                <?php
                                }
                                ?>
                                
                                <li><a href="<?php echo base_url(); ?>index.php/pesquisar_documento">Pesquisar documento já existente</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/pesquisa_avancada">Efetuar pesquisa de documentos</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/gerarRelatorios">Gerar relatorios</a></li>
                                <!-- conforme for avançando eu adiciono novos itens -->

                                <br>
                                <br>


                        </ul>


                        <br>
                        <br>
                       
                    </div> <!-- fim da classe lista-menu -->
                    <div class="col-md-6 col-sm-6 col-xs-6 lista-menu">
                        <ul>
                                <?php 

                               
                                if($result == false)
                                {

                                ?>
                                    <p>Nenhum documento cadastrado...</p>
                                <?php

                                } else 
                                {

                                        foreach ($result as $doc) {
                                        
                                ?>
                                            <li><?php echo $doc->IPL; ?><a href="<?php echo base_url(); ?>index.php/detalhes_documento/getTheRow/<?php echo $doc->ROW_ID; ?>">Editar Documento</a> | <a href="#">Apagar documento</a> </li>

                                <?php
                                        }//fim do foreach...
                                } //fim do else...

                                ?>
 
                        </ul>
        
                        <?php echo $links; ?>
                    </div>


                </div> <!-- fim do row -->
                <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <hr>


</div>

