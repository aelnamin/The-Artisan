import "./bootstrap";

("use strict");

// Get CSRF token from meta tag (must be present in layout)
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    ?.getAttribute("content");

/* ── CURSOR ── */
(() => {
    const c = document.getElementById("cur"),
        r = document.getElementById("cur-r");
    if (!c || !r || window.matchMedia("(pointer:coarse)").matches) return;
    let mx = 0,
        my = 0,
        rx = 0,
        ry = 0;
    document.addEventListener("mousemove", (e) => {
        mx = e.clientX;
        my = e.clientY;
        c.style.left = mx + "px";
        c.style.top = my + "px";
    });
    document.addEventListener("mouseleave", () => {
        c.style.opacity = "0";
        r.style.opacity = "0";
    });
    document.addEventListener("mouseenter", () => {
        c.style.opacity = "1";
        r.style.opacity = "1";
    });
    (function loop() {
        rx += (mx - rx) * 0.11;
        ry += (my - ry) * 0.11;
        r.style.left = rx + "px";
        r.style.top = ry + "px";
        requestAnimationFrame(loop);
    })();
    document
        .querySelectorAll('a,button,[role="button"],.pc,.qopt')
        .forEach((el) => {
            el.addEventListener("mouseenter", () => r.classList.add("h"));
            el.addEventListener("mouseleave", () => r.classList.remove("h"));
        });
})();

/* ── NAV ── */
const navEl = document.getElementById("nav");
window.addEventListener(
    "scroll",
    () => navEl.classList.toggle("solid", scrollY > 50),
    { passive: true }
);
const hamBtn = document.getElementById("ham"),
    mnav = document.getElementById("mnav");
hamBtn.addEventListener("click", () => {
    const o = mnav.classList.toggle("o");
    hamBtn.classList.toggle("o", o);
    hamBtn.setAttribute("aria-expanded", o);
    document.body.style.overflow = o ? "hidden" : "";
});
function cNav() {
    mnav.classList.remove("o");
    hamBtn.classList.remove("o");
    hamBtn.setAttribute("aria-expanded", "false");
    document.body.style.overflow = "";
}

/* ── GENDER TABS ── */
function sG(g) {
    document.querySelectorAll(".pc").forEach((c) => {
        const show = c.dataset.g === g;
        c.style.display = show ? "block" : "none";
        if (show) setTimeout(() => c.classList.add("fu"), 10);
    });
    document.getElementById("tm").className =
        "gtab m" + (g === "m" ? " a" : "");
    document.getElementById("tw").className =
        "gtab w" + (g === "w" ? " a" : "");
    document.getElementById("tm").setAttribute("aria-selected", g === "m");
    document.getElementById("tw").setAttribute("aria-selected", g === "w");
}
// default
document
    .querySelectorAll('.pc[data-g="m"]')
    .forEach((c) => (c.style.display = "block"));
document
    .querySelectorAll('.pc[data-g="w"]')
    .forEach((c) => (c.style.display = "none"));

/* ── STOCK ── */
let stk = 67;
setInterval(() => {
    if (stk > 14) stk -= Math.floor(Math.random() * 2);
    const el = document.getElementById("sn");
    if (el) el.textContent = stk;
}, 20000);

/* ── COUNTDOWN ── */
(() => {
    const end = Date.now() + (23 * 3600 + 59 * 60 + 47) * 1000;
    const pad = (n) => String(n).padStart(2, "0");
    function tick() {
        const left = Math.max(0, end - Date.now());
        const hE = document.getElementById("ch"),
            mE = document.getElementById("cm"),
            sE = document.getElementById("cs");
        if (hE) hE.textContent = pad(Math.floor(left / 3600000));
        if (mE) mE.textContent = pad(Math.floor((left % 3600000) / 60000));
        if (sE) sE.textContent = pad(Math.floor((left % 60000) / 1000));
        if (left > 0) setTimeout(tick, 1000);
    }
    tick();
})();

/* ── SCROLL FADE ── */
const io = new IntersectionObserver(
    (entries) =>
        entries.forEach((e) => {
            if (e.isIntersecting) {
                e.target.classList.add("in");
                io.unobserve(e.target);
            }
        }),
    { threshold: 0.08 }
);
document.querySelectorAll(".fu").forEach((el) => io.observe(el));

/* ========== CART SYSTEM WITH SIZE ========== */
let cart = []; // each item: { key, name, size, price, qty }

// Build product data from window.products (injected via Blade)
const mData = {};
const productNameToId = {};

