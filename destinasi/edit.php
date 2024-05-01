<?php
include '../utility.php';
$data = get_destinasi($_GET['id']);
if (!empty($_POST)) {
    update_destinasi($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Edit destinasi</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?= $_GET['id']; ?>" name="id">
            <div class="mb-3">
                <label class="form-label" for="name">nama destinasi</label>
                <input class="form-control" type="text" name="name" id="name" value="<?= $data["name"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="photo">upload gambar</label>
                <input class="form-control" type="file" name="photo" id="photo">
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">alamat destinasi</label>
                <input class="form-control" type="text" name="address" id="address" value="<?= $data["address"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="link">link google map</label>
                <input class="form-control" type="url" name="link" id="link" value="<?= $data["link"] ?>">
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control" name="description" id="description"><?= $data["description"] ?></textarea>
                <label for="description">deskripsi</label>
            </div>
            <div class="mb-3">
                <label class="form-label" for="category">pilih kategori: </label>
                <select class="form-select" name="category_id" id="category">
                    <option value="1">pegunungan</option>
                    <option value="2">taman</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>