<div class="menu_lietke">
<h3>LIỆT KÊ DANH SÁCH NHÂN VIÊN</h3>
<p>
    <form action="index.php?quanly=danhsachnhanvien&action=quanlydanhsachnhanvien&query=timkiem1" method="POST">
        <input type="text" placeholder="Tìm kiếm" name="tukhoa">
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
        $begin = ($page*3)-3;
    }
    $sql_lietke_danhsachnv = "SELECT * FROM proj_danhsachnv ORDER BY phong ASC LIMIT $begin,3";
    $query_lietke_danhsachnv = mysqli_query($mysqli,$sql_lietke_danhsachnv);
?>
<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:4%">STT</th>
    <th style="width:10%">Mã nhân viên</th>
    <th style="width:10%">Ảnh</th>
    <th style="width:11%">Tên nhân viên</th>
    <th style="width:6%">Email</th>
    <th style="width:9%">Chức vụ</th>
    <th style="width:7%">Phòng ban</th>
    <th style="width:7%">Bằng cấp</th>
    <th class ="thaydoi" style="width: 8%">Thay đổi</th>
  </tr>
  <?php
    $t = 0;
    while($row = mysqli_fetch_array($query_lietke_danhsachnv)) {
        $t++;
    ?>
    <tr class ="hangcot1">
        <td class ="thaydoi"><?php echo $t ?></td>
        <td><?php echo $row['id_nv'] ?></td>
        <td><img src="images/<?php echo $row['images_nv'] ?>"></td>
        <td><?php echo $row['name_nv'] ?></td>
        <td><?php echo $row['email_nv'] ?></td>
        <td><?php if($row['chucvu'] == 0){
            echo 'Nhân viên';
        }elseif($row['chucvu'] == 1) {
            echo 'Phó phòng';
        }elseif($row['chucvu'] == 2) {
            echo 'Trưởng phòng';
        }else{
            echo 'Giám đốc';
        }
        ?></td>
        <td><?php echo $row['phong'] ?></td>
        <td><?php if($row['trinhdo'] == 0){
            echo 'Đại học';
        }elseif($row['trinhdo'] == 1) {
            echo 'Thạc sĩ';
        }else{
          echo 'Tiến sĩ';
        }
        ?></td>
        <td class ="thaydoi">
            <a href ="pages/admincp1/modules/quanlydanhsachnv/xuly.php?idnhanvien=<?php echo $row['id_nv']?>">
            <i class="fas fa-eraser" onclick="alert('Xóa danh sách thành công')"></i></a> | 
            <a href ="?quanly=danhsachnhanvien&action=quanlydanhsachnhanvien&query=sua&idnhanvien=<?php echo $row['id_nv']?>">
            <i class="fas fa-edit"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>
<?php
  $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_danhsachnv");
  $row_count = mysqli_num_rows($sql_trang);
  $trang = ceil($row_count/3);
?>
<ul class="list_trang">
    <?php
    for($i=1;$i<=$trang;$i++){
    ?>
        <li><a href="index.php?quanly=danhsachnhanvien&action=quanlydanhsachnhanvien&query=them&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
    }
    ?>
</ul>
</div>