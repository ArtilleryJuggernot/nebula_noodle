<h1>Bienvenue {{Auth::user()->name}} sur Nebula Noodle !!!!</h1>


<h2>Statut</h2>

<h3>Nombre de pièce : {{Auth::user()->joueur->COINS}}</h3>

<h3>Grade : {{Auth::user()->joueur->GRADE}}</h3>

