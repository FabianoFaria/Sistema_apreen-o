<div class="row sem_margin">
        <script>
                $(function() {

                $( "#primeira_data" ).datepicker();
                $.datepicker.formatDate( "yy-mm-dd" );
                });
        </script>
        <script>
                $(function() {

                $( "#segunda_data" ).datepicker();
                $.datepicker.formatDate( "yy-mm-dd" );
                });
        </script>
        <div class="col-md-12 col-sm-12 col-xs-12 main-menu">
        	<div class="row">
                <h2> Gerar relatorios </h2>

                

                <div class="col-md-6 col-sm-6 col-xs-6 lista-menu">


                	<hr>


                	<table id="listResultados">
						<tr>
							<th>Qualificação</th><th>Unidade de segurança</th><th>Nome da operação</th><th>Data da apreensão</th>
						</tr>
						<tr>
							<td></td><td></td><td></td><td></td>
						</tr>
                	</table>

                </div>

                <div class="col-md-6 col-sm-6 col-xs-6 formulario_pesquisa">

                	<h3>Parametros de pequisa</h3>

                	<p>Informe uma palavra para pesquisa</p>
                	<form>
                		<input id="palavra_chave" type="text"/> 
                		<input type="button" value="buscar" name="efetuar_busca" onclick="mostraBusca(palavra_chave.value)">
                	</form>
                        <br>
                        <hr>
                        <h3>Pesquise documentos por datas</h3>
                        <p>Informe a primeira data</p>
                        <form>
                                <input id="primeira_data" type="text"/>
                        
                        <p>Informe a segunda data</p>
                       
                                <input id="segunda_data" type="text"/> 
                                <input type="button" value="buscar" name="efetuar_busca" onclick="mostraBusca(palavra_chave.value)">
                        </form>

                </div>

        	</div>
                <br>
        <br>
        <br>
        <hr>
        </div>


</div>
