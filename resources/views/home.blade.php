<h1>Bienvenue {{Auth::user()->name}} sur Nebula Noodle !!!!</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nebula Noodle Accueil</title>
    <link rel="stylesheet" href="/css/player.css">
</head>
<body>

@include("includes.bandeau")

@if(session('error'))
    <h2>{{session('error')}}</h2>
@endif

@include("includes.playerinfo")


@include("includes.footer")

</body>
</html>


<style>

</style>
