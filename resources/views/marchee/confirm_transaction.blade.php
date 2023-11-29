<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de la transaction</title>
    <!-- Ajoutez ici vos liens CSS, scripts, etc. -->
</head>
<body>

<h1>Confirmation de la transaction</h1>

@if($transaction)
    <p>Voulez-vous accepter la transaction suivante ?</p>
    <p>Item: {{ \App\Models\Item::find($transaction->ITEM_ID)->LIBELLE }}</p>
    <p>Quantité : {{ $transaction->ITEM_QT }}</p>
    <p>Prix : {{ $transaction->PIECE_QT }}</p>

    <form method="POST" action="{{ route('transaction_complete', ['ID' => $transaction->ID]) }}">
        @csrf
        <button type="submit" name="confirm" value="yes">Oui</button>
       <a href="route('market') }}"> <button type="submit" name="cancel" value="no">Annuler</button></a>
    </form>


@else
    <p>Aucune transaction trouvée.</p>
@endif

</body>
</html>
