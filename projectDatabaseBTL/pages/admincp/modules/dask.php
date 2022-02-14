<div class="menu_dask">
  <h3>THÔNG TIN NHÂN VIÊN</h3>
  <div class="bao_dask">
    <div class ="chinhsua">
      <a href="index.php?quanly=thongtinnhanvien&action=quanlythongtinnhanvien&query=them"><i class="fa fa-pencil"></i>Chỉnh sửa</a>
    </div>
    <div class ="dask_tk">
        <form action="index.php?quanly=thongtinnhanvien&action=quanlythongtinnhanvien&query=timkiem" method="POST">
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
      $sql_lietke_danhsachnv = "SELECT * FROM proj_thongtinnv ORDER BY id_nv ASC LIMIT $begin,10";
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
      <th style="width:19%">Địa chỉ</th>
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
      </tr>
      <?php
      }
    ?>
  </table>

  <?php
    $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_thongtinnv");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count/10);
    ?>
    <ul class="list_trang">
        <?php
        for($i=1;$i<=$trang;$i++){
        ?>
            <li><a href="index.php?quanly=thongtinnhanvien&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>