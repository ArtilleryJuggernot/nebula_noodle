@include("includes.bandeau")

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marché - Échange d'Items</title>
</head>
<body>

@if(session('error'))
    <h2>{{session('error')}}</h2>
@endif

<h1>Marché - Échange d'Items</h1>
<form action="/traitement_transaction" method="post">
    @csrf <!-- Ajoute un jeton CSRF pour la protection contre les attaques CSRF -->

    <!-- Champ de sélection des items du joueur -->
    <label for="items">Sélectionnez un item :</label>
    <select name="item" id="items">
        <!-- Options pour chaque item du joueur -->
        @foreach($itemsDuJoueur as $item)
            <option name="item" value="{{ $item->ID }}">{{ $item->LIBELLE }}</option>
        @endforeach
    </select>

    <!-- Champ pour la quantité de l'item-->
    <label for="quantity">Quantité :</label>
    <input type="number" id="quantity" name="quantity" min="1" max="2000000000">

    <!-- Champ pour la quantité -->
    <label for="price">Prix :</label>
    <input type="number" id="price" name="price" min="1" max="2000000000">



    <!-- Bouton de soumission -->
    <button type="submit">Valider l'échange</button>
</form>
</body>
</html>

@include("includes.footer")
