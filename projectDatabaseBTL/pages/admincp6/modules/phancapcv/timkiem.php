<div class="menu_dask">
    <?php
        if(isset($_POST['timkiem1'])){
            $tukhoa = $_POST['tukhoa'];
        }
        $sql_lietke_phancap = "SELECT * FROM proj_phancap WHERE chucvu LIKE '%".$tukhoa."%' ORDER BY chucvu DESC";
        $query_lietke_phancap = mysqli_query($mysqli,$sql_lietke_phancap);
    ?>
<h3>LIỆT KÊ PHÂN CẤP TÌM KIẾM: <?php echo $_POST['tukhoa']; ?></h3>
<div class="them_timkiem">
    <div class ="them">
        <a href="index.php?quanly=phancapchucvu&action=quanlyphancap&query=them"><i class="fa fa-angle-double-left"></i>Quay lại</a>
    </div>
</div>
<table class ="bangtc1">
  <tr class ="hang1">
    <th style="width:" rowspan="2">STT</th>
    <th style="width:" rowspan="2">Chức vụ</th>
    <th style="width:" colspan="2">Chỉ tiêu</th>
    <th style="width:" rowspan="2">Lương cứng</th>
    <th style="width:" rowspan="2">Lương thưởng chuẩn</th>
    <th style="width:" rowspan="2">Quản lý</th>
  </tr>
  <tr class ="hang1">
    <th>Thẻ</th>
    <th>Tiền tiết kiệm</th>
  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_phancap)) {
        $i++;
    ?>
    <tr class ="hangcot1">
        <td><?php echo $i ?></td>
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
        <td><?php echo $row['the'] ?></td>
        <td><?php echo $row['tietkiem'] ?></td>
        <td><?php echo $row['luongcung'] ?></td>
        <td><?php echo $row['thuongchuan'] ?></td>
        <td>
            <a href ="pages/admincp6/modules/phancapcv/xuly.php?idchucvu=<?php echo $row['chucvu']?>">Xóa</a> | 
            <a href ="?quanly=phancapchucvu&action=quanlyphancap&query=sua&idchucvu=<?php echo $row['chucvu']?>">Sửa</a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>