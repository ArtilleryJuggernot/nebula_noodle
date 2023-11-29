
@include("includes.bandeau")

<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<head>
    <title>Détails de l'offre marché</title>
    <link rel="stylesheet" type="text/css" href="/css/offre_visualisation.css">
</head>
<body>

<div class="container">
    <h1>Détails de l'offre marché</h1>

    @if($transaction)
        <div class="details">
            <p class="detail-item">ID : {{ $transaction->ID }}</p>
            <p class="detail-item">Statut : {{ $transaction->Statut }}</p>
            <p class="detail-item">Date de création : {{ $transaction->DT_CREATION }}</p>
            @if($transaction->DT_END)
                <p class="detail-item">Date de fin : {{ $transaction->DT_END }}</p>
            @endif
            <p class="detail-item">Quantité d'item : {{ $transaction->ITEM_QT }}</p>
            <p class="detail-item">Item: {{ $transaction->item->LIBELLE }}</p>
            <p class="detail-item">Quantité de pièces : {{ $transaction->PIECE_QT }}</p>
            <p class="detail-item">Vendeur: {{ $transaction->vendeur->user->name }}</p>
            @if($transaction->USER2_ID)
                <p class="detail-item">ID de l'acheteur : {{ $transaction->USER2_ID }}</p>
            @endif
        </div>
    @else
        <p>Aucune transaction trouvée.</p>
    @endif
</div>

</body>
</html>


</body>
</html>

@include("includes.footer")
