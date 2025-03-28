@extends('layouts.app')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Détails de l'utilisateur
            </h2>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <ul>
                            <li><strong>ID :</strong> {{ $user->id }}</li>
                            <li><strong>Nom :</strong> {{ $user->name }}</li>
                            <li><strong>Email :</strong> {{ $user->email }}</li>
                            <li><strong>Role :</strong> @switch($user->role_id)
                                    @case(1)
                                        Admin
                                    @break

                                    @default
                                        Agent
                                @endswitch
                            </li>
                            <li><strong>Site vérifiés :</strong> {{ $user->websites }}</li>
                            <li><strong>Plaintes :</strong> {{ $user->complaints }}</li>
                        </ul>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour</a>

                    </div>

                </div>

            </div>

        </div>
    </main>
@endsection
