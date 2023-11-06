<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/all.min.css">
    <title>Change Password</title>
    <style>
        body {
            background-image: url('../../../asset/ground.jpg');
        }
        #position_changepassword{
            display: flex;
            align-items: center; 
            margin-left: 10px;
        }
        #h2-change {
            color: #FF0404;
        }
        #h2-password{
            color: #4254F6;
        }
        #div-form-container {
            display: flex;
            justify-content: center;
            text-align: center;
            margin-top: 60px;
        }
        .text-data {
            color: white;
            text-align: center;
            margin-bottom: 15px;
        }
        #form {
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            padding: 5px;
            margin-top: 20px;
        }
        label {
            display: block;
            margin: 10px 0;
            text-align: left;
            font-weight: bold;
        }
        input[type="text"], 
        input[type="password"] {
            width: 87%;
            padding: 10px;
            margin-bottom: 25px;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding-right: 35px;
            background-color: black;
            color: white;
        }
        input[type="submit"] {
            background-color: #0056b3;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0D1282;
        }
        .error-message {
            color: #ff0000;
        }
        .back-button {
            position: absolute;
            top: 10px;
            right: 15px;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            text-decoration: none;
			transition: background-color 0.3s;
        }
		.back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div>
        <div id="position_changepassword">
            <h2 id="h2-change">Change</h2>
            <h2 id="h2-password">Password</h2>
        </div>
        <a class="back-button" href="../home/home_student_finance.php"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div id="div-form-container">
        <form id="form" action="change_password.php" method="POST">
            <label class="text-data" for="nim_nil_nik">Input New Password</label>
            <input type="text" id="nim_nil_nik" name="nim_nil_nik" required placeholder="Masukkan NIK">
            <input type="password" id="oldPassword" name="oldPassword" required placeholder="Masukkan Password Lama">
            <input type="password" id="newPassword" name="newPassword" required placeholder="Masukkan Password Baru">
            <input type="password" id="confirmNewPassword" name="confirmNewPassword" required placeholder="Konfirmasi Password Baru">
            <input id="button" type="submit" value="Change Password">
        </form>
    </div>
</body>
</html>
