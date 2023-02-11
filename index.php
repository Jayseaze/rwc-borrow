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

    <main class="login-form mt-4">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-orange mb-2" style="height: 50px;">
                            
                        </div>
                        <div class="card-body">
                            <form action="login" method="POST">

                                <img src="assets/images/logo-rw.png" class="rounded mx-auto d-block" style="height: 150px" />
                                <div class="card-body text-center">
                                    <h2 class="card-text">ระบบบันทุกการยืมอุปกรณ์คอมพิวเตอร์
                                        <h2 />
                                        <h5>โรงเรียนร้อยเอ็ดวิทยาลัย</h5>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Student ID</label>
                                    <div class="col-md-4">
                                        <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="รหัสนักเรียน" name="student_id" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-5 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                ยังไม่มีบัญชีผู้ใช้งาน : <a href="register">คลิกเพื่อลงทะเบียน</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                               

                        </div>
                            <div class="card-footer">
                                <center>
                                    <button type="submit" class="btn btn-outline-primary">เข้าสู่ระบบ</button>
                                </center>
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