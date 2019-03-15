<?php include 'assets/header.php'; ?>
<?php 

$get_id     = $_GET['id_nilai'];

$getdb       = "SELECT * FROM nilai WHERE id_nilai='$get_id'";

$tampung     = $conn->query($getdb);

$tampil      = $tampung->fetch_assoc();

?>
<div class="wrapper"><br>
    <div class="container">
      <h3>Edit Data Nilai</h3>
    </div>
    <br>
  <div class="container">
    <form action="" method="POST">

      <div class="form-group">
        <label for="id_nilai">ID Nilai</label>
        <input type="text" class="form-control" name="id_nilai" value="<?= $get_id; ?>" required readonly>
      </div>

      <div class="form-group">
        <label for="nim">NIM</label>
        <input class="form-control" type="text" name="nim" value="<?= $tampil['nim']; ?>" required>
      </div>

      <div class="form-group">
        <label for="nama_matkul">Nama Matakuliah</label>
        <input class="form-control" type="text" name="nama_matkul" value="<?= $tampil['matkul']; ?>" required>
      </div>

      <div class="form-group">
        <label for="angka">Nilai Angka</label>
        <input class="form-control" type="text" name="nilai_a" value="<?= $tampil['nilai_a']; ?>" required>
      </div>

      <div class="form-group float-right">
        <a href="index.php" class="btn btn-danger">Halaman Utama</a>
        <input class="btn btn-primary" type="submit" name="ubah" value="Ubah">
      </div>

    </form>
  </div>
</div>

<?php

if (isset($_POST['ubah'])) {
  $id_nilai     = $_POST['id_nilai'];
  $nim          = $_POST['nim'];
  $nama_matkul  = $_POST['nama_matkul'];
  $nilai_a      = $_POST['nilai_a'];

  $query        = "UPDATE nilai SET nim='$nim', id_nilai='$id_nilai', matkul='$nama_matkul', nilai_a='$nilai_a' WHERE id_nilai='$id_nilai'";

  $pushdata     = $conn->query($query);

  if ($pushdata == TRUE) {
    echo "<script>alert('Data berhasil diubah'); window.location.href='nilai.php';</script>";
  } else {
    header('Location: edit_nilai.php?id_nilai='.$id_nilai);
  }
}
?>

<?php include 'assets/footer.php'; ?>