if (window.products && Array.isArray(window.products)) {
    window.products.forEach((p) => {
        mData[p.id] = {
            t: p.name,
            k: p.description,
            price_10ml: parseFloat(p.price_10ml),
            price_30ml: parseFloat(p.price_30ml),
        };
        productNameToId[p.name] = p.id;
    });
}

function addToCartWithSize(key, size) {
    const item = mData[key];
    if (!item) return;

    // Get price from product data
    const price = size === "10ml" ? item.price_10ml : item.price_30ml;

    // Check if same product with same size already in cart
    const existing = cart.find((i) => i.key === key && i.size === size);
    if (existing) {
        existing.qty++;
    } else {
        cart.push({
            key: key,
            name: item.t,
            size: size,
            price: price,
            qty: 1,
        });
    }
    updateCartFloat();
}

// Optional: keep default 30ml add for backward compatibility (if needed)
function addToCart(key) {
    addToCartWithSize(key, "30ml");
}

function updateCartFloat() {
    const totalQty = cart.reduce((sum, i) => sum + i.qty, 0);
    const cbn = document.getElementById("cbn");
    const cfl = document.getElementById("cfl");
    if (cbn) cbn.textContent = totalQty;
    if (cfl) cfl.style.display = totalQty > 0 ? "flex" : "none";
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartFloat();
    renderCartModal();
}

function renderCartModal() {
    const container = document.getElementById("cart-items-list");
    if (!container) return;

    if (cart.length === 0) {
        container.innerHTML =
            '<p style="color: var(--mist); text-align: center;">Troli kosong.</p>';
        document.getElementById("oT").textContent = "RM 0";
        return;
    }

    let html = "";
    let total = 0;
    cart.forEach((item, index) => {
        const itemTotal = item.price * item.qty;
        total += itemTotal;
        html += `
            <div class="cart-item" style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid rgba(196,129,58,0.05);">
                <div style="flex: 2;">
                    <span style="font-family: 'Cormorant Garamond', serif; font-size: 16px;">${item.name} (${item.size})</span>
                    <span style="font-size: 12px; color: var(--mist); margin-left: 8px;">x${item.qty}</span>
                </div>
                <div style="flex: 1; text-align: right;">
                    <span style="font-weight: 500;">RM ${itemTotal}</span>
                </div>
                <button onclick="removeFromCart(${index})" style="background: none; border: none; color: var(--mist); font-size: 16px; cursor: pointer; margin-left: 10px;" aria-label="Buang">✕</button>
            </div>
        `;
    });
    container.innerHTML = html;
    document.getElementById("oT").textContent = `RM ${total}`;
}

/* ── MODAL OPEN / CLOSE ── */
function oM(key) {
    // If a product key is provided, we could prefill something, but we already have cart.
    // Optionally set the modal title/kicker from the product (if needed)
    if (key && mData[key]) {
        document.getElementById("mTit").textContent = mData[key].t;
        document.getElementById("mKick").textContent = mData[key].k;
    } else {
        // Fallback
        document.getElementById("mTit").textContent = "Sahkan Pesanan";
        document.getElementById("mKick").textContent = "Wangian Premium";
    }

    renderCartModal();
    document.getElementById("mOv").classList.add("open");
    document.body.style.overflow = "hidden";
    document.getElementById("mForm").style.display = "block";
    document.getElementById("mLoad").style.display = "none";
    document.getElementById("mOk").style.display = "none";
    document
        .querySelectorAll(".ferr")
        .forEach((e) => e.classList.remove("show"));
    document
        .querySelectorAll("#mForm input,#mForm select,#mForm textarea")
        .forEach((e) => e.classList.remove("err"));
    setTimeout(() => {
        const f = document.getElementById("fn");
        if (f) f.focus();
    }, 120);
}

function cM() {
    document.getElementById("mOv").classList.remove("open");
    document.body.style.overflow = "";
}

document.getElementById("mOv").addEventListener("click", (e) => {
    if (e.target === document.getElementById("mOv")) cM();
});

document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
        cM();
        cNav();
    }
});

