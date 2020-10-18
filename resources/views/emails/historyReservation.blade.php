<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Résumé de vos réservation</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family:Oxygen, 'Helvetica Neue', Helvetica, Arial, sans-serif;background-color: #f4f4f4;width: 100%;margin: 0;padding: 0;">

	<table width="100%" bgcolor="#f4f4f4" cellpadding="0" cellspacing="0" border="0">
		<tbody>
			<tr>
				<td style="padding: 0 0 40px 0;">
					<!-- begin main block -->

					<table cellpadding="0" cellspacing="0" width="400" border="0" align="center">
						<tbody>
							<tr>
								<td>

									<table width="100%" bgcolor="#fff" border="0" style="background-color: #fff;">
										<tbody>
											<tr>
												<td width="100%" height="80" bgcolor="#194F9A" style="text-align: center;">
													<a href="{{ url('/') }}" rel="noopener noreferrer" target="_blank" style="text-decoration: none;">
														<img src="http://www.bullao.fr/assets/logo-blanc.png" alt="Logo Bullao" width="180">
													</a>
												</td>
											</tr>
											<tr>
												<td width="100%" bgcolor="#fff" style="text-align: center;">
													<h1 style="color: #194F9A;font-size: 1.4rem;font-weight: lighter;margin: 25px 0;">Résumé de vos réservations</h1>
												</td>
											</tr>


											@foreach($reservations as $reservation)

											<tr>
												<td width="100%" bgcolor="#fff">
													<table width="100%">
														<tbody>
															<tr>
																<td width="10%"></td>
																<td width="80%">
																	<p style="line-height: 130%;margin-bottom: 25px;">
																		Nom : {{ $reservations->client->client_name }}
																		<br>Adresse : {{ $reservations->reservation_rue }}
																		<br>Ville : {{ $reservations->reservation_ville }} - {{ $reservation->reservation_departement }}
																		<br>Emplacement : {{ $reservations->reservation_emplacement }}
																		<br>Type : {{ $reservations->reservation_type_logement }}
																		<br>Créneau : {{ $reservations->reservation_creneau }}
																		<br>Numéro : {{ $reservations->client->client_phone }}
																		<br>Email : {{ $reservations->client->client_email }}
																		<br>
																	</p>
																</td>
																<td width="10%"></td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td width="100%" bgcolor="#fff">
													<table width="100%">
														<tbody>
															<tr>
																<td width="10%"></td>
																<td width="80%" bgcolor="#f4f4f4">

																	<table bgcolor="#f4f4f4" width="100%">
																		<tbody>
																			<tr>
																				<td width="2%"></td>
																				<td width="81%" height="40">Récapitulatif de l'achat</td>
																				<td width="15%"></td>
																				<td width="2%"></td>
																			</tr>
																			<tr>
																				<td width="2%" height="1"></td>
																				<td width="81%" height="1" style="border-top:1px solid #979797;"></td>
																				<td width="15%" height="1" style="border-top:1px solid #979797;"></td>
																				<td width="2%" height="1"></td>
																			</tr>
																			<tr>
																				<td width="2%"></td>
																				<td width="81%" height="25">
																					@if($reservations->spa->spa_nb_place == '4')
																					Formule 1 soirée
																					@elseif($reservations->spa->spa_nb_place == '6')
																					Formule 1 soirée XL
																					@endif
																				</td>
																				<td width="15%" height="25" style="text-align: right;">{{ $reservations->reservation_prix }}€</td>
																				<td width="2%"></td>
																			</tr>
																			<tr>
																				<td width="2%"></td>
																				<td width="81%" height="25">{{ $reservations->reservation_spa_libelle }}</td>
																				<td width="15%"></td>
																				<td width="2%"></td>
																			</tr>
																			<tr>
																				<td width="2%"></td>
																				<td width="81%" height="25">Du {{ $reservations->DateDebut->format('d/m/Y') }} au {{ $reservations->DateFin->format('d/m/Y') }}</td>
																				<td width="15%"></td>
																				<td width="2%"></td>
																			</tr>
																			@if($reservations->reservation_pack_id != null)
																			<tr>
																				<td width="2%"></td>
																				<td width="81%" height="25">{{ $reservations->pack->pack_libelle }}</td>
																				<td width="15%" style="text-align: right;">+{{ $reservations->pack->pack_prix }}€</td>
																				<td width="2%"></td>
																			</tr>
																			@endif
																			@if(count($reservations->accessoires) > 0)
																			@foreach($reservations->accessoires as $accessoire)
																			<tr>
																				<td width="2%"></td>
																				<td width="81%" height="25">{{ $accessoire->accessoire->accessoire_libelle }}</td>
																				<td width="15%" style="text-align: right;">+{{ $accessoire->accessoire->accessoire_prix }}€</td>
																				<td width="2%"></td>
																			</tr>
																			@endforeach
																			@endif
																			@if($reservations->reservation_promo != null)
																			<tr>
																				<td width="2%"></td>
																				<td width="81%" height="25">{{ $reservations->reservation_promo }}</td>
																				<td width="15%" style="text-align: right;"></td>
																				<td width="2%"></td>
																			</tr>
																			@endif
																			<tr>
																				<td width="2%" height="1"></td>
																				<td width="81%" height="1" style="border-top:1px solid #979797;"></td>
																				<td width="15%" height="1" style="border-top:1px solid #979797;"></td>
																				<td width="2%" height="1"></td>
																			</tr>
																			<tr style="color: #194F9A;">
																				<td width="2%"></td>
																				<td width="81%" height="40">Montant total</td>
																				<td width="15%" style="text-align: right;">{{ $reservations->reservation_montant_total }}€</td>
																				<td width="2%"></td>
																			</tr>
																		</tbody>
																	</table>

																</td>
																<td width="10%"></td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>


											<tr>
												<td width="100%" bgcolor="#fff">

													<table width="100%">
														<tbody>
															<tr>
																<td width="10%"></td>
																<td width="80%">
																	<p style="line-height: 130%;margin-bottom: 25px;">
																		Fin de la réservation
																	</p>
																</td>
																<td width="10%"></td>
															</tr>
														</tbody>
													</table>

												</td>
											</tr>

											@endforeach

											<tr>
												<td width="100%" bgcolor="#fff">

													<table width="100%">
														<tbody>
															<tr>
																<td width="10%"></td>
																<td width="80%">
																	<p style="line-height: 130%;margin-bottom: 25px;">
																		Merci pour votre achat et de la confiance que vous m’accordez.
																		<br><br>Grégoire de Bullao.
																	</p>
																</td>
																<td width="10%"></td>
															</tr>
														</tbody>
													</table>

												</td>
											</tr>
										</tbody>
									</table>

									<p style="color: #7D7D7D;text-align: center;margin-top: 35px;">©Copyright 2020 - Bullao</p>

								</td>
							</tr>
						</tbody>
					</table>

					<!-- end main block -->
				</td>
			</tr>
		</tbody>
	</table>

</body>
</html>
