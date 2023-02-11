<?php 
  
    session_start(); // ประกาศ การใช้งาน session
    session_destroy(); // ลบตัวแปร session ทั้งหมด
    
   header("Content-Type: text/html; charset=utf-8");
        echo 
        '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            ';
                                                    
                                                        
            echo '<script>
                                                            
                setTimeout(function() 
                {
                swal({
                title: "ออกจากระบบแล้ว",
                text: "รอซักครู่! ระบบกำลังจะกลับไปยังหน้าเว็บไซต์หลัก",
                type: "success",
                timer: 3000, 
                showConfirmButton: false 
                }, 
                function() {
                                                                    
                window.location = "index.php"; 

                });
                }, 1000);
                </script>
                ';
    
?>