<?php
session_start();

// Inisialisasi data tugas jika belum ada
if (!isset($_SESSION['tugas'])) {
    $_SESSION['tugas'] = [
        ["judul" => "Belajar PHP", "selesai" => false],
        ["judul" => "Kerjakan tugas UX", "selesai" => true],
    ];
}

// Tambah tugas
if (isset($_POST['tambah'])) {
    $judulBaru = trim($_POST['tugas_baru']);
    if (!empty($judulBaru)) {
        $_SESSION['tugas'][] = ["judul" => $judulBaru, "selesai" => false];
    }
}

// Menandai selesai/belum
if (isset($_POST['selesai'])) {
    $index = $_POST['index'];
    $_SESSION['tugas'][$index]['selesai'] = !$_SESSION['tugas'][$index]['selesai'];
}

// Hapus tugas
if (isset($_POST['hapus'])) {
    $index = $_POST['index'];
    array_splice($_SESSION['tugas'], $index, 1);
}

// Ambil data tugas untuk ditampilkan
$tugas = $_SESSION['tugas'];

// Fungsi untuk menampilkan daftar tugas
function tampilkanDaftar($tugas)
{
    foreach ($tugas as $index => $item) {
        $checked = $item["selesai"] ? "checked" : "";
        $textClass = $item["selesai"] ? "text-decoration-line-through text-muted" : "";
        echo "<tr>
                <td class='text-center'>
                    <form method='post'>
                        <input type='hidden' name='index' value='$index'>
                        <button type='submit' name='selesai' class='btn btn-sm btn-outline-success'>✓</button>
                    </form>
                </td>
                <td class='$textClass'>" . htmlspecialchars($item["judul"]) . "</td>
                <td class='text-center'>
                    <form method='post'>
                        <input type='hidden' name='index' value='$index'>
                        <button type='submit' name='hapus' class='btn btn-sm btn-danger'>Hapus</button>
                    </form>
                </td>
            </tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">To-Do List</h1>

        <!-- Form untuk tambah tugas -->
        <form method="post" class="mb-4">
            <div class="input-group">
                <input type="text" name="tugas_baru" class="form-control" placeholder="Tulis tugas baru di sini!"
                    required>
                <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
            </div>
        </form>

        <!-- Tabel daftar tugas -->
        <table class="table table-bordered table-striped">
            <thead class="table-secondary">
                <tr>
                    <th class="text-center" style="width: 80px;">Selesai</th>
                    <th>Judul Tugas</th>
                    <th class="text-center" style="width: 100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php tampilkanDaftar($tugas); ?>
            </tbody>
        </table>
    </div>
</body>

</html>