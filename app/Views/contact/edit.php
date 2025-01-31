<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-2">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Contact-an</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="/">List</a>
        <a class="nav-link active" href="/add">Add</a>
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
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Add Contact</div>
        <div class="card-body">
          <form action="/edit/<?= esc($contact['id']) ?>" method="post">
            <input type="hidden" name="id" value="<?= esc($contact['id']) ?>">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" id="name" class="form-control" name="name" placeholder="Name"
                value="<?= esc($contact['name']) ?>">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone"
                value="<?= esc($contact['phone']) ?>">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" id="email" class="form-control" name="email" placeholder="Email"
                value="<?= esc($contact['email']) ?>">
            </div>
            <div class="mb-3 ">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content') ?>