<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Nouvelle réservation</title>
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
														<img src="https://www.bullao.fr/medias/img/logos/logo-blanc.png" alt="Logo Bullao" width="180">
													</a>
												</td>
											</tr>
											<tr>
												<td width="100%" bgcolor="#fff" style="text-align: center;">
													<h1 style="color: #194F9A;font-size: 1.4rem;font-weight: lighter;margin: 25px 0;">Validation de votre carte</h1>
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
																		Bonjour,
																		<br>Nous avons le plaisir de valider l'achat de votre carte cadeau sur le site bullao.fr.
																		<br><br>La carte cadeau sera expédiée rapidement et vous recevrez cette carte d'ici 7 à 10 jours maximum.
																		<br><br>Pour utiliser la carte cadeau, rien de plus simple. Inscrivez le code ci-dessous au même endroit pour utiliser un code promo quand vous finalisez votre commande.
																		<br><br><b>Informations de la carte cadeau :</b>
																		<br>{{ $carte->cadeau_offre }} : {{ $carte->cadeau_montant }}€
																		<br>Email de l'acquereur : {{ $carte->clientPaiement->client_email }}
																		<br>Code cadeau : {{ $carte->cadeau_code }}
																		<br>Valable du {{ $carte->DateDebut->format('d/m/Y') }} au {{ $carte->DateFin->format('d/m/Y') }}
																		<br><br><b>Adresse de livraison</b>
																		<br>{{ $carte->cadeau_rue }}
																		<br>{{ $carte->cadeau_ville }} {{ $carte->cadeau_departement }}																	</p>
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
