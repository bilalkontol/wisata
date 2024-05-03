<?php
require '../../utility.php';
require '../auth.php';

$data = tampilkan_kategori();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <?php include '../navbar.php'; ?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-start">
            <h1>Kelola kategori</h1>
            <a class="btn btn-primary" href="/dashboard/kategori/create.php">Buat kategori</a>
        </div>
        <table>
            <tr>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            <?php foreach ($data as $kategori) { ?>
                <tr>
                    <td><?php echo $kategori["name"]; ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/dashboard/kategori/edit.php?id=<?= $kategori["id"]; ?>">Edit</a>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" value='<?= $kategori["id"]; ?>' name="id">
                            <input class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin nih bang?')" name="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>