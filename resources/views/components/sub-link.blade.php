@props(['href', 'libelle'])

<li {{ $attributes->merge(['class' => 'nav-sub-item']) }}>
    <a class="nav-sub-link" href="{{ $href }}">{{ $libelle }}</a>
</li>
