<div class="main">
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        } else{
            $tam = '';
            $query = '';
        }
        if($tam == 'quanlythongtinkhachhang' && $query=='them'){
            include("quanlythongtinkh/them.php");
            include("quanlythongtinkh/lietke.php");
        }elseif($tam=='quanlythongtinkhachhang' && $query=='sua'){
            include("quanlythongtinkh/sua.php");
        }elseif($tam=='quanlythongtinkhachhang' && $query=='timkiem'){
            include("timkiem.php");
        }elseif($tam=='quanlythongtinkhachhang' && $query=='timkiem1'){
            include("quanlythongtinkh/timkiem.php");
        } else {
            include("dask.php");
        }
    ?>
</div>