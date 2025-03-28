<div>
    <input type="text" wire:model.live="searchTerm" placeholder="Rechercher...">

    <table>
        <thead>
            <tr>
                <th><input type="checkbox" x-model="selectAll"></th>
                @foreach ($fields as $field)
                    <th wire:click="sortBy('{{ $field }}')">
                        {{ $field }}
                        @if ($sortField === $field)
                            @if ($sortDirection === 'asc')
                                &uarr;
                            @else
                                &darr;
                            @endif
                        @endif
                    </th>
                @endforeach
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td><input type="checkbox" value="{{ $item->id }}" x-model="selectedItems"></td>
                    @foreach ($fields as $field)
                        <td>{{ $item->$field }}</td>
                    @endforeach
                    <td>
                        <button wire:click="editItem({{ $item->id }})">Modifier</button>
                        <button wire:click="deleteItem({{ $item->id }})">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}

    <button x-show="selectedItems.length > 0" wire:click="deleteItems()">
        Supprimer les sélectionnés
    </button>

    <h2>Ajouter un élément</h2>
    <form wire:submit.prevent="createItem">
        @foreach ($fields as $field)
            <input type="text" wire:model="newItem.{{ $field }}" placeholder="{{ $field }}">
        @endforeach
        <button type="submit">Ajouter</button>
    </form>

    @if ($editingItem)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
            <div class="p-4 bg-white rounded">
                <form wire:submit.prevent="updateItem">
                    @foreach ($fields as $field)
                        <input type="text" wire:model="editingItem.{{ $field }}">
                    @endforeach
                    <button type="submit">Enregistrer</button>
                    <button type="button" wire:click="cancelEdit">Annuler</button>
                </form>
            </div>
        </div>
    @endif
</div>
