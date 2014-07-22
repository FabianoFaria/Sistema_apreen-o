<!DOCTYPE html>
<html>
<head>
	<title>Sistema de registro de apreenção</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!--Le CSS
==========================================================-->


<link href="<?php echo base_url("/assets/ULA_front.css"); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url("/assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url("/assets/css/font-awesome.css"); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url("/assets/jquery-ui/jquery-ui.css"); ?>" rel="stylesheet" type="text/css" />

<!--Le JavaScript
==========================================================-->



<script src="<?php echo base_url("/assets/js/jquery-1.9.1.js"); ?>"></script>
<script src="<?php echo base_url("/assets/js/bootstrap.js"); ?>"></script>
<script src="<?php echo base_url("/assets/jquery-ui/jquery-ui.js"); ?>"></script>




</head>
    <body>
		<div class="row sem_margin">
			<div class="col-md-6 col-sm-6 col-xs-6 box_header sem_padding">

					<h2 >Sistema de registro de apreenção</h2>

			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 box_user sem_padding">
				<?php

					$user_name = "p";

        			$user_name = $this->session->userdata('nome_usr');
        			

        			if($user_name != "p")
        			{  ?>

        				<h4>Bem-vindo usuario :<?php echo $user_name; ?> | <a href="<?php echo base_url("/index.php/logout"); ?>">Sair da sessão</a>
        					<br>
        					 | <a href="<?php echo base_url("/index.php/area_restrita"); ?>">Menu principal</a>
        				</h4> 

        			<?php
        			}else
        			{
        				echo "algo errafo";
        			}


				?>

			</div>
		</div>
