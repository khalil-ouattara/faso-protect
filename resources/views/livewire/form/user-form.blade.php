<div>
    <form wire:submit.prevent="submitForm">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" wire:model="password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select class="form-control" id="role" wire:model="role">
                <option value="">Sélectionner un rôle</option>
                <option value="admin">Administrateur</option>
                <option value="user">Utilisateur</option>
                </select>
            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>

        @if (session()->has('success'))
            <div class="mt-3 alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>
