<section class="quiz" id="quiz">
    <div class="quiz-in">
        <div class="fu" style="text-align:center">
            <p class="sec-sup">Pencari Peribadi</p>
            <h2 class="sec-title"><em>Temui</em> Bau Anda</h2>
            <p style="font-size:13px;color:var(--mist2);margin-top:10px;letter-spacing:.03em">Jawab satu soalan — kami
                cadangkan wangian tepat untuk anda.</p>
        </div>
        <div class="quiz-card fu d1">
            <div id="qs0">
                <p class="quiz-q">Bagaimana anda ingin orang <em>mengingati</em> anda selepas anda beredar?</p>
                <div class="qopts">
                    <button class="qopt" onclick="qPick('power')">
                        <span class="qopt-e"><i class="fas fa-crown"></i></span>
                        <div>
                            <span class="qopt-m">Berkuasa & Berwibawa</span>
                            <span class="qopt-s">Aura pemimpin · Masuk bilik, semua nampak</span>
                        </div>
                    </button>
                    <button class="qopt" onclick="qPick('fresh')">
                        <span class="qopt-e"><i class="fas fa-water"></i></span>
                        <div>
                            <span class="qopt-m">Segar & Bersih</span>
                            <span class="qopt-s">Versatile · Sesuai office, date & casual</span>
                        </div>
                    </button>
                    <button class="qopt" onclick="qPick('sweet')">
                        <span class="qopt-e"><i class="fas fa-heart"></i></span>
                        <div>
                            <span class="qopt-m">Manis & Feminin</span>
                            <span class="qopt-s">Lembut, floral · Bau yang diingati lama</span>
                        </div>
                    </button>
                    <button class="qopt" onclick="qPick('dark')">
                        <span class="qopt-e"><i class="fas fa-moon"></i></span>
                        <div>
                            <span class="qopt-m">Misteri & Seductive</span>
                            <span class="qopt-s">Deep, woody · Bau malam yang memukau</span>
                        </div>
                    </button>
                </div>
            </div>
            <div id="qs1">
                <div
                    style="width:28px;height:28px;border:1px solid rgba(196,129,58,.2);border-top-color:var(--amber);border-radius:50%;animation:spin .7s linear infinite;margin:0 auto 12px">
                </div>
                <p style="font-size:8.5px;letter-spacing:.3em;text-transform:uppercase;color:var(--amber)">
                    Menganalisis...</p>
            </div>
            <div id="qs2">
                <p class="qr-n" id="qrn">Creed Aventus</p>
                <p class="qr-s" id="qrs">Padanan terbaik</p>
                <div class="qr-tags" id="qrt"></div>
                <p class="qr-price">RM 79 <span style="font-size:16px;color:var(--mist2)">/ 30ml</span></p>
                <button class="btn btn-fill" id="qrBtn" style="margin:0 auto;border:none"><span>Pesan Sekarang
                        →</span></button>
                <button class="btn-retry" onclick="qReset()">Cuba semula</button>
            </div>
        </div>
    </div>
</section>