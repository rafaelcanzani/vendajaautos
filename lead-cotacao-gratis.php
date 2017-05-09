<?php
date_default_timezone_set('America/Sao_Paulo');

	include('/include/util.php');

	$editar = false;
	$resultado = new Resultado();
	$veiculo = new Veiculo();
	$anuncio = new Anuncio();
	$fabricantes = null;


	try 
	{
		$resultado = $veiculo->SelecionarFabricanteFIPE();
		if($resultado->Sucesso)
		{
			$fabricantes = $resultado->Retorno;
		}
		
		$totalFabricantes = count(array_filter($fabricantes));	
		
	}
	catch (\Exception $e) 
	{
		LogarExcecao($e);
		$resultado->Sucesso = false;
		$resultado->Mensagem = 'Falha na tentativa de carregar a página.';
		$resultado->MensagemInterna = $e->getMessage();
	}
?>
<!DOCTYPE html>
<html>
<head>
<!-- Google Tag Manager -->
	<script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WQXR47T');
	</script>
	<!-- End Google Tag Manager -->
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	 
	fbq('init', '1439854116048084');
	fbq('track', 'PageView');
	</script>
	<noscript>
	<img height="1" width="1"
	src="https://www.facebook.com/tr?id=1439854116048084&ev=PageView
	&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Venda já autos</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />

<!-- BEGIN CORE CSS FRAMEWORK -->
<link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/owl-carousel/owl.theme.css" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" href="web-app/upload/css/jquery.fileupload.css">

<style>
	::-webkit-input-placeholder {
		   text-align: center;
		   font-family: "Lato",sans-serif;
		}

		:-moz-placeholder { /* Firefox 18- */
		   text-align: center;  
		   font-family: "Lato",sans-serif;
		}

		::-moz-placeholder {  /* Firefox 19+ */
		   text-align: center; 
		   font-family: "Lato",sans-serif; 
		}

		:-ms-input-placeholder {  
		   text-align: center;
		   font-family: "Lato",sans-serif; 
		}
</style>

<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
<script type="text/javascript" src="assets/plugins/jquery-1.8.3.min.js"></script>

