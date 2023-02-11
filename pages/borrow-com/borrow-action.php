<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

//ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST))
    {
        //ไฟล์เชื่อมต่อฐานข้อมูล
        require_once '../../connect.php';

        //  echo '<pre>';
        //     print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
        //     echo '</pre>';

        //ประกาศตัวแปรรับค่าจากฟอร์ม
        $name = $_POST['name'];
        $student_id = $_POST['student_id'];
        $level = $_POST['level'];
        $room = $_POST['room'];
        $telephone = $_POST['telephone'];

        $com_room = $_POST['com_room'];
        $status = '0';
        $ckeck_accept = '1';


        $name_borrow = $_POST['name_borrow'];
        $count_borrow = $_POST['count_borrow'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];


        //sql insert
        $stmt = $conn->prepare("INSERT INTO borrow_computer (name,
        student_id,
        level,
        room,
        telephone,
        com_room,
        status,
        ckeck_accept,
        name_borrow,
        count_borrow,
        start_time,
        end_time
        )
        VALUES (:name, 
        :student_id,
        :level,
        :room,
        :telephone,
        :com_room,
        :status,
        :ckeck_accept,
        :name_borrow,
        :count_borrow,
        :start_time,
        :end_time)");

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':student_id', $student_id , PDO::PARAM_STR);
        $stmt->bindParam(':level', $level , PDO::PARAM_STR);
        $stmt->bindParam(':room', $room , PDO::PARAM_STR);
        $stmt->bindParam(':telephone', $telephone , PDO::PARAM_STR);
        $stmt->bindParam(':com_room', $com_room , PDO::PARAM_STR);
        $stmt->bindParam(':status', $status , PDO::PARAM_STR);
        $stmt->bindParam(':ckeck_accept', $ckeck_accept , PDO::PARAM_STR);
        $stmt->bindParam(':name_borrow', $name_borrow , PDO::PARAM_STR);
        $stmt->bindParam(':count_borrow', $count_borrow , PDO::PARAM_STR);
        $stmt->bindParam(':start_time', $start_time , PDO::PARAM_STR);
        $stmt->bindParam(':end_time', $end_time , PDO::PARAM_STR);
        $stmt->bindParam(':end_time', $end_time , PDO::PARAM_STR);


        $result = $stmt->execute();
        $borrow_id = $conn->lastInsertId();

       

        if($result){
            header("Content-Type: text/html; charset=utf-8");
        
            echo "<script>
                    $(document).ready(function() 
                    {
                        let timerInterval
                        Swal.fire({
                        title: 'บันทึกการยืมสำเร็จ',
                        icon: 'success',
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
    
                        header("refresh:3; url=../history-borrow/showdata?id=$borrow_id");
                        $conn = null; //close connect db
        }
    
    } //isset
?>