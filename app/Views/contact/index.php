<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-2">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Contact-an</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="#">List</a>
        <a class="nav-link" href="#">Add</a>
      </div>
    </div>
  </div>
</nav>
<div class="row container-fluid">
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
                <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
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

<?= $this->endSection('content') ?>