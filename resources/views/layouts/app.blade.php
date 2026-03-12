<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'the artisan. — wangian premium malaysia')</title>
    <meta name="description"
        content="@yield('meta_description', '32 wangian premium terinspirasi jenama dunia. Pati diimport. Botol kaca gold cap. 10ml RM35 · 30ml RM79. Ketahanan 12 jam.')">
    <meta property="og:title" content="the artisan. — wangian premium malaysia">
    <meta property="og:description"
        content="32 pilihan. Pati premium diimport. 10ml RM35 · 30ml RM79. Ketahanan 12 jam dijamin.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='8' fill='%23C4813A'/><text x='50' y='70' text-anchor='middle' font-size='55' font-family='Georgia' fill='%23F5EDD8'>a.</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css'])
</head>

<body>

    <!-- Custom cursor -->
    <div class="cur" id="cur"></div>
    <div class="cur-r" id="cur-r"></div>

    <!-- Navigation -->
    @include('partials.nav')

    <!-- Mobile navigation -->
    <div class="mob-nav" id="mnav">
        <a href="#collection" onclick="cNav()">Koleksi</a>
        <a href="#bundle" onclick="cNav()">Bundle</a>
        <a href="#journey" onclick="cNav()">Wangian</a>
        <a href="#shipping" onclick="cNav()">Penghantaran</a>
        <a href="#collection" onclick="cNav()" style="color:var(--amber)">Pesan Sekarang →</a>
    </div>

    <!-- Main content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Floating elements: WhatsApp, cart, modal -->
    <a href="https://wa.me/60123456789?text=Salam%2C+saya+berminat+dengan+wangian+the+artisan.+Boleh+saya+tahu+lebih%3F"
        class="wa" target="_blank" rel="noopener" aria-label="WhatsApp">
        <span class="wa-ico">
            <svg width="19" height="19" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
            </svg>
        </span>
        <span class="wa-txt">Tanya Kami</span>
    </a>

    <div class="cart-fl" id="cfl" onclick="oM()" role="button" tabindex="0" aria-label="Troli">
        <div class="cart-b" id="cbn">0</div>
        <span class="cart-l">Troli</span>
    </div>

    <!-- Order modal -->
    @include('partials.modal')

    @vite(['resources/js/app.js'])

    <!-- Stack for additional scripts (e.g., product data) -->
    @stack('scripts')
</body>

</html>