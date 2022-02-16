@props(['libelle', 'icon'])

    <a {{ $attributes->merge(['class' => 'nav-link']) }} >
        <i class="fe {{ $icon }}"></i>
        <span class="sidemenu-label" style="font-family: 'Palatino Linotype'; font-size: medium">{{ $libelle }}</span>
        {{ $slot ?? '' }}
    </a>
