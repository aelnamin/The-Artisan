@extends('layouts.app')

@section('title', 'Soalan Lazim – The Artisan Parfum')
@section('meta_description', 'Jawapan kepada soalan lazim mengenai pesanan, penghantaran, pembayaran, dan jaminan.')

@section('content')
    <div class="container py-5">
        <h1 class="display-4">Soalan Lazim (FAQ)</h1>
        <hr>
        <div class="accordion" id="faqAccordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            Bagaimana cara untuk membuat pesanan?
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Pilih wangian pilihan anda, klik saiz (10ml atau 30ml), dan item akan ditambahkan ke troli. Klik
                        ikon troli untuk semak, isi maklumat penghantaran, dan sahkan pesanan. Kami akan hubungi anda
                        melalui WhatsApp dalam masa 1–2 jam untuk pengesahan pembayaran.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Berapa lama penghantaran mengambil masa?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        Kami memproses pesanan dalam 24 jam. Penghantaran menggunakan Pos Laju atau J&T mengambil masa 1–3
                        hari bekerja ke seluruh Malaysia (kecuali kawasan terpencil). Anda akan diberikan nombor tracking
                        setelah pesanan dihantar.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Apakah jaminan yang ditawarkan?
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Kami menawarkan jaminan 7 hari. Jika anda tidak puas hati, hubungi kami untuk gantian botol baru
                        atau pulangan wang penuh – tanpa soal jawab.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Bolehkah saya menukar atau memulangkan produk?
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                    <div class="card-body">
                        Ya, dalam tempoh 7 hari selepas penerimaan, anda boleh memulangkan produk jika terdapat kecacatan
                        atau tidak sesuai. Sila hubungi kami untuk proses pemulangan.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection