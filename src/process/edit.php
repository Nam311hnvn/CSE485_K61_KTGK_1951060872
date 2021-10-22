<?php
include '../header.php';
include '../config.php';
?>

<form action="add.php" method="post">
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Mã phương tiện</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="vehicle_id">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Biển số xe</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="license_no">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Model</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="model">
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Năm sản xuất</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="year" placeholder="YYYY-MM-DD">
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Kiểu oto</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ctype">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Giá cho thuê theo ngày</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="drate">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Giá cho thuê theo tuần</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="wrate">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="status">
        </div>
    </div>
    <div class="form-group row">
        <label for="saveBtn" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button type="submit" name="Save" class="btn btn-success">Lưu lại</button>
        </div>
    </div>
</form>

<?php
if (isset($_POST['Save'])) {
    $vehicle_id = $_POST['vehicle_id'];
    $license_no = $_POST['license_no'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $ctype = $_POST['ctype'];
    $drate = $_POST['drate'];
    $wrate = $_POST['wrate'];
    $status = $_POST['status'];
    //? câu lệnh
    $sql = "UPDATE tb_rentcar(vehicle_id, license_no, model, year, ctype, drate, wrate, status)
    VALUES ('$vehicle_id','$license_no','$model','$year','$ctype','$drate','$wrate','$status')";

    //? kiểm tra và thực thi lệnh
    if (mysqli_query($conn, $sql)) {
        header('location:../index.php');
    } else {
        header('location:Error.php');
    }
}


//? đóng kết nối
mysqli_close($conn);

include '../footer.php';