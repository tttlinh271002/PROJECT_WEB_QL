<div class="menu_dask">
<h3>THÔNG TIN KHÁCH HÀNG</h3>
<div class="bao_dask">
    <div class ="chinhsua">
      <a href="index.php?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=them"><i class="fa fa-pencil"></i>Chỉnh sửa</a>
    </div>
    <div class ="dask_tk">
        <form action="index.php?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=timkiem" method="POST">
            <input type="text" placeholder= "Tìm kiếm" name="tukhoa">
            <input type="submit" name="timkiem" value="Tìm kiếm">
        </form>
    </div>
  </div>
<?php
  if(isset($_GET['trang'])){
      $page = $_GET['trang'];
  }else{
      $page = '';
  }
  if($page =='' || $page == 1){
      $begin = 0;
  }else{
      $begin = ($page-1)*10;
  }
    $sql_lietke_thongtinkh = "SELECT * FROM proj_thongtinkh ORDER BY id_kh ASC LIMIT $begin,10";
    $query_lietke_thongtinkh = mysqli_query($mysqli,$sql_lietke_thongtinkh);
?>
<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:4%">STT</th>
    <th style="width:10%">Mã khách hàng</th>
    <th style="width:13%">Loại giao dịch</th>
    <th style="width:10%">Mã giao dịch</th>
    <th style="width:10%">Số lượng</th>
    <th style="width:10%">Nhân viên phụ trách</th>
    <th style="width:19%">Thời gian</th>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_thongtinkh)) {
        $i++;
    ?>
    <tr class ="hangcot1">
        <td class ="thaydoi"><?php echo $i ?></td>
        <td><?php echo $row['id_kh'] ?></td>
        <td><?php if($row['giaodich'] == 0){
            echo 'Thẻ';
        }else{
            echo 'Tiết kiệm';
        }
        ?></td>
        <td><?php echo $row['ma_gd'] ?></td>
        <td><?php echo number_format($row['amount_gd'],0,',','.'); ?></td>
        <td><?php echo $row['id_nv'] ?></td>
        <td><?php echo $row['tg'] ?></td>
    </tr>
    <?php
    }
  ?>
</table>
<?php
    $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_thongtinkh");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count/10);
    ?>
    <ul class="list_trang">
        <?php
        for($i=1;$i<=$trang;$i++){
        ?>
            <li><a href="index.php?quanly=thongtinkhachhang&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>