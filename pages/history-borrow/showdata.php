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

if (isset($_GET['id'])) {
    require_once "../../connect.php";
    $id = $_GET['id'];
    $stmt = $conn->prepare('SELECT * FROM borrow_computer WHERE id=:id ORDER BY id DESC LIMIT 1');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    require_once "../../connect.php";
    session_start();
    $id = $_SESSION['student_id'];
    $stmt = $conn->prepare('SELECT * FROM borrow_computer WHERE student_id=:id ORDER BY id DESC LIMIT 1');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // header("Content-Type: text/html; charset=utf-8");

    if ($row  == NULL) {
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

                                <div class="col-md-1">
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

                                <div class="col-md-2">
                                    <?php
                                    if ($row['com_room'] == 'com1') {
                                        echo 'ข้อมูล : คอมพิวเตอร์ห้องที่ 1';
                                    } elseif ($row['com_room'] == 'com2') {
                                        echo 'ข้อมูล : คอมพิวเตอร์ห้องที่ 2';
                                    } else {
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

                                <div class="col-md-1">
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
                                <div class="col-md-2">

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
                                                            } elseif ($row['status'] == 1) {
                                                                echo '<font color="green">&nbsp;&nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                        ผ่านการอนุมัติจากการยืมอุปกรณ์แล้ว 
                                        </font> ';
                                                                echo '<br>';
                                                                echo '*** หากยังไม่คืนอุปกรณ์คอมพิวเตอร์ จะไม่สามารถทำการยืมใหม่ได้';
                                                            } else {
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
                                <div class="col-md-2">

                                </div>
                                <div class="form-check col-md-8 ">
                                    <input type="checkbox" checked>
                                    <label class="form-check-label" for="defaultCheck1">
                                        ข้าพเจ้าขอยอมรับทุกเงื่อนไขการยืมอุปกรณ์คอมพิวเตอร์ และจะรับผิดชอบทุกความเสียหายที่เกิดขึ้น
                                    </label>
                                </div>

                            </div>

                            <div class="card-footer text-left mt-4">

                                <?php


                                if ($row['status'] == '0') {


                                    echo '<font color="green">&nbsp;&nbsp;
                                           
                                            ระบบได้ทำการบันทึกข้อมูลการยืมแล้วหากต้องการลบคลิก
                                       </font> <a href="" data-toggle="modal" data-target="#deletecom">&nbsp;ลบข้อมูลการยืมอุปกรณ์คอม</a> ';

                                       echo '<a href="export-topdf" id="" class="btn">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                           <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                       </svg>&nbsp; Exports To PDF</a> ';
                                } 
                                else 
                                {

                                    echo '<font color="green">&nbsp;&nbsp;
                                            ระบบได้ทำการบันทึกข้อมูลการยืมแล้ว
                                       </font> <a href="export-topdf" id="" class="btn">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                           <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                       </svg>&nbsp; Exports To PDF</a> ';
                                }
                                ?>
                            </div>

                        </form>

                        <div class="modal fade" id="deletecom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <img src="../../assets/images/logo-rw.png" class="rounded mx-auto d-block" style="height: 150px" />
                                        <div class="card-body text-center">
                                            <font color="orange">
                                                <h1 class="card-text">ระบบบันทุกการยืมอุปกรณ์คอมพิวเตอร์
                                                    <h1 />
                                            </font>
                                            <font color="orange">
                                                <h5>โรงเรียนร้อยเอ็ดวิทยาลัย Roi-et witthayalai school</h5>
                                            </font>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <h5 class="card-title">&nbsp;ยืนยันการลบข้อมูล &nbsp;</h5>
                                            <a href="delete?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณแน่ใจหรือ ที่จะลบข้อมูลนี้?');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                </svg>&nbsp;ลบข้อมูลการยืมอุปกรณ์คอมพิวเตอร์</a>
                                        </div>

                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>

                        </div>

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