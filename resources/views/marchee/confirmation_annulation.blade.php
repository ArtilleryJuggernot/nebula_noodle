<!-- confirmation_annulation.blade.php -->

<h2>Voulez-vous annuler la vente ?</h2>
<p>ID: {{ $vente->ID }}</p>
<!-- Afficher d'autres détails de la vente -->

<form action="{{ route('annuler_vente', ['ID' => $vente->ID]) }}" method="POST">
    @csrf
    <button type="submit">Oui</button>
</form>
<a href="{{ route('mes_ventes') }}">Non</a>
