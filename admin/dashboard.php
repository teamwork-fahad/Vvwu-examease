<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Dashboard | Admin</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Berry is trending dashboard template made using Bootstrap 5 design framework. Berry is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="codedthemes" />

    <?php 
        include_once('up_link.php');
    ?>
<style>

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #16A085;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}


    </style>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="" class="b-brand text-primary">
                    <!-- ========   Change your logo from here   ============ -->
                    <img src="assets/images/logo-dark.svg" alt="" class="logo logo-lg" />
                </a>
            </div>
            <div class="navbar-content">
                <?php 
        include_once('navbar.php');
    ?>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <?php 
        include_once('header.php');
    ?>
    </header>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
             <!-- [ breadcrumb ] start -->
             <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Admin Dashboard</h5>
                            </div>
                        </div>
                        <div class="col-auto">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Other</a></li>
                                <li class="breadcrumb-item" aria-current="page">Sample Page</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
            <div class="container bootstrap snippet">
<div class="row">
    <div class="col-lg-2 col-sm-6">
        <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content dark-blue">
                <div class="circle-tile-description text-faded"> Students</div>
                <div class="circle-tile-number text-faded " id="student-count">0</div>
                <a class="circle-tile-footer" href="total_student.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
            </div>
        </div>
    </div>
     
    <div class="col-lg-2 col-sm-6">
        <div class="circle-tile ">
            <a href="#"><div class="circle-tile-heading red"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
            <div class="circle-tile-content red">
                <div class="circle-tile-description text-faded"> Faculty </div>
                <div class="circle-tile-number text-faded " id="faculty-count">0</div>
                <a class="circle-tile-footer" href="faculty_avl.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
            </div>
        </div>
    </div> 
</div> 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('http://localhost/Vvwu%20examease/api/count_data.php')
            .then(response => response.json())
            .then(data => {
                 document.getElementById('student-count').textContent = data.student_count;
                document.getElementById('faculty-count').textContent = data.faculty_count;
            })
            .catch(error => console.error('Error fetching data:', error));
    });
</script>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
    <?php 
        include_once('footer.php');
    ?>
    </footer>
    <!-- Required Js -->
    <?php 
        include_once('down_link.php');
    ?>


    



   
</body>
<!-- [Body] end -->

</html>