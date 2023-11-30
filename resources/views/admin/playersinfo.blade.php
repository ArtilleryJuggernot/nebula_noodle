@include("includes.bandeau")


    <!DOCTYPE html>
<html>
<head>
    <title>Liste des joueurs</title>
    <!-- Ajoutez ici vos liens CSS, scripts, etc. -->
</head>
<body>


@if(session('success'))
    <h2>{{session('success')}}</h2>
@endif


@if(session('error'))
    <h2>{{session('error')}}</h2>
@endif

<h1>Liste des joueurs</h1>

@if ($players)
    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom d'utilisateur</th>
            <th>Grade</th>
            <th>Statut Actuel</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)
            <tr>
                <td>{{ $player->ID }}</td>
                <td>{{ $player->user->name }}</td>
                <td>{{ $player->GRADE }}</td>

                <td>@if($player->user->is_ban)
                        Bannis
                    @else
                        Non-bannis
                    @endif
                </td>
                <td>
                    <form method="POST" action="{{ route('banPlayer', ['id' => $player->ID]) }}">
                        @csrf
                        @if ($player->user->is_ban)
                            <button type="submit">Débannir</button>
                        @else
                            <button type="submit">Bannir</button>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Aucun joueur trouvé.</p>
@endif

</body>
</html>

@include("includes.footer")
