<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>View Report</title>
    <style>
        body {
            background-image: url('../../../asset/ground.jpg');
            /* font-family: Arial, sans-serif; */
			background-attachment: fixed;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
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
        #approve-button {
            background-color: #0056b3;
            color: white;
        }
        #print-button {
            background-color: #FD8D14;
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
        #data-student {
            color: white;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            color: white;
        }
        th {
            background-color: black;
            color: white;
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
            background-color: #0056b3;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        @media print {
            .search-form, .detail-button, .print-button {
                display: none;
            }
        }
       .totalHoursPerStudent {
            color: white;
            text-align: right;
            font-size: 20px; /* Menyesuaikan ukuran teks sesuai permintaan */
            margin-right: 20px; /* Menggeser teks ke kanan */
        }
    </style>
</head>
<body>

    <div class="search-form">
        <form method="post" action="">
            <input type="text" name="search" placeholder="Masukkan nama student labor" value="<?php echo isset($search) ? $search : ''; ?>">
            <input type="submit" value="Cari">
        </form>
        <a class="home-button" href="../home/home_student_finance.php"><i class="fas fa-home icon"></i>Home</a>
        <a class="logout-button" href="../../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
     
    date_default_timezone_set('Asia/Jakarta'); 
    $search = ""; // Inisialisasi variabel pencarian

    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM tbl_finance_view_report WHERE student_name LIKE '%$search%'";
    } else {
        $sql = "SELECT * FROM tbl_finance_view_report";
    }

    $result = $conn->query($sql);

    $totalHoursPerStudent = array(); // Total jam kerja per student labor

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $student_name = $row["student_name"];
            if (!isset($totalHoursPerStudent[$student_name])) {
                $totalHoursPerStudent[$student_name] = 0;
            }
            $totalHoursPerStudent[$student_name] += (float) $row["total_jam_kerja"];

            if ($student_name !== $previous_student) {
                if ($previous_student !== null) {
                    //echo "</table>";
					echo "<tr><td colspan='8'></td><td>Total Jam Kerja $previous_student Per Minggu:</td><td>" . $totalHoursPerStudent[$previous_student] . " Jam</td></tr>";
					echo "</table>";
                }

                echo "<label for='data-student' id='data-student'>Student Name: $student_name</label>";
                echo "<table>";
                echo "<tr>
                          <th>No Regis</th>
                          <th>Departemen</th>
                          <th>Hari</th>
                          <th>Tanggal Kerja</th>
                          <th>Gambar Mulai Kerja</th>
                          <th>Gambar Selesai Kerja</th>
                          <th>Durasi Kerja</th>
                          <th>Total Jam Kerja</th>
                          <th>Nama Supervisor</th>
                          <th>Status Laporan</th>
                          <th>Cetak Laporan</th>
                      </tr>";
                $previous_student = $student_name;
            }

            $formatted_date = date("d/m/Y", strtotime($row["tanggal_kerja"]));

            echo "<tr>";
            echo "<td>" . $row["no_regis"] . "</td>";
            echo "<td>" . $row["departemen"] . "</td>";
            echo "<td>" . $row["day"] . "</td>";
            echo "<td>" . $formatted_date . "</td>";
            echo "<td><img src='http://103.52.114.17/labornote/api/uploadGambar/image/" . $row["gambar_mulai"] . "' alt='gambar mulai' width='150' height='150'></td>";
            echo "<td><img src='http://103.52.114.17/labornote/api/uploadGambar/image/" . $row["gambar_selesai"] . "' alt='gambar selesai' width='150' height='150'></td>";
            echo "<td>" . $row["jam_mulai_selesai"] . "</td>";
            echo "<td>" . $row["total_jam_kerja"] . "</td>";
            echo "<td>" . $row["supervisor_name"] . "</td>";
            echo "<td><button id='approve-button' onclick='approveReport(this)'>Approve</button></td>";
            echo "<td><button id='print-button' onclick='printReport(this)'>Print Report</button></td>";
            echo "</tr>";
        }

        if ($previous_student !== null) {
            echo "<tr><td colspan='8'></td><td>Total Jam Kerja $previous_student Per Minggu:</td><td>" . $totalHoursPerStudent[$previous_student] . " Jam</td></tr>";
            echo "</table>";
        }
    } else {
        echo "Tidak ada data laporan kerja student labor";
    }

    $conn->close();
    ?>
<script>
    function approveReport(button) {
    const studentName = document.getElementById('approve-button').parentElement.parentElement.parentElement.parentElement.previousElementSibling.innerHTML.replace("Student Name: ","")
	console.log(studentName);
	
    if (confirm("Apakah Anda yakin ingin menyetujui laporan ini?")) {
        // Kirim data-student ke backend PHP menggunakan Fetch API
        fetch("../approve-report/approved_report.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "student_name=" + studentName,
        })
        .then(response => {
            if (response.ok) {
                // Laporan berhasil disetujui, hapus baris dari tabel
                const row = button.closest("tr");
                row.remove();
                alert("Laporan berhasil disetujui.");
            } else {
                alert("Error: " + response.statusText);
            }
        })
        .catch(error => {
            alert("Network Error: " + error.message);
        });
    }
}


    function printReport(button) {
        // Implementasikan logika untuk mencetak laporan siswa di sini
        // Anda dapat menggunakan JavaScript untuk mencetak halaman saat tombol ini diklik.
        window.print();
    }
	
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