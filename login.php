
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

    // echo '<pre>';
    // print_r($_POST);
   
    // echo '</pre>';

    if(isset($_POST['student_id']) && isset($_POST['password'])) 
    {
        
        require_once 'connect.php';

        //ประกาศตัวแปรรับค่าจากฟอร์ม
        $student_id =$_POST['student_id'];
        $password =sha1($_POST['password']); //เก็บรหัสผ่านในรูปแบบ sha1

        //check username  & password
        $stmt = $conn->prepare("SELECT * FROM users WHERE student_id = :student_id AND password = :password");
        $stmt->bindParam(':student_id', $student_id , PDO::PARAM_STR);
        $stmt->bindParam(':password', $password , PDO::PARAM_STR);
        $stmt->execute();

        //กรอก username & password ถูกต้อง
        if($stmt->rowCount() == 1)
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            //สร้างตัวแปร session
            session_start();
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['telephone'] = $row['telephone'];
            $_SESSION['room'] = $row['room'];
            $_SESSION['level'] = $row['level'];

        
            header("Content-Type: text/html; charset=utf-8");
            echo "<script>
                    $(document).ready(function() 
                    {
                        let timerInterval
                        Swal.fire({
                        title: 'เข้าสู่ระบบสำเร็จ',
                        icon: 'success',
                        text: 'กรุณารอซักครู่',
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

                        header("refresh:3; url=pages/dashboard");
                        
        } 
        else  //ถ้า username or password ไม่ถูกต้อง
        {

            echo "<script>
                    $(document).ready(function() 
                    {
                        let timerInterval
                        Swal.fire({
                        title: 'รหัสผ่านไม่ถูกต้อง',
                        icon: 'error',
                        text: 'รหัสนักเรียนหรือรหัสผ่านไม่ถูกต้อง เข้าสู่ระบบใหม่อีกครั้ง',
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

                        header("refresh:3; url=index");
            $conn = null; //close connect db
        }
    }

?>