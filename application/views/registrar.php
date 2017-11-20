<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Mashup - TecWeb</title>
<link href="<?php echo base_url('assets/css/bootstrap.css" rel="stylesheet') ?>" /> 
<link href="<?php echo base_url('assets/css/style.css" rel="stylesheet') ?>" /> 

</head>
<body>
<div class="container">
    <header class="header black-bg">
            <!--logo start-->
            <a href="<?php echo base_url('') ?>" class="logo"><b>Mashup</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
            </div>
        </header>
    <div class="form-register" style="margin-top: 100px">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"> 
        <form action="<?php echo base_url('auth/cadastrar'); ?>" method="post" enctype="multipart/form-data">
			<h2>Registre-se <small>É rápido, simples e fácil.</small></h2>
			<hr class="colorgraph">
                        <?php 
                            if(validation_errors()){
                          ?>     
                          
                            <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>                          
                          <?php 
                          } ?>
                        <b>Atenção:</b> Os campos marcados com * são de preenchimento obrigatório.
			
			<div class="form-group">
                            <?php echo form_input(array("name" => "nome","class" => "form-control input-lg","placeholder" =>"Nome *","type" => "text"));?>
                            <!--<input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Nome *" tabindex="1">-->
			</div>
				
			
			<div class="form-group">
				 <?php echo form_input(array("name" => "email","class" => "form-control input-lg","placeholder" =>"Email *","type" => "text"));?>
			</div> 
                        
                        
                        <div class="form-group">
                                                
                        <div class="form-group">
                            <label><h2><small>Defina sua senha *</small></h2></label>
                        </div>
			
                        <div class="row">
                            
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                                            <?php echo form_input(array("name" => "senha","class" => "form-control input-lg","placeholder" =>"Senha","type" => "password"));?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                                            <?php echo form_input(array("name" => "confirmar-senha","class" => "form-control input-lg","placeholder" =>"Confirmar senha","type" => "password"));?>
						
					</div>
				</div>
			</div>
                        
			<hr class="colorgraph">
			<div class="row">
			<div class="col-xs-12 col-md-12"><?php echo form_input(array("class" => "btn btn-primary btn-block btn-lg","type" => "submit"),"Registrar");?></div>
			</div>
		</form>
	</div>
</div>
</div>	
</body>
</html>
