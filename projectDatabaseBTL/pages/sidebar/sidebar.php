<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
        header('Location:login.php');
    }
?>
<div class ="menuleft">  
    <!-- <div class ="account">
        <p>ACCOUNT</p>
    </div> -->
    <div class ="trangchu">
        <i class='fas fa-user-graduate' style="color: #007399"></i>
        <a href="index.php?" style="text-decoration: none;color: white; font-size: larger;
        font-weight: 600;"><?php if(isset($_SESSION['dangnhap'])){
                    echo $_SESSION['dangnhap'];
                }
                ?></a>
    </div>

    <ul class ="list_menu">
        <li><a href="index.php?quanly=danhsachnhanvien">
            <i class='fa fa-address-book' style="color: #007399;margin-right: 5px;"></i>Danh sách nhân viên</a></li>
        <li><a href ="index.php?quanly=thongtinnhanvien">
            <i class='fa fa-address-card' style="color: #007399;margin-right: 5px;"></i>Thông tin nhân viên</a></li>
        <li><a href="index.php?quanly=thongtinphongban">
            <i class='fa fa-file-text' style="color: #007399;margin-right: 5px;"></i>Thông tin phòng ban</a></li>
        <li><a href="index.php?quanly=phancapchucvu">
            <i class='fas fa-book' style="color: #007399;margin-right: 5px;"></i>Phân cấp chức vụ</a></li>
        <li><a href="index.php?quanly=thanhtichnhanvien&trang=1">
            <i class='fas fa-award' style="color: #007399;margin-right: 5px;"></i>Thành tích làm việc</a></li>
        <li><a href="index.php?quanly=luongnhanvien&trang=1">
            <i class='fas fa-hand-holding-usd' style="color: #007399;margin-right: 5px;"></i>Lương nhân viên</a></li>
        <li><a href="index.php?quanly=thongtinkhachhang">
            <i class='far fa-address-card' style="color: #007399;margin-right: 5px;"></i>Thông tin khách hàng</a></li>
        <li><a href="index.php?quanly=doimatkhau">
            <i class='fa fa-edit' style="color: #007399;margin-right: 5px;"></i>Đổi mật khẩu</a></li>
        
    </ul>
    <div class="trangchu">
    <i class='fas fa-angle-double-right' style="color: #007399"></i>
        <a href="index.php?dangxuat=1" style="text-decoration: none;color: white; font-size: larger;
        font-weight: 600;">Đăng xuất</a>
    <i class='fas fa-angle-double-left' style="color: #007399;margin-right: 5px;"></i>
    </div>
    
</div>