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
                                <h5>Dashboard Informations Computer Room</h5>
                            </font>
                            <hr>
                        </div>

                        <?php 
                            $stmt = $conn->prepare('SELECT * FROM computer_info ');
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header bg-orange">
                                        <font color="white" size="5px"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-1-square-fill" viewBox="0 0 16 16">
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Zm7.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
                                            </svg>&nbsp;&nbsp; Computer Room 1</font>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title mb-2">
                                            ห้องคอมพิวเตอร์ที่ 1 อาคาร A1
                                        </h1>
                                        <p class="card-text">
                                            <font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>&nbsp;สถานะ :&nbsp;พร้อมใช้งาน</font>
                                                <h6><button type="button" class="btn btn-sm btn-outline-primary">คอมพิวเตอร์คงเหลือในระบบ : <?php echo $row['count_com'] ?>/40 เครื่อง </button> </h6>
                                        </p>
                                       
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">ผู้ดูแล : คุณครูสมชาย หมายปอง</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header bg-orange">
                                        <font color="white" size="5px"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-2-square-fill" viewBox="0 0 16 16">
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Zm4.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306Z" />
                                            </svg>&nbsp;&nbsp; Computer Room 2</font>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-2">
                                            ห้องคอมพิวเตอร์ที่ 2 อาคาร B1
                                        </h5>
                                        <p class="card-text">
                                            <font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>&nbsp;สถานะ :&nbsp;พร้อมใช้งาน</font>
                                                <h6><button type="button" class="btn btn-sm btn-outline-primary">คอมพิวเตอร์คงเหลือในระบบ : 5/40 เครื่อง </button> </h6>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">ผู้ดูแล : คุณครูสมชาย หมายปอง</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header bg-orange">
                                        <font color="white" size="5px"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-3-square-fill" viewBox="0 0 16 16">
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Zm5.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318Z" />
                                            </svg>&nbsp;&nbsp; Computer Room 3</font>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-2">
                                            ห้องคอมพิวเตอร์ที่ 3 อาคาร C3
                                        </h5>

                                        <p class="card-text">
                                            <font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>&nbsp;สถานะ :&nbsp;พร้อมใช้งาน</font>
                                                <h6><button type="button" class="btn btn-sm btn-outline-primary">คอมพิวเตอร์คงเหลือในระบบ : 5/40 เครื่อง </button> </h6>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">ผู้ดูแล : คุณครูสมชาย หมายปอง</small>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="card-footer text-center">
                        <a class="btn btn-primary " data-toggle="modal" data-target="#computerroom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-disc-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-6 0a2 2 0 1 0-4 0 2 2 0 0 0 4 0zM4 8a4 4 0 0 1 4-4 .5.5 0 0 0 0-1 5 5 0 0 0-5 5 .5.5 0 0 0 1 0zm9 0a.5.5 0 1 0-1 0 4 4 0 0 1-4 4 .5.5 0 0 0 0 1 5 5 0 0 0 5-5z" />
                            </svg>&nbsp;คลิกที่นี่ เพื่อทำการยืมอุปกรณ์คอมพิวเตอร์</a>
                    </div>
                    <div class="modal fade" id="computerroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-disc-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-6 0a2 2 0 1 0-4 0 2 2 0 0 0 4 0zM4 8a4 4 0 0 1 4-4 .5.5 0 0 0 0-1 5 5 0 0 0-5 5 .5.5 0 0 0 1 0zm9 0a.5.5 0 1 0-1 0 4 4 0 0 1-4 4 .5.5 0 0 0 0 1 5 5 0 0 0 5-5z" />
                                            </svg>&nbsp;เลือกห้องคอมพิวเตอร์ที่ต้องการทำการยืมอุปกรณ์</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="../borrow-com/computer-one"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-1-square-fill" viewBox="0 0 16 16">
                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Zm7.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
                                                </svg>&nbsp;&nbsp;ห้องคอมพิวเตอร์ที่ 1 (COM 1)</a></li>
                                        <li class="list-group-item"><a href="../borrow-com/computer-two"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-2-square-fill" viewBox="0 0 16 16">
                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Zm4.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306Z" />
                                                </svg>&nbsp;&nbsp;ห้องคอมพิวเตอร์ที่ 2 (COM 2)</a></li>
                                        <li class="list-group-item"><a href="../borrow-com/computer-three"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-3-square-fill" viewBox="0 0 16 16">
                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Zm5.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318Z" />
                                                </svg>&nbsp;&nbsp;ห้องคอมพิวเตอร์ที่ 3 (COM 3)</a></li>
                                    </ul>
                                </div>
                                <div class="modal-footer">

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