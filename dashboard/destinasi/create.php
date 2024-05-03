<?php

include '../../utility.php';
require '../auth.php';

if (!empty($_POST)) {
    if (!empty($_FILES)) {
        buat_destinasi($_POST, $_FILES['photo']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Tambahkan destinasi baru</h1>
        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label" for="name">nama destinasi</label>
                        <input required class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="photo">upload gambar</label>
                        <input required class="form-control" type="file" name="photo" id="photo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address">alamat destinasi</label>
                        <input required class="form-control" type="text" name="address" id="address">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="link">link google map</label>
                        <input required class="form-control" type="url" name="link" id="link">
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea class="form-control" name="description" id="description"></textarea>
                        <label for="description">deskripsi</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category">pilih kategori: </label>
                        <select class="form-select" name="category_id" id="category">
                            <option value="1">pegunungan</option>
                            <option value="2">taman</option>
                        </select>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>