/* ── VALIDATION ── */
const vE = (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
const vP = (v) => /^(\+?60|0)[0-9]{8,10}$/.test(v.replace(/[\s\-]/g, ""));
function sErr(i, ei) {
    document.getElementById(i).classList.add("err");
    document.getElementById(ei).classList.add("show");
}
function cErr(i, ei) {
    document.getElementById(i).classList.remove("err");
    document.getElementById(ei).classList.remove("show");
}

/* ── SUBMIT ORDER (handles cart) ── */
function subO() {
    if (cart.length === 0) {
        alert("Troli kosong. Sila tambah item.");
        return;
    }

    // Get form values
    const name = document.getElementById("fn").value.trim();
    const email = document.getElementById("fe").value.trim();
    const phone = document.getElementById("fp").value.trim();
    const address = document.getElementById("fa").value.trim();
    const notes = document.getElementById("fnote").value.trim();

    // Client-side validation (reuse existing functions)
    let ok = true;
    if (name.length < 3) {
        sErr("fn", "fen");
        ok = false;
    } else cErr("fn", "fen");
    if (!vE(email)) {
        sErr("fe", "fee");
        ok = false;
    } else cErr("fe", "fee");
    if (!vP(phone)) {
        sErr("fp", "fep");
        ok = false;
    } else cErr("fp", "fep");
    if (address.length < 10) {
        sErr("fa", "fea");
        ok = false;
    } else cErr("fa", "fea");
    if (!ok) return;

    // Calculate total
    const total = cart.reduce((sum, item) => sum + item.price * item.qty, 0);

    // Prepare order data
    const orderData = {
        name: name,
        email: email,
        phone: phone,
        address: address,
        notes: notes,
        items: cart, // cart already has key, name, size, price, qty
        total: total,
    };

    const btn = document.getElementById("sbtn");
    btn.disabled = true;
    document.getElementById("mForm").style.display = "none";
    document.getElementById("mLoad").style.display = "block";

    // Send AJAX request
    fetch("/orders", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify(orderData),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                // Order saved successfully
                document.getElementById("mLoad").style.display = "none";
                document.getElementById("mOk").style.display = "block";
                if (stk > 5) {
                    stk--;
                    const el = document.getElementById("sn");
                    if (el) el.textContent = stk;
                }
                // Optionally clear cart after successful order
                // cart = [];
                // updateCartFloat();
            } else {
                // Show validation errors from server
                let errorMsg = "Ralat: ";
                if (data.errors) {
                    errorMsg += Object.values(data.errors).flat().join(" ");
                } else {
                    errorMsg += "Sila semak semula maklumat.";
                }
                alert(errorMsg);
                // Reset modal to form
                document.getElementById("mLoad").style.display = "none";
                document.getElementById("mForm").style.display = "block";
            }
            btn.disabled = false;
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("Ralat penghantaran. Sila cuba lagi.");
            document.getElementById("mLoad").style.display = "none";
            document.getElementById("mForm").style.display = "block";
            btn.disabled = false;
        });
}

/* ── QUIZ ── */
const qD = {
    power: {
        n: "Creed Aventus",
        s: "Untuk jiwa yang mendominasi",
        tags: ["Pineapple", "Birch", "Ambergris"],
    },
    fresh: {
        n: "Dior Sauvage",
        s: "Segar, versatile, tanpa had",
        tags: ["Bergamot", "Ambroxan", "Vetiver"],
    },
    sweet: {
        n: "Dior J'adore",
        s: "Feminin, floral, menawan",
        tags: ["Rose", "Jasmine", "Ylang"],
    },
    dark: {
        n: "Versace Eros",
        s: "Misteri, seductive, dalam",
        tags: ["Tonka", "Vanilla", "Mint"],
    },
};

function qPick(v) {
    document.getElementById("qs0").style.display = "none";
    document.getElementById("qs1").style.display = "block";
    setTimeout(() => {
        const d = qD[v];
        const productId = productNameToId[d.n]; // map name to ID
        document.getElementById("qs1").style.display = "none";
        document.getElementById("qrn").textContent = d.n;
        document.getElementById("qrs").textContent = d.s;
        document.getElementById("qrt").innerHTML = d.tags
            .map((t) => `<span class="qr-tag">${t}</span>`)
            .join("");
        // Set the button to add that product (30ml default)
        document.getElementById("qrBtn").onclick = () =>
            addToCartWithSize(productId, "30ml");
        document.getElementById("qs2").style.display = "block";
    }, 1700);
}

function qReset() {
    document.getElementById("qs2").style.display = "none";
    document.getElementById("qs0").style.display = "block";
}

/* ── SMOOTH SCROLL ── */
document.querySelectorAll('a[href^="#"]').forEach((a) => {
    a.addEventListener("click", (e) => {
        const h = a.getAttribute("href");
        if (h === "#") {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: "smooth" });
            return;
        }
        const t = document.querySelector(h);
        if (t) {
            e.preventDefault();
            t.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    });
});

// Make functions available globally for inline onclick attributes
window.sG = sG;
window.oM = oM;
window.cNav = cNav;
window.addToCartWithSize = addToCartWithSize;
window.addToCart = addToCart;
window.removeFromCart = removeFromCart;
window.qPick = qPick;
window.qReset = qReset;
window.cM = cM;
window.subO = subO;
