<div class="menu_dask">
<?php
    if(isset($_POST['timkiem1'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_lietke_danhsachnv = "SELECT * FROM proj_danhsachnv WHERE name_nv LIKE '%".$tukhoa."%' OR id_nv LIKE '%".$tukhoa."%' ORDER BY phong ASC";
    $query_lietke_danhsachnv = mysqli_query($mysqli,$sql_lietke_danhsachnv);
?>

<h3>LIỆT KÊ DANH SÁCH TÌM KIẾM: <?php echo $_POST['tukhoa']; ?></h3>
<div class="them_timkiem">
    <div class ="them">
        <a href="index.php?quanly=danhsachnhanvien&action=quanlydanhsachnhanvien&query=them"><i class="fa fa-angle-double-left"></i>Quay lại</a>
    </div>
</div>

<!-- <p>Liệt kê danh mục sản phẩm</p> -->
<table class ="bangtc1">
  <tr class ="hang1">
    <th class ="thaydoi" style="width:4%">STT</th>
    <th style="width:6%">Mã nhân viên</th>
    <th style="width:10%">Ảnh</th>
    <th style="width:10%">Tên nhân viên</th>
    <th style="width:7%">Email</th>
    <th style="width:7%">Chức vụ</th>
    <th style="width:7%">Phòng ban</th>
    <th style="width:7%">Bằng cấp</th>
    <th class ="thaydoi" style="width: 8%">Thay đổi</th>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhsachnv)) {
        $i++;
    ?>
    <tr class ="hangcot1">
        <td class ="thaydoi"><?php echo $i ?></td>
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
                <i class="fas fa-eraser"></i></a> | 
            <a href ="?quanly=danhsachnhanvien&action=quanlydanhsachnhanvien&query=sua&idnhanvien=<?php echo $row['id_nv']?>">
                <i class="fas fa-edit"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>
</div>