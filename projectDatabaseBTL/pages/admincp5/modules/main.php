<div>
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        } else{
            $tam = '';
            $query = '';
        }
        if($tam == 'quanlyphongban' && $query=='them'){
            include("quanlyphongban/them.php");
            include("quanlyphongban/lietke.php");
        }elseif($tam=='quanlyphongban' && $query=='sua'){
            include("quanlyphongban/sua.php");
        }elseif($tam=='quanlyphongban' && $query=='timkiem'){
            include("timkiem.php");
        }elseif($tam=='quanlyphongban' && $query=='timkiem1'){
            include("quanlyphongban/timkiem.php");
        }else{
            include("dask.php");
        }
    ?>
</div>