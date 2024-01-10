<!DOCTYPE html>
<html>
<head>
    <title>Raport Kelulusan Kelas XII RPL-2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .lulus {
            color: green;
            font-weight: bold;
        }
        .tidak-lulus {
            color: red;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Raport Kelulusan Kelas XII RPL-2</h1>

        <!-- Formulir Input Siswa Baru -->
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama Siswa</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Siswa" required>
            </div>
            <div class="form-group">
                <label for="nilai">Nilai Rata-Rata</label>
                <input type="number" step="0.01" id="nilai" name="nilai" placeholder="Nilai Rata-Rata" required>
            </div>
            <div class="form-group">
                <input type="submit" name="tambahkan" value="Tambahkan">
            </div>
        </form>
        <!-- Akhir Formulir Input Siswa Baru -->

        <?php
        // Data siswa dan nilai
        $siswa = array(
            array("nama" => "Muhammad Adidtya P.R", "nilai" => 85),
            array("nama" => "Muhammad Afifuddin M.", "nilai" => 60),
            // Tambahkan data siswa lainnya di sini
        );

        // Fungsi untuk menentukan status kelulusan
        function getStatus($nilai) {
            return ($nilai >= 70) ? 'Lulus' : 'Tidak Lulus';
        }

        // Cek apakah data baru dimasukkan melalui formulir
        if(isset($_POST['tambahkan'])){
            $nama_siswa = $_POST['nama'];
            $nilai_siswa = $_POST['nilai'];

            // Menambahkan data siswa baru ke dalam array $siswa
            $siswa[] = array("nama" => $nama_siswa, "nilai" => $nilai_siswa);
        }

        // Menampilkan data siswa dan status kelulusannya setelah penambahan siswa baru (jika ada)
        echo "<table>";
        echo "<tr>";
        echo "<th>No</th>";
        echo "<th>Nama Siswa</th>";
        echo "<th>Nilai Rata-Rata</th>";
        echo "<th>Status Kelulusan</th>";
        echo "</tr>";

        $nomor = 1;
        foreach ($siswa as $data) {
            $status = getStatus($data['nilai']);
            $statusClass = ($status == 'Lulus') ? 'lulus' : 'tidak-lulus';

            echo "<tr>";
            echo "<td>" . $nomor . "</td>";
            echo "<td>{$data['nama']}</td>";
            echo "<td>{$data['nilai']}</td>";
            echo "<td class='$statusClass'>$status</td>";
            echo "</tr>";

            $nomor++;
        }

        echo "</table>";
        ?>
    </div>
</body>
</html>
