<x-layout :title="$title">
    <div class="text-center" style="margin-top: 2rem">
        <hr class="mt-2 mb-2">
    </div>
    <div>
        {{-- la date d'expiration --}}
        <p><strong>Date d'expiration : </strong>{{$tache->expiration}}</p>
    </div>
    <div>
        {{-- la catégorie --}}
        <p><strong>Catégorie : </strong>{{$tache->categorie}}</p>
    </div>
    <div>
        <p><strong>Effectuée ? </strong>
            @if($tache->effectuee == 1)
            Oui
            @else
            Non
            @endif
        </p>
    </div>
    <div>
        <p><strong>Description :</strong>{{ $tache->description}}</p>
    </div>

    <form action="{{route('taches.destroy',$tache->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="text-center">
            <button type="submit" name="delete" value="valide">Vous voulez supprimer la tache ?</button>
        </div>
    </form>
    <div>
        <a href="{{route('taches.index')}}">Retour à la liste</a>
    </div>
</x-layout>
