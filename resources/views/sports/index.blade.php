<x-layout title="Liste des sports">
<a href="{{route('sports.create')}}">Création de sport</a>
<h2>
    <x-MessageInfo title="Résultat de recherche" :message="count($sports)"/>
    @if($nb_epreuves !== 'all')
        <a class="bold" href="{{route('sports.index')}}">Reinitialiser la recherche</a>
    @endif
    <form id="form" action="{{route('sports.index')}}"\>
        <input type="text" name="sport"/>
        <input type="submit" value="recherche">
        <input type="number" name="nb_epreuves" onchange="submitForm(this);return false;">
        <select name="sort" onchange="submitForm(this);">
            <option @if($sort === "asc")selected="selected" @endif value="asc">tri par nom asc</option>
            <option @if($sort === "desc")selected="selected" @endif value="desc">tri par nom desc</option>
        </select>
        @if(isset($search))
            <a href="{{route('sports.index')}}">Reset search</a>
        @endif
    </form>

</h2>

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

<script>
        function submitForm(){

            const form = document.getElementById('form');
            let nb_epreuves = form.elements["nb_epreuves"].value;
            if(form.elements["nb_epreuves"].value === ""){
                nb_epreuves = 'all';
            }
            const sort = form.elements["sort"].value;
            document.location.href="/sports?nb_epreuves="+form.elements["nb_epreuves"].value+"&sort="+sort;
        }
    </script>
</x-layout>
