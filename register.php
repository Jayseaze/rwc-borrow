<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RW Borrow computer systems</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo-rw.png">
    <!-- stylesheet -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-color: darkgray;
            overflow: scroll;
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <main class="login-form mt-2">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-orange mb-2" style="height: 50px;">
                        </div>
                        <div class="card-body">
                            <form action="register-action" method="POST">

                                <img src="assets/images/logo-rw.png" class="rounded mx-auto d-block" style="height: 150px" />
                                <div class="card-body text-center">
                                    <h2 class="card-text">ระบบบันทุกการยืมอุปกรณ์คอมพิวเตอร์
                                        <h2 />
                                     
                                        <p>ลงทะเบียน เพื่อเข้าใช้งานระบบ</p>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">ชื่อ</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="ชิ่อ" name="firstname" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">นามสกุล</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="นามสกุล" name="lastname" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">รหัสนักเรียน 10 หลัก</label>
                                    <div class="col-md-4">
                                        <input type="text" minlength="10" maxlength="10"  placeholder="รหัสนักเรียน" class="form-control" name="student_id" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">ระดับชั้น</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="level">
                                            <option disabled selected >คลิกเลือกระดับชั้น</option>
                                            <option value="ชั้นมัธยมศึกษาปีที่ 1">ชั้นมัธยมศึกษาปีที่ 1</option>
                                            <option value="ชั้นมัธยมศึกษาปีที่ 2">ชั้นมัธยมศึกษาปีที่ 2</option>
                                            <option value="ชั้นมัธยมศึกษาปีที่ 3">ชั้นมัธยมศึกษาปีที่ 3</option>
                                            <option value="ชั้นมัธยมศึกษาปีที่ 4">ชั้นมัธยมศึกษาปีที่ 4</option>
                                            <option value="ชั้นมัธยมศึกษาปีที่ 4">ชั้นมัธยมศึกษาปีที่ 5</option>
                                            <option value="ชั้นมัธยมศึกษาปีที่ 6">ชั้นมัธยมศึกษาปีที่ 6</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">ห้อง</label>
                                    <div class="col-md-4">
                                        <input type="text"  placeholder="ห้องเรียน" class="form-control" name="room" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">เบอร์โทรศัพท์</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="เบอร์โทรศัพท์" class="form-control" name="telephone" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่าน</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="password"  placeholder="รหัสผ่าน" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่าน</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="password2"  placeholder="ยืนยันรหัสผ่าน" required>
                                    </div>
                                </div>
                                <br>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        ลงทะเบียน
                                    </button>
                                    <a href="index">
                                        <button type="button" class="btn btn-info">ย้อนกลับหน้าหลัก</button>
                                    </a>
                                </div>



                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>



</body>

</html>