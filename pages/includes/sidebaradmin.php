<?php session_start();?>

<?php 
    function isActive ($data) {
        $array = explode('/', $_SERVER['REQUEST_URI']);
        $key = array_search("pages", $array);
        $name = $array[$key + 1];
        return $name === $data ? 'active' : '' ;
    }
   
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars fa-2x"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto ">
        <li class="nav-item d-md-none d-block">
            <a href="../dashboard/">
                <img src="../../assets/images/LA.png" 
                    alt="Admin Logo" 
                    width="50px"
                    class="img">
                <span class="font-weight-light pl-1">Liberal Arts and Education</span>
            </a>
        </li>
        <li class="nav-item d-md-block d-none">
            <a class="nav-link">เข้าสู่ระบบครั้งล่าสุด:  </a>
        </li>
    </ul>
</nav>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../dashboard/" class="brand-link">
        <img src="../../assets/images/LA.png" 
             alt="Admin Logo" 
             class="brand-image">
        <span class="brand-text font-weight-light">LA Education</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../assets/images/avatar5.png" class="img-circle " alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> <?= $_SESSION['fullname'];?> </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../admin/" class="nav-link <?php echo isActive('dashboard') ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>หน้าหลัก</p>
                    </a>
                </li>

                <li class="nav-header"><font color="#FFCC00">ระบบ</font></li>

                <li class="nav-item">
                    <a href="../inspector_testreturn" class="nav-link <?php echo isActive('inspector') ?>">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>ตรวจสอบ ระบบทวนสอบ</p>
                    </a>
                </li>
                
                 <br>
                <li class="nav-header"><font color="#FFCC00">Manage system</font></li>

               

                 <li class="nav-item">
                    <a href="../managesystem/" class="nav-link <?php echo isActive('managesystem') ?>">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>จัดการระบบ</p>
                    </a>
                </li>

                <li class="nav-header"><font color="#FFCC00">โปรไฟล์</font></li>

                 <li class="nav-item">
                    <a href="../profile/profileadmin.php" class="nav-link <?php echo isActive('profile') ?>">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>โปรไฟล์ผู้ใช้งาน</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../../logout.php" id="logout" class="nav-link">
                        
                        <button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#myModal'><i class="nav-icon fas fa-sign-out-alt"></i> ออกจากระบบ</button>
                    </a>
                </li>

                 <br>
                

            </ul>
        </nav>
    </div>
</aside>

