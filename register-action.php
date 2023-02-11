   <?php
    session_start();  
    require_once 'connect.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $level = $_POST['level'];;
    $room = $_POST['room'];;
    $telephone = $_POST['telephone'];;

    $student_id = $_POST['student_id'];
    $role = 'Student';

    $password = sha1($_POST['password']); 
    $password2 = sha1($_POST['password2']);


    // echo '<pre>';
    // print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
    // echo '</pre>';
    
      if($password == $password2)
      {  
        $stmt = $conn->prepare("SELECT student_id FROM users WHERE student_id = :student_id");
        $stmt->execute(array(':student_id' => $student_id));
        
        if($stmt->rowCount() > 0)
        {
              echo '<script>
                  
                    setTimeout(function() 
                    {
                      swal({
                          title: "มีข้อมูลรหัสนักเรียนนี้แล้ว",
                          text: "หากไม่สามารถเข้าสู่ระบบได้ กรุณาติดต่อแอดมิน",
                          type: "warning",
                          timer: 3000, 
                          showConfirmButton: false 
                      }, 
                      function() {
                        
                        window.location = "index"; 

                      });
                    }, 1000);
                </script>
                ';
        }
        else
        {
            $stmt = $conn->prepare("INSERT INTO users  
              (firstname,
              lastname,
              level,
              room,
              telephone,
              student_id,
              password,
              role) 
              
              VALUES  
              (:firstname,
              :lastname,
              :level,
              :room,
              :telephone,
              :student_id,
              :password,
              :role)");

              $stmt->bindParam(':firstname', $firstname , PDO::PARAM_STR);
              $stmt->bindParam(':lastname', $lastname , PDO::PARAM_STR);
              $stmt->bindParam(':level', $level , PDO::PARAM_STR);
              $stmt->bindParam(':room', $room , PDO::PARAM_STR);
              $stmt->bindParam(':telephone', $telephone , PDO::PARAM_STR);
              $stmt->bindParam(':student_id', $student_id , PDO::PARAM_STR);
              $stmt->bindParam(':password', $password , PDO::PARAM_STR);
              $stmt->bindParam(':role', $role , PDO::PARAM_STR);


              $stmt->execute();

              // sweet alert 
            echo 
            '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            ';
            
            if($stmt)
            {
                echo '<script>
                  
                    setTimeout(function() 
                    {
                      swal({
                          title: "ลงทะเบียนสำเร็จ",
                          text: "รอซักครู่! ระบบกำลังจะกลับไปยังหน้า Login",
                          type: "success",
                          timer: 2500, 
                          showConfirmButton: false 
                      }, 
                      function() {
                        
                        window.location = "index"; 

                      });
                    }, 1000);
                </script>
                ';
            }
        }
      }

      // sweet alert 
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
      
      if($password != $password2)
      {
          echo '<script>
            
              setTimeout(function() {
                swal({
                    title: "รหัสผ่านไม่ตรงกัน!!",
                    text: "ลงทะเบียนไม่สำเร็จ กรุณาตรวจสอบข้อมูลอีกครั้ง",
                    type: "error",
                    timer: 3000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                    showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                }, function() {
                  
                  window.history.back()
                });
              }, 1000);
          </script>
          
          ';
      }
      $conn = null;
    ?>