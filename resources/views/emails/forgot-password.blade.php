<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>[{{ env('APP_NAME') }}] Nouveau mot de passe</title>
	</head>
	<body>
		<h1>Bonjour {{ $infos['firstname'] }},</h1>
		<p>
			Une demande de nouveau mot de passe vient d'être faite pour votre compte.
			<br>
			Voici donc vos identifiants de connexion avec votre nouveau mot de passe :
			<br>
			<ul>
				<li>
					Identifiant : <code>{{ $infos['login'] }}</code>
				</li>
				<li>
					Mot de passe : <code>{{ $infos['password'] }}</code>
				</li>
			</ul>
		</p>
		<p>
			Si vous n'êtes pas à l'origine de cette demande, changez immédiatement votre mot de passe pour plus de sécurité. 
			N'oubliez pas que pour vous connecter à votre compte, le mot de passe est celui indiqué ci-dessus. Nous vous invitons donc à le modifier une fois connecté.
		</p>
	</body>
</html>
