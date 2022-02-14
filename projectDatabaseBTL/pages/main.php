<div class ="main">
    <?php
    include("sidebar/sidebar.php");
    ?>
    <div class ="menuright">
        <?php
        if(isset($_GET['quanly'])){
            $tam = $_GET['quanly'];
        } else{
            $tam = '';
        }
        if($tam == 'danhsachnhanvien'){
            include("admincp1/index.php");
        } elseif ($tam == 'thongtinnhanvien'){
            include("admincp/index.php");
        } elseif ($tam == 'thanhtichnhanvien'){
            include("admincp2/index.php");
        } elseif ($tam == 'luongnhanvien'){
            include("admincp4/index.php");
        } elseif ($tam == 'thongtinkhachhang'){
            include("admincp3/index.php");
        } elseif ($tam == 'thongtinphongban'){
            include("admincp5/index.php");
        } elseif ($tam == 'phancapchucvu'){
            include("admincp6/index.php");
        } elseif ($tam == 'doimatkhau'){
            include("main/doimk.php");
        } else {
            include("main/index.php");
        }
        ?>
    </div>
</div>