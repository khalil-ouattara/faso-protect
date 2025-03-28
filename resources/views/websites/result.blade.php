@extends('layouts.app')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Résultats de la recherche
            </h2>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                        @if (isset($info))
                            <p><strong>Nom de domaine :</strong> {{ $info->domainName ?? 'Non disponible' }}</p>
                            <p><strong>Date de création :</strong>
                                {{ date('Y-m-d', $info->creationDate) ?? 'Non disponible' }}</p>
                            <p><strong>Date d'expiration :</strong>
                                {{ date('Y-m-d', $info->expirationDate) ?? 'Non disponible' }}</p>
                            <p><strong>Proprietaire :</strong> {{ $info->owner ?? 'Non disponible' }}</p>
                            <p><strong>Hébergeur :</strong> {{ $info->registrar ?? 'Non disponible' }}</p>
                            <p><strong>Données brutes :</strong> {{ $rawData->text ?? 'Non disponible' }}</p>
                        @else
                            <p class="text-red-500">Aucune donnée disponible.</p>
                        @endif
                    </div>

                </div>
                <a href="{{ route('websites.index') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4 inline-block">
                    Rechercher un autre domaine
                </a>
            </div>

        </div>
    </main>
@endsection