</head>
<!-- END HEAD -->
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQXR47T"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="main-wrapper">
		<div class="section full-view ha-waypoint"  data-animate-down="ha-header-hide" data-animate-up="ha-header-hide">
			<!--<div role="navigation" class="navbar navbar-transparent navbar-top">-->
			<div role="navigation" style="background-color: white !important;" class="navbar navbar-fixed-top">
				<div class="container"> 
					<div class="compressed">
						<div class="navbar-header">
							<button id="myDropdown" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="#" class="navbar-brand compressed">
								<img id="" src="assets/img/logo-horizontal.png" alt="" data-src="assets/img/logo-horizontal.png" data-src-retina="assets/img/logo-horizontal.png" style="" />
							</a>
						</div>
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="/" style="color: #000;">Home</a></li>
								<li><a href="/empresa.php" style="color: #000;">Empresa</a></li>
								<li><a href="/como-funciona.php" style="color: #000;">Como funciona</a></li>
								<li><a href="/contato.php" style="color: #000;">Fale Conosco</a></li>
								<li><a style="background-color:#00B8FF; color:white; ;border-radius:8px; padding-left:10px; padding-right:10px" href="/web">Acesse ou Cadastre-se</a></li>
								<li style="    margin-left: -1em; margin-right: -2.5em;"><a href="https://www.facebook.com/vendajaautos" style="color: #000;"><span style="font-size: 1.6rem;"><i class="fa fa-facebook-square" aria-hidden="true"></i></span></a></li>
								<li style="margin-left: em; margin-right: -2.5em;"><a href="https://twitter.com/vendajaautos" style="color: #000;"><span style="font-size: 1.6rem;"><i class="fa fa-twitter-square" aria-hidden="true"></i></span></a></li>
								<li><a href="https://www.linkedin.com/company/vendajaautos" style="color: #000;"><span style="font-size: 1.6rem;"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span></a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
		    </div>
		
		</div>

	<div class="section-cadastrado" style="padding-top: 7em; background-image: url(assets/img/bg/slide_04.png); background-size: cover; background-position: center;">
		<div class="container">
			<div class="col-md-12">
				<h2 style="color:white; font-family:'Helvetica Neue', sans-serif; line-height: 0.5" class="text-center">A Cotação mais rápida da WEB!</h2>
			</div>
			
			<div class="col-md-12">
				<div class="max-widht2" style="max-width: 410px; margin:0 auto; padding-top: 0.4em; padding-bottom: 1px !important; margin-bottom: 2em; background-color: #3385d9;">
					<div id="div_sucesso">
						<div style="max-width:400px; margin:0 auto; background-color: white; padding-top: 2em;">
							<div class="text-center">
								<img src="assets/img/logo-cinza.png" alt="" data-src="assets/img/logo-horizontal.png" data-src-retina="assets/img/logo-cinza.png">
							</div>
							<hr>
							<br>
							<div class="text-center">
								<label><h3>VOCÊ RECEBERÁ UMA PROPOSTA EM ALGUNS INSTANTES.</h3><label>
								<br/>
							</div>
							<br/>
							<div class="text-center">
								<h2 style="color: #76797e; font-weight: 800; font-family:'Helvetica Neue Bold', sans-serif;" class="text-center">Obrigado!</h2>
							</div>

							<br>
							<div class="form-group" style="margin-bottom: 6px !important;">
								<a href="index.php"><button style="background-color:#ffbb00; color:white; border:none; border-radius: 0; width: 100%; font-weight: 800; font-size: 1.6rem; padding-top: 1em; padding-bottom: 1em;" class="btn btn-default">OK</button></a>
							</div>
						</div>
					</div>
					
					<form id="frm_cotacao" style="max-width:400px; margin:0 auto; background-color: white; padding-top: 2em;">
						<div class="text-center">
							Você receberá em <b>15 minutos</b> uma cotação <b>GRATUITA</b> considerando o veículo em bom estado de conservação e sem avarias.
							</br>
							Veículos a partir de 2008.
						</div>
						<hr>
						<div class="form-group">
							<select name="fabricante" id="fabricante"  style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto" class="form-control" placeholder="MARCA"  onChange="getAno_2(this.value)" autocomplete="off" data-role="none" data-native-menu="false" style="z-index:99999999999999; height:35px; -webkit-appearance: listbox;">
								<option value="0">MARCA</option>
								<?php
									if($totalFabricantes > 0)
									{
										foreach ($fabricantes as &$fabricante) 
										{
											echo $fabricante->Nome . '<br/>';
								?>
											<option value="<?php echo $fabricante->CodigoFIPE;?>" <?php echo (($editar and $anuncio->Veiculo->Fabricante->VeiculoFabricanteId == $fabricante->CodigoFIPE) ? 'selected':'') ?> >
												<?php echo $fabricante->Nome;?>
											</option>
								<?php	}
									}
								?>
							</select>
						</div>
						<div class="form-group" id="ano_container">
							<?php
								if($editar and $totalAnosFIPE > 0)
								{
									echo '<select name="ano" id="ano" style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto" class="form-control" placeholder="ANO" style="margin-top:10px" onChange="getModelo_2(this.options[this.selectedIndex].innerHTML,'.$anuncio->Veiculo->Fabricante->VeiculoFabricanteId.')">';
									echo '<option value="0">Escolha um ano</option>';

									foreach($anosFIPE as &$ano)
									{
										$anoSelecionado = false;
										if($ano->AnoModelo == $anuncio->Veiculo->AnoModelo and $ano->Combustivel->Nome == $anuncio->Veiculo->Combustivel->NomeFIPE)
											$anoSelecionado = true;
										echo '<option value="'.$ano->AnoModelo.'-'.$ano->Combustivel->Nome.'"' . ($anoSelecionado ? ' selected ':'') . ' >'.str_replace('32000','Zero KM',$ano->AnoModelo).' '.$ano->Combustivel->Nome.'  </option>';
									}
									echo ' </select>';
								}
								else 
								{
							?>
									<select name="ano" id="ano" style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto" class="form-control" placeholder="Ano"   autocomplete="off" style="margin-top:10px" data-role="none">
										<option value="">
											ANO
										</option>
									</select>
							<?php
								}
							?>
						</div>
						
						<div class="form-group text-center" id="div_carregando">
							<label>Carregando...</label>
						</div>
						
						<div class="form-group" id="modelo_container">
						<?php
							if($editar and $totalModelosFIPE > 0)
							{
								echo '<select name="modelo" id="modelo" style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto" class="form-control"  onChange="" placeholder="Modelo" style="margin-top:10px">';
								echo '<option value="0">Escolha um modelo</option>';		
								foreach($modelosFIPE as &$modelo)
								{
									//echo  $anuncio->Veiculo->Modelo->VeiculoModeloId . ' <---> ' . $modelo->VeiculoModeloId . '<br/>';
									$modeloSelecionado = false;
									if($anuncio->Veiculo->Modelo->VeiculoModeloId == $modelo->VeiculoModeloId)
										$modeloSelecionado = true;
									echo '<option value="'.$modelo->VeiculoModeloId.'"' . ($modeloSelecionado ? ' selected ':'')  .   '>'.$modelo->Nome.'  </option>';
								}
								echo ' </select>';
							}
							else 
							{
						?>
								<select name="modelo" id="modelo" style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto" class="form-control" placeholder="Modelo" autocomplete="off" style="margin-top:10px" data-role="none">
									<option value="">MODELO</option>
								</select>
						<?php
							}
						?>
					</div>
						
						<div class="form-group ">
							<div style="min-height: 45px; max-width: 350px; margin:0 auto" class="text-right">
								<textarea rows="3" cols="45" class="form-control" style="background-color: #ebebeb; border-radius: 0; !important; margin:0 auto " name="opcionais" id="opcionais" placeholder="Opcionais" ></textarea>
								<span id="caracteres"></span> 
							</div>
						</div>
						
						<div class="form-group">
							<input required type="number" style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto"  name="km" id="km" class="form-control" placeholder="KM">
						</div>
						<div class="form-group">
							<input required type="text"  style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto"  name="nome" id="nome" class="form-control" placeholder="NOME">
						</div>
						<div class="form-group">
							<input required type="email" style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto"  name="email" id="email" class="form-control" placeholder="E-MAIL">
						</div>
						<div class="form-group">
							<input required type="text" style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto"  name="telefone" id="telefone" class="form-control" placeholder="TELEFONE / WHATSAPP">
							<script type="text/javascript">
                                    jQuery(function($) {
                                          $("#telefone").mask("(99) 9999-9999?9");
                                          $("#telefone").blur(function(event) {
                                              if($(this).val().length == 15){
                                                $('#telefone').mask('(99) 99999-999?9');
                                              } else {
                                                $('#telefone').mask('(99) 9999-9999?9');
                                              }
                                          });
                                       });
                                </script>
						</div>
						<div class="form-group text-center">
							Quero receber a proposta por: 
							<input type="radio" checked name="receberProposta" id="receberProposta" value="WHATSAPP"><b>TELEFONE / WHATSAPP</b>
							<input type="radio" name="receberProposta" id="receberProposta"  value="E-MAIL"><b>E-MAIL</b>
						</div>
						
						<hr>
						<div class="form-group checkbox check-primary text-center">
							<input name="confirmo" id="confirmo" type="checkbox" value="1" /> 
							<label for="confirmo">
								Concordo com os <a href="politica.php"><b>Termos</b></a> da Venda já Autos.
							</label> 
						</div>
						<div class="form-group col-md-12 col-sm-12" align="center">
							<label><img id="" src="assets/img/logo_whats.png" width="25" height="25"/><b> (12) 98158-4418</b></label>
							<label><img id="" src="assets/img/logo_email.png" width="25" height="25"/><b> contato@vendajaautos.com.br </b></label>
						</div>
						<div class="form-group" style="margin-bottom: 6px !important;">
							<button style="background-color:#ffbb00; color:white; border:none; border-radius: 0; width: 100%; font-weight: 800; font-size: 1.6rem; padding-top: 1em; padding-bottom: 1em;" type="submit" id="botao-cadastrar" class="btn btn-default">CADASTRAR-SE</button>
						</div>
						<input type="hidden" name="descricaoFabricante" id="descricaoFabricante"/>
						<input type="hidden" name="descricaoModelo" id="descricaoModelo"/>
						<input type="hidden" name="descricaoAnoCombustivel" id="descricaoAnoCombustivel"/>
					</form>
				</div>
			</div>
		</div>
	</div>


