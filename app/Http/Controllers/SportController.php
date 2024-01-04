<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class SportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('sport', null);
        $sort = $request->query('sort', 'asc');
        $nb_epreuves = $request->query('nb_epreuves', 'all');
        if($nb_epreuves !== 'all'){
            $sports = Sport::where('nb_epreuves', '=', $nb_epreuves);
        }else{
            $sports = Sport::query();
        }
        if (isset($search))
        {
            $sports = $sports->where('nom', 'LIKE', '%'.$search.'%');
        }
        $sports = $sports->get();
        if($sort === 'asc'){
            $sports = $sports->sortByDesc('date_debut');
        }else{
            $sports = $sports->sortBy('date_debut');
        }
        return view('sports.index', [
            'sports' => $sports,
            'title' => 'Liste des sports',
            'sort' => $sort,
            'nb_epreuves' => $nb_epreuves,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sports.create', ['title' => 'Création d\'un sport',]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'date_debut' => 'required',
                'categorie' => 'required',
                'description' => 'required',
            ]
        );

        // A partir d'ici le code est exécuté uniquement si les données sont validaées
        // par la méthode validate()
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $sport = new Sport();

        $sport->date_debut = $request->date_debut;
        $sport->categorie = $request->categorie;
        $sport->description = $request->description;
        if (isset($request->effectuee) && $request->effectuee == "on")
            $sport->effectuee = 1;
        else
            $sport->effectuee = 0;

        // insertion de l'enregistrement dans la base de données
        $sport->save();

        // redirection vers la page qui affiche la liste des tâches
        return redirect()->route('sports.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $nom) {
        $action = $request->query('action', 'show');
        $sport = Sport::find($nom);

        return view('sports.show', ['sport' => $sport, 'action' => $action, 'title' => 'Visualisation de la sport']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nom)
    {
        $sport = Sport::find($nom);
        return view('sports.edit', ['sport' => $sport, 'title' => 'Edition d\'une sport']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nom)
    {
        $sport = Sport::find($nom);

        $this->validate(
            $request,
            [
                'date_debut' => 'required',
                'categorie' => 'required',
                'description' => 'required',
            ]
        );
        $sport->date_debut = $request->date_debut;
        $sport->categorie = $request->categorie;
        $sport->description = $request->description;
        if (isset($request->effectuee) && $request->effectuee == "on")
            $sport->effectuee = 1;
        else
            $sport->effectuee = 0;
        $sport->save();

        return redirect()->route('sports.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $nom) {
        if ($request->delete == 'valide') {
            $sport = Sport::find($nom);
            $sport->delete();
        }
        return redirect()->route('sports.index');
    }
}
