<div class="menu_lietke">
<h3>LIỆT KÊ THÔNG TIN NHÂN VIÊN</h3>
<p>
    <form action="index.php?quanly=thongtinnhanvien&action=quanlythongtinnhanvien&query=timkiem1" method="POST">
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
    $sql_lietke_danhsachnv = "SELECT * FROM proj_thongtinnv ORDER BY id_nv ASC LIMIT $begin,5";
    $query_lietke_danhsachnv = mysqli_query($mysqli,$sql_lietke_danhsachnv);
?>
<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:4%">STT</th>
    <th style="width:13%">Tên nhân viên</th>
    <th style="width:10%">Mã nhân viên</th>
    <th style="width:10%">Ngày sinh</th>
    <th style="width:10%">Số điện thoại</th>
    <th style="width:10%">CMND</th>
    <th style="width:10%">Địa chỉ</th>
    <th class ="thaydoi" style="width:8%">Thay đổi</th>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhsachnv)) {
        $i++;
    ?>
    <tr class ="hangcot1">
        <td class ="thaydoi"><?php echo $i ?></td>
        <td><?php echo $row['name_nv'] ?></td>
        <td><?php echo $row['id_nv'] ?></td>
        <td><?php echo $row['birth_nv'] ?></td>
        <td><?php echo $row['sdt_nv'] ?></td>
        <td><?php echo $row['cmnd_nv'] ?></td>
        <td><?php echo $row['address_nv'] ?></td>
        <td class ="thaydoi">
            <a href ="pages/admincp/modules/quanlythongtinnv/xuly.php?idnhanvien=<?php echo $row['id_nv']?>">
            <i class="fas fa-eraser" onclick="alert('Xóa thông tin thành công')"></i></a> | 
            <a href ="?quanly=thongtinnhanvien&action=quanlythongtinnhanvien&query=sua&idnhanvien=<?php echo $row['id_nv']?>">
            <i class="fas fa-edit"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>
<?php
  $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_thongtinnv");
  $row_count = mysqli_num_rows($sql_trang);
  $trang = ceil($row_count/5);
?>
<ul class="list_trang">
    <?php
    for($i=1;$i<=$trang;$i++){
    ?>
        <li><a href="index.php?quanly=thongtinnhanvien&action=quanlythongtinnhanvien&query=them&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
    }
    ?>
</ul>
</div>