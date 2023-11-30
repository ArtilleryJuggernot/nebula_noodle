@include("includes.bandeau")

<!DOCTYPE html>
<html>
<head>
    <title>Logs</title>
    <!-- Ajoutez ici vos liens CSS, scripts, etc. -->
</head>
<body>

<h1>Logs</h1>

<form action="{{ route('filter_logs') }}" method="GET">
    <label for="date_filter">Date récente :</label>
    <select name="date_filter" id="date_filter">
        <option value="1">Oui</option>
        <option value="0">Non</option>
    </select><br><br>

    <label for="user_id">ID de l'utilisateur :</label>
    <input type="text" name="user_id" id="user_id"><br><br>

    <label for="action_filter">Action :</label>
    <select name="action_filter" id="action_filter">
        <!-- Ajoutez ici les options dynamiquement depuis le contrôleur -->
        @foreach ($actions as $action)
            <option value="{{ $action->ACTION }}">{{ $action->ACTION }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Rechercher</button>
</form>

<!-- Affichage des logs filtrés -->
@if ($filteredLogs->isNotEmpty())
    <h2>Résultats de la recherche :</h2>
    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Utilisateur ID</th>
            <th>Action</th>
            <th>Contenu</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($filteredLogs as $log)
            <tr>
                <td>{{ $log->ID }}</td>
                <td>{{ $log->DATE }}</td>
                <td>{{ $log->USER_ID }}</td>
                <td>{{ $log->ACTION }}</td>
                <td>{{ $log->CONTENU }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Aucun résultat trouvé pour les filtres spécifiés.</p>
@endif


</body>
</html>

@include("includes.footer")
