<?php

require '../component/database/koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" href="../images/logo.png">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <title>TIKETIN</title>
    <link rel="icon" href="../images/logo.png">
    <style>
        table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        body{
            background-image: url('../images/bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
        
</head>
<body >
    
    <div class="full-height" style="padding-top: 30px;">
        <center>
        <table border="0" >
            <tr>
                <td width="80%">
                    <font class="edoc-logo">Tiketin</font>
                    <font class="edoc-logo-sub">| WEBSITE BOOKING TIKET KOLAM RENANG</font>
                </td>
                <td  width="20%">
                <span class="badge badge-danger"><a href="../logout/logout.php" style="text-decoration: none; color:white;">Logout</a></span>
                </td>
            </tr>
            
            <tr>
                <td  colspan="3">
                    <p class="heading-text">Pesan Sekarang</p>

                </td>
            </tr>
            <tr>
                <td  colspan="3">
                    <p class="sub-text2" style="color: white;"></p>
                </td>
            </tr>
            <tr>
                
                <td colspan="3">
                    <center>
                    <a href="pesan.php" >
                        <input type="button" value="Tiket Kolam Renang" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                    </a>
                </center>
                </td>
                
            </tr>
            <tr>
                <td colspan="3">
                   
                </td>
            </tr>
        </table>
    </center>
    
    </div>
</body>
</html>