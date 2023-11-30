<!-- confirmation_annulation.blade.php -->

<h2>Voulez-vous annuler la vente ?</h2>
<p class="detail-item">ID de la Vente : {{ $vente->ID }}</p>
<p class="detail-item">Statut : {{ $vente->Statut }}</p>
<p class="detail-item">Date de création : {{ $vente->DT_CREATION }}</p>
@if($vente->DT_END)
    <p class="detail-item">Date de fin : {{ $vente->DT_END }}</p>
@endif
<p class="detail-item">Quantité d'item : {{ $vente->ITEM_QT }}</p>
<p class="detail-item">Item: {{ $vente->item->LIBELLE }}</p>
<p class="detail-item">Quantité de pièces : {{ $vente->PIECE_QT }}</p>
<p class="detail-item">Vendeur : <a href="{{ route('profile', ['ID' => $vente->vendeur->ID]) }}">{{ $vente->vendeur->user->name }}</a></p>
<!-- Afficher d'autres détails de la vente -->

<form action="{{ route('annuler_vente', ['ID' => $vente->ID]) }}" method="POST">
    @csrf
    <button type="submit">Oui</button>
</form>
<a href="{{ route('mes_ventes') }}">Non</a>
