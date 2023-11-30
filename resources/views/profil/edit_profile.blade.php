@include("includes.bandeau")
<head>
    <link rel="stylesheet" href="/css/edit_profil.css">
</head>

<form method="POST" action="{{ route('updateProfile') }}">
    @csrf

    <label for="username">Nom d'utilisateur</label>
    <input type="text" id="username" name="username" value="{{ Auth::user()->name }}" required>

    <label for="grade">Grade</label>
    <textarea id="grade" name="grade">{{ $joueur->GRADE }}</textarea>

    <button type="submit">Enregistrer les modifications</button>
</form>

<form method="POST" action="{{ route('updatePassword') }}">
    @csrf

    <label for="old_password">Ancien mot de passe</label>
    <input type="password" id="old_password" name="old_password">

    <label for="new_password">Nouveau mot de passe</label>
    <input type="password" id="new_password" name="new_password">

    <label for="new_password_confirmation">Confirmer le nouveau mot de passe</label>
    <input type="password" id="new_password_confirmation" name="new_password_confirmation">

    <button type="submit">Changer le mot de passe</button>
</form>

@include("includes.footer")
