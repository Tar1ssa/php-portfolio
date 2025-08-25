<?php

$querysetting = mysqli_query($koneksi, "SELECT * FROM settings LIMIT 1");
$rowsetting = mysqli_fetch_assoc($querysetting);

$queryhero = mysqli_query($koneksi, "SELECT * FROM hero LIMIT 1");
$rowhero = mysqli_fetch_assoc($queryhero);

$queryabout = mysqli_query($koneksi, "SELECT * FROM about WHERE status= 1 ORDER BY id DESC");
$rowabout = mysqli_fetch_assoc($queryabout);

$queryexp = mysqli_query($koneksi, "SELECT * FROM experience WHERE id=1");
$rowexp = mysqli_fetch_assoc($queryexp);

$querytrailers = mysqli_query($koneksi, "SELECT * FROM trailers WHERE status = 1");
$rowtrailers = mysqli_fetch_assoc($querytrailers);

$queryskills = mysqli_query($koneksi, "SELECT * FROM skills ORDER BY id DESC");
$rowskills = mysqli_fetch_all($queryskills, MYSQLI_ASSOC);

$queryjob = mysqli_query($koneksi, "SELECT * FROM job ORDER BY id DESC");
$rowjob = mysqli_fetch_all($queryjob, MYSQLI_ASSOC);

$queryspec = mysqli_query($koneksi, "SELECT * FROM specialization ORDER BY id DESC");
$rowspec = mysqli_fetch_all($queryspec, MYSQLI_ASSOC);

$querycv = mysqli_query($koneksi, "SELECT * FROM cv LIMIT 1");
$rowcv = mysqli_fetch_assoc($querycv);

$queryportofolio = mysqli_query($koneksi, "SELECT * FROM portofolio WHERE is_active=1 ORDER BY id DESC");
$rowportofolio = mysqli_fetch_all($queryportofolio, MYSQLI_ASSOC);

$queryclient = mysqli_query($koneksi, "SELECT * FROM client WHERE status=1 ORDER BY id DESC");
$rowclient = mysqli_fetch_all($queryclient, MYSQLI_ASSOC);

$queryblog = mysqli_query($koneksi, "SELECT blog.*, categories.name AS category_name
  FROM blog
  LEFT JOIN categories ON blog.id_category = categories.id
  WHERE blog.is_active = 1
  ORDER BY blog.id DESC");
$rowblog = mysqli_fetch_all($queryblog, MYSQLI_ASSOC);

$querypage = mysqli_query($koneksi, "SELECT * FROM page ORDER BY number ASC");
$rowpage = mysqli_fetch_all($querypage, MYSQLI_ASSOC);

// var_dump($rowpage);
//                 die;


if (isset($_POST['simpan'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $text = $_POST['text'];

  $insert = mysqli_query($koneksi, "INSERT INTO message (name, email, text) VALUES('$name', '$email', '$text')");
  if ($insert) {
    header("location:?page=hero&tambah=berhasil");
  }
}