<?php require_once('footer.php'); ?>
</div>

<script src="assets/js/jquery.maskedinput.js" type="text/javascript"></script>
<!-- BEGIN CORE JS FRAMEWORK --> 	
<script type="text/javascript" src="assets/plugins/jquery-1.8.3.min.js"></script>	
<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK --> 

<!-- BEGIN JS PLUGIN --> 
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/jquery-nicescroll/jquery.nicescroll.min.js"></script>	
<!-- END JS PLUGIN --> 
<script type="text/javascript" src="assets/js/core.js"></script>
<script>
       $(document).ready(function() {   
		<?php if (isset($_REQUEST['msg']) and $_REQUEST['msg'] != '') { ?> 
		 $('#myModal').modal();  
        <?php } ?>
		
		
		$("#frm_cotacao").on('submit', function () 
		{	
			$("#botao-cadastrar").prop('disabled', true);
			$("#botao-cadastrar").html('<i class="icon-spinner icon-spin icon-large icon-2x"></i> Aguarde...');
			
			$('#descricaoModelo').val($("#modelo option:selected").text());
			$('#descricaoFabricante').val($("#fabricante option:selected").text());
			$('#descricaoAnoCombustivel').val($("#ano option:selected").text());
			
					
			$.ajax({
				url: "./lead-cotacao-gratis-enviar.php",
				dataType: "html",
				type: "POST",
				data: $("#frm_cotacao").serialize(),
				success: function(data) 
				{
					console.log(data);						
					$("#botao-cadastrar").prop('disabled', false);
					$("#botao-cadastrar").html('CADASTRAR-SE');
					
					if (data == 'falha') 
					{
						alert("Tivemos um problema para processar a sua solicitação!");
					}
					
					if (data == 'confirma') 
					{
						alert("É necessário concordar com os Termos da VendaJá Autos!");
					}
					
					if (data == 'campovazio') 
					{
						alert("Todos os campos devem estar preenchidos!");
					}
					
					if (data == 'erroTelefone') 
					{
						alert("O campo telefone deve conter apenas números! EX: 11912341234");
					}
					
					if (data == 'erroOpcionais') 
					{
						alert("O campo Opcionais deve ter no máximo 300 caracteres!");
					}
					
					if (data == 'sucesso') 
					{
						$("#frm_cotacao").hide();
						$("#div_sucesso").show();
						//window.location='index.php';
					}				
				}
			});
			return false;
			
		});
		
		$('#opcionais').keypress(function(e) {
		var tval = $('#opcionais').val(),
			tlength = tval.length,
			set = 299,
			remain = parseInt(set - tlength);
		$('#caracteres').text(remain + ' Restantes');
		if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
			$('#opcionais').val((tval).substring(0, tlength - 1));
			$('#caracteres').css("color","#ff0000");
		}else{
			$('#caracteres').css("color","#6F7B8A");
		}
	});
		
		
		$("#div_sucesso").hide();
		$("#ano_container").hide();
		$("#div_carregando").hide();
		$("#modelo_container").hide();
    });
	
	
		
	/*** Pega anos de acordo com a marca selecionada***/
	function getAno_2(valor)
	{
		$("#div_carregando").show();
		$("#ano_container").load("./lead-cotacao-gratis-pega-ano.php",{id:valor});
		$("#div_carregando").hide();
		$("#ano_container").show();
	};
	
	
	function getModelo_2(ano,marca)
	{
		$("#div_carregando").show();
		$("#modelo_container").load("./lead-cotacao-gratis-pega-modelo.php",{ano:ano,marca:marca});
		$("#div_carregando").hide();
		$("#modelo_container").show();
	};
	
	

	


	

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