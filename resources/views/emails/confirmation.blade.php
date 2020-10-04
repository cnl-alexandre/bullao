<!DOCTYPE html>
<html>
			<head>
					<meta charset="utf-8">
					<title>Contact</title>
			</head>
			<body style="background-color: #f4f4f4;width: 100%;margin: 0;padding: 0;overflow: hidden;">
					<div style="max-width: 400px;margin: 0 auto 50px auto;">
							<div style="background-color: #194F9A;width: 100%;">
									<a href="{{ url('/') }}" rel="noopener noreferrer" target="_blank" style="text-decoration: none;">
											<img src="http://www.bullao.fr/assets/logo-blanc.png" alt="Logo Bullao" style="width: 50%;border: 0;margin-left: 25%;margin-top: 5px;">
									</a>
							</div>
							<div style="background-color: #fff;padding: 1.75rem;">
									<div style="width: 100%;">
											<h1 style="color: #194F9A;font-size: 1.4rem;font-weight: lighter;text-align: center;">Validation de votre commande</h1>
											<p style="line-height: 160%;margin-top: 25px;">
													Bonjour,
													<br><br>Nous avons le plaisir de vous confirmer la validation de votre commande sur le site bullao.fr.
													<br><br>Vos informations de livraisons ont bien été enregistrées dans notre base de données sécurisée.
													<br><br>Si des informations dans votre dossier sont menées à être modifiées, vous êtes priées de nous contacter pour corriger l’information.
													<br>
											</p>
											<div style="background-color: #f4f4f4;padding: 1rem;margin-top: 1.5rem;display: flow-root;">
													<div style="color: #194F9A;">
															<p style="margin-top: 0;"><b>Récapitulatif de mon achat</b></p>
													</div>
													<hr style="opacity: 0.5;">

													<div style="width: 100%;line-height: 100%;">
															<p style="width: 60%;float: left;">
																	@if($reservation->spa->spa_nb_place == '4')
																		Formule 1 soirée
																	@elseif($reservation->spa->spa_nb_place == '6')
																		Formule 1 soirée XL
																	@endif
															</p>
															<p style="width: 40%;float: right;text-align: right;">
																	{{ $reservation->reservation_prix }}€
															</p>
													</div>
													<p>
															{{ $reservation->reservation_spa_libelle }}
													</p>
													<p>
															Du {{ $reservation->DateDebut->format('d/m/Y') }} au {{ $reservation->DateFin->format('d/m/Y') }}
													</p>
													@if($reservation->reservation_pack_id != null)
															<p>{{ $reservation->pack->pack_libelle }}</p>
													@endif
													<p>{{ count($reservation->accessoires) }}</p>
													@if(count($reservation->accessoires) > 0)

															@foreach($reservation->accessoires as $accessoire)
																	<p>{{ $accessoire->accessoire->accessoire_libelle }}</p>
															@endforeach
													@endif

													<hr style="opacity: 0.5;">
													<div style="color: #194F9A;">
															<div style="width: 100%;line-height: 100%;">
																	<p style="width: 60%;float: left;margin-bottom: 7px;">
																			<b>Montant total :</b>
																	</p>
																	<p style="width: 40%;float: right;text-align: right;margin-bottom: 7px;">
																			<b>{{ $reservation->reservation_montant_total }}€</b>
																	</p>
															</div>
													</div>
											</div>
											<p style="margin-top: 1.5rem;">
													Merci pour votre achat et de la confiance que vous m’accordez.
													<br><br>Grégoire de Bullao.
											</p>
									</div>
							</div>
							<p style="color: #7D7D7D;text-align: center;margin-top: 35px;">©Copyright 2020 - Bullao</p>
					</div>
			</body>
</html>
