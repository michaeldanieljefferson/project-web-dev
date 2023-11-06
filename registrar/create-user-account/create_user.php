<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Create User Account</title>
    <style>
        body {
            background-image: url('../../../asset/ground.jpg');
        }

        table {
            border-collapse: collapse;
            width: 100%;
            /* background-color: black; */
            background-color: rgba(0, 0, 0, 0.7);
        }

        label {
            font-size: 20px;
            display: block;
            color: white;
        }

        input[type="text"], select {
            width: 70%;
            font-size: 18px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .home-button {
            position: absolute;
            top: 22px;
            right: 330px;
            color: #ffffff;
            padding: 15px 25px;
            border: none;
            border-radius: 3px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
            font-size: 18px;
        }

        .home-button .icon {
            margin-right: 5px;
        }

        .home-button:hover {
            background-color: #0056b3;
        }

        .view-list-button {
            position: absolute;
            top: 22px;
            right: 140px;
            color: #ffffff;
            padding: 15px 25px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
            font-size: 18px;
        }

        .view-list-button .icon {
            margin-right: 5px;
        }

        .view-list-button:hover {
            background-color: #0056b3;
        }

        .logout-button {
            position: absolute;
            top: 22px;
            right: 10px;
            color: #ffffff;
            padding: 15px 25px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
            font-size: 18px;
        }

        .logout-button:hover {
            background-color: #0056b3;
        }

        .create_user {
            color: white;
        }

        .submit {
            background-color: #4254F6;
            color: #fff;
            font-size: 18px;
            padding: 15px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .submit:hover {
            background-color: #292E57;
            color: #fff;
        }
    </style>
</head>
<body>
<div>
    <div>
        <h1 class="create_user">Create User Account</h1>
        <a class="home-button" href="../home/home_registrar.php"><i class="fas fa-home icon"></i> Home</a>
        <a class="view-list-button" href="../view-list-user/view_list_user.php"><i class="fas fa-list icon"></i> View List User</a>
        <a class="logout-button" href="../../logout.php"><i class="fas fa-sign-out-alt icon"></i> Logout</a>
    </div>
    <form method="post" action="simpan_data_user.php">
        <table>
            <tr>
                <td>
                    <label for="username">FullName:</label>
                    <input type="text" id="username" name="username" required><br><br>

                    <label for="nim_nil_nik">NIM/NIL/NIK:</label>
                    <input type="number" id="nim_nil_nik" name="nim_nil_nik" required><br><br>

                    <label for="no_regis">No.Regis(Khusus student):</label>
                    <input type="text" id="no_regis" name="no_regis"><br><br>

                    <label for="fakultas">Fakultas (Khusus student):</label>
                    <select id="fakultas" name="fakultas">
                        <option value="" disabled selected>Pilih Fakultas</option>
                        <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                        <option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
                        <option value="Fakultas Filsafat">Fakultas Filsafat</option>
                        <option value="Fakultas Pendidikan">Fakultas Pendidikan</option>
                        <option value="Fakultas Keperawatan">Fakultas Keperawatan</option>
                        <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                    </select><br><br>

                    <label for="prodi">Prodi (Khusus student):</label>
                    <select id="prodi" name="prodi">
                        <option value="" disabled selected>Pilih Prodi</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Filsafat Agama">Filsafat Agama</option>
                        <option value="Pendidikan Agama">Pendidikan Agama</option>
                        <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                        <option value="Pendidikan Ekonomi">Pendidikan Ekonomi</option>
                        <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                    </select><br><br>

                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="Student Labor">Student Labor</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Student Finance">Student Finance</option>
                    </select><br><br>
                </td>
                <td>
                    <label for="departemen">Departemen:</label>
                    <select id="departemen" name="departemen" required>
                        <option value="" disabled selected>Pilih Departemen</option>
                        <option value="Accounting Office">Accounting Office</option>
                        <option value="Bidang Kemahasiswaan">Bidang Kemahasiswaan</option>
                        <option value="UBS">UBS</option>
                        <option value="Filkom">Filkom</option>
                        <option value="Filsafat">Filsafat</option>
                        <option value="FKIP">FKIP</option>
                        <option value="NURSE">NURSE</option>
                        <option value="Pertanian">Pertanian</option>
                        <option value="Boys Dorm">Boys Dorm</option>
                        <option value="Girls Dorm">Girls Dorm</option>
                        <option value="Ground">Ground</option>
                        <option value="Custodial">Custodial</option>
                        <option value="Cafetaria">Cafetaria</option>
                        <option value="Computer Lab">Computer Lab</option>
                        <option value="Housing">Housing</option>
                        <option value="Library">Library</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="NOC/SIU">NOC/SIU</option>
                        <option value="Registrar">Registrar</option>
                        <option value="Research">Research</option>
                        <option value="Security">Security</option>
                        <option value="Akademi Sekretari Klabat">Akademi Sekretari Klabat</option>
                        <option value="Unklab Information Center">Unklab Information Center</option>
                        <option value="HUMAS">HUMAS</option>
                        <option value="E-marketing">E-marketing</option>
                        <option value="Gereja & Konseling">Gereja & Konseling</option>
                        <option value="Bakery">Bakery</option>
                        <option value="President Office">President Office</option>
                        <option value="LPMI">LPMI</option>
                        <option value="Clinic">Clinic</option>
                    </select><br><br>

                    <label for="supervisor_name">Supervisor Name(Khusus student):</label>
                    <input type="text" id="supervisor_name" name="supervisor_name"><br><br>

                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="" disabled selected>Pilih Role</option>
                        <option value="student">Student</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="student_finance">Student Finance</option>
                    </select><br><br>

                    <label for="password">Password:</label>
                    <input type="text" id="password" name="password" required><br><br>

                    <!-- Ubah tipe tombol "Submit" menjadi "button" dan tambahkan onclick -->
                    <button type="button" class="submit" onclick="validateForm()">Simpan Data</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
function validateForm() {
    var username = document.getElementById("username").value;
    var nimNilNik = document.getElementById("nim_nil_nik").value;
    var status = document.getElementById("status").value;
    var departemen = document.getElementById("departemen").value;
    var role = document.getElementById("role").value;

    if (username === "" || nimNilNik === "" || status === "" || departemen === "" || role === "") {
        alert("Masukkan semua data atau data yang wajib diisi.");
    } else {
        // Jika semua data telah diisi, formulir akan di-submit
        document.querySelector("form").submit();
    }
}
</script>
</body>
</html>
