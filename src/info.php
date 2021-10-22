<?php include './header.php'; 
$id = $_GET['id'];
?>
<a href="index.php" class="btn btn-success">Quay lại trang chủ</a>

<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col">Mã phương tiện</th>
            <th scope="col">Biển số xe</th>
            <th scope="col">Model</th>
            <th scope="col">năm sản xuất</th>
            <th scope="col">Kiểu oto</th>
            <th scope="col">Giá cho thuê theo ngày</th>
            <th scope="col">Giá cho thuê theo tháng</th>
            <th scope="col">trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <!--xuất dữ liệu theo CSDL -->
        <?php
        //* B1: mở kết nối
        include './config.php';
        //* B2: Truy vấn
        $sql = "SELECT * FROM tb_rentcar WHERE vehicle_id = '$id'";

        //? lưu kết quả trả về $result
        $result = mysqli_query($conn, $sql);

        //* B3: Phân tích sử lý kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo '<td>' . $row['vehicle_id'] . '</td>';
                echo '<td>' . $row['license_no'] . '</td>';
                echo '<td>' . $row['model'] . '</td>';
                echo '<td>' . $row['year'] . '</td>';
                echo '<td>' . $row['ctype'] . '</td>';
                echo '<td>' . $row['drate'] . '</td>';
                echo '<td>' . $row['wrate'] . '</td>';
                echo '<td>' . $row['status'] . '</td>';
                echo '<td>
                <a href="./info.php?id=' . $row['vehicle_id'] . '" class="btn btn-primary">Chi tiết</a>
                <a href="process/edit.php?id=' . $row['vehicle_id'] . '" class="btn btn-success">Sửa</a>
                <a href="process/delete.php?id=' . $row['vehicle_id'] . '" class="btn btn-danger">Xoá</a>                       
                </td>';
                echo '</tr>';
            }
        }
        //* B4: đóng kết nối
        mysqli_close($conn);
        ?>
    </tbody>
</table>





<?php include './footer.php' ?>