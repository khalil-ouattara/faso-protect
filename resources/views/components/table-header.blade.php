<th wire:click='setOrderField("{{$name}}")'>
    {{$slot}}
    @if ($visible)
        @if ($direction === "ASC")
            <i class="fa fa-arrow-circle-o-up badge bg-danger-subtle" aria-hidden="true">Haut</i>
            @else
            <i class="fa fa-arrow-circle-o-down badge bg-danger-subtle" aria-hidden="true">Bas</i>
        @endif
    @endif
</th>
