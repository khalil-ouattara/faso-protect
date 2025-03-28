<div x-data="{ open: true }" x-on:keydown.esc.prevent="open = false">
    <div class="" x-show="open">
        <div class="modal modal-blur show fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true"
            style="display: block">
            <span></span>
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Utilisateur</h5>
                        <button type="button" class="btn-close" id="btn" iddata-bs-dismiss="modal"
                            aria-label="Close" data-bs-target="modal-edit"
                            x-on:click="()=>{open  = false; $wire.close()}"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="save">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" wire:model="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" wire:model="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" wire:model="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Rôle</label>
                                <select class="form-control" id="role" wire:model="role">
                                    <option value="">Sélectionner un rôle</option>
                                    <option value="admin">Administrateur</option>
                                    <option value="user">Utilisateur</option>
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Satut</label>
                                <select class="form-control" id="role" wire:model="status">
                                    <option value="">Sélectionner un rôle</option>
                                    <option value="actif">Actif</option>
                                    <option value="inactif">Inactif</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="Titre" wire:model="title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal"
                                    x-on:click="()=>{open  = false; $wire.close()}">
                                    Cancel
                                </a>
                                <button class="btn btn-primary ms-auto" type="submit" wire:loading.attr='disabled'
                                    wire:click="save">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Add
                                </button>
                                <div class="" wire:loading>Chargement......</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



{{-- <td colspan="7">
    <form action="" wire:submit.prevent='save'>
        <div class="" wire:loading>Chargement</div>
        <div class="">
            <label for="name">Name</label>
            <div class="">
                <input type="text" wire:model.defer='userName' class="form-control">
            </div>
            <div class="">
                @error('userName')
                    <span class="alert alert-danger">{{$message}}</span>
                @enderror
            </div>

        </div>
        <div class="">
            <button class="btn btn-primary" type="submit" wire:loading.attr='disabled'>Sauvegarder</button>
        </div>
    </form>

</td> --}}
