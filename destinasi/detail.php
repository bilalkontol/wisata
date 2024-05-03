<?php
include '../utility.php';

$data = get_destinasi($_GET['id']);
$kategori = get_kategori($data["category_id"]);
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
                <div class="card">
                    <img src="/<?= $data['photo_path'] ?>" class="card-img-top img-fluid" style="height: 290px;object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['name'] ?></h5>
                        <p class="card-text"><?= $data['address'] ?></p>
                        <p class="card-text"><?= $data['description'] ?></p>
                        <a href="<?= $data['link'] ?>" class="btn btn-primary">Buka Google Map</a>
                        <div class="d-flex justify-content-between">
                            <small><span class="badge text-bg-success"><?= $data['created_at'] ?></span></small>
                            <span class="badge text-bg-success"><?= $kategori["name"] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>