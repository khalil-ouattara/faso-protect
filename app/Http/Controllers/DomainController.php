<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; // Pour les requêtes API
use Iodev\Whois\Factory;
class DomainController extends Controller
{
    // Afficher le formulaire
    public function showForm()
    {
        return view('domain.search');
    }

    // Rechercher des informations via l'API
    public function search(Request $request)
    {
        $validated = $request->validate([
            'link' => 'required', // Validation : le paramètre doit être une URL valide
        ]);
        
        $domain = $validated['link'];
       
        $whois = Factory::get()->createWhois();
        $rawData = $whois->lookupDomain($domain);

        $info = $whois->loadDomainInfo($domain);

     
        // Vérifiez si la requête a réussi
        if ($info) {
            Website::create([
                'user_id'=> Auth::user()->id,
                'domain_name' =>  $info->domainName,
                'registrar' => $info->registrar,
                'creation_date' => date('Y-m-d',$info->creationDate),
                'expiration_date' => date('Y-m-d',$info->expirationDate),
            ]);
    
            // Analyse de la réponse JSON
            return view('websites.result', compact('info', 'rawData')); // Passer les données à la vue
        }

        return redirect()->back()->with('error', 'Impossible de récupérer les données. Vérifiez le lien ou réessayez.');
    }
}