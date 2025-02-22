<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-2">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/">Contact-an</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="/">List</a>
        <a class="nav-link" href="/add">Add</a>
      </div>
    </div>
  </div>
</nav>
<div class="position-fixed mt-2 me-2 top-0 end-0">
  <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success flash-message">
      <?= session()->getFlashdata('message') ?>
    </div>
  <?php elseif (session()->getFlashdata('errors')): ?>
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
      <div class="alert alert-danger flash-message">
        <?= esc($error) ?>
      </div>
    <?php endforeach ?>
  <?php endif ?>
</div>
<div class="row container-fluid p-0 m-0">
  <div class="col d-flex flex-column align-items-center justify-content-center">
    <table class="table table-custom table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php if (!empty($contacts)): ?>
          <?php foreach ($contacts as $index => $contact): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= esc($contact['name']) ?></td>
              <td><?= esc($contact['phone']) ?></td>
              <td><?= esc($contact['email']) ?></td>
              <td>
                <button id="edit" data-id="<?= esc($contact['id']) ?>" class="btn btn-primary"><i
                    class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger" data-bs-target="#delete" data-bs-toggle="modal"
                  data-id="<?= esc($contact['id']) ?>"><i class="bi bi-trash"></i></button>
              </td>
            </tr>
          <?php endforeach ?>
        <?php else: ?>
          <tr>
            <td colspan="5">No Item Found</td>
          </tr>
        <?php endif ?>
      </tbody>
    </table>
  </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary" id="confirm">Hapus</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content') ?>