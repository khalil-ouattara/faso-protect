<div name="{{ $name }}"
     x-cloak
     x-data="{ show: false, name: '{{ $name  }}', details: null }"
     @modal.window="
        show = ($event.detail.name === name);
        details = $event.detail;
     "
     @modal:close-all.window="show = false"
     class="modal d-block"
     tabindex="-1"
     @keydown.escape.window="show = false"
     x-bind:class="
        {
            'animate__animated animate__fadeInDown animate__faster show': show,
            'animate__animated animate__fadeOutUp': !show
        }
     "
     aria-labelledby="iamidLabel"
     aria-modal="true"
     role="dialog"
    {{ $attributes }}
>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button @click="show = false" type="button" class="btn-close"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                @if ($footer)
                    {{ $footer }}
                @else
                    <button @click="show = false; hide = !hide" type="button" class="text-white btn font-weight-medium btn-primary">
                        Ok
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
