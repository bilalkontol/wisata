<?php
require 'utility.php';

$data = tampilkan_destinasi();
if (isset($_POST["submit"])) {
    delete_destinasi($_POST["id"], $_POST["photo_path"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container py-4">
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Selamat Datang</h1>
        <p class="col-md-8 fs-4">Jelajahi berbagai destinasi di wilayah sukabumi.</p>
        <a href="https://maps.app.goo.gl/yyKSETjjrz1P23Pd8" target="_blank" class="btn btn-primary btn-lg" type="button">Jelajahi</a>
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <?php if (empty($data)) { ?>
        <div class="alert alert-danger" role="alert">
          Data belum tersedia, Silahkan tambah data
        </div>
      <?php } else { ?>
        <?php foreach ($data as $destinasi) { ?>
          <div class="col-md-6 mb-4">
            <div class="h-100 p-5 text-bg-dark rounded-3">
              <h2><?= $destinasi["name"] ?></h2>
              <p><?= $destinasi["address"] ?></p>
              <a href="/destinasi/detail.php?id=<?= $destinasi["id"] ?>" class="btn btn-outline-light" type="button">Detail</a>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>

    <footer class="pt-3 mt-4 text-body-secondary border-top">
      © 2024
    </footer>
  </div>
</body>
</html>