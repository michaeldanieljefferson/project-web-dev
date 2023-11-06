<!DOCTYPE html>
<html>
<head>
   <title>Data Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body {
            background-image: url('../../../asset/ground.jpg');
            font-family: Arial, sans-serif;
            background-attachment: fixed;
        }
        h1 {
            color: white;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            color: white;
        }
        th {
            background-color: #1F1717;
            color: white;
        }
        .view-list-button {
            position: absolute;
            top: 22px;
            right: 120px;
            background-color: #4caf50;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .view-list-button .icon {
            margin-right: 5px;
        }
        .view-list-button:hover {
            background-color: #0056b3;
        }
        .home-button {
            position: absolute;
            top: 22px;
            right: 250px; 
            color: #ffffff; 
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .home-button .icon {
            margin-right: 5px;
        }
        .home-button:hover {
            background-color: #0056b3;
        }
        .create-button {
            position: absolute;
            top: 22px;
            right: 120px; 
            color: #ffffff; 
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .create-button .icon {
            margin right: 5px;
        }
        .create-button:hover {
            background-color: #0056b3;
        }
        .logout-button {
            position: absolute;
            top: 22px;
            right: 10px;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
        }
        .logout-button:hover {
            background-color: #0056b3;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            background-color: #333;
            border: none;
            color: white;
        }
        input[type="text"]::placeholder {
            color: white;
        }
        input[type="text"]:focus {
            outline: none;
        }
        .table-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>    
    <h1>Data User Account</h1>
    <a class="home-button" href="../home/home_registrar.php"><i class="fas fa-home icon"></i>Home</a>
    <a class="create-button" href="../create-user-account/create_user.php"><i class="fas fa-plus icon"></i>Add User</a>
    <a class="logout-button" href="../../logout.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a>

    <div class="table-container">
        <input type="text" id="searchInput" placeholder="Cari Nama User...">
    
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

        // Menampilkan data dalam bentuk tabel (dengan filter)
        $sql = "SELECT * FROM tbl_user WHERE role != 'registrar'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>User ID</th><th>NIM/NIL</th><th>NIK</th><th>FullName</th><th>No.Regis</th><th>Fakultas</th><th>Prodi</th><th>Department</th><th>Status</th><th>Supervisor Name</th><th>Role</th><th>Password</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["nim_nil"] . "</td>";
                echo "<td>" . $row["nik"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["no_regis"] . "</td>";
                echo "<td>" . $row["fakultas"] . "</td>";
                echo "<td>" . $row["prodi"] . "</td>";
                echo "<td>" . $row["departemen"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>" . $row["supervisor_name"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td><button class='delete-button' id='delete-button-" . $row['user_id'] . "' onclick='deleteUser(" . $row['user_id'] . ")'>Delete</button></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data";
        }

        // Menutup koneksi
        $conn->close();
        ?>
    </div>
    
    <script>
		function deleteUser(userId) {
			if (confirm("Are you sure you want to delete this user account?")) {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState === 4 && xhttp.status === 200) {
						location.reload();
					}
				};

				var deleteUrl = "../crud-registrar/delete_user.php?user_id=" + userId;

				xhttp.open("GET", deleteUrl, true);
				xhttp.send();
			}
		}
		
		function updateUser(userId) {
		if (confirm("Are you sure you want to update this user account?")) {
			var userData = document.getElementById("user_id" + userId); // Ganti "username_cell_" dengan ID dari sel yang berisi username

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState === 4) {
					if (xhttp.status === 200) {
						location.reload();
					} else {
						alert("Error updating user account: " + xhttp.statusText);
					}
				}
			};

			var updateUrl = "../crud-registrar/update_user.php";
			var params = "user_id=" + userId; // Construct parameter string with the updated username

			xhttp.open("POST", updateUrl, true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(params);
			}
		}
	

        // Fungsi pencarian
    // Fungsi pencarian
    function searchUser() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector("table");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) { // Dimulai dari indeks 1 untuk melewati baris header
            var usernameColumnIndex = 3; // Index kolom yang berisi username (sesuaikan dengan struktur tabel)
            td = tr[i].getElementsByTagName("td")[usernameColumnIndex]; // Menggunakan index kolom username
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Tambahkan event listener untuk memanggil fungsi pencarian saat pengguna memasukkan teks
    document.getElementById("searchInput").addEventListener("input", searchUser);
    </script>
</body>
</html>
