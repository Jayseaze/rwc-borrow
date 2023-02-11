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
</head>

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
                                <h5>Student Information Data</h5>
                            </font>
                            <hr>
                        </div>


                        <form action="borrow-action" method="POST">
                            <div class="form-row mb-4">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-2">
                                    <h6>ข้อมูล</h6>
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
