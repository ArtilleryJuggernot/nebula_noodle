
@include("includes.bandeau")

<!DOCTYPE html>
<html>
<head>
    <title>Liste des transactions actives</title>
    <!-- Ajoutez ici vos liens CSS, scripts, etc. -->
</head>
<body>

<h1>Liste des transactions actives</h1>


@if(session('success'))
    <h2>{{session('success')}}</h2>
@endif


@if(session('error'))
    <h2>{{session('error')}}</h2>
@endif

@if($transactions->isEmpty())
    <p>Aucune transaction active pour le moment.</p>
@else
    <ul>
        @foreach ($transactions as $transaction)
            <li>
                <div class="details">
                    <p class="detail-item">ID de la Vente : {{ $transaction->ID }}</p>
                    <p class="detail-item">Statut : {{ $transaction->Statut }}</p>
                    <p class="detail-item">Date de création : {{ $transaction->DT_CREATION }}</p>
                    <p class="detail-item">Quantité d'item : {{ $transaction->ITEM_QT }}</p>
                    <p class="detail-item">Item: {{ $transaction->item->LIBELLE }}</p>
                    <p class="detail-item">Quantité de pièces : {{ $transaction->PIECE_QT }}</p>
                    <p class="detail-item">Vendeur: {{ $transaction->vendeur->user->name }}</p>

                <!-- Vérification du joueur actuel et affichage approprié -->
                @if($transaction->USER1_ID !== Auth::id())
                    <!-- Vérification des fonds suffisants du joueur actuel -->
                    @if($transaction->PIECE_QT <= Auth::user()->joueur->COINS)
                        <!-- Bouton "Accepter la transaction" -->
                        <form method="post" action="{{ route('confirm_transaction', ['ID' => $transaction->ID]) }}">
                            @csrf
                            <button type="submit">Accepter la transaction</button>
                        </form>
                    @else
                        <!-- Bouton désactivé avec le message "Fonds insuffisants" -->
                        <button disabled>Fonds insuffisants</button>
                    @endif
                @else
                    <p>Vous ne pouvez pas échanger avec vous-même.</p>
                @endif
            </li>
        @endforeach
    </ul>

    <!-- Affichage de la pagination -->
    {{ $transactions->links() }}
@endif

</body>
</html>

@include("includes.footer")
