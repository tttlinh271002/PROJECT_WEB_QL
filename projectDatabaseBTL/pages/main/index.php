<div class="menu_index">    
    <h3 class="title_menu">Trang quảng trị</h3>
    <div>
        <ul class ="menu_home">
            <li style="background: #ffad33;"><a>Nhân viên</a>
            <p class="tongket">
            <?php
                $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_danhsachnv");
                $row_count = mysqli_num_rows($sql_trang);
                echo "$row_count";
            ?>
            </p>
            </li>
            <li style="background: #ff8566;"><a>Phòng ban</a>
            <p class="tongket">
            <?php
                $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_phongban");
                $row_count = mysqli_num_rows($sql_trang);
                echo "$row_count";
            ?>
            </p>
            </li>
            <li style="background: #ffd633;"><a>Khách hàng</a>
            <p class="tongket">
            <?php
                $sql_trang = mysqli_query($mysqli,"SELECT * FROM proj_thongtinkh");
                $row_count = mysqli_num_rows($sql_trang);
                echo "$row_count";
            ?>
            </p>
            </li>
            <li style="background: #00e673;"><a>Tài khoản</a>
            <p class="tongket">
            <?php
                $sql_trang = mysqli_query($mysqli,"SELECT * FROM pro_admin");
                $row_count = mysqli_num_rows($sql_trang);
                echo "$row_count";
            ?>
            </p>
            </li>
        </ul>
    </div>
    <div class="clear1" style="clear: both"></div>
    <!-- <div>
        <h3>Quy tắc:</h3>
        <p>Công thức tính tiền lương hàng tháng: </p>
        <p>Về chỉ tiêu:</p>
        <p>Số thẻ: a</p>
        <p>Số tiền gửi tiết kiệm: b</p>
        <p>Thành tích: </p>
        <p>Số thẻ: x</p>
        <p>Số tiền tiết kiệm: y</p>
        <p>Số % tiền thưởng = ((x/a)*50% + (y/b)*50%)</p>
        <p>Số tiền thưởng = Số % tiền thưởng * Tiền thưởng chuẩn </p>
        <p>Tiền lương = Tiền lương cứng + Số tiền thưởng</p>
    </div> -->
</div>