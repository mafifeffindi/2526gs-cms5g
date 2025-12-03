<!DOCTYPE html>
<html>
<head>
    <title>Data Students</title>
</head>
<body>

<h1>Daftar Students</h1>

<a href="<?php echo base_url('index.php/students/create'); ?>">Tambah Student</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Major</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($students as $s): ?>
    <tr>
        <td><?php echo $s->id; ?></td>
        <td><?php echo $s->name; ?></td>
        <td><?php echo $s->email; ?></td>
        <td><?php echo $s->major; ?></td>
        <td>
            <a href="<?php echo site_url('index.php/students/edit/'.$s->id); ?>">Edit</a> |
            <a href="<?php echo site_url('index.php/students/delete/'.$s->id); ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</
