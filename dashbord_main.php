<?php
    session_start();
    if(!isset($_SESSION['user_name'])){
      header('location:Tullabi.php');
    }
?>

<?php include 'header.php'; ?>

<link rel="stylesheet" href="assets/css/libs/bootstrap/dashboard.css">

<style>
  .nav-link{
    cursor:pointer;
  }
  thead{
    background: rgb(206,209,188);
  }
  #sidebarMenu{
    background: rgb(206,209,188) !important;
  }
  .btn-secondary{
    background: rgb(206,209,188);
    color: rgb(0,0,0);
  }
</style>

<body>


<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">skn tulab</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php" >Sign out</a>
    </li>
  </ul>
</nav>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
     <div class="sidebar-sticky pt-5 mt-3">

        <ul class="nav flex-column">

          <li class="nav-item">
            <a class="nav-link active" data-to="all_inside">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-to="government">
              <!-- <span data-feather="file"></span> -->
              <i class="fas fa-chart-line"></i>
              government
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-to="area">
              <!-- <span data-feather="file"></span> -->
              <i class="fas fa-chart-line"></i>
              area
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-to="apartment">
              <!-- <span data-feather="shopping-cart"></span> -->
              <!-- <span data-feather="file"></span> -->
              <i class="fas fa-chart-line"></i>
              apartment
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-to="room">
              <!-- <span data-feather="users"></span> -->
              <!-- <span data-feather="file"></span> -->
              <i class="fas fa-chart-line"></i>
              room
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-to="beds">
              <!-- <span data-feather="bar-chart-2"></span> -->
              <!-- <span data-feather="file"></span> -->
              <i class="fas fa-chart-line"></i>
              beds
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-to="booking">
              <!-- <span data-feather="layers"></span> -->
              <!-- <span data-feather="shopping-cart"></span> -->
              <i class="fas fa-folder-plus"></i>
              booking
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>add new</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>

        <ul class="nav flex-column mb-2">

            <li class="nav-item">
                <a class="nav-link" data-to="add-government">
                <span data-feather="file-text"></span>
                government
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-to="add-area">
                <span data-feather="file-text"></span>
                area
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-to="add-apartment">
                <span data-feather="file-text"></span>
                apartment
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-to="add-room">
                <span data-feather="file-text"></span>
                room
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-to="add-beds">
                <span data-feather="file-text"></span>
                beds
                </a>
            </li>

        </ul>

      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2">Dashboard</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
        <!-- Example single danger button -->
        <!-- <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Right-aligned menu
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <button class="dropdown-item" type="button">Action</button>
                <button class="dropdown-item" type="button">Another action</button>
                <button class="dropdown-item" type="button">Something else here</button>
            </div>
        </div> -->

        </div>
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      <div class="view">

        <div class="table-responsive all_inside">
            <table class="table table-striped table-sm table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>government</th>
                        <th>area</th>
                        <th>apartment_id</th>
                        <th>room_id</th>
                        <th>bed_id</th>
                        <th>apartment_booked</th>
                        <th>room_booked</th>
                        <th>bed_booked</th>
                        <th>apartment_address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con, 'students');
                    
                    
                            // $s = " SELECT * from beds WHERE m_f = '$type'";
                            $s_all = "SELECT * FROM beds INNER JOIN room ON beds.room_id = room.id_room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment INNER JOIN area ON apartment.area_id = area.id_area INNER JOIN government ON area.gov_id = government.id_gov";
                            $result_all = mysqli_query($con , $s_all);
                    
                            while($row_dash = mysqli_fetch_assoc($result_all)) {
                    ?>
                        <tr>
                            <th><?php echo $row_dash['id_gov'] ?></th>
                            <th><?php echo $row_dash['name'] ?></th>
                            <th><?php echo $row_dash['area_name'] ?></th>
                            <th><?php echo $row_dash['id_apartment'] ?></th>
                            <th><?php echo $row_dash['id_room'] ?></th>
                            <th><?php echo $row_dash['id_beds'] ?></th>
                            <th class="<?php echo ($row_dash['apartment_booked'] == 1 ? 'text-danger' : 'text-success') ?>" ><?php echo ($row_dash['apartment_booked'] == 1 ? 'booked' : 'not yet') ?></th>
                            <th class="<?php echo ($row_dash['room_booked'] == 1 ? 'text-danger' : 'text-success') ?>" ><?php echo ($row_dash['room_booked'] == 1 ? 'booked' : 'not yet') ?></th>
                            <th class="<?php echo ($row_dash['beds_booked'] == 1 ? 'text-danger' : 'text-success') ?>"><?php echo ($row_dash['beds_booked'] == 1 ? 'booked' : 'not yet')?></th>
                            <th><?php echo $row_dash['apartment_address'] ?></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive booking">
            <table class="table table-striped table-sm table-hover">
                <thead>
                    <tr>
                        <th>book_number</th>
                        <th>customer name</th>
                        <th>what is booked</th>
                        <th>booking date</th>
                        <th>number of booked</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con, 'students');
                    
                    
                            // $s = " SELECT * from beds WHERE m_f = '$type'";
                            $s_booking = "SELECT * FROM booking ";
                            $result_booking = mysqli_query($con , $s_booking);
                    
                            while($row_booking = mysqli_fetch_assoc($result_booking)) {
                    ?>
                        <tr>
                            <th><?php echo $row_booking['id_booking'] ?></th>
                            <th><?php echo $row_booking['name'] ?></th>
                            <th><?php echo $row_booking['booked_name'] ?></th>
                            <th><?php echo $row_booking['booking_date'] ?></th>
                            <th><?php echo $row_booking['booked_id'] ?></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive government">
            <table class="table table-striped table-sm table-hover">
                <thead>
                    <tr>
                        <th>government number</th>
                        <th>government name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con, 'students');
                    
                    
                            // $s = " SELECT * from beds WHERE m_f = '$type'";
                            $s_gov = "SELECT * FROM government ";
                            $result_gov = mysqli_query($con , $s_gov);
                    
                            while($row_gov = mysqli_fetch_assoc($result_gov)) {
                    ?>
                        <tr>
                            <th><?php echo $row_gov['id_gov'] ?></th>
                            <th><?php echo $row_gov['name'] ?></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive area">
            <table class="table table-striped table-sm table-hover">
                <thead>
                    <tr>
                        <th>area number</th>
                        <th>area name</th>
                        <th>government name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con, 'students');
                    
                    
                            // $s = " SELECT * from beds WHERE m_f = '$type'";
                            $s_area = "SELECT * FROM area INNER JOIN government ON area.gov_id = government.id_gov ";
                            $result_area = mysqli_query($con , $s_area);
                    
                            while($row_area = mysqli_fetch_assoc($result_area)) {
                    ?>
                        <tr>
                            <th><?php echo $row_area['id_area'] ?></th>
                            <th><?php echo $row_area['area_name'] ?></th>
                            <th><?php echo $row_area['name'] ?></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive apartment">
            <table class="table table-striped table-sm table-hover">
                <thead>
                    <tr>
                        <th>apartment number</th>
                        <th>apartment address</th>
                        <th>apartment info</th>
                        <th>for males or females</th>
                        <th>area number</th>
                        <th>fully booked</th>
                        <th>half booked</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con, 'students');
                    
                    
                            // $s = " SELECT * from beds WHERE m_f = '$type'";
                            $s_apartment = "SELECT * FROM apartment INNER JOIN area ON apartment.area_id = area.id_area INNER JOIN government ON area.gov_id = government.id_gov ";
                            $result_apartment = mysqli_query($con , $s_apartment);
                    
                            while($row_apartment = mysqli_fetch_assoc($result_apartment)) {
                    ?>
                        <tr>
                            <th><?php echo $row_apartment['id_apartment'] ?></th>
                            <th><?php echo $row_apartment['apartment_address'] ?></th>
                            <th><?php echo $row_apartment['apartment_info'] ?></th>
                            <th class="<?php echo ($row_apartment['m_f'] == 1 ? 'text-danger' : 'text-success') ?>"><?php echo ($row_apartment['m_f'] == 1 ? 'male' : 'female') ?></th>
                            <th><?php echo $row_apartment['area_id'] ?></th>
                            <th class="<?php echo ($row_apartment['apartment_booked'] == 1 ? 'text-danger' : 'text-success') ?>"><?php echo ($row_apartment['apartment_booked'] == 1 ? 'booked' : 'not yet') ?></th>
                            <th class="<?php echo ($row_apartment['half_booked'] == 1 ? 'text-danger' : 'text-success') ?>"><?php echo ($row_apartment['half_booked'] == 1 ? 'booked' : 'not yet') ?></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive room">
            <table class="table table-striped table-sm table-hover">
                <thead>
                    <tr>
                        <th>room number</th>
                        <th>room info</th>
                        <th>apartment address</th>
                        <th>apartment id</th>
                        <th>for males or females</th>
                        <th>area number</th>
                        <th>fully booked</th>
                        <th>half booked</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con, 'students');
                    
                    
                            // $s = " SELECT * from beds WHERE m_f = '$type'";
                            $s_room = "SELECT * FROM room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment INNER JOIN area ON apartment.area_id = area.id_area ";
                            $result_room = mysqli_query($con , $s_room);
                    
                            while($row_room = mysqli_fetch_assoc($result_room)) {
                    ?>
                        <tr>
                            <th><?php echo $row_room['id_room'] ?></th>
                            <th><?php echo $row_room['room_info'] ?></th>
                            <th><?php echo $row_room['apartment_address'] ?></th>
                            <th><?php echo $row_room['apartment_id'] ?></th>
                            <!-- <th><?php echo $row_room['m_f'] ?></th> -->
                            <th class="<?php echo ($row_room['m_f'] == 1 ? 'text-danger' : 'text-success') ?>"><?php echo ($row_room['m_f'] == 1 ? 'male' : 'female') ?></th>
                            <th><?php echo $row_room['area_id'] ?></th>
                            <th class="<?php echo ($row_room['room_booked'] == 1 ? 'text-danger' : 'text-success') ?>"><?php echo ($row_room['room_booked'] == 1 ? 'booked' : 'not yet') ?></th>
                            <th class="<?php echo ($row_room['half_booked'] == 1 ? 'text-danger' : 'text-success') ?>"><?php echo ($row_room['half_booked'] == 1 ? 'booked' : 'not yet') ?></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-responsive beds">
            <table class="table table-striped table-sm table-hover">
                <thead>
                    <tr>
                        <th>bed number</th>
                        <th>bed describtion</th>
                        <th>bed price</th>
                        <th>fully booked or not</th>
                        <th>room number</th>
                        <th>apartment number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con, 'students');
                    
                    
                            // $s = " SELECT * from beds WHERE m_f = '$type'";
                            $s_beds = "SELECT * FROM beds INNER JOIN room ON beds.room_id = room.id_room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment INNER JOIN area ON apartment.area_id = area.id_area INNER JOIN government ON area.gov_id = government.id_gov ";
                            $result_beds = mysqli_query($con , $s_beds);
                    
                            while($row_beds = mysqli_fetch_assoc($result_beds)) {
                    ?>
                        <tr>
                            <th><?php echo $row_beds['id_beds'] ?></th>
                            <th><?php echo $row_beds['bed_description'] ?></th>
                            <th><?php echo $row_beds['bed_price'] ?></th>
                            <th class="<?php echo ($row_beds['beds_booked'] == 1 ? 'text-danger' : 'text-success') ?>"><?php echo ($row_beds['beds_booked'] == 1 ? 'booked' : 'not yet') ?></th>
                            <th><?php echo $row_beds['id_room'] ?></th>
                            <th><?php echo $row_beds['id_apartment'] ?></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

      </div>

      <div class="edit">
        <div class="row mb-4 mt-4 mr-auto ml-auto">

          <form class="container add-government" action="add/add_government.php" method="post">

            <div class="row">
              <div class='col'>
                <div class="form-group">
                  <input name="government" type="text" class="form-control" id="government_main" placeholder="type government name ...">
                </div>
              </div>

              <div class='col'>
                <button type="submit" class="btn btn-primary my-1">add</button>
              </div>
            </div>

          </form>

          <form class="container add-area" action="add/add_area.php" method="post">

            <div class="row">
              <div class='col'>
                <select name="government" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                  <option value="gov" selected>government</option>
                  <?php
                      $con = mysqli_connect('localhost','root','');
                      mysqli_select_db($con, 'students');
                      // $con = mysqli_connect('sql313.byetcluster.com','b15_26550539','01113284597aab');
                      // mysqli_select_db($con, 'b15_26550539_student');
                      $s = " select * from government ";
                      $result = mysqli_query($con , $s);

                      while($row = mysqli_fetch_assoc($result)) {
                  ?>

                    <option value='<?php echo $row['id_gov']; ?>'> <?php echo $row['name']; ?> </option>

                  <?php
                      }
                  ?>

                </select>
              </div>

              <div class='col'>
                <input name="area" type="text" class="form-control" id="area" placeholder="type area name ...">
              </div>

              <div class='col'>
                <button type="submit" class="btn btn-primary my-1">add</button>
              </div>
            </div>
            
          </form>

          
          <form class="container add-apartment" action="add/add_apartment.php" method="post" enctype="multipart/form-data"  >
            <div class="row mt-3 mb-3">
              <div class='col'>
                  <select required name="government" class="custom-select inputGroupSelect01" >
                    <option value="gov" selected>government</option>

                    <?php
                          $con = mysqli_connect('localhost','root','');
                          mysqli_select_db($con, 'students');
                          // $con = mysqli_connect('sql313.byetcluster.com','b15_26550539','01113284597aab');
                          // mysqli_select_db($con, 'b15_26550539_student');
                          $s = " select * from government ";
                          $result = mysqli_query($con , $s);

                          while($row = mysqli_fetch_assoc($result)) {
                      ?>

                        <option value='<?php echo $row['id_gov']; ?>'> <?php echo $row['name']; ?> </option>

                      <?php
                          }
                      ?>

                  </select>
                </div>   

                <div class='col'>
                  <select name="area" class="custom-select inputGroupSelect03" id="inputGroupSelect03">
                    <option value="all" selected>area</option>

                    <?php
                        $con = mysqli_connect('localhost','root','');
                        mysqli_select_db($con, 'students');
                        $s = " select * from government ";
                        $result_gov = mysqli_query($con , $s);

                        while($row_gov = mysqli_fetch_assoc($result_gov)) {
                    ?>

                    <optgroup class="optgroub" value='<?php echo $row_gov['id_gov']; ?>'> 
                      <?php
                          $gover = $row_gov['id_gov'];
                          $con = mysqli_connect('localhost','root','');
                          mysqli_select_db($con, 'students');
                          $s = " select * from area where gov_id = '$gover' ";
                          $result_area = mysqli_query($con , $s);

                          while($row_area = mysqli_fetch_assoc($result_area)) {
                      ?>

                      <option value='<?php echo $row_area['id_area']; ?>'> <?php echo $row_area['area_name']; ?> </option>

                      <?php
                          }
                      ?>
                    </optgroup>

                    <?php
                        }
                    ?>
                    

                  </select>
                </div>
            </div>

            <div class="row mt-3 mb-3">
              <div class='col-12 mt-2 mb-2'>
                <input type="text" name="apartment_address" class="form-control" id="apartment" placeholder="type apartment address ...">
              </div>
              <div class='col-12 mt-2 mb-2'>
                <input type="text" name="apartment_info" class="form-control" id="apartment" placeholder="type apartment info ...">
              </div>
              <div class='col-12 mt-2 mb-2'>
                <div class="custom-file">
                  <input name="file" type="file" class="custom-file-input" id="validatedInputGroupCustomFile" >
                  <label class="custom-file-label" for="validatedInputGroupCustomFile">apartment photo...</label>
                </div>
              </div>
              <div class='col-12 mt-2 mb-2'>
                <select class="custom-select" name="m_f" id="">
                    <option value="1">male</option>
                    <option value="2">female</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class='col-12'>
                <button type="submit" class="btn btn-primary btn-block btn-lg my-1">Submit</button>
              </div>  
            </div>

          </form>


          <form class="container add-room" action="add/add_room.php" method="post" enctype="multipart/form-data">
            
            <div class="row mb-2 mt-2">
              <div class='col'>
                <select name="government" class="custom-select my-1 mr-sm-2 inputGroupSelect01" >
                  <option value="gov" selected>government</option>
                  <?php
                        $con = mysqli_connect('localhost','root','');
                        mysqli_select_db($con, 'students');
                        // $con = mysqli_connect('sql313.byetcluster.com','b15_26550539','01113284597aab');
                        // mysqli_select_db($con, 'b15_26550539_student');
                        $s = " select * from government ";
                        $result = mysqli_query($con , $s);

                        while($row = mysqli_fetch_assoc($result)) {
                    ?>

                      <option value='<?php echo $row['id_gov']; ?>'> <?php echo $row['name']; ?> </option>

                    <?php
                        }
                    ?>
                </select>
              </div>

              <div class='col'>
                <select name="area" class="custom-select my-1 mr-sm-2 inputGroupSelect03" >
                  <option value="all" selected>area</option>
                  <?php
                      $con = mysqli_connect('localhost','root','');
                      mysqli_select_db($con, 'students');
                      $s = " select * from government ";
                      $result_gov = mysqli_query($con , $s);

                      while($row_gov = mysqli_fetch_assoc($result_gov)) {
                  ?>

                  <optgroup class="optgroub" value='<?php echo $row_gov['id_gov']; ?>'> 
                    <?php
                        $gover = $row_gov['id_gov'];
                        $con = mysqli_connect('localhost','root','');
                        mysqli_select_db($con, 'students');
                        $s = " select * from area where gov_id = '$gover' ";
                        $result_area = mysqli_query($con , $s);

                        while($row_area = mysqli_fetch_assoc($result_area)) {
                    ?>

                    <option value='<?php echo $row_area['id_area']; ?>'> <?php echo $row_area['area_name']; ?> </option>

                    <?php
                        }
                    ?>
                  </optgroup>

                  <?php
                      }
                  ?>
                </select>
              </div>

              <div class='col'>
                <select name="apartment" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                  <option value="all" selected>apartment</option>

                  <?php
                      $con = mysqli_connect('localhost','root','');
                      mysqli_select_db($con, 'students');
                      $s = " select * from apartment ";
                      $result_apart = mysqli_query($con , $s);
                      while($row_apart = mysqli_fetch_assoc($result_apart)) {
                  ?>

                    <option value='<?php echo $row_apart['id_apartment']; ?>'> <?php echo $row_apart['id_apartment']; ?> </option>

                  <?php
                      }
                  ?>
                </select>
              </div>
            </div>
            
            <div class="row mb-2 mt-2">
              <div class='col-12 mb-2 mt-2'>
                <input name="room_info" type="text" class="form-control" id="room" placeholder="type room info ...">
              </div>
              <div class='col-12 mb-2 mt-2'>
                <div class="custom-file">
                  <input name="file" type="file" class="custom-file-input" id="validatedInputGroupCustomFile" required>
                  <label class="custom-file-label" for="validatedInputGroupCustomFile">room photo...</label>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class='col'>
                <button type="submit" class="btn btn-primary btn-lg btn-block my-1">Submit</button>
              </div>
            </div>

          </form>

          
          <form class="container add-beds" action="add/add_bed.php" method="post" enctype="multipart/form-data">
          
            <div class="row mt-2 mb-2">
              <div class='col'>
                <select name="government" class="custom-select my-1 mr-sm-2 inputGroupSelect01" >
                  <option value="gov" selected>government</option>
                  <?php
                        $con = mysqli_connect('localhost','root','');
                        mysqli_select_db($con, 'students');
                        // $con = mysqli_connect('sql313.byetcluster.com','b15_26550539','01113284597aab');
                        // mysqli_select_db($con, 'b15_26550539_student');
                        $s = " select * from government ";
                        $result = mysqli_query($con , $s);

                        while($row = mysqli_fetch_assoc($result)) {
                    ?>

                      <option value='<?php echo $row['id_gov']; ?>'> <?php echo $row['name']; ?> </option>

                    <?php
                        }
                    ?>
                </select>
              </div>

              <div class='col'>
                <select name="area" class="custom-select my-1 mr-sm-2 inputGroupSelect03">
                  <option value="all" selected>area</option>
                  <?php
                      $con = mysqli_connect('localhost','root','');
                      mysqli_select_db($con, 'students');
                      $s = " select * from government ";
                      $result_gov = mysqli_query($con , $s);

                      while($row_gov = mysqli_fetch_assoc($result_gov)) {
                  ?>

                  <optgroup class="optgroub" value='<?php echo $row_gov['id_gov']; ?>'> 
                    <?php
                        $gover = $row_gov['id_gov'];
                        $con = mysqli_connect('localhost','root','');
                        mysqli_select_db($con, 'students');
                        $s = " select * from area where gov_id = '$gover' ";
                        $result_area = mysqli_query($con , $s);

                        while($row_area = mysqli_fetch_assoc($result_area)) {
                    ?>

                    <option value='<?php echo $row_area['id_area']; ?>'> <?php echo $row_area['area_name']; ?> </option>

                    <?php
                        }
                    ?>
                  </optgroup>

                  <?php
                      }
                  ?>
                </select>
              </div>

              <div class='col'>
                <select name="apartment" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref_apartnumber">
                  <option value="all" selected>apartment number</option>

                  <?php
                      $con = mysqli_connect('localhost','root','');
                      mysqli_select_db($con, 'students');
                      $s = " select * from apartment ";
                      $result_apart = mysqli_query($con , $s);
                      while($row_apart = mysqli_fetch_assoc($result_apart)) {
                  ?>

                    <option value='<?php echo $row_apart['id_apartment']; ?>'> <?php echo $row_apart['id_apartment']; ?> </option>

                  <?php
                      }
                  ?>
                </select>
              </div>

              <div class='col'>
                <select name="room" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref_roomnumber">
                  <option value="all" selected>room number</option>

                  <?php
                      $con = mysqli_connect('localhost','root','');
                      mysqli_select_db($con, 'students');
                      $s = " select * from room ";
                      $result_ro = mysqli_query($con , $s);
                      while($row_ro = mysqli_fetch_assoc($result_ro)) {
                  ?>

                    <option value='<?php echo $row_ro['id_room']; ?>'> <?php echo $row_ro['id_room']; ?> </option>

                  <?php
                      }
                  ?>
                </select>
              </div>
            </div>

            <div class="row mt-2 mb-2">
              <div class='col-12 mt-2 mb-2'>
                <input name="bed_description" type="text" class="form-control" id="bed" placeholder="type bed description ...">
              </div>
              <div class='col-12 mt-2 mb-2'>
                <input name="bed_price" type="number" class="form-control" id="bed" placeholder="type bed price ...">
              </div>
              <div class='col-12 mt-2 mb-2'>
                <div class="custom-file">
                  <input name="file" type="file" class="custom-file-input" id="validatedInputGroupCustomFile" required>
                  <label class="custom-file-label" for="validatedInputGroupCustomFile">bed photo...</label>
                </div>
              </div>
            </div>

            <div class="row mt-2 mb-2">
              <div class='col'>
                <button type="submit" class="btn btn-primary btn-lg btn-block my-1">Submit</button>
              </div>
            </div>

          </form>

        </div>
      </div>


    </main>
  </div>
</div>


<script src="assets/js/libs/jquery/jquery.slim.min.js"></script>
  <script src="assets/js/libs/popper/popper.min.js"></script>
  <!--Jquery-->
  <script src="assets/js/libs/jquery/jquery.min.js"></script>
  <!--bootstrap-->
  <script src="assets/js/libs/bootstrap/bootstrap.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="assets/js/libs/bootstrap/dashboard.js"></script>
    <script src="assets/js/libs/bootstrap/bootstrap.bundle.min.js"></script>

    <script src="assets/js/libs/bootstrap/dashcontrol.js"></script>

    <script>
      $('.inputGroupSelect03 .optgroub').css({"display":"none"});
      $('.inputGroupSelect01').change(function () {
        console.log('value: ' + $(this).val());
        $v = $(this).val() ;
        $(".inputGroupSelect03").each(function() { 
          $('.inputGroupSelect03 .optgroub').css({"display":"none"});
          $('.optgroub[value = '+ $v +']').css({"display" : "block"});
        });
      });
    </script>