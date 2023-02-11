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


    <script>
        setTimeout(function () { window.print(); }, 300);
        window.onfocus = function () { setTimeout(function () { window.history.back(); }, 50); }
        
    </script>
</head>

<?php

error_reporting(0);
ini_set('display_errors', 0);

if (isset($_GET['id'])) {
    require_once"../../connect.php";
    $id = $_GET['id'];
    $stmt = $conn->prepare('SELECT * FROM borrow_computer WHERE id=:id ORDER BY id DESC LIMIT 1');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
else
{  
    require_once"../../connect.php";
    session_start();
    $id = $_SESSION['student_id'];
    $stmt = $conn->prepare('SELECT * FROM borrow_computer WHERE student_id=:id ORDER BY id DESC LIMIT 1');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // header("Content-Type: text/html; charset=utf-8");

    if($row  == NULL){
        echo "<script>
        $(document).ready(function() 
        {
            let timerInterval
            Swal.fire({
            title: 'ไม่พบข้อมูลการยืมอุปกรณ์',
            icon: 'warning',
            text: 'กรุณารอซักครู่ กำลังไปยังหน้าหลัก',
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

            header("refresh:3; url=../dashboard/");
    }
   

} //isset

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
                                <h5>Computer Borrow System</h5>
                            </font>
                            <hr>
                        </div>

                        <form action="borrow-action" method="POST">
                            <div class="form-row mb-4">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-2">
                                    <font color="purple">
                                        <h6>ข้อมูลผู้ขอยืมคอมพิวเตอร์</h6>
                                    </font>
                                </div>
                                <div class="col-md-2">
                                    <font color="purple">
                                        <h6>ชื่อ - นามสกุล</h6>
                                    </font> <?php echo $row['name'] ?>
                                </div>

                                <div class="col-md-2">
                                    <font color="purple">
                                        <h6>รหัสนักเรียน</h6>
                                    </font> <?php echo $row['student_id'] ?>
                                </div>

                                <div class="col-md-2">
                                    <font color="purple">
                                        <h6>ระดับชั้น</h6>
                                    </font> <?php echo $row['level'] ?>
                                </div>

                                <div class="col-md-1">
                                    <font color="purple">
                                        <h6>ห้อง</h6>
                                    </font> <?php echo $row['room'] ?>
                                </div>

                                <div class="col-md-2">
                                    <font color="purple">
                                        <h6>หมายเลขโทรศัพท์</h6>
                                    </font> <?php echo $row['telephone'] ?>
                                </div>

                            </div>
                            <hr>

                            <div class="form-row mb-2">

                            </div>

                            <div class="form-row mt-4">

                                <div class="col-md-3">
                                        <?php
                                        if ($row['com_room'] == 'com1') {
                                            echo 'ข้อมูล : คอมพิวเตอร์ห้องที่ 1';
                                        }
                                        elseif($row['com_room'] == 'com2')
                                        {
                                            echo 'ข้อมูล : คอมพิวเตอร์ห้องที่ 2';
                                        }
                                        else
                                        {
                                            echo 'ข้อมูล : คอมพิวเตอร์ห้องที่ 3';
                                        }
                                        ?>
                                </div>
                                <div class="col-md-2">
                                    <font color="purple">
                                        <p>มีความประสงค์ขอยืม</p>
                                    </font>
                                    <?php echo $row['name_borrow'] ?>
                                </div>

                                <div class="col-md-1">
                                    <font color="purple">
                                        <p>จำนวน</p>
                                    </font>
                                    <?php echo $row['count_borrow'] ?> เครื่อง

                                </div>

                                <div class="col-md-1">
                                    <font color="purple">
                                        <p>ตั้งแต่วันที่</p>
                                    </font>
                                    <?php echo $row['start_time'] ?>
                                </div>

                                <div class="col-md-2">
                                    <font color="purple">
                                        <p>ถึงวันที่</p>
                                    </font>
                                    <?php echo $row['end_time'] ?>
                                </div>

                                <div class="col-md-2">
                                    <font color="purple">
                                        <p>วันที่ทำการยืม/เวลา</p>
                                    </font>
                                    <?php echo $row['time_create'] ?>
                                </div>

                            </div>

                            <div class="form-row mt-4">
                                <div class="col-md-3">

                                </div>

                                <div class="form-check col-md-8">
                                    <p>สถานะการยืมอุปกรณ์ <?php
                                    if ($row['status'] == 0) {
                                        echo '<font color="green">&nbsp;&nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                        </svg>
                                        ทำการบันทึกการยืมแล้ว รอการตรวจสอบจากแอดมิน เพื่อดำเนินการขั้นต่อไป
                                    </font> ';
                                    } elseif ($row['status'] == 1) 
                                    {
                                        echo '<font color="green">&nbsp;&nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                        ผ่านการอนุมัติจากการยืมอุปกรณ์แล้ว 
                                        </font> ';
                                        echo'<br>';
                                        echo'*** หากยังไม่คืนอุปกรณ์คอมพิวเตอร์ จะไม่สามารถทำการยืมใหม่ได้';
                                    }
                                    else{
                                        echo '<font color="green">&nbsp;&nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                        คืนอุปกรณ์คอมพิวเตอร์เรียบร้อย สามารถทำการยืมอีกครั้งได้ 
                                        </font> ';
                                    }
                                    ?></p>
                                    
                                </div>

                            </div>

                            <div class="form-row ">
                                <div class="col-md-3">

                                </div>
                                <div class="form-check col-md-8 ">
                                    <input type="checkbox"  checked>
                                    <label class="form-check-label" for="defaultCheck1">
                                        ข้าพเจ้าขอยอมรับทุกเงื่อนไขการยืมอุปกรณ์คอมพิวเตอร์ และจะรับผิดชอบทุกความเสียหายที่เกิดขึ้น
                                    </label>
                                </div>

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