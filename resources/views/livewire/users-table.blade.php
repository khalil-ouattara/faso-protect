<div x-data="{
    selectAll: false,
    selected: [],
    users: @json($userIds),
    toggleSelectAll() {
        this.selectAll = !this.selectAll;
        this.selected = this.selectAll ? this.users : [];
    },
    updateSelectAll() {
        this.selectAll = (this.selected.length === this.users.length);
    },
    toggleSelectOne(userId) {
        if (this.selected.includes(userId)) {
            this.selected = this.selected.filter(id => id !== userId);
        } else {
            this.selected.push(userId);
        }
        this.updateSelectAll();
    }
}">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-3 page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Utilisateurs
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="#" class="btn">
                                Importer
                            </a>
                        </span>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#addModal">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Ajouter
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:form.add-user />
    <div class="card">
        <h2 x-html="selected"></h2>
        <div class="card-header">
            <div class="d-md-flex w-100 align-items-center">
                <h3 class="pe-2 flex-grow-1">Liste des utilisateurs</h3>
                <div class="pe-2" x-cloak x-show="selected.length > 0" x-transition.delay.500ms>
                    <button class="btn btn-danger"
                        x-on:click="()=>{$wire.deleteUsers(selected); selectAll = false; selected=[]; updateSelectAll()}">
                        Supprimer
                    </button>
                    <div class="btn btn-primary d-sm-inline-block dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-third" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span
                                class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Exporter
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <button class="dropdown-item"
                                x-on:click="()=>{$wire.export('xlsx',selected); selectAll = false; selected=[]}">XLSX</button>
                            <button class="dropdown-item"
                                x-on:click="()=>{$wire.export('csv',selected); selectAll = false; selected=[]}">CSV</button>
                            <button class="dropdown-item"
                                x-on:click="()=>{$wire.export('pdf',selected); selectAll = false; selected=[]}">PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3 card-body border-bottom">
            <div class="d-flex">
                <div class="text-muted">
                    <div class="mx-2 d-inline-block">
                        <label class="text-muted" for="showNumber">Entrées par page:</label>
                        <select id="showNumber" wire:model.live="showNumber">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
                <div class="ms-auto text-muted">
                    Search:
                    <div class="ms-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" aria-label="Search invoice"
                            wire:model.live="search">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <div wire:loading>Chargement</div>
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-1"><input class="m-0 align-middle form-check-input" type="checkbox"
                                id="selectAll" x-model="selectAll" @click="toggleSelectAll()"
                                aria-label="Select all invoices"></th>
                        <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 15l6 -6l6 6" />
                            </svg>
                        </th>
                        <th>1</th>
                        <th>1</th>
                        <th>1</th>
                        <th>1</th>
                        <th>1</th>
                        {{-- <x-table-header :direction="$orderDirection" name="name" :field="$orderField">Name</x-table-header>
                        <x-table-header :direction="$orderDirection" name="title" :field="$orderField">Title</x-table-header>
                        <x-table-header :direction="$orderDirection" name="status" :field="$orderField">Status</x-table-header>
                        <x-table-header :direction="$orderDirection" name="role" :field="$orderField">Role</x-table-header> --}}
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <input class="m-0 align-middle form-check-input checkOne" type="checkbox"
                                    aria-label="Select invoice" value="{{ $user->id }}"
                                    :checked='selected.includes({{ $user->id }})'
                                    x-on:click="toggleSelectOne({{ $user->id }})">
                            </td>
                            <td><span class="text-muted">
                                    {{ $user->id }}</span></td>
                            <td><a href="invoice.html" class="text-reset" tabindex="-1">
                                    {{ $user->name }}</a></td>
                            <td>
                                <span class="flag flag-country-pl"></span>
                                {{ $user->title }}
                            </td>
                            <td>
                                <span
                                    class="alert me-1
                                    @if ($user->status == 'inactif') alert-danger @else alert-success @endif">{{ $user->status }}</span>
                            </td>
                            <td>{{ $user->role }}</td>
                            <td class="text-end">
                                <button class="align-text-top btn"
                                    wire:click='startEdit({{ $user->id }})'>Editer</button>
                                <div class="" wire:loading>Chargement</div>
                            </td>
                        </tr>
                        @if ($editId === $user->id)
                            <tr>
                                <livewire:edit-user-form :user="$user" :key="$user->id" />
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <div class="m-2 mb-0">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
