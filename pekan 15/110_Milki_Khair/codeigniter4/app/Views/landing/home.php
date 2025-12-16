<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
  /* page */
  .page{
    min-height: calc(100vh - 72px);
    padding: 56px 0 72px;
  }
  .wrap{
    width: min(1040px, calc(100% - 40px));
    margin: 0 auto;
  }

  /* hero */
  .hero{
    text-align:center;
    padding: 18px 0 22px;
  }
  .hero h1{
    margin: 0;
    font-weight: 950;
    letter-spacing: -1.6px;
    line-height: .98;
    font-size: clamp(42px, 5.4vw, 72px);
  }
  .hero p{
    margin: 16px auto 0;
    max-width: 70ch;
    color: rgba(10,18,32,.62);
    line-height: 1.85;
    font-size: 14px;
  }

  .cta{
    margin-top: 18px;
    display:flex;
    justify-content:center;
    gap: 12px;
    flex-wrap:wrap;
  }

  .checks{
    margin: 14px auto 0;
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap: 18px 26px;
    color: rgba(10,18,32,.62);
    font-size: 13px;
  }
  .check{
    display:flex;
    align-items:center;
    gap: 10px;
  }
  .tick{
    width: 18px; height: 18px;
    border-radius: 999px;
    background: rgba(45,168,255,.14);
    border: 1px solid rgba(45,168,255,.18);
    position: relative;
  }
  .tick::after{
    content:"";
    position:absolute;
    left: 5px; top: 4px;
    width: 6px; height: 9px;
    border-right: 2px solid rgba(5,32,51,.85);
    border-bottom: 2px solid rgba(5,32,51,.85);
    transform: rotate(40deg);
  }

  /* showcase blocks (no gradient) */
  .showcase{
    margin-top: 46px;
    display:grid;
    place-items:center;
  }

  .stack{
    width: min(920px, 100%);
    height: 360px;
    position: relative;
  }

  .cardBack{
    position:absolute;
    inset: 0;
    border-radius: 26px;
    box-shadow: 0 38px 120px rgba(2,18,48,.12);
    transform: translate3d(0,0,0);
    will-change: transform, opacity;
    opacity: 0;
  }

  .c1{ background: #FF5A5F; right: 90px; left: -90px; top: 24px; bottom: -24px; opacity:.18; }
  .c2{ background: #2DA8FF; right: 60px; left: -60px; top: 14px; bottom: -14px; opacity:.20; }
  .c3{ background: #F2C94C; right: 0; left: 0; top: 0; bottom: 0; opacity: 1; }

  .front{
    position:absolute;
    inset: 0;
    border-radius: 26px;
    background: rgba(255,255,255,.65);
    border: 1px solid rgba(10,18,32,.06);
    backdrop-filter: blur(16px);
    display:grid;
    grid-template-columns: 1fr .9fr;
    gap: 28px;
    padding: 30px;
  }

  .front h2{
    margin: 0;
    font-size: 18px;
    letter-spacing: -.3px;
    font-weight: 950;
  }
  .front .desc{
    margin-top: 10px;
    color: rgba(10,18,32,.62);
    line-height: 1.8;
    font-size: 13px;
    max-width: 50ch;
  }

  .miniCta{
    margin-top: 14px;
    display:flex;
    gap: 10px;
    flex-wrap:wrap;
  }

  .phone{
    justify-self:end;
    align-self:center;
    width: min(310px, 100%);
    height: 300px;
    border-radius: 22px;
    background: rgba(255,255,255,.72);
    border: 1px solid rgba(10,18,32,.06);
    box-shadow: 0 26px 90px rgba(2,18,48,.10);
    padding: 14px;
    position: relative;
    overflow:hidden;
  }
  .phoneTop{
    height: 40px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    color: rgba(10,18,32,.55);
    font-size: 12px;
    border-bottom: 1px solid rgba(10,18,32,.06);
    padding: 0 6px 10px;
  }
  .lines{
    padding: 12px 6px;
    display:grid;
    gap: 10px;
  }
  .line{
    height: 12px;
    border-radius: 999px;
    background: rgba(10,18,32,.06);
  }
  .line.w1{ width: 92%; }
  .line.w2{ width: 78%; }
  .line.w3{ width: 86%; }
  .line.w4{ width: 64%; }

  /* animation smooth */
  .reveal{
    animation: up .42s cubic-bezier(.2,.8,.2,1) .06s both;
  }
  @keyframes up{
    from{ opacity:0; transform: translate3d(0,16px,0); }
    to{ opacity:1; transform: translate3d(0,0,0); }
  }

  .stack:hover .c2{ transform: translate3d(0,-6px,0); transition: transform .18s cubic-bezier(.2,.8,.2,1); }
  .stack:hover .c1{ transform: translate3d(0,-10px,0); transition: transform .18s cubic-bezier(.2,.8,.2,1); }

  @media (max-width: 920px){
    .stack{ height: 520px; }
    .front{ grid-template-columns: 1fr; }
    .phone{ justify-self:start; }
  }

  @media (prefers-reduced-motion: reduce){
    .reveal{ animation:none !important; }
    .stack:hover .c1, .stack:hover .c2{ transform:none !important; }
  }
</style>

<div class="page">
  <div class="wrap">

    <div class="hero reveal">
      <h1>
        Peminjaman buku<br>
        rapi dalam 60 menit.
      </h1>

      <p>
        Kelola katalog, anggota, dan transaksi peminjaman (pinjam, kembali, status)
        dengan alur CRUD yang bersih. Tanpa desain berisik. Tanpa border pamer.
      </p>

      <div class="cta">
        <a class="btn btn-primary" href="/books">Masuk Dashboard</a>
        <a class="btn btn-ghost" href="#preview">Lihat Preview</a>
      </div>

      <div class="checks">
        <div class="check"><span class="tick"></span>CRUD lengkap</div>
        <div class="check"><span class="tick"></span>Pencarian cepat</div>
        <div class="check"><span class="tick"></span>UI tenang</div>
      </div>
    </div>

    <div id="preview" class="showcase">
      <div class="stack">
        <div class="cardBack c1 reveal"></div>
        <div class="cardBack c2 reveal" style="animation-delay:.09s"></div>

        <div class="front reveal" style="animation-delay:.12s">
          <div>
            <h2>Kelola perpustakaan tanpa drama</h2>
            <div class="desc">
              Dashboard untuk admin: tambah buku, update stok, catat peminjaman,
              dan kembalikan buku. Landing tetap elegan, dashboard tetap efisien.
            </div>

            <div class="miniCta">
              <a class="btn btn-primary" href="/books">Open dashboard</a>
              <a class="btn btn-ghost" href="/books/new">Tambah buku</a>
            </div>
          </div>

          <div class="phone" aria-hidden="true">
            <div class="phoneTop">
              <span>Library preview</span>
              <span class="badge">Ready</span>
            </div>
            <div class="lines">
              <div class="line w1"></div>
              <div class="line w2"></div>
              <div class="line w3"></div>
              <div class="line w4"></div>
              <div class="line w2"></div>
              <div class="line w1"></div>
            </div>
          </div>
        </div>

        <div class="cardBack c3" style="opacity:.18; pointer-events:none;"></div>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
