<!DOCTYPE html>
<html>
<head>
    <title>Tambah Student</title>
</head>
<body>

<h1>Tambah Student</h1>

<?php echo form_open(site_url('index.php/students/create')); ?>

<p>Name: <input type="text" name="name" required></p>
<p>Email: <input type="email" name="email" required></p>
<p>Major: <input type="text" name="major"></p>

<p><button type="submit">Simpan</button></p>

<?php echo form_close(); ?>

<a href="<?php echo site_url('index.php/students'); ?>">Kembali</a>




</html>
