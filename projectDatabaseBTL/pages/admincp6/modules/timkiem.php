<div class="menu_dask">
    <?php
        if(isset($_POST['timkiem'])){
            $tukhoa = $_POST['tukhoa'];
        }
        $sql_lietke_phancap = "SELECT * FROM proj_phancap WHERE chucvu LIKE '%".$tukhoa."%' ORDER BY chucvu DESC";
        $query_lietke_phancap = mysqli_query($mysqli,$sql_lietke_phancap);
    ?>

  <h3>LIỆT KÊ PHÂN CẤP TÌM KIẾM: <?php echo $_POST['tukhoa']; ?></h3>
    <div class="tiemkiem">
        <div class ="quaylai">
            <a href="index.php?quanly=phancapchucvu"><i class="fa fa-angle-double-left"></i>Quay lại</a>
        </div>
        <div class ="quaylai">
            <a href="index.php?quanly=phancapchucvu&action=quanlyphancap&query=them"><i class="fa fa-pencil"></i>Chỉnh sửa</a>
        </div>
    </div>

  <table class ="bangtc1">
    <tr class ="hang1">
      <th class ="thaydoi" style="width:" rowspan="2">STT</th>
      <th style="width:" rowspan="2">Chức vụ</th>
      <th class ="thaydoi" style="width:" colspan="2">Chỉ tiêu</th>
      <th style="width:" rowspan="2">Lương cứng</th>
      <th style="width:" rowspan="2">Lương thưởng chuẩn</th>
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
          <td class ="thaydoi"><?php echo $i ?></td>
          <td><?php if($row['chucvu'] == 0){
              echo 'Nhân viên';
          }elseif($row['chucvu'] == 1) {
              echo 'Phó phòng';
          }elseif($row['chucvu'] == 2){
              echo 'Trưởng phòng';
          }else{
              echo 'Giám đốc';
          }
          ?></td>
          <td><?php echo $row['the'] ?></td>
          <td><?php echo $row['tietkiem'] ?></td>
          <td><?php echo $row['luongcung'] ?></td>
          <td><?php echo $row['thuongchuan'] ?></td>
      </tr>
      <?php
      }
    ?>
</table>
</div>