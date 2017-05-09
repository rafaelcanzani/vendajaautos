<?php require_once('header.php'); ?>

<div class="section first">
	<div class="container">
		<div class="p-b-60">
			<div class="row">
				<div class="col-md-6 col-sm-6">		
					<h2 class="p-t-40">Estamos a disposição para qualquer<span class="text-success semi-bold"> dúvida</span></h2>
					<p class="">Fique a vontade para enviar sua mensagem usando o formulário abaixo ou ligar em nossa Central de Atendimento.</p>
				</div>
			</div>
			<div class="row p-t-30">
				<div class="col-md-6 col-sm-6">
		            <form action="contato-enviar.php" method="post" enctype="application/x-www-form-urlencoded" name="form-contato">
					<div class="row form-row">
		                      <div class="col-md-10">
		                        <input name="nome" id="textFirstName" type="text" class="form-control " placeholder="Primeiro Nome" value="<?php echo isset($_SESSION['contato_nome']) ? $_SESSION['contato_nome']:''?>">
		                      </div>
		            </div>
					<div class="row form-row">
		                      <div class="col-md-10">
		                        <input name="sobrenome" id="txtLastName" type="text" class="form-control" placeholder="Sobrenome" value="<?php echo isset($_SESSION['contato_sobrenome']) ? $_SESSION['contato_sobrenome']:''?>">
		                      </div>
		            </div>
					<div class="row form-row">
		                      <div class="col-md-10">
		                        <input name="empresa" id="txtCompany" type="text" class="form-control" placeholder="Assunto" value="<?php echo isset($_SESSION['contato_empresa']) ? $_SESSION['contato_empresa']:''?>">
		                      </div>
		            </div>
					<div class="row form-row">
		                      <div class="col-md-10">
		                        <input name="email" id="txtEmailAddress" type="text" class="form-control" placeholder="Email" value="<?php echo isset($_SESSION['contato_email']) ? $_SESSION['contato_email']:''?>">
		                      </div>
		            </div>
					<div class="row form-row">
		                      <div class="col-md-10">
								<textarea id="mensagem" name="mensagem" type="text" class="form-control" placeholder="Mensagem" rows="8" ><?php echo isset($_SESSION['contato_mensagem']) ? $_SESSION['contato_mensagem']:''?></textarea>
		                      </div>
		            </div>	
					<div class="row form-row">
						 <div class="col-md-10">
						<button type="submit" class="btn btn-primary btn-cons">Enviar</button>
						</div>
					</div>
		            </form>
				</div>
				<div class="col-md-6 feature-list" style="margin-top: -1em;">
					<h2 style="font-weight: 800;">SEJA UM LOJISTA CREDENCIADO</h2><button class="center-block btn btn-default" style=" width: 87%;margin-left: 0em;margin-bottom: 2em;background-color: #00B8FF; border:#00B8FF; color:white;" type="submit"><strong>CADASTRE-SE!</strong></button>
					<h4 class="title custom-font text-black no-margin p-b-10">TELEFONE</h4>
					<p class="no-margin"><i class="fa fa-phone fa-lg p-r-10 "></i> São José dos Campos</p>
					<h2 class="custom-font text-black no-margin p-l-20">+55 12 3600-8080</h2>
					
					<section class="p-t-20 p-b-20">
						<h4 class="title custom-font text-black">ENDEREÇO</h4>
						<address>
						  Avenida Cassiano Ricardo, 601 - sala 61 <br>
						  Jd. Aquarius - Ed. The One Office Tower<br>
						  CEP 12246-870 <br> São José dos Campos - SP
						</address>
					</section>
				</div>
			</div>
		</div>
	</div>	
</div>

<div class="section white" style="height:350px" id="map"></div>

<div class="section black">
	<div class="container">
		<div class="p-t-60 p-b-60">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="text-center text-white m-b-30"> <span class="semi-bold">Vamos começar seu cadastro? </span> 
					Digite seu email abaixo e <strong>VENDA</strong><font face="Arial" color="#00b8ff"class="bold" >JÁ</font>.</h2>
					<form action="web/index.php?cadastro=sim" method="post" enctype="application/x-www-form-urlencoded" name="form">
						<div class="row form-row">
	                    
	                      <div class="col-md-6 col-md-offset-2 no-padding col-sm-6 col-sm-offset-2 col-xs-10 col-xs-offset-1">
	                        <input name="form_email" id="form3Occupation" type="text" class="form-control " placeholder="Digite seu e-mail abaixo">
	                      </div>
						  <div class="col-md-4 col-sm-4 col-xs-4 xs-p-l-10">
							<button type="submit" class="btn btn-primary btn-cons">CADASTRAR</button>
						  </div>	
	                    </div>
                	</form>
					<div class="row">
						<a href="/web" class="text-white text-center col-md-11 col-sm-11 col-xs-11">ou acesse sua conta <strong>clicando aqui</strong></a>
					</div>
					<div class="clearfix"></div>
				</div>					
			</div>
		</div>
	</div>
</div>
<?php require_once('footer.php'); ?>

</div>

<!-- BEGIN CORE JS FRAMEWORK --> 	
<script type="text/javascript" src="assets/plugins/jquery-1.8.3.min.js"></script>	
<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK --> 

<!-- BEGIN JS PLUGIN --> 
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/jquery-nicescroll/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="assets/plugins/jquery-gmap/gmaps.js" type="text/javascript"></script> 	
<!-- END JS PLUGIN --> 
<script src="assets/js/google_maps.js?2" type="text/javascript"></script> 

<script type="text/javascript" src="assets/js/core.js"></script>
<script>
       $(document).ready(function() {   
		<?php if (isset($_REQUEST['msg']) and $_REQUEST['msg'] != '') { ?> 
		 $('#myModal').modal();  
        <?php } ?> 
	
    });
</script>

<div id="myModal" class="modal fade" style="z-index:999999999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Aviso!</h4>
      </div>
      <div class="modal-body modal-corpo">
         <?php echo isset($_REQUEST['msg']) ? $_REQUEST['msg']:'';$_REQUEST['msg']='';?>
      </div>
      <div class="modal-footer modal-rodape">
        <button type="button" class="btn btn-default" data-dismiss="modal" data-role="none">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

</body>