<?php
    session_start();
    include('connect/connect.php');
    require('mail/sendmail.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = $_POST['password'];
        $sql = "SELECT * FROM pro_admin WHERE username='".$taikhoan."' AND  password='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        $dong = mysqli_fetch_array($row);
        // $tentk = $row['nv_name'];
        if($count>0){
            $_SESSION['dangnhap'] = $dong['nv_name'];
            // $_SESSION['nv_name'] = $tentk;
            header("Location:index.php");
        }else{
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại.")</script>';
            // echo '<p style="color: red">Mật khẩu hoặc Tài khoản sai, vui lòng nhập lại</p>';
        }
    }
    if(isset($_POST['quenmk'])){
        $taikhoan = $_POST['username'];
        $sql = "SELECT a.*, d.email_nv FROM pro_admin a INNER JOIN proj_danhsachnv d ON a.id_nv = d.id_nv
        WHERE a.username='".$taikhoan."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $doi = mysqli_fetch_array($row);

        // echo '<script>alert("Mật khẩu của bạn đã được gửi vào Gmail của bạn. Vui lòng xác nhận và đăng nhập lại")</script>';
        $tieude = "Quên mật khẩu";
        $noidung = "<p>Xin chào ".$doi['nv_name']."!</p>
                    <p>Tài khoản của bạn đã được khôi phục.</p>
                    <p style='font-weight: bold;'>Mã nhân viên: ".$doi['id_nv']."</p>
                    <p style='font-weight: bold;'>Tài khoản: ".$taikhoan."</p>
                    <p style='font-weight: bold;'>Mật khẩu: ".$doi['password']."</p>";
        $maildoi = $doi['email_nv'];
        $mail = new Mailer();
        $mail->maildoimk($tieude, $noidung, $maildoi);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Đăng nhập ADMIN</title>
    <style type="text/css">
        body{
            background: #669999;
            width: 100%;
            height: auto;
        }
        .khunglogin {
            width: auto;
            height: auto;
            margin-inline: auto;
            margin-top: 9%;
            text-align: -webkit-center;
        }
        .table_login {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
            display: table-cell;
            background: #ffe6cc;
            border-style: ridge;
            /* border-color: cadetblue; */
        }
        input[type="text"] {
            padding: 3px;
        }
        input[type="password"] {
            padding: 3px;
        }
        h1 {
            font-weight: bolder;
            color: white;
            margin-bottom: 45px;
        }

    </style>
</head>
<body>
    <div class="khunglogin">
    <form action="" autocomplete="off" method="POST">
        <h1>QUẢN LÝ NHÂN VIÊN NGÂN HÀNG</h1>
        <table class="table_login">
            <tr>
                <td colspan="2" class="dn" style="background: #ffb366;"><h3>Đăng nhập Admin</h3></td>
            </tr>
            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                <td style="padding: 7px;font-weight: 600; border-right: 1px solid #000;">Tài khoản</td>
                <td style="padding: 4px;"><input type="text" name="username" placeholder="username"></td>
            </tr>
            <tr style="border-bottom: 1px solid #000;">
                <td style="padding: 7px;font-weight: 600; border-right: 1px solid #000;">Mật khẩu</td>
                <td style="padding: 4px;"><input type="password" name="password" placeholder="password"></td>
            </tr>
        <div>
            <tr>
                <td colspan="2"><input type="submit" name="quenmk" value="Quên mật khẩu" 
                onclick="alert('Mật khẩu của bạn đã được gửi vào mail. Xin vui lòng kiểm tra và đăng nhập lại')" 
                style="margin-top: 7px; padding: 3px; font-weight: 600;"></td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 8px;"><input type="submit" name="dangnhap" value="Đăng nhập" style="padding: 3px;background: #ffb366;
    font-weight: 600;"></td>
            </tr>
        </div>
        </table>
    </form>
    </div>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
</body>
</html>