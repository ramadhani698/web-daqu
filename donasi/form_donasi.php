<?php
include '../admin/config/config.php';

$kategori = $_GET['kategori'] ?? null;
$program_id = $_GET['id'] ?? null;
$program = null;

// Jika datang dari program
if ($program_id) {
    $stmt = $conn->prepare("SELECT * FROM program_donasi WHERE id=?");
    $stmt->bind_param("i", $program_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $program = $result->fetch_assoc();
    if ($program) {
        $kategori = $program['kategori'];
    }
}

// Jika tidak ada kategori sama sekali → redirect aman
if (!$kategori) {
    header("Location: kategori.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Donasi <?= htmlspecialchars(ucfirst($kategori)) ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/form-donasi.css">
</head>

<body class="bg-light">

<div class="container form-wrapper">
    <div class="card shadow-lg border-0 form-container">
        <div class="card-body p-4">

            <div class="text-center mb-4">
                <h2 class="fw-bold">Donasi <?= htmlspecialchars(ucfirst($kategori)) ?></h2>

                <?php if (!empty($program)) : ?>
                    <small class="text-muted">
                        Program: <strong><?= htmlspecialchars($program['judul']) ?></strong>
                    </small>
                <?php else: ?>
                    <small class="text-muted">
                        Donasi Umum untuk <strong><?= htmlspecialchars(ucfirst($kategori)) ?></strong>
                    </small>
                <?php endif; ?>
            </div>


            <form action="proses-donasi.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="program_id" value="<?= $program['id'] ?? '' ?>">
                <input type="hidden" name="kategori" value="<?= htmlspecialchars($kategori) ?>">

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap *</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nominal Donasi *</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="nominal" class="form-control" placeholder="Masukkan nominal donasi" min="1" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Metode Pembayaran *</label>
                    <select name="metode" class="form-select" required>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="QRIS">QRIS</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email (Opsional)</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pesan (Opsional)</label>
                    <textarea name="pesan" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                    Lanjut Ke Konfirmasi Pembayaran
                </button>

            </form>

        </div>
    </div>
</div>

<footer class="text-center mt-4 mb-3 text-muted">
    © 2025 Daarul Quran Al Jannah
</footer>

</body>
</html>
