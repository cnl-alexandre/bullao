<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contact</title>
	</head>
	<body>
		<h1>Bonjour Mylène</h1>
		<p>
			Un nouveau message est arrivé depuis le site web. Voici les informations de celui-ci :
		</p>
		<ul>
			<li>Nom : {{ $infos['name'] }}</li>
			@if($infos['type'] == 'phone')
				<li>Téléphone : {{ $infos['phone'] }}</li>
			@elseif($infos['type'] == 'email')
				<li>Email : {{ $infos['email'] }}</li>
			@endif
			<li>Message : {{ $infos['note'] }}</li>
		</ul>
	</body>
</html>
