buat database `destinasi_wisata`

import table:
```
mariadb -u root -p destinasi_wisata < destinasi.sql
```

halaman yang tersedia:
```
USER-BIASA
halaman home: /index.php
halaman detail destinasi: /destinasi/detail.php

ADMIN-ONLY
halaman dashboard: /dashboard/index.php
halaman buat destinasi: /dashboard/destinasi/create.php
halaman edit destinasi: /dashboard/destinasi/edit.php
halaman buat kategori: /dashboard/kategori/create.php
halaman edit kategori: /dashboard/kategori/edit.php
halaman list kategori: /dashboard/kategori/index.php

OTENTIKASI
halaman login: /login.php
```