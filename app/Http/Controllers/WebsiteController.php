<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    // Afficher la liste des sites web
    public function index()
    {
        $websites = Website::simplePaginate(5); // Récupérer tous les enregistrements
        return view('websites.index', compact('websites'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('websites.create');
    }

    // Enregistrer un nouveau site web
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'domain_name' => 'required|string|max:255',
            'registrar' => 'nullable|string|max:255',
            'registrant_email' => 'nullable|email|max:255',
            'registrant_phone' => 'nullable|string|max:255',
            'registrant_country' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'creation_date' => 'nullable|date',
            'expiration_date' => 'nullable|date',
        ]);

        Website::create($validated);

        return redirect()->route('websites.index')->with('success', 'Site web ajouté avec succès !');
    }

    // Afficher un site web spécifique
    public function show(Website $website)
    {
        return view('websites.show', compact('website'));
    }

    // Afficher le formulaire d'édition
    public function edit(Website $website)
    {
        return view('websites.edit', compact('website'));
    }

    // Mettre à jour un site web existant
    public function update(Request $request, Website $website)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'domain_name' => 'required|string|max:255',
            'registrar' => 'nullable|string|max:255',
            'registrant_email' => 'nullable|email|max:255',
            'registrant_phone' => 'nullable|string|max:255',
            'registrant_country' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'creation_date' => 'nullable|date',
            'expiration_date' => 'nullable|date',
        ]);

        $website->update($validated);

        return redirect()->route('websites.index')->with('success', 'Site web mis à jour avec succès !');
    }

    // Supprimer un site web
    public function destroy(Website $website)
    {
        $website->delete();

        return redirect()->route('websites.index')->with('success', 'Site web supprimé avec succès !');
    }
}