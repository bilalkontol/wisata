<?php

$servername = "localhost";
$username = "reyuki";
$password = "qwerty";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=destinasi_hamid", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

function login($data) {
  global $pdo;
  $stmt = $pdo->prepare("SELECT username,password FROM users");
  $stmt->execute();
  $result = $stmt->fetch();
  $real_password = $result["password"];
  $real_username = $result["username"];

  $username = $data["username"];
  if ($username == $real_username) {
    $password = $data["password"];
    if (password_verify($password, $real_password)) {
      $_SESSION['username'] = $username;
      header('Location: http://localhost:8080/dashboard');
    } else {
      echo "
      <script>
        alert('passwordnya salah goblok')
      </script>
      ";
    }
  } else {
    echo "
    <script>
      alert('usernamenya salah goblok')
    </script>
    ";
  }
}

function upload($file) {
  if ($file) {
    $uploaded_photo = $file['tmp_name'];

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($uploaded_photo),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
        ),
        true
    )) {
        throw new RuntimeException('Invalid file format.');
    }

    $filename = sprintf(
      '%s.%s',
      sha1_file($uploaded_photo),
      $ext
    );
    move_uploaded_file($uploaded_photo, realpath('../../images') . '/' . $filename);
    return 'images/' . $filename;
  }
}

function buat_destinasi($data, $photo) {
  global $pdo;
  $name = isset($data['name']) ? $data['name'] : '';
  $address = isset($data['address']) ? $data['address'] : '';
  $description = isset($data['description']) ? $data['description'] : '';
  $category_id = isset($data['category_id']) ? $data['category_id'] : '';
  $link = isset($data['link']) ? $data['link'] : '';
  $photo_path = upload($photo);
  $created = date('Y-m-d H:i:s');
  // Insert new record into the contacts table
  $stmt = $pdo->prepare('INSERT INTO destinations(name, address, photo_path, description, category_id, link, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)');
  $stmt->execute([$name, $address, $photo_path, $description, $category_id, $link, $created]);
  header('Location: http://localhost:8080/dashboard');
}

function buat_kategori($data) {
  global $pdo;
  $name = isset($data['name']) ? $data['name'] : '';
  $created = date('Y-m-d H:i:s');
  // Insert new record into the contacts table
  $stmt = $pdo->prepare('INSERT INTO categories(name, created_at) VALUES (?, ?)');
  $stmt->execute([$name, $created]);
  header('Location: http://localhost:8080/dashboard/kategori');
}

function delete_destinasi($id, $filename) {
  global $pdo;
  $stmt = $pdo->prepare("DELETE FROM destinations WHERE id = ?");
  $stmt->execute([$id]);
  unlink($filename);
  header('Location: http://localhost:8080/dashboard');
}

function delete_kategori($id) {
  global $pdo;
  $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
  $stmt->execute([$id]);
  header('Location: http://localhost:8080/dashboard/kategori');
}

function get_destinasi($id) {
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM destinations WHERE id = ?");
  $stmt->execute([$id]);
  
  return $stmt->fetch();
}

function get_kategori($id) {
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
  $stmt->execute([$id]);
  
  return $stmt->fetch();
}

function update_destinasi($data) {
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM destinations WHERE id = ?");
  $stmt->execute([$data['id']]);
  $oldData = $stmt->fetch();
  
  $name = isset($data['name']) ? $data['name'] : $oldData['name'];
  $address = isset($data['address']) ? $data['address'] : $oldData['address'];
  $description = isset($data['description']) ? $data['description'] : $oldData['description'];
  $category_id = isset($data['category_id']) ? $data['category_id'] : $oldData['category_id'];
  $link = isset($data['link']) ? $data['link'] : $oldData['link'];
  $photo_path = !empty($_FILES['photo']['name']) ? uploadNewPhoto($oldData['photo_path'], $_FILES['photo']) : $oldData['photo_path'];
  $updated = date('Y-m-d H:i:s');
  
  $stmt = $pdo->prepare('UPDATE destinations SET name = ?, address = ?, photo_path = ?, description = ?, category_id = ?, link = ?, updated_at = ? WHERE id = ?');
  $stmt->execute([$name, $address, $photo_path, $description, $category_id, $link, $updated, $data['id']]);
  header('Location: http://localhost:8080/dashboard');
}

function update_kategori($data) {
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
  $stmt->execute([$data['id']]);
  $oldData = $stmt->fetch();
  
  $name = isset($data['name']) ? $data['name'] : $oldData['name'];
  $updated = date('Y-m-d H:i:s');
  
  $stmt = $pdo->prepare('UPDATE categories SET name = ?, updated_at = ? WHERE id = ?');
  $stmt->execute([$name, $updated, $data['id']]);
  header('Location: http://localhost:8080/dashboard/kategori');
}

function uploadNewPhoto($oldPath, $newPhoto) {
  unlink('../../' . $oldPath);
  return upload($newPhoto);
}

function tampilkan_destinasi() {
  global $pdo;
  $stmt = $pdo->prepare("SELECT id,name,address,photo_path FROM destinations");
  $stmt->execute();
  return $stmt->fetchAll();
}

function tampilkan_kategori() {
  global $pdo;
  $stmt = $pdo->prepare("SELECT id,name FROM categories");
  $stmt->execute();
  return $stmt->fetchAll();
}

?>