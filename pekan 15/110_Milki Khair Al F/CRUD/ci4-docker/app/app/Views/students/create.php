<?php $title = 'Tambah Student'; ?>
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
  <div class="col-12 col-lg-8">

    <div class="d-flex align-items-center justify-content-between mb-3">
      <div>
        <h3 class="mb-0 fw-bold">Tambah Student</h3>
        <div class="text-secondary small">Masukin data dengan rapi. Biar hidup juga rapi (katanya).</div>
      </div>

      <a href="/students" class="btn btn-outline-secondary">
        ← Kembali
      </a>
    </div>

    <div class="card card-soft">
      <div class="card-body p-4">

        <form method="post" action="/students" class="needs-validation" novalidate>
          <div class="row g-3">

            <div class="col-12">
              <label class="form-label fw-semibold">Nama</label>
              <input type="text" name="name" class="form-control form-control-lg" placeholder="Contoh: Aulia Nur" required>
              <div class="invalid-feedback">Nama wajib diisi.</div>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Email</label>
              <input type="email" name="email" class="form-control form-control-lg" placeholder="contoh@email.com">
              <div class="form-text">Email opsional, tapi enak buat identitas.</div>
            </div>

            <div class="col-12 d-flex gap-2 pt-2">
              <button type="submit" class="btn btn-primary btn-lg px-4">
                Simpan
              </button>
              <a href="/students" class="btn btn-light btn-lg px-4">
                Batal
              </a>
            </div>

          </div>
        </form>

      </div>
    </div>

    <div class="text-secondary small mt-3">
      Tip: pakai nama jelas biar pas edit nanti gak nyari pakai insting.
    </div>

  </div>
</div>

<script>
  // Bootstrap validation (biar UX-nya berasa)
  (() => {
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>

<?= $this->endSection() ?>
