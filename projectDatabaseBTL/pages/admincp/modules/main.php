<div>
<?php
    if(isset($_GET['action']) && $_GET['query']){
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else{
        $tam = '';
        $query = '';
    }
    if($tam == 'quanlythongtinnhanvien' && $query=='them'){
        include("quanlythongtinnv/them.php");
        include("quanlythongtinnv/lietke.php");
    }elseif($tam=='quanlythongtinnhanvien' && $query=='sua'){
        include("quanlythongtinnv/sua.php");
    }elseif($tam=='quanlythongtinnhanvien' && $query=='timkiem'){
        include("timkiem.php");
    }elseif($tam=='quanlythongtinnhanvien' && $query=='timkiem1'){
        include("quanlythongtinnv/timkiem.php");
    }else {
        include("dask.php");
    }
?>
</div>