<?php

if (!isset($_SESSION)) {
    session_start();
}


require_once '../../connect.php';

function isActive($data)
{
    $array = explode('/', $_SERVER['REQUEST_URI']);
    $key = array_search("pages", $array);
    $name = $array[$key + 1];
    return $name === $data ? 'active' : '';
}
?>


<nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars fa-2x"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto ">
        <li class="nav-item d-md-none d-block">
            <a href="../dashboard/">
                <img src="../../assets/images/logo-rw.png" alt="Admin Logo" width="20px" class="img-responsive">
                <span class="font-weight-light pl-4">RWS_BORROW</span>
            </a>
        </li>
        <li class="nav-item d-md-block d-none">
            <a class="nav-link">Time : </a>
        </li>

    </ul>
</nav>

<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary ">
    <a href="" class="brand-link ">
        <img src="../../assets/images/logo-rw.png" alt="Admin Logo" width="auto" height="35" class="d-inline-block ml-3 mb-2">
        <span class="brand-text font-weight-light ml-1 mt-2">Roi-et Witthayalai</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="" class="d-block">
                    <font color="">Name: <?php echo $_SESSION['firstname'];?>&nbsp;&nbsp;<?php echo $_SESSION['lastname'];?></font><br>
                    <font color="">Level: <?php echo $_SESSION['level']; ?></font><br>
                    <font color="">Room: <?php echo $_SESSION['room']; ?></font>


                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../dashboard" class="nav-link <?php echo isActive('dashboard') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
                        </svg>
                        &nbsp;&nbsp;<p>หน้าหลัก</p>
                    </a>
                </li>

                <li class="nav-header">
                    <font color="#E6E6FA">ฟังชั่นการใช้งาน</font>
                </li>

                <li class="nav-item">
                    <a href="../dashboard" data-toggle="modal" data-target="#computerroom" class="nav-link <?php echo isActive('borrow-com') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cast" viewBox="0 0 16 16">
                            <path d="m7.646 9.354-3.792 3.792a.5.5 0 0 0 .353.854h7.586a.5.5 0 0 0 .354-.854L8.354 9.354a.5.5 0 0 0-.708 0z" />
                            <path d="M11.414 11H14.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-13a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h3.086l-1 1H1.5A1.5 1.5 0 0 1 0 10.5v-7A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v7a1.5 1.5 0 0 1-1.5 1.5h-2.086l-1-1z" />
                        </svg>

                        &nbsp;&nbsp;<p>ยืมอุปกรณ์คอมพิวเตอร์</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../history-borrow/showdata" class="nav-link <?php echo isActive('history-borrow') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                        </svg>

                        &nbsp;&nbsp;<p>ข้อมูลการยืมอุปกรณ์คอม</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../student-info/" class="nav-link <?php echo isActive('student-info') ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-browser-edge" viewBox="0 0 16 16">
                    <path d="M9.482 9.341c-.069.062-.17.153-.17.309 0 .162.107.325.3.456.877.613 2.521.54 2.592.538h.002c.667 0 1.32-.18 1.894-.519A3.838 3.838 0 0 0 16 6.819c.018-1.316-.44-2.218-.666-2.664l-.04-.08C13.963 1.487 11.106 0 8 0A8 8 0 0 0 .473 5.29C1.488 4.048 3.183 3.262 5 3.262c2.83 0 5.01 1.885 5.01 4.797h-.004v.002c0 .338-.168.832-.487 1.244l.006-.006a.594.594 0 0 1-.043.041Z"/>
                    <path d="M.01 7.753a8.137 8.137 0 0 0 .753 3.641 8 8 0 0 0 6.495 4.564 5.21 5.21 0 0 1-.785-.377h-.01l-.12-.075a5.45 5.45 0 0 1-1.56-1.463A5.543 5.543 0 0 1 6.81 5.8l.01-.004.025-.012c.208-.098.62-.292 1.167-.285.129.001.257.012.384.033a4.037 4.037 0 0 0-.993-.698l-.01-.005C6.348 4.282 5.199 4.263 5 4.263c-2.44 0-4.824 1.634-4.99 3.49Zm10.263 7.912c.088-.027.177-.054.265-.084-.102.032-.204.06-.307.086l.042-.002Z"/>
                    <path d="M10.228 15.667a5.21 5.21 0 0 0 .303-.086l.082-.025a8.019 8.019 0 0 0 4.162-3.3.25.25 0 0 0-.331-.35c-.215.112-.436.21-.663.294a6.367 6.367 0 0 1-2.243.4c-2.957 0-5.532-2.031-5.532-4.644.002-.135.017-.268.046-.399a4.543 4.543 0 0 0-.46 5.898l.003.005c.315.441.707.821 1.158 1.121h.003l.144.09c.877.55 1.721 1.078 3.328.996Z"/>
                    </svg>

                        &nbsp;&nbsp;<p>ข้อมูลนักเรียน</p>
                    </a>
                </li>



                <br>

                <li class="nav-header">
                    <font color="#E6E6FA">Other</font>
                </li>


                <li class="nav-item">
                    <a href="" class="nav-link <?php echo isActive('exit') ?>" data-toggle="modal" data-target="#exampleModal2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        &nbsp;&nbsp;<p>ออกจากระบบ</p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</aside>

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



<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ยืนยันการออกจากระบบ </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">

                <h6>หากกดยืนยัน <font color="blue">ออกจากระบบแล้ว</font>
                    จะต้องทำการ Login เข้าสู่ระบบใหม่
                    <br> เมื่อต้องการทำรายการอีกครั้ง
                </h6>
                <br>
                <h6>เมื่อออกจากระบบแล้วจะกลับไปยังหน้าเว็บไซต์หลัก</h6>

                <br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>

                <a href="../../logout">
                    <button type="button" name="logout" class="btn btn-danger">ยืนยัน การออกจากระบบ</button>
                </a>

            </div>
        </div>
    </div>
</div>