<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-4">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="row mb-2">
      <div class="col-md-2">
        <a href="<?php echo base_url('mahasiswa/create') ?>" class="btn btn-info">+ Tambah Data</a>
      </div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($items as $key => $item) : ?>
          <tr>
            <th scope="row"><?php echo ++$key ?></th>
            <td scope="row"><?php echo $item->nim ?></td>
            <td scope="row"><?php echo $item->nama ?></td>
            <td scope="row"><?php echo $item->jurusan ?></td>
            <td>
              <a href="<?php echo base_url('mahasiswa/edit/') . $item->nim ?>" class="btn btn-warning">Edit</a>
              <a href="<?php echo base_url('mahasiswa/delete/') . $item->nim ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>