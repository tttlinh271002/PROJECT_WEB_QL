<div class="menu_lietke">
<h3>LIỆT KÊ THÔNG TIN KHÁCH HÀNG</h3>
<p>
    <form action="index.php?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=timkiem1" method="POST">
        <input type="text" placeholder= "Tìm kiếm" name="tukhoa">
        <input type="submit" name="timkiem1" value="Tìm kiếm">
    </form>
</p>
<?php
    if(isset($_GET['trang'])){
      $page = $_GET['trang'];
    }else{
      $page = '';
    }
    if($page =='' || $page == 1){
      $begin = 0;
    }else{
      $begin = ($page-1)*5;
    }
    $sql_lietke_thongtinkh = "SELECT * FROM proj_thongtinkh ORDER BY id_kh ASC LIMIT $begin,5";
    $query_lietke_thongtinkh = mysqli_query($mysqli,$sql_lietke_thongtinkh);
?>

<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:4%">STT</th>
    <th style="width:13%">Mã khách hàng</th>
    <th style="width:10%">Loại giao dịch</th>
    <th style="width:10%">Mã giao dịch</th>
    <th style="width:10%">Số lượng</th>
    <th style="width:10%">Nhân viên phụ trách</th>
    <th style="width:10%">Thời gian</th>
    <th class ="thaydoi" style="width:8%">Thay đổi</th>
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
        <td class ="thaydoi">
            <a href ="pages/admincp3/modules/quanlythongtinkh/xuly.php?magiaodich=<?php echo $row['ma_gd']?>">
            <i class="fas fa-eraser" onclick="alert('Xóa thông tin thành công')"></i></a> | 
            <a href ="?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=sua&magiaodich=<?php echo $row['ma_gd']?>">
            <i class="fas fa-edit"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>
<?php
  $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_thongtinkh");
  $row_count = mysqli_num_rows($sql_trang);
  $trang = ceil($row_count/5);
?>
<ul class="list_trang">
    <?php
    for($i=1;$i<=$trang;$i++){
    ?>
        <li><a href="index.php?quanly=thongtinkhachhang&action=quanlythongtinkhachhang&query=them&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
    }
    ?>
</ul>
</div>