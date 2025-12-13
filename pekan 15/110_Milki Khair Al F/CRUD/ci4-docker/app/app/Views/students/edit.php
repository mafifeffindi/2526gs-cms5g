<?php $title = 'Edit Student'; ?>
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
  <div class="col-12 col-lg-8">

    <div class="d-flex align-items-center justify-content-between mb-3">
      <div>
        <h3 class="mb-0 fw-bold">Edit Student</h3>
        <div class="text-secondary small">Upgrade data tanpa bikin kacau. Bisa kan.</div>
      </div>

      <a href="/students" class="btn btn-outline-secondary">
        ← Kembali
      </a>
    </div>

    <div class="card card-soft">
      <div class="card-body p-4">

        <form method="post" action="/students/<?= $student['id'] ?>/update" class="needs-validation" novalidate>
          <div class="row g-3">

            <div class="col-12">
              <label class="form-label fw-semibold">Nama</label>
              <input
                type="text"
                name="name"
                class="form-control form-control-lg"
                value="<?= esc($student['name']) ?>"
                required
              >
              <div class="invalid-feedback">Nama wajib diisi.</div>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">Email</label>
              <input
                type="email"
                name="email"
                class="form-control form-control-lg"
                value="<?= esc($student['email']) ?>"
                placeholder="contoh@email.com"
              >
              <div class="form-text">Email opsional, tapi membantu identitas.</div>
            </div>

            <div class="col-12 d-flex gap-2 pt-2">
              <button type="submit" class="btn btn-primary btn-lg px-4">
                Update
              </button>

              <a href="/students" class="btn btn-light btn-lg px-4">
                Batal
              </a>

              <a
                href="/students/<?= $student['id'] ?>/delete"
                class="btn btn-outline-danger btn-lg ms-auto"
                onclick="return confirm('Yakin hapus data ini?')"
              >
                Hapus
              </a>
            </div>

          </div>
        </form>

      </div>
    </div>

    <div class="text-secondary small mt-3">
      ID: <span class="badge badge-soft">#<?= $student['id'] ?></span>
    </div>

  </div>
</div>

<script>
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
