<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    // Affiche la liste des plaintes
    public function index()
    {
        $complaints = Complaint::simplePaginate(5); // Récupère les plaintes avec les statuts
        $status = Status::all(); // Récupère les plaintes avec les statuts
        return view('complaints.index', compact('complaints','status'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $status = Status::all(); // Récupère tous les statuts
        return view('complaints.create', compact('status'));
    }

    // Enregistre une nouvelle plainte
    public function store(Request $request)
    {
        $validated = $request->validate([
            'complainant' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'status_id' => 'required|exists:status,id',
        ]);
  
        Complaint::create([
            'user_id' => Auth::user()->id,
            'complainant' => $validated['complainant'],
            'subject' => $validated['subject'],
            'description' => $validated['description'],
            'status_id' => $validated['status_id'],
        ]);

        return redirect()->route('complaints.index')->with('success', 'Plainte ajoutée avec succès !');
    }

    // Affiche une plainte spécifique
    public function show(Complaint $complaint)
    {
        return view('complaints.show', compact('complaint'));
    }

    // Affiche le formulaire de modification
    public function edit(Complaint $complaint)
    {
        $status = Status::all();
        return view('complaints.edit', compact('complaint', 'status'));
    }

    // Met à jour une plainte existante
    public function update(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'complainant' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'status_id' => 'required|exists:status,id',
        ]);

        
        $complaint->update([
            'user_id' => Auth::user()->id,
            'complainant' => $validated['complainant'],
            'subject' => $validated['subject'],
            'description' => $validated['description'],
            'status_id' => $validated['status_id'],
        ]);

        return redirect()->route('complaints.index')->with('success', 'Plainte mise à jour avec succès !');
    }

    // Supprime une plainte
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return redirect()->route('complaints.index')->with('success', 'Plainte supprimée avec succès !');
    }
}