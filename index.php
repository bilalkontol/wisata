<?php
require 'utility.php';

$data = tampilkan_destinasi();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>destinasi wisata</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1>Selamat datang di destinasi wisata sukabumi</h1>
        <h4>Destinasi wisata adalah suatu wilayah geografis yang memiliki daya tarik untuk dikunjungi dan ditinggali oleh pengunjung secara sementara</h4>
    </header>
    <nav>
        <div class="navbar">
            <div class="logo">
                <a>jelajahi sekarang beberapa tempat didestinasi wisata sukabumi</a>
            </div>
            <ul class="menu">
                <li><a href="login.html"></a></li>
            </ul>
        </div>
    </nav>
     <main>
        <section class="destinasi">
            <h2>Destinasi Populer</h2>
            
            <?php foreach ($data as $destinasi) { ?>
                <div class="destinasi-item">
                    <img src="/gunung gede.jpg" alt="Destinasi 1">          
                    <h3><?= $destinasi["name"] ?></h3>
                    <br>
                    <a class="btn btn-warning" href="https://maps.app.goo.gl/x6Ao2QLZR7HXhAE26"><h4>Detail info</h4></a>
                </div>
            <?php } ?>
        </section>
     </main>
</body>
</html>