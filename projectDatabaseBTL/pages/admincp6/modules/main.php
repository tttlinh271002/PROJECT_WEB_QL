<div class="main">
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        } else{
            $tam = '';
            $query = '';
        }
        if($tam == 'quanlyphancap' && $query=='them'){
            include("phancapcv/them.php");
            include("phancapcv/lietke.php");
        }elseif($tam=='quanlyphancap' && $query=='sua'){
            include("phancapcv/sua.php");
        }elseif($tam=='quanlyphancap' && $query=='timkiem'){
            include("timkiem.php");
        }elseif($tam=='quanlyphancap' && $query=='timkiem1'){
            include("phancapcv/timkiem.php");
        } else {
            include("dask.php");
        }
    ?>
</div>