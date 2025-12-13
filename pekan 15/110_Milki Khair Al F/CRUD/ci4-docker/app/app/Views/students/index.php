<?= $this->extend('layout', ['title' => 'Students']) ?>
<?= $this->section('content') ?>

<?php
  $total = count($students ?? []);
  function initials($name) {
    $name = trim((string)$name);
    if ($name === '') return '?';
    $parts = preg_split('/\s+/', $name);
    $a = strtoupper(substr($parts[0] ?? '', 0, 1));
    $b = strtoupper(substr($parts[1] ?? '', 0, 1));
    return $b ? ($a.$b) : $a;
  }
?>

<div class="panel p-4 p-lg-5 mb-4">
  <div class="d-flex flex-column flex-lg-row justify-content-between gap-4">
    <div>
      <div class="muted small" style="letter-spacing:.18em; text-transform:uppercase;">Dashboard</div>
      <h1 class="fw-black mt-2 mb-2" style="letter-spacing:-.02em;">Students</h1>
    </div>

    <div class="d-flex align-items-start align-items-lg-center gap-2">
      <span class="chip"><i class="bi bi-people"></i> <span id="totalCount"><?= $total ?></span></span>
      <a href="/students/create" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah
      </a>
    </div>
  </div>

  <div class="mt-4 position-relative">
    <div class="position-absolute top-50 translate-middle-y" style="left: 16px; color: rgba(100,116,139,.8);">
      <i class="bi bi-search"></i>
    </div>
    <input id="searchInput" class="form-control form-control-lg ps-5" placeholder="Cari nama atau email…" autocomplete="off">
  </div>
</div>

<div class="panel p-3 p-lg-4">
  <?php if (empty($students)): ?>
    <div class="text-center py-5">
      <div class="avatar mx-auto mb-3">+</div>
      <div class="fw-bold fs-4">Belum ada data</div>
      <div class="muted mb-3">Tambah student pertama biar dashboard kamu hidup.</div>
      <a href="/students/create" class="btn btn-ghost">
        <i class="bi bi-plus-circle me-1"></i> Tambah Student
      </a>
    </div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-hover align-middle" id="studentsTable">
        <thead>
          <tr>
            <th style="width:110px;">ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th style="width:150px;" class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody id="studentsBody">
          <?php foreach ($students as $s): ?>
            <tr class="student-row">
              <td class="muted fw-semibold">#<?= $s['id'] ?></td>

              <td>
                <div class="d-flex align-items-center gap-3">
                  <div class="avatar"><?= esc(initials($s['name'])) ?></div>
                  <div>
                    <div class="fw-bold name-cell"><?= esc($s['name']) ?></div>
                    <div class="muted small">Active student</div>
                  </div>
                </div>
              </td>

              <td class="muted email-cell"><?= esc($s['email']) ?></td>

              <td class="text-end">
                <a href="/students/<?= $s['id'] ?>/edit" class="icon-btn" title="Edit">
                  <i class="bi bi-pencil"></i>
                </a>

                <!-- NOTE: type="button" biar gak dianggap submit -->
                <button
                  type="button"
                  class="icon-btn danger ms-1 btn-delete"
                  data-id="<?= $s['id'] ?>"
                  data-name="<?= esc($s['name']) ?>"
                >
                  <i class="bi bi-trash3"></i>
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div id="noResult" class="text-center py-5 d-none">
      <div class="fw-bold fs-4">Tidak ada hasil</div>
      <div class="muted">Coba keyword lain.</div>
    </div>
  <?php endif; ?>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-4">
        <div class="d-flex align-items-start gap-3">
          <div class="avatar" style="background: rgba(239,68,68,.10); border-color: rgba(239,68,68,.18); color:#b91c1c;">
            <i class="bi bi-trash3"></i>
          </div>

          <div class="flex-grow-1">
            <div class="fw-bold fs-5">Hapus data?</div>
            <div class="muted small">
              Kamu akan menghapus <span class="fw-bold" id="deleteName">student</span>. Aksi ini permanen.
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
          <button type="button" class="btn btn-ghost" data-bs-dismiss="modal">Batal</button>
          <a href="#" id="confirmDelete" class="btn btn-primary" style="background: linear-gradient(135deg, rgba(239,68,68,.95), rgba(239,68,68,.75)); box-shadow:none; color:#fff;">
            <i class="bi bi-trash3 me-1"></i> Hapus
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Search filter
  const input = document.getElementById('searchInput');
  const rows = document.querySelectorAll('.student-row');
  const noResult = document.getElementById('noResult');
  const totalCount = document.getElementById('totalCount');

  function applyFilter(){
    const q = (input.value || '').toLowerCase().trim();
    let visible = 0;

    rows.forEach(row => {
      const name = (row.querySelector('.name-cell')?.innerText || '').toLowerCase();
      const email = (row.querySelector('.email-cell')?.innerText || '').toLowerCase();
      const match = !q || name.includes(q) || email.includes(q);
      row.classList.toggle('d-none', !match);
      if (match) visible++;
    });

    if (totalCount) totalCount.textContent = visible;
    if (noResult) noResult.classList.toggle('d-none', visible !== 0);
  }
  if (input) input.addEventListener('input', applyFilter);

  // Delete modal (robust binding + event delegation)
  const modalEl = document.getElementById('deleteModal');
  const deleteName = document.getElementById('deleteName');
  const confirmDelete = document.getElementById('confirmDelete');
  const modal = modalEl ? new bootstrap.Modal(modalEl) : null;

  // Event delegation: walaupun tabel di-render ulang, klik tetap kebaca
  document.addEventListener('click', (e) => {
    const btn = e.target.closest('.btn-delete');
    if (!btn) return;

    e.preventDefault();
    e.stopPropagation();

    const id = btn.getAttribute('data-id');
    const name = btn.getAttribute('data-name') || 'student';

    if (deleteName) deleteName.textContent = name;
    if (confirmDelete) confirmDelete.href = `/students/${id}/delete`;
    if (modal) modal.show();
  });
</script>

<?= $this->endSection() ?>
