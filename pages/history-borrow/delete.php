<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
    if(isset($_GET['id'])){
    require_once '../../connect.php';
    //ประกาศตัวแปรรับค่าจาก param method get
    $id = $_GET['id'];
    $stmt = $conn->prepare('DELETE FROM borrow_computer WHERE id=:id');
    $stmt->bindParam(':id', $id , PDO::PARAM_INT);
    $stmt->execute();

    //  sweet alert 

    if($stmt->rowCount() ==1){
        header("Content-Type: text/html; charset=utf-8");
            
            echo "<script>
                $(document).ready(function() 
                {
                    let timerInterval
                    Swal.fire({
                    title: 'ลบข้อมูลการยืมสำเร็จ',
                    icon: 'success',
                    text: 'กรุณารอซักครู่ กำลังไปยังหน้า Dashboard',
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

                header("refresh:3; url=../Dashboard/");
                $conn = null; //close connect db
        }

    } //isset
?>