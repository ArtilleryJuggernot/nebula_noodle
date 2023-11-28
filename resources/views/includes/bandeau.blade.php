<head>
    <link rel="stylesheet" href="/css/bandeau.css">
</head>

 <div class="header">
        <!-- Logo du jeu -->
        <div class="logo">
            <!-- Insérer le logo du jeu -->
            <img src="/img/NN_logo.png" alt="Logo du jeu">
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
                    <a href="#">Accueil</a>
                    <ul class="submenu">
                        <li><a href="{{ route('home') }}">Nebula Noodle c'est quoi ?</a></li>
                        <li><a href="{{ route('mises-a-jour')}}">Mis à jour</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Boutique</a>
                    <ul class="submenu">
                        <li><a href="{{ route('home') }}">Acheter un item</a></li>
                        <li><a href="{{ route('home')}}">Acheter un sort</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Marché</a>
                    <ul class="submenu">
                        <li><a href="{{ route('home') }}">Vendre un item</a></li>
                        <li><a href="{{ route('home') }}">Retirer une vente</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Mon profil</a>
                    <ul class="submenu">
                        <li><a href="{{ route('home') }}">Changer mes informations</a></li>
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
                <li><a href="{{ route('home') }}">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>