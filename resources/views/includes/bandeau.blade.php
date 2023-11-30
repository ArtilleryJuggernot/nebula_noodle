<head>
    <link rel="stylesheet" href="/css/bandeau.css">
</head>

 <div class="header">
        <!-- Logo du jeu -->
        <div class="logo">
            <!-- Insérer le logo du jeu -->
            <a href="{{route('home')}}"> <img src="/img/NN_logo.png" alt="Logo du jeu"> </a>
        </div>

        <!-- Informations de l'utilisateur -->
        <div class="user-info">
            @if(Auth::user()->joueur->isAdmin())
                <!-- Si l'utilisateur est administrateur -->
                (Admininistrateur) Bienvenue {{ Auth::user()->name }} sur Nebula Noodle !
            @else
                <!-- Si l'utilisateur est un joueur -->
                Bienvenue {{ Auth::user()->name }} sur Nebula Noodle !
            @endif
        </div>

        <!-- Barre de navigation -->
        <nav class="navbar">
            <ul>
                <li>
                    <a href="{{ route('home') }}">Accueil</a>
                    <ul class="submenu">
                        <li><a href="{{ route('info_nebula') }}">Nebula Noodle c'est quoi ?</a></li>
                        <li><a href="{{ route('mises-a-jour')}}">Mis à jour</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('boutique') }}">Boutique</a>
                    <ul class="submenu">
                    </ul>
                </li>
                <li>
                    <a href="{{ route("marche") }}">Marché</a>
                    <ul class="submenu">
                        <li><a href="{{ route('ajouter_transaction') }}">Nouvelle vente</a></li>
                        <li><a href="{{ route('mes_ventes') }}">Gérer mes ventes</a></li>
                        <li><a href="{{route("ventes_terminees")}}">Ventes terminé</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('profile', ['ID' => Auth::user()->joueur->ID]) }}">Mon profil</a>
                    <ul class="submenu">
                        <li><a href="{{route('home')}}">Changer mes informations</a></li>
                        <li><a href="{{ route('home') }}">A propos</a></li>
                    </ul>
                </li>
                @if(Auth::user()->joueur->isAdmin())
                    <!-- Si l'utilisateur est administrateur -->
                    <li>
                        <a href="#">Administration</a>
                        <ul class="submenu">
                            <li><a href="{{ route('home') }}">Gestion des logs</a></li>
                            <li><a href="{{ route('home') }}">Gestion des utilisateurs</a></li>
                        </ul>
                    </li>
                @endif
                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Se déconnecter
                    </a></li>


                <!-- Utilisation d'un lien JavaScript pour appeler une fonction lors du clic -->




            </ul>
        </nav>
    </div>
<!-- Formulaire caché pour effectuer la déconnexion via une requête POST -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf <!-- Utilisation du jeton CSRF pour la sécurité -->
</form>
