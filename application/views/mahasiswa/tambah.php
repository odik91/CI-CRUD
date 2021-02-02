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
    <div class="card">
      <h2 class="card-header">Tambah Mahasiswa</h2>
      <div class="card-body">
        <div class="col-md">
          <form action="<?php echo base_url('mahasiswa/addingRecord') ?>" method="POST">
            <div class="form-group row">
              <label for="nim" class="col-sm-2 col-form-label">NIM</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo set_value('nim') ?>" placeholder="Masukkan NIM">
                <?php echo form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama') ?>" placeholder="Masukkan Nama">
                <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo set_value('jurusan') ?>" placeholder="Masukkan Jurusan">
                <?php echo form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm">
                <button type="submit" class="btn btn-block btn-primary">Tambah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>