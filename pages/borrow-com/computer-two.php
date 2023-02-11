<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RW Borrow computer systems</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/logo-rw.png">
    <!-- stylesheet -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<?php

error_reporting(0);
ini_set('display_errors', 0);

require_once "../../connect.php";
session_start();
$id = $_SESSION['student_id'];
$stmt = $conn->prepare('SELECT * FROM borrow_computer WHERE student_id=:id ORDER BY id DESC LIMIT 1'  );
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// header("Content-Type: text/html; charset=utf-8");

if($row['status'] == '0' or $row['status'] == '1') 
{
    echo "<script>
        $(document).ready(function() 
        {
            let timerInterval
            Swal.fire({
            title: 'มีประวัติการยืมอุปกรณ์แล้ว',
            icon: 'warning',
            text: 'กรุณารอซักครู่ กำลังไปยังหน้าแสดงข้อมูล',
            timer: 3000, 
            showConfirmButton: false,
            timerProgressBar: true,
            
            didOpen: () => {
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                },100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
            });
            
            })
            </script>";

    header("refresh:3; url=../history-borrow/showdata");
}
else{

}



?>

<body class="hold-transition sidebar-mini layout-fixed" style="height: auto;">
    <div class="wrapper">
        <?php include_once('../includes/sidebar.php') ?>
        <div class="content-wrapper pt-3">
            <!-- Main content -->
            <div class="content">

                <div class="card">

                    <div class="card-body">

                        <img src="../../assets/images/logo-rw.png" class="rounded mx-auto d-block" style="height: 150px" />
                        <div class="card-body text-center">
                            <font color="dark">
                                <h1 class="card-text">ระบบบันทึกการยืมอุปกรณ์คอมพิวเตอร์
                                    <h1 />
                            </font>
                            <font color="dark">
                                <h5>โรงเรียนร้อยเอ็ดวิทยาลัย Roi-et witthayalai school</h5>
                            </font>

                            <font color="gray">
                                <h5>ห้องคอมพิวเตอร์ที่ 2 | Computer Room Two</h5>
                            </font>
                            <hr>
                        </div>


                        <form action="borrow-action" method="POST">
                            <div class="form-row mb-4">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-2">
                                    <h6>ข้อมูลผู้ขอยืมคอมพิวเตอร์</h6>
                                </div>
                                <div class="col-md-2">
                                    <p>ชื่อ - นามสกุล</p><input class="form-control form-control-sm" type="text" readonly name="name" value="<?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?>">
                                </div>

                                <div class="col-md-2">
                                    <p>รหัสนักเรียน</p><input class="form-control form-control-sm" type="text" readonly name="student_id" value="<?php echo $_SESSION['student_id']; ?>">
                                </div>

                                <div class="col-md-2">
                                    <p>ระดับชั้น</p><input class="form-control form-control-sm" type="text" readonly name="level" value="<?php echo $_SESSION['level']; ?>">
                                </div>

                                <div class="col-md-1">
                                    <p>ห้อง</p><input class="form-control form-control-sm" type="text" readonly name="room" value="<?php echo $_SESSION['room']; ?>">
                                </div>

                                <div class="col-md-2">
                                    <p>หมายเลขโทรศัพท์</p><input class="form-control form-control-sm" type="text" readonly name="telephone" value="<?php echo $_SESSION['telephone']; ?>">
                                </div>

                            </div>
                            <hr>

                            <div class="form-row mb-2">

                            </div>

                            <div class="form-row mt-4">

                                <div class="col-md-2">

                                </div>
                                <div class="col-md-3">
                                    <p>มีความประสงค์ขอยืม</p>
                                    <select class="form-control form-control-sm" name="name_borrow">
                                        <option value="คอมพิวเตอร์">คอมพิวเตอร์</option>
                                    </select>
                                </div>

                                <div class="col-md-1">
                                    <p>จำนวน (เครื่อง) </p>
                                    
                                    <input class="form-control form-control-sm" name="com_room" type="hidden" value="com2" required>

                                    <select class="form-control form-control-sm" name="count_borrow">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>

                                </div>

                                <div class="col-md-2">
                                    <p>ตั้งแต่วันที่</p>
                                    <input class="form-control form-control-sm" name="start_time" type="date" value="1" required>
                                </div>

                                <div class="col-md-2">
                                    <p>ถึงวันที่</p>
                                    <input class="form-control form-control-sm" name="end_time" type="date" value="1" required>
                                </div>

                            </div>

                            <div class="form-row mt-4">
                                <div class="col-md-2">

                                </div>

                                <div class="form-check col-md-8 ml-3">
                                    <input class="form-check-input" type="checkbox" name="ckeck_accept" required>
                                    <label class="form-check-label" for="defaultCheck1">
                                        ข้าพเจ้าขอยอมรับทุกเงื่อนไขการยืมอุปกรณ์คอมพิวเตอร์ และจะรับผิดชอบทุกความเสียหายที่เกิดขึ้น
                                    </label>
                                </div>

                            </div>

                            <div class="card-footer text-center mt-4">
                                <button type="submit" class="btn btn-primary" value="Submit"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-disc-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-6 0a2 2 0 1 0-4 0 2 2 0 0 0 4 0zM4 8a4 4 0 0 1 4-4 .5.5 0 0 0 0-1 5 5 0 0 0-5 5 .5.5 0 0 0 1 0zm9 0a.5.5 0 1 0-1 0 4 4 0 0 1-4 4 .5.5 0 0 0 0 1 5 5 0 0 0 5-5z" />
                                    </svg>&nbsp;บันทึกข้อมูล ยืมอุปกรณ์คอมพิวเตอร์</button>

                            </div>

                        </form>

                    </div>

                </div>
            </div>

        </div>
        <?php include_once('../includes/footer.php') ?>
    </div>

    </div>

    </div>


    <!-- SCRIPTS -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/adminlte.min.js"></script>

    <!-- OPTIONAL SCRIPTS -->

</body>

</html>