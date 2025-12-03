<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h1>Edit Data Student</h1>

<?php echo validation_errors(); ?>

<?php echo form_open(site_url('index.php/students/edit/'.$student->id)); ?>

<p>Name: <input type="text" name="name" value="<?php echo $student->name; ?>"></p>
<p>Email: <input type="text" name="email" value="<?php echo $student->email; ?>"></p>
<p>Major: <input type="text" name="major" value="<?php echo $student->major; ?>"></p>

<p><button type="submit">Update</button></p>

<?php echo form_close(); ?>

<a href="<?php echo site_url('index.php/students'); ?>">Kembali</a>


</body>
</html>
