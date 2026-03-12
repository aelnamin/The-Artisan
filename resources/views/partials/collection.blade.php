<section class="collection" id="collection">
    <div class="col-wrap">
        <div class="fu" style="text-align:center;margin-bottom:0">
            <p class="sec-sup">{{ count($products) }} Pilihan Eksklusif</p>
            <h2 class="sec-title">Pilih <em>Jiwa</em> Anda</h2>
            <p class="sec-body">Setiap wangian membawa cerita. Tuding pada kad untuk merasai suasana — lalu pesan dengan
                satu klik.</p>
        </div>
        <div class="g-tabs" role="tablist">
            <button class="gtab m a" id="tm" onclick="sG('m')" role="tab" aria-selected="true"><span
                    class="dot"></span>Untuk Lelaki</button>
            <button class="gtab w" id="tw" onclick="sG('w')" role="tab" aria-selected="false"><span
                    class="dot"></span>Untuk Wanita</button>
        </div>
    </div>

    <div class="pg" id="pg">
        @foreach($products as $index => $product)
            @php
                // Cycle delay classes for animation
                $delay = $index % 5;
                $delayClass = $delay === 0 ? '' : ' d' . $delay;

                // Map database gender ('men'/'women') to expected values
                $genderData = $product->gender == 'men' ? 'm' : 'w';
                $genderDisplay = $product->gender == 'men' ? 'Lelaki' : 'Wanita';
            @endphp
            <article class="pc fu{{ $delayClass }}" data-g="{{ $genderData }}" data-key="{{ $product->id }}" tabindex="0"
                role="button" aria-label="{{ $product->name }}">
                <div class="pv" style="background:linear-gradient(145deg,#f0ede8,#e8ddd0)">
                    <div class="pv-bg"
                        style="background:radial-gradient(circle at 50% 70%,rgba(196,129,58,.12),transparent 65%);opacity:0">
                    </div>
                    <div class="mood">
                        <p class="mood-scene">
                            @if($product->gender == 'men')
                                @if($product->brand == 'Creed') Pagi musim luruh di Scotland — asap kayu, tanah basah, kulit
                                    kasut baru.
                                @elseif($product->brand == 'Dior') Padang Provence selepas hujan — lavender, angin laut, batu
                                    kapur panas.
                                @elseif($product->brand == 'Chanel') Malam di Paris — asap cerutu, cognac, jaket linen biru tua.
                                @elseif($product->brand == 'Bvlgari') Bersandar di tepi Mediterranean — garam laut, mentol,
                                    kulit tanned.
                                @elseif($product->brand == 'CK') Taman rose hijau di Connecticut — pagi yang dingin, rumput
                                    basah embun.
                                @elseif($product->brand == 'Acqua') Terbuai di perahu kayu di Pantelleria — angin, ombak, batu
                                    panas.
                                @elseif($product->brand == 'Hugo') Petang musim panas di orchard epal — kayu hangat, apel segar,
                                    semangat muda.
                                @elseif($product->brand == 'Lacoste') Court tenis pagi — grapefruit segar, keringat ringan,
                                    semangat guna.
                                @elseif($product->brand == 'Mont Blanc') Lobby hotel bintang lima di malam hari — marmar,
                                    whisky, kemewahan senyap.
                                @elseif($product->brand == 'Paco') Masuk stadium — sorak gemuruh, kulit baru, adrenalin naik.
                                @elseif($product->brand == 'Versace') Pesta di villa di Santorini — menta segar, semangat malam,
                                    tarikan kuat.
                                @elseif($product->brand == 'YSL') Majlis anugerah malam — sage segar, bergamot jernih, percaya
                                    diri melimpah.
                                @elseif($product->brand == 'AZ') Malam koboi di Santa Fe — kulit saddle, kardamom, asap api
                                    unggun jauh.
                                @elseif($product->brand == 'LV') Spa eksklusif di Tokyo — teh hijau, iris, kayu cendana hangat.
                                @elseif($product->brand == 'Club') VIP lounge di Dubai — pineapple, birch asap, musk midnight.
                                @elseif($product->brand == 'CR') Motorcycle dalam hujan — kulit, cocoa gelap, oakmoss lembap.
                                @else Pengalaman wangian yang unik.
                                @endif
                            @else
                                @if($product->brand == 'Forbidden') Taman ros hitam di Provence — petang suram, embun halus,
                                    keindahan terlarang.
                                @elseif($product->brand == 'White') Studio yoga pagi — lavender, kapas bersih, cahaya pagi yang
                                    lembut.
                                @elseif($product->brand == 'Good') Gala dinner malam ini — jasmin, coklat gelap, seorang gadis
                                    dengan rahsia.
                                @elseif($product->brand == 'Coco') Sarapan di café Paris — croissant hangat, ros segar, wanita
                                    bersahaja mewah.
                                @elseif($product->brand == 'J\'adore') Berjalan di runway Paris — ylang-ylang, jasmin putih,
                                    kemewahan murni.
                                @elseif($product->brand == 'Cherry') Pesta musim bunga di Prague — ceri mekar, peony, gelak tawa
                                    ringan.
                                @elseif($product->brand == 'Gucci') Taman bunga di Tuscany — rose segar, angin hijau, kebebasan
                                    perempuan.
                                @elseif($product->brand == 'English') Cottage di Cotswolds — freesia putih, peach lembut, teh
                                    petang.
                                @elseif($product->brand == 'Viva') Brunch di Beverly Hills — buah beri segar, jasmin ceria,
                                    getaran positif.
                                @elseif($product->brand == 'La Vie') Siang Ahad yang sempurna — iris manis, praline hangat,
                                    kebahagiaan murni.
                                @elseif($product->brand == 'Marc') Padang gandum kuning bunga liar — strawberry segar, violet
                                    innocent.
                                @elseif($product->brand == 'VS') Di kolam renang Beverly Hills — peony merah jambu, vanilla,
                                    semangat summer.
                                @elseif($product->brand == 'Ariana') Floating di awan putih — praline lavender, musk lembut,
                                    mimpi indah.
                                @elseif($product->brand == 'Elie') Malam gala di Beirut — orange blossom, kulit suci, cahaya
                                    lilin.
                                @elseif($product->brand == 'Candy') Candy shop di Milan — karamel, iris, badam — manis tapi
                                    sophisticated.
                                @else Pengalaman wangian yang unik.
                                @endif
                            @endif
                        </p>
                        <p class="mood-feel">
                            @if($product->gender == 'men')
                                @if($product->brand == 'Creed') Berwibawa · Maskulin · Abadi
                                @elseif($product->brand == 'Dior') Segar · Bebas · Tidak Dapat Dilupakan
                                @elseif($product->brand == 'Chanel') Elegan · Mewah · Serius
                                @elseif($product->brand == 'Bvlgari') Aquatik · Segar · Sporty
                                @elseif($product->brand == 'CK') Klasik · Bersih · Tenang
                                @elseif($product->brand == 'Acqua') Bebas · Romantik · Mediterranean
                                @elseif($product->brand == 'Hugo') Ceria · Muda · Penuh Tenaga
                                @elseif($product->brand == 'Lacoste') Sporty · Bebas · Aktif
                                @elseif($product->brand == 'Mont Blanc') Misteri · Premium · Sofistikated
                                @elseif($product->brand == 'Paco') Power · Menang · Berani
                                @elseif($product->brand == 'Versace') Seductive · Berani · Tak Terbendung
                                @elseif($product->brand == 'YSL') Moden · Percaya Diri · Urban
                                @elseif($product->brand == 'AZ') Berani · Raw · Tak Bisa Ditolak
                                @elseif($product->brand == 'LV') Zen · Sofistikated · Unik
                                @elseif($product->brand == 'Club') Exclusive · Dark · Mewah
                                @elseif($product->brand == 'CR') Rebel · Dark · Tidak Tertakluk
                                @else Wangian Premium
                                @endif
                            @else
                                @if($product->brand == 'Forbidden') Misteri · Feminin · Dramatik
                                @elseif($product->brand == 'White') Tenang · Bersih · Lembut
                                @elseif($product->brand == 'Good') Sensual · Dua Wajah · Tak Terlupa
                                @elseif($product->brand == 'Coco') Parisien · Timeless · Confident
                                @elseif($product->brand == 'J\'adore') Glamour · Feminin · Abadi
                                @elseif($product->brand == 'Cherry') Ceria · Flirty · Penuh Warna
                                @elseif($product->brand == 'Gucci') Segar · Natural · Bebas
                                @elseif($product->brand == 'English') Elegan · British · Timeless
                                @elseif($product->brand == 'Viva') Fun · Feminin · Juicy
                                @elseif($product->brand == 'La Vie') Manis · Gembira · French
                                @elseif($product->brand == 'Marc') Innocent · Segar · Playful
                                @elseif($product->brand == 'VS') Sensual · Bold · Glamorous
                                @elseif($product->brand == 'Ariana') Dreamy · Soft · Addictive
                                @elseif($product->brand == 'Elie') Oriental · Elegan · Sophisticated
                                @elseif($product->brand == 'Candy') Sweet · Chic · Addictive
                                @else Wangian Premium
                                @endif
                            @endif
                        </p>
                    </div>
                    <div class="pb">
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}"
                            style="width:100%; height:auto; object-fit:contain;">
                    </div>
                    @if($product->brand == 'Creed' || $product->brand == 'Good' || $product->brand == 'La Vie')
                        <span class="pbadge bg-hot">Terlaris</span>
                    @elseif($product->brand == 'Versace' || $product->brand == 'CR' || $product->brand == 'YSL')
                        <span class="pbadge bg-new">Trending</span>
                    @elseif($product->gender == 'women' && $product->brand == 'Forbidden')
                        <span class="pbadge bg-w">Wanita</span>
                    @endif
                </div>
                <div class="pi">
                    <p class="pi-g">{{ $genderDisplay }}</p>
                    <h3 class="pi-name">{{ $product->name }}</h3>
                    <p class="pi-acc">{{ $product->description }}</p>
                    <div class="pi-foot">
                        <div class="pi-prices" style="cursor: pointer;">
                            <span class="pi-p10"
                                onclick="event.stopPropagation(); addToCartWithSize('{{ $product->id }}', '10ml')">10ml —
                                <b>RM {{ number_format($product->price_10ml) }}</b></span>
                            <span class="pi-p30"
                                onclick="event.stopPropagation(); addToCartWithSize('{{ $product->id }}', '30ml')">RM
                                {{ number_format($product->price_30ml) }} <small>30ml</small></span>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>