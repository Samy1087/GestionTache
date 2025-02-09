<?php

namespace App\Http\Controllers;

use App\Models\tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
        $taches = Tache::all(); // Récupérer toutes les tâches
        return view('index', compact('taches'));
    }

    // Ajouter une tâche
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'action' => 'required'
        ]);

        // Créer la tâche
        Tache::create($request->all());

        // Rediriger avec un message
        return redirect('/taches')->with('success', 'Tâche ajoutée avec succès!');
    }

    // Modifier une tâche
    public function edit($id)
    {
        $tache = Tache::find($id); // Trouver la tâche par ID

        // Si la tâche n'est pas trouvée
        if (!$tache) {
            return redirect('/taches')->with('error', 'Tâche non trouvée!');
        }

        return view('tache.modifier', compact('tache'));
    }

    // Mettre à jour une tâche
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'action' => 'required'
        ]);

        // Trouver la tâche à mettre à jour
        $tache = Tache::find($id);

        if (!$tache) {
            return redirect('/taches')->with('error', 'Tâche non trouvée!');
        }

        // Mettre à jour la tâche
        $tache->update($request->all());

        return redirect('/taches')->with('success', 'Tâche modifiée avec succès!');
    }

    // Supprimer une tâche
    public function destroy($id)
    {
        $tache = Tache::find($id); // Trouver la tâche par ID

        if (!$tache) {
            return redirect('/taches')->with('error', 'Tâche non trouvée!');
        }

        // Supprimer la tâche
        $tache->delete();

        return redirect('/taches')->with('success', 'Tâche supprimée avec succès!');
    }
}
