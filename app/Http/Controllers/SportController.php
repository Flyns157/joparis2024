<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class SportController extends Controller
{
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

}
