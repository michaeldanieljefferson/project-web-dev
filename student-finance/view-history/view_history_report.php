<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Riwayat Kerja Siswa Labor</title>
    <style>
        body {
            background-image: url('../../../asset/ground.jpg');
			background-attachment: fixed;
        }
        
        .home-button {
            position: absolute;
            top: 22px;
            right: 130px;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        
        .home-button:hover {
            background-color: #0056b3;
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
        }
        
        .logout-button {
            position: absolute;
            top: 22px;
            right: 22px;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        
        .logout-button:hover {
            background-color: #B90000;
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
        }
        
        #cari {
            background-color: #0056b3;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            color: white;
        }
        
        label {
            font-size: 25px;
            display: block;
        }
        
        input[type="text"] {
            width: 100%;
            font-size: 16px;
            padding: 5px;
        }
        
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        th {
            background-color: black;
            color: white;
        }

        .student-name {
            color: white;
			font-size: 25px;
        }
        
        .search-form {
            margin: 20px 0;
            display: flex;
        }
        
        .search-form input[type="text"] {
            width: 400px;
            font-size: 16px;
            padding: 10px;
        }
        
        .search-form input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
    </style>
</head>
<body>
    <div class="search-form">
        <form method="POST">
            <input type="text" name="search" id="search" placeholder="Masukkan nama student labor">
            <input type="submit" value="Cari">
        </form>
    </div>
    <?php
    $servername = "localhost"; // Ganti dengan nama server Anda jika berbeda
    $username = "root"; // Ganti dengan nama pengguna MySQL Anda
    $password = "Juan123.com"; // Ganti dengan kata sandi MySQL Anda
    $dbname = "labornote";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $search = ""; // Inisialisasi variabel pencarian

    // Memproses pencarian jika ada input dari pengguna
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM tbl_history WHERE student_name LIKE '%$search%' ORDER BY student_name";
    } else {
        $sql = "SELECT * FROM tbl_history ORDER BY student_name";
    }

    $result = $conn->query($sql);

    $current_student = null; // Inisialisasi variabel untuk melacak nama student saat ini
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Jika nama student berbeda, buat tabel baru
            if ($row["student_name"] != $current_student) {
                // Tutup tabel sebelumnya jika ada
                if ($current_student != null) {
                    echo "</table>";
                }

                $current_student = $row["student_name"];
                echo "<h1 class='student-name'>Riwayat Kerja Student Labor - " . $current_student . "</h1>";
                echo "<table>";
                echo "<tr><th>Hari</th><th>Tanggal Kerja</th><th>No Regis</th><th>Departemen</th><th>Nama Supervisor</th><th>Status Laporan</th><th>Print Laporan</th></tr>";
            }
			
			$formatted_date = date("d/m/Y", strtotime($row["tanggal_kerja"]));

            echo "<tr>";
            echo "<td>" . $row["day"] . "</td>";
            echo "<td>" . $formatted_date . "</td>";
            echo "<td>" . $row["no_regis"] . "</td>";
            echo "<td>" . $row["departemen"] . "</td>";
            echo "<td>" . $row["supervisor_name"] . "</td>";

            // Set status otomatis menjadi "approved"
            $approval_status = "approved";

            // Di sini, Anda dapat menambahkan logika untuk memeriksa kapan data harus diatur sebagai "approved" secara otomatis.

            echo "<td>" . $approval_status . "</td>";
			echo "<td><button id='print-button' onclick='printReport(this)'>Print Report</button></td>";
            echo "</tr>";

            // Kemudian, Anda dapat menambahkan kode untuk memasukkan data ke dalam tabel histori dengan status "approved".
            // ...
        }

        // Tutup tabel terakhir
        if ($current_student != null) {
            echo "</table>";
        }
    } else {
        echo "Tidak ada data history laporan kerja";
    }

    // Menutup koneksi
    $conn->close();
    ?>
    <div class="content">
        <a class="home-button" href="../home/home_student_finance.php"><i class="fas fa-home icon"></i> Home</a>
        <a class="logout-button" href="../../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

<script>
	function printReport(button) {
	// Mendapatkan elemen tabel terkait
	const table = button.closest('table');

	// Membuat dokumen kosong untuk print
	let newWindow = window.open('', '_blank');
	newWindow.document.write('<html><head><title>Print Report</title></head><body>');

	// Mengambil konten tabel yang terkait
	newWindow.document.write(table.outerHTML);
	newWindow.document.write('</body></html>');

	// Melakukan print pada dokumen baru
	newWindow.document.close();
	newWindow.print();
}
</script>
</body>
</html>
