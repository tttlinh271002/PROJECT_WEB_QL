<div>
<?php
    if(isset($_GET['query'])){
        $query = $_GET['query'];
    } else{
        $query = '';
    }
    if($query == 'timkiem') {
        include("timkiem.php");
    }else {
        include("dask.php");
    }
?>
</div>