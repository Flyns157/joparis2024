<html>
<head>
    <title>Liste des sports</title>
    <style>
        * {
            text-align: center;
        }
        table {
            border: 1;
        }
        th {
            background: darkgray;
            color: white;
        }
        td {
            background: lightgrey;
        }
    </style>
</head>
<body>
<h2>La liste des sports</h2>

@if(!empty($sports))
<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Année d'ajout</th>
        <th>Nombre de disciplines</th>
        <th>Nombre d'épreuves</th>
        <th>Date de début</th>
        <th>Date de fin</th>
    </tr>
    @foreach($sports as $sport)
    <tr>
        <td>{{$sport['nom']}}</td>
        <td>{{$sport['description']}}</td>
        <td>{{$sport['annee_ajout']}}</td>
        <td>{{$sport['nb_disciplines']}}</td>
        <td>{{$sport['nb_epreuves']}}</td>
        <td>{{$sport['date_debut']->format("D M Y")}}</td>
        <td>{{$sport['date_fin']->format("D M Y")}}</td>
    </tr>
    @endforeach
</table>
@else
<h3>Aucun sport</h3>
@endif

</body>
</html>
