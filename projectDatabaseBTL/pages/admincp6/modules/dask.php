<div class="menu_dask">
  <h3>PHÂN CẤP CHỨC VỤ</h3>
  <div class="bao_dask">
      <div class ="chinhsua">
        <a href="index.php?quanly=phancapchucvu&action=quanlyphancap&query=them"><i class="fa fa-pencil"></i>Chỉnh sửa</a>
      </div>
      <div class ="dask_tk">
          <form action="index.php?quanly=phancapchucvu&action=quanlyphancap&query=timkiem" method="POST">
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
      $sql_lietke_phancap = "SELECT *FROM proj_phancap ORDER BY chucvu DESC LIMIT $begin,10";
      $query_lietke_phancap = mysqli_query($mysqli,$sql_lietke_phancap);
  ?>

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
          <td><?php echo number_format($row['tietkiem'],0,',','.'); ?></td>
          <td><?php echo number_format($row['luongcung'],0,',','.'); ?></td>
          <td><?php echo number_format($row['thuongchuan'],0,',','.'); ?></td>
      </tr>
      <?php
      }
    ?>
</table>

<?php
    $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_phancap");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count/10);
    ?>
    <ul class="list_trang">
        <?php
        for($i=1;$i<=$trang;$i++){
        ?>
            <li><a href="index.php?quanly=phancapchucvu&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>