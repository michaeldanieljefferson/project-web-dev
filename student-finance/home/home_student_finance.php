<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	 <link rel="stylesheet" href="path/to/font-awesome/css/all.min.css">

    <title>Dashboard Home - LABORNOTE</title>
    <style>
    body {
        background-image: url('../../../asset/ground.jpg');
        flex: 1;
        padding: 0;
		background-attachment: fixed;
    }

    .header {
        background-color: black;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 25px;
        border-radius: 10px;
    }
    #header-labornote {
        display: flex;
        align-items: center;
    }
    #labor {
        color: #B90000;
    }

    #note {
        color: #4254F6;
    }

    .logout-button {
        position: absolute;
        right: 22px;
        color: #ffffff;
        padding: 10px 15px;
        border-radius: 3px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .logout-button:hover {
        background-color: #B90000;
        box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
    }

    /* CSS untuk konten */
    .content {
        text-align: center;
        margin: 20px;
        display: flex;
        flex-direction: column; 
        justify-content: center;
        align-items: center;
        height: 400px;
    }

    .button {
        width: 220px;
        height: 100px;
        background-color: #4254F6;
        color: #fff;
        border: none;
        border-radius: 3px;
        font-size: 20px;
        margin: 10px;
        transition: background-color 0.3s;
        text-decoration: none;
        display: flex;
        flex-direction: column; 
        justify-content: center; 
        align-items: center;
    }

    .button:hover {
        background-color: #0056b3;
    }
    /* .header-labornote {
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
        margin-top: 5%;
        background-color: black;
        height: 40px;
        padding: 0;
    } */
    .labornote {
        position: relative;
        color: wheat;
        /* box-shadow: grey; */
        font-style: italic;
        text-align: center;
        margin-top: 10.2%;
        margin-bottom: -10px;
    }
</style>

</head>
<body>
    <div class="header">
        <div id="header-labornote">
            <h2 id="labor">Labor</h2>
            <h2 id="note">Note</h2>
        </div>
        <a class="logout-button" href="../../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <div class="content">
        <a class="button" href="../view-report/view_report.php"><i class="fas fa-file-alt"></i>View Report</a>
        <a class="button" href="../view-history/view_history_report.php"><i class="fa fa-history"></i>View History Report</a>
		<a class="button" href="../change-password/form_change_pw.php"><i class="fa fa-lock"></i>Change Password</a>
    </div>
	<div class="footer">
    <!-- <span class="labornote">2023 @ LABORNOTE</span> -->
    <p class="labornote">2023 @ LABORNOTE</p>
</div>
</body>
</html>
