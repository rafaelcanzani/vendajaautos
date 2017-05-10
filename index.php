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
	require_once('header.php'); 
?>
<section class="hidden-sm hidden-xs">
	<div class="banner_02" style="padding-top:5em; background-image: url(assets/img/bg/slide_02.png); background-size: cover; background-position: center;">
    	<div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 1.5em;">
				<div class="col-md-6 col-sm-12 col-xs-12 hidden-sm hidden-xs">
					<h3 class="" style="font-family:'Helvetica Neue', sans-serif; color:white; padding-top: 4em;">Dinheiro rápido!</h3>
					<h3 style="font-family:'Helvetica Neue Light', sans-serif; color:white;">Venda seu carro.</h3>
					<h1 style="font-family:'Helvetica Neue Bold', sans-serif; font-weight: 800; font-size: 3.5rem; color:white; ">EM ATÉ 1 HORA!</h1>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12 hidden-md hidden-lg" style="margin-top: 3em;">
					<h3 class="" style="font-family:'Helvetica Neue', sans-serif; color:white; padding-top: 4em;">Dinheiro rápido!<Br />Venda seu carro.</h3>
					<h1 style="font-family:'Helvetica Neue Bold', sans-serif; font-weight: 800; font-size: 3.5rem; color:white; ">EM ATÉ 1 HORA!</h1>
				</div>

				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="max-widht2" style="max-width: 410px; margin:0 auto; margin-top: 1.5em;padding-top: 0.4em; padding-bottom: 1px !important; margin-bottom: 2em; background-color: #3385d9;">
						<form method="post" action="lead-cotacao-gratis.php" id="frm_cotacao" style="max-width:400px; margin:0 auto; background-color: white; padding-top: 2em;">
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
							<div class="form-group">
								<input required type="number" style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto"  name="km" id="km" class="form-control" placeholder="KM">
							</div>
							<div class="form-group" style="margin-bottom: 6px !important;">
								<button style="background-color:#ffbb00; color:white; border:none; border-radius: 0; width: 100%; font-weight: 800; font-size: 1.6rem; padding-top: 1em; padding-bottom: 1em;" type="submit" id="botao-cadastrar">CADASTRAR-SE</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	<section class="hidden-lg hidden-md text-center">
	    <div class="banner_02" style="padding-top:5em; background-image: url(assets/img/bg/slide_02.png); background-size: cover; background-position: center;">
	    	<div class="container">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-6 col-sm-12 col-xs-12 hidden-sm hidden-xs">
						<h3 class="" style="font-family:'Helvetica Neue', sans-serif; color:white;">Dinheiro rápido!</h3>
						<h3 style="font-family:'Helvetica Neue Light', sans-serif; color:white;">Venda seu carro.</h3>
						<h1 style="font-family:'Helvetica Neue Bold', sans-serif; font-weight: 800; font-size: 3.5rem; color:white; ">EM ATÉ 1 HORA!</h1>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 hidden-md hidden-lg" style="margin-top: 3em;">
						<h3 class="" style="font-family:'Helvetica Neue', sans-serif; color:white; padding-top: 0em;">Dinheiro rápido!<Br />Venda seu carro.</h3>
						<h1 style="font-family:'Helvetica Neue Bold', sans-serif; font-weight: 800; font-size: 3.5rem; color:white; ">EM ATÉ 1 HORA!</h1>
					</div>

					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="max-widht2" style="max-width: 410px; margin:0 auto; margin-top: 1.5em;padding-top: 0.4em; padding-bottom: 1px !important; margin-bottom: 2em; background-color: #3385d9;">
							<form method="post" action="lead-cotacao-gratis.php" id="frm_cotacao" style="max-width:400px; margin:0 auto; background-color: white; padding-top: 2em;">
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
								<div class="form-group">
									<input required type="number" style="background-color: #ebebeb; border-radius: 0; min-height: 45px; max-width: 350px !important; margin:0 auto"  name="km" id="km" class="form-control" placeholder="KM">
								</div>
								<div class="form-group" style="margin-bottom: 6px !important;">
									<button style="background-color:#ffbb00; color:white; border:none; border-radius: 0; width: 100%; font-weight: 800; font-size: 1.6rem; padding-top: 1em; padding-bottom: 1em;" type="submit" id="botao-cadastrar">CADASTRAR-SE</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</section>
		
	<div class="section white ha-waypoint" data-animate-down="ha-header-color" data-animate-up="ha-header-hide" >
		
		<div class="container">
			<div class="container">
				<div class="p-t-20 p-b-10 text-center">
					<h2 style="color:black;" class="text-center">Baixe o <span class="semi-bold">aplicativo</span>, e <strong>VENDA</strong><font face="Arial" color="#00b8ff" class="bold">JÁ</font> o seu veículo!</h2>
					<div class="p-t-10"> 
						<a href="https://play.google.com/store/apps/details?id=vendajautos.android" target="_blank"><img src="assets/img/icone-google.png" width="137" height="45"></a> 
						<a href="#" title="Em Breve"><img src="assets/img/icone-apple.png" width="139" height="45"></a>
				    </div>
				</div>
			</div>
		</div>

		<section>
			<div class="section-sobre" style="background-color: #e3e3e3; margin-top: 1em;">
				<div class="container">
					<div class="col-md-12 feature-list" style="text-align:center; padding-top: 2em;">
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-ride="animated" data-animation="fadeIn" data-delay="300">
						    <div><i class="fa fa-users" style="font-size:40px"></i></div>
							<h4 class="title">QUEM ANÚNCIA OS VEíCULOS?</h4>
							<p>Pessoas físicas, concessionárias , locadoras de veículos e bancos.</p>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-ride="animated" data-animation="fadeIn" data-delay="600">
						    <div><i class="fa fa-thumbs-o-up" style="font-size:40px"></i></div>
							<h4 class="title">QUEM PODE COMPRAR?</h4>
							<p>Apenas revendedores cadastrados e previamente autorizados por nossa equipe, tem acesso aos anúncios.</p>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" data-ride="animated" data-animation="fadeIn" data-delay="900">
						    <div><i class="fa fa-lock" style="font-size:40px"></i></div>
							<h4 class="title">SEGURANÇA</h4>
							<p>A VendaJá Autos possui uma rede de compradores composta por lojas com credibilidade e confiança no mercado.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="container hidden-sm hidden-xs" style="padding-top: 2em; padding-bottom: 2em;">
			<div class="max-widht" style="max-width: 1100px; margin:0 auto;  background-position: center;">
				<div class="col-md-12"  style="background-image: url(assets/img/icones/6.png); background-repeat: no-repeat; background-position: center 50px; background-size:;">
					<h2 class="text-center" style="font-weight: 600">PASSO A PASSO</h2>
					<img src="assets/img/icones/1.png" title="Baixe o aplicativo gratuito e preencha os dados do seu veículo" data-toggle="tooltip" data-ride="animated" data-animation="fadeIn" data-delay="300" width="210" style="margin:0 auto;" alt="">
					<img src="assets/img/icones/2.png" title="Centenas de lojas cadastradas te enviarão várias ofertas" data-toggle="tooltip" data-ride="animated" data-animation="fadeIn" data-delay="400" width="210" style="margin:0 auto;" alt="">
					<img src="assets/img/icones/3.png" title="Você escolhe a maior oferta entre todas" data-toggle="tooltip" data-ride="animated" data-animation="fadeIn" data-delay="500" width="210" style="margin:0 auto;" alt="">
					<img src="assets/img/icones/4.png" title="Em até 24 horas, procure uma loja da supervisão e faça a vistoria" data-toggle="tooltip" data-ride="animated" data-animation="fadeIn" data-delay="600" width="210" style="margin:0 auto;" alt="">
					<img src="assets/img/icones/5.png" title="Agende com o comprador a entrega do seu carro" data-toggle="tooltip" data-ride="animated" data-animation="fadeIn" data-delay="700" width="210" style="margin:0 auto;" alt="">
				</div>
				<div class="col-md-12">
					<div class="col-md-2" style="margin-left: 1em;">
						<p style="font-size: 1.4rem !important;" class="text-center">Cadastre seu<br />veículo grátis.</p>
					</div>
					<div class="col-md-2" style="margin-left: 2.6em;">
						<p style="font-size: 1.4rem !important;" class="text-center">Receba ofertas em até 1 hora.</p>
					</div>
					<div class="col-md-2" style="margin-left: 3em;">
						<p style="font-size: 1.4rem !important;" class="text-center">Aceite a <br />maior oferta.</p>
					</div>
					<div class="col-md-2" style="margin-left: 3em;">
						<p style="font-size: 1.4rem !important;" class="text-center">Faça a vistoria.</p>
					</div>
					<div class="col-md-2" style="margin-left: 3em;">
						<p style="font-size: 1.4rem !important;" class="text-center">Negócio fechado.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="container hidden-md hidden-lg" style="padding-top: 2em; padding-bottom: 2em;">
			<div class="max-widht" style="max-width: 1100px; margin:0 auto;  background-position: center;">
				<div class="col-md-12">
					<h2 class="text-center" style="font-weight: 600">PASSO A PASSO</h2>
				
					<div class="col-sm-12 col-xs-12">
						<img src="assets/img/icones/1.png" class="img-responsive"  width="" style="margin:0 auto;" alt="">
						<p style="font-size: 1.6rem !important;" class="text-center">Cadastre seu<br />veículo grátis.</p>
					</div>
					<div class="col-sm-12 col-xs-12">
						<img src="assets/img/icones/2.png" class="img-responsive" width="" style="margin:0 auto;" alt="">
						<p style="font-size: 1.6rem !important;" class="text-center">Receba ofertas em até 1 hora.</p>
					</div>
					<div class="col-sm-12 col-xs-12">
						<img src="assets/img/icones/3.png" class="img-responsive"  width="" style="margin:0 auto;" alt="">
						<p style="font-size: 1.6rem !important;" class="text-center">Aceite a <br />maior oferta.</p>
					</div>
					<div class="col-sm-12 col-xs-12">
						<img src="assets/img/icones/4.png" class="img-responsive"  width="" style="margin:0 auto;" alt="">
						<p style="font-size: 1.6rem !important;" class="text-center">Faça a vistoria.</p>
					</div>
					<div class="col-sm-12 col-xs-12">
						<img src="assets/img/icones/5.png" class="img-responsive"  width="" style="margin:0 auto;" alt="">
						<p style="font-size: 1.6rem !important;" class="text-center">Negócio fechado.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section table-layout">	
		<div id="working-section" class="table-cell v-middle">	
			<h1 style="font size: 5em;" class="text-white text-center custom-font no-margin">INOVE!</h1>
		    <h1 class="text-white text-center custom-font no-margin">SAIA DO PASSADO, BAIXE NOSSO APLICATIVO E <strong>VENDAJÁ</strong></h1>
		</div>
	</div>

	<?php require_once('footer.php'); ?>
	

	<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
	<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="assets/plugins/parrallax/js/jquery.parallax-1.1.3.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery-nicescroll/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery-appear/jquery.appear.js"></script>
	<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script> 
	<script type="text/javascript" src="assets/js/core.js?2"></script>
	<script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip();   
		});
		function getAno_2(valor)
		{
			$("#ano_container").load("./lead-cotacao-gratis-pega-ano.php",{id:valor});
		};
		
		function getModelo_2(ano,marca)
		{
			$("#modelo_container").load("./lead-cotacao-gratis-pega-modelo.php",{ano:ano,marca:marca});
		};
	</script>
</body>