<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>email</title>
</head>
<body>
    <h1>Création de compte d'utilisateur</h1>
    <h5>Bienvenue {{$contactinfo['name']}} sur BookStore</h5>
    <ul>
        <li><strong> email : </strong> {{$contactinfo['email']}}</li>
        <li><strong> mot de passe : </strong> {{$contactinfo['password']}}</li>
    </ul>
</body>
</html>