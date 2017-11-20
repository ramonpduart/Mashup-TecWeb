<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>TECWEB - MAP </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css" rel="stylesheet') ?>" />
    <!--external css-->
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/zabuto_calendar.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/js/gritter/css/jquery.gritter.css') ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url('assets/lineicons/style.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- Custom styles for this template -->
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet" />

	<script src="<?php echo base_url('assets/js/chart-master/Chart.js') ?>"></script>

  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
                    <?php 
                        if(validation_errors()){
                    ?>     
                        <div class="alert alert-danger">
                            <center><?php echo validation_errors(); ?></center>
                        </div>

                    <?php  } ?>
                    
                    <form class="form-login" action="<?php echo base_url('/auth/login'); ?>" method="post">
		        <h2 class="form-login-heading">FAÇA SEU LOGIN</h2>
		        <div class="login-wrap">
                            <?php echo form_input(array("name" => "email","id"=>"inputUsernameEmail" ,"class" => "form-control","placeholder" =>"Email","type" => "text"));?>
		            <br>
                            <?php echo form_input(array("name" => "senha","id"=>"inputPassword","class" => "form-control","placeholder" =>"Senha","type" => "password"));?>
		            <label class="checkbox">
		            </label>
		            <?php echo form_input(array("class" => "btn btn-theme btn-block","type" => "submit"),"Entrar");?>
                            <hr>
		            
		            <div class="login-social-link centered">
		            <p>Você também pode acessar através do</p>
		                <a href="<?php echo $this->facebook->login_url(); ?>" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
		                <a href="<?php echo $login_url;?>" class="btn btn-danger"><i class="fa fa-google"></i> Google</a>
		            </div>
		            <div class="registration">
		                Não tem uma cadastro?<br/>
		                <a href="<?php echo site_url('auth/registrar') ?>">
		                    Crie sua conta clicando aqui
		                </a>
		            </div>
		
		        </div>		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.backstretch.min.js') ?>"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>