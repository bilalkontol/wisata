<?php
require '../utility.php';
$data = tampilkan_destinasi();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <?php foreach ($data as $destinasi) { ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <img src="/<?= $destinasi['photo_path'] ?>" class="card-img-top img-fluid" style="height: 290px;object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $destinasi['name'] ?></h5>
                        <p class="card-text"><?= $destinasi['address'] ?></p>
                        <p class="card-text"><?= $destinasi['description'] ?></p>
                        <a class="btn btn-warning btn-sm" href="/destinasi/detail.php?id=<?= $destinasi["id"]; ?>">Detail</a>
                        <div class="d-flex justify-content-between">
                            <small><span class="badge text-bg-success"><?= $destinasi['created_at'] ?></span></small>
                            <span class="badge text-bg-success">pegunungan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>