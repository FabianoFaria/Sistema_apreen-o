<script>
	function mostraBusca(str) {
	if (str=="") {
	document.getElementById("listResultados").innerHTML="<p>Nenhum resultado</p>";
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
	document.getElementById("listResultados").innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","<?php echo base_url(); ?>index.php/pesquisa/pesquisa_avancada/chamaDoct/"+str,true);
	xmlhttp.send();
	}
</script>
<div class="row sem_margin">
        <div class="col-md-12 col-sm-12 col-xs-12 main-menu">
        	<div class="row">
                <h2> Pesquisar documento</h2>

                

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

                </div>

        	</div>
        </div>

</div>