<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Pendataan Nilai</title>
</head>
<body>
    <h2>Program Pendataan Nilai</h2>

    <?php
    // Fungsi untuk menghitung nilai akhir
    function hitungNilaiAkhir($nilaiTugas, $nilaiUTS, $nilaiUAS) {
        $nilaiAkhir = (0.3 * $nilaiTugas) + (0.3 * $nilaiUTS) + (0.4 * $nilaiUAS);
        return $nilaiAkhir;
    }

    // Fungsi untuk menentukan grade
    function tentukanGrade($nilaiAkhir) {
        if ($nilaiAkhir >= 80) {
            return "A";
        } elseif ($nilaiAkhir >= 70) {
            return "B";
        } elseif ($nilaiAkhir >= 60) {
            return "C";
        } elseif ($nilaiAkhir >= 50) {
            return "D";
        } else {
            return "E";
        }
    }

    // Memproses data saat form dikirimkan
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form
        $nama = $_POST["nama"];
        $nilaiTugas = $_POST["nilai_tugas"];
        $nilaiUTS = $_POST["nilai_uts"];
        $nilaiUAS = $_POST["nilai_uas"];

        // Memastikan input tidak kosong
        if (!empty($nama) && !empty($nilaiTugas) && !empty($nilaiUTS) && !empty($nilaiUAS)) {
            // Menghitung nilai akhir
            $nilaiAkhir = hitungNilaiAkhir($nilaiTugas, $nilaiUTS, $nilaiUAS);

            // Menentukan grade
            $grade = tentukanGrade($nilaiAkhir);

            // Menampilkan hasil
            echo "<p>Nama: $nama</p>";
            echo "<p>Nilai Tugas: $nilaiTugas</p>";
            echo "<p>Nilai UTS: $nilaiUTS</p>";
            echo "<p>Nilai UAS: $nilaiUAS</p>";
            echo "<p>Nilai Akhir: $nilaiAkhir</p>";
            echo "<p>Grade: $grade</p>";
        } else {
            echo "<p>Silakan lengkapi semua input.</p>";
        }
    }
    ?>

    <!-- Form input data -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="nilai_tugas">Nilai Tugas:</label>
        <input type="number" name="nilai_tugas" required><br>

        <label for="nilai_uts">Nilai UTS:</label>
        <input type="number" name="nilai_uts" required><br>

        <label for="nilai_uas">Nilai UAS:</label>
        <input type="number" name="nilai_uas" required><br>

        <input type="submit" value="Hitung Nilai">
    </form>
</body>
</html>