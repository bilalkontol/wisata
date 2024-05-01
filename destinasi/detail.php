<?php
include '../utility.php';

$data = get_destinasi($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <!-- <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="/<?= $data['photo_path'] ?>" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['name'] ?></h5>
                            <p class="card-text"><?= $data['address'] ?></p>
                            <p class="card-text"><?= $data['description'] ?></p>
                            <a href="<?= $data['link'] ?>" class="btn btn-primary">Buka Google Map</a>
                            <p class="card-text"><small class="text-body-secondary"><?= $data['created_at'] ?></small></p>
                        </div>
                        </div>
                    </div>
                </div> -->
                <div class="card">
                    <img src="/<?= $data['photo_path'] ?>" class="card-img-top img-fluid">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['name'] ?></h5>
                        <p class="card-text"><?= $data['address'] ?></p>
                        <p class="card-text"><?= $data['description'] ?></p>
                        <small><span class="badge text-bg-success"><?= $data['created_at'] ?></span></small>
                        <span class="badge text-bg-success">pegunungan</span>
                        <a href="<?= $data['link'] ?>" class="btn btn-primary">Buka Google Map</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>