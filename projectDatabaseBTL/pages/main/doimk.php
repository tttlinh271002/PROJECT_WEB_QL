<?php
    if(isset($_POST['doimatkhau'])){
        $taikhoan = $_POST['username'];
        $matkhau_cu = $_POST['password_cu'];
        $matkhau_moi = $_POST['password_moi'];
        $sql = "SELECT a.*, d.email_nv FROM pro_admin a INNER JOIN proj_danhsachnv d ON a.id_nv = d.id_nv
        WHERE a.username='".$taikhoan."' AND  a.password='".$matkhau_cu."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        $doi = mysqli_fetch_array($row);
        if($count>0){
            require('mail/sendmail.php');
            $sql_update = mysqli_query($mysqli,"UPDATE pro_admin SET password='".$matkhau_moi."' WHERE username='".$taikhoan."'");
            echo '<script>alert("Mật khẩu đã được thay đổi. Thư thông báo đã được gửi vào mail bạn")</script>';

            $tieude = "Đổi mật khẩu thành công";
            $noidung = "<p>Xin chào ".$doi['nv_name']."!</p>
                        <p>Chúc mừng bạn đã thay đổi mật khẩu thành công!</p>
                        <p style='font-weight: bold;'>Tài khoản: ".$taikhoan."</p>
                        <p style='font-weight: bold;'>Mật khẩu mới: ".$matkhau_moi."</p>";
            $maildoi = $doi['email_nv'];
            $mail = new Mailer();
            $mail->maildoimk($tieude, $noidung, $maildoi);
        }else{
            echo '<script>alert("Tài khoản hoặc mật khẩu cũ không đúng, vui lòng nhập lại.")</script>';
            // echo '<p style="color: red">Mật khẩu hoặc Tài khoản sai, vui lòng nhập lại</p>';
        }
    }
?>
<div class="menu_index">
    <h3 class="doikk">ĐỔI MẬT KHẨU TÀI KHOẢN</h3>
    <form action="" autocomplete="off" method="POST">
        <table border="1px" style="text-align: left;border-collapse: collapse; margin-left: 35%; border: 1px solid #000;">
            <tr style="text-align: center; background: #006080;">
                <td colspan="2"><h3 style="color: white; font-size: 20px;">Đổi mật khẩu Admin</h3></td>
            </tr>
            <tr>
                <td style="font-weight: 600; background: #0086b3; color: white; padding: 3px;">Tài khoản</td>
                <td style="padding: 3px; background: #0086b3;"><input type="text" name="username" placeholder="username" style="padding: 2px;"></td>
            </tr>
            <tr>
                <td style="font-weight: 600; background: #0086b3; color: white; padding: 3px;">Mật khẩu cũ</td>
                <td style="padding: 3px; background: #0086b3;"><input type="text" name="password_cu" placeholder="password" style="padding: 2px;"></td>
            </tr>
            <tr>
                <td style="font-weight: 600; background: #0086b3; color: white; padding: 3px;">Mật khẩu mới</td>
                <td style="padding: 3px; background: #0086b3;"><input type="text" name="password_moi" placeholder="password" style="padding: 2px;"></td>
            </tr>
            <tr style="background: #006080;">
                <td colspan="2" style="padding: 10px; text-align: center;"><input type="submit" name="doimatkhau" value="Đổi mật khẩu"
                style="padding: 3px; font-weight: 600; background: white;"></td>
            </tr>
        </table>
    </form>
</div>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>