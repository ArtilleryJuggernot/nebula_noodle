@include("includes.bandeau")

<ul>

    @if(session('success'))
        <h2>{{session('success')}}</h2>
    @endif

        @if(session('error'))
            <h2>{{session('error')}}</h2>
        @endif

@foreach($mesVentes as $transaction)
    <li>
        <div class="details">
            <p class="detail-item">ID de la Vente : {{ $transaction->ID }}</p>
            <p class="detail-item">Statut : {{ $transaction->Statut }}</p>
            <p class="detail-item">Date de création : {{ $transaction->DT_CREATION }}</p>
            @if($transaction->DT_END)
                <p class="detail-item">Date de fin : {{ $transaction->DT_END }}</p>
            @endif
            <p class="detail-item">Quantité d'item : {{ $transaction->ITEM_QT }}</p>
            <p class="detail-item">Item: {{ $transaction->item->LIBELLE }}</p>
            <p class="detail-item">Quantité de pièces : {{ $transaction->PIECE_QT }}</p>
            <p class="detail-item">Vendeur : <a href="{{ route('profile', ['ID' => $transaction->vendeur->ID]) }}">{{ $transaction->vendeur->user->name }}</a></p>
            @if($transaction->acheteur)
                <p class="detail-item">Acheteur : <a href="{{ route('profile', ['ID' => $transaction->acheteur->ID]) }}">{{ $transaction->acheteur->user->name }}</a></p>

            @endif
            @if($transaction->Statut === 'En cours')
                <form action="{{ route('confirmation_annulation', ['ID' => $transaction->ID]) }}" method="GET">
                    @csrf
                    <button type="submit">Annuler</button>
                </form>
            @endif
        </div>
    </li>

@endforeach
</ul>
{{ $mesVentes->links() }} <!-- Afficher la pagination -->

@include("includes.footer")
