<div>
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        } else{
            $tam = '';
            $query = '';
        }
        if($tam == 'quanlydanhsachnhanvien' && $query=='them'){
            include("quanlydanhsachnv/them.php");
            include("quanlydanhsachnv/lietke.php");
        }elseif($tam=='quanlydanhsachnhanvien' && $query=='sua'){
            include("quanlydanhsachnv/sua.php");
        }elseif($tam=='quanlydanhsachnhanvien' && $query=='timkiem'){
            include("timkiem.php");
        }elseif($tam=='quanlydanhsachnhanvien' && $query=='timkiem1'){
            include("quanlydanhsachnv/timkiem.php");
        } else {
            include("dask.php");
        }
    ?>
</div>