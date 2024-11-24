<?php
session_start();
if (!isset($_SESSION['data'])) {
    die('Tidak ada data untuk ditampilkan.');
}
$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>Hasil Pendaftaran</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= htmlspecialchars($data['name']) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <th>Umur</th>
            <td><?= htmlspecialchars($data['age']) ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?= htmlspecialchars($data['gender']) ?></td>
        </tr>
        <tr>
            <th>Browser/OS</th>
            <td><?= htmlspecialchars($data['userAgent']) ?></td>
        </tr>
    </table>

    <h3>Isi File:</h3>
    <table>
        <thead>
            <tr>
                <th>Baris</th>
                <th>Konten</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['fileContent'] as $index => $line): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($line) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>