<div class="modal-ov" id="mOv" role="dialog" aria-modal="true" aria-labelledby="mTit">
    <div class="modal" id="mBox">
        <button class="modal-x" onclick="cM()" aria-label="Tutup">✕</button>
        <div id="mForm">
            <p class="m-kicker" id="mKick">Wangian Premium · 30ml</p>
            <h2 class="m-title" id="mTit">Sahkan Pesanan</h2>
            <p class="m-price" id="mPrc">RM 79</p>
            <p class="m-orig">Harga jenama asal: RM 500–RM 2,000+</p>
            <div class="fg"><label for="fn">Nama Penuh *</label><input type="text" id="fn"
                    placeholder="Ahmad bin Abdullah" autocomplete="name">
                <p class="ferr" id="fen">Nama minimum 3 huruf</p>
            </div>
            <div class="frow">
                <div class="fg"><label for="fe">Emel *</label><input type="email" id="fe" placeholder="nama@emel.com"
                        autocomplete="email">
                    <p class="ferr" id="fee">Format emel tidak sah</p>
                </div>
                <div class="fg"><label for="fp">No. WhatsApp *</label><input type="tel" id="fp" placeholder="0123456789"
                        autocomplete="tel">
                    <p class="ferr" id="fep">No. Malaysia tidak sah</p>
                </div>
            </div>
            <div class="fg"><label for="fa">Alamat Penghantaran *</label><textarea id="fa" rows="2"
                    placeholder="No. rumah, jalan, taman, poskod, bandar, negeri"
                    autocomplete="street-address"></textarea>
                <p class="ferr" id="fea">Alamat terlalu pendek</p>
            </div>
            <!-- Cart Items Container -->
            <div id="cart-items-container"
                style="margin-bottom: 20px; border-bottom: 1px solid rgba(196,129,58,0.1); padding-bottom: 15px;">
                <h3
                    style="font-family: 'Cormorant Garamond', serif; font-size: 20px; margin-bottom: 15px; color: var(--ink);">
                    Troli Anda</h3>
                <div id="cart-items-list">
                    <!-- Dynamically filled by JavaScript -->
                </div>
            </div>
            <div class="fg"><label for="fnote">Nota (Opsyen)</label><input type="text" id="fnote"
                    placeholder="Hadiah, wangian ke-2 untuk bundle, dll..."></div>
            <div class="ot"><span class="ot-l">Jumlah Bayaran</span><span class="ot-p" id="oT">RM 79</span></div>
            <button class="sub-btn" id="sbtn" onclick="subO()"><span>Sahkan & Pesan Sekarang</span></button>
            <div class="secure">🔒 Selamat · FPX · Kad · eWallet</div>
        </div>
        <div class="m-load" id="mLoad">
            <div class="spin"></div>
            <p>Memproses pesanan...</p>
        </div>
        <div class="m-ok" id="mOk">
            <div class="m-ok-ico">✓</div>
            <h3>Pesanan Diterima!</h3>
            <p>Pasukan kami akan hubungi anda melalui WhatsApp dalam masa <strong style="color:var(--amber)">1–2
                    jam</strong> untuk sahkan pembayaran dan penghantaran.<br><br>Sila semak WhatsApp dan emel anda.
            </p>
            <p
                style="margin-top:16px;color:var(--amber);font-size:10.5px;letter-spacing:.15em;font-style:italic;font-family:'Cormorant Garamond',serif">
                selamat datang ke the artisan.</p>
        </div>
    </div>
</div>