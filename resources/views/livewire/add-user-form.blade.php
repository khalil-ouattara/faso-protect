<div>
    {{-- @foreach ($fields as $type => $field)
    <x-form-field :field="$field" :type="$type" />
@endforeach --}}
    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-report">
        Ajouter
      </a>
    <div wire:ignore.self class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <span></span>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <div class="modal-header">
              <h5 class="modal-title">Utilisateur</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" wire:submit.prevent='create'>
                    {{-- @foreach ($fields as $field => $type)
                        <x-form-field :field="$type" />
                    @endforeach --}}
                    <div class="mb-3">
                        {{-- @foreach ($fields as $field => $type)
                        <label class="form-label">{{$field}}</label>
                        <input type="text" class="form-control
                        @error("newItem.$field")
                        is-invalid
                        @enderror"
                        name="{{$field}}" placeholder="{{$field}}" wire:model='newItem.{{$field}}'>
                        @error("newItem.$field") <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @endforeach --}}
                    </div>
                    <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                        <button class="btn btn-primary ms-auto" type="submit" wire:loading.attr='disabled'>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                            Add
                        </button>
                        <div class="" wire:loading>Chargement</div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
