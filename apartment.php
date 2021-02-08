<?php
        $type = $_SESSION['m'];
        if ($type == 1) {$artype = 'ذكور' ;} else {$artype = 'اناث' ;}
        $roomId;
                                
        $gov = $_SESSION['gov'] ;
        $area = $_SESSION['area'] ;
        $room_or_bed = $_SESSION['live'] ;
        $price = $_SESSION['price'];
?>
<section class="portfolio">
    <div class="container">
      <div class="text-info text-center">
        <h3 class="title-a">الشقق</h3>
        <p class="subtitle-a">الشقق الغير محجوزة ل <?php echo $artype ?> </p>
      </div>

      <div class="row">

       <?php
        $con = mysqli_connect('localhost','root','');
        mysqli_select_db($con, 'students');


        // $s = "SELECT * FROM apartment WHERE m_f = '$type' && apartment_booked = '0' ";
        // $result_apart = mysqli_query($con , $s);

        if($gov == 'all'){
            $s = "SELECT * FROM apartment WHERE m_f = '$type' && apartment_booked = 0";
            $result_apart = mysqli_query($con , $s);
        } else {
            $s = "SELECT * FROM apartment INNER JOIN area ON apartment.area_id = area.id_area INNER JOIN government ON area.gov_id = government.id_gov  WHERE m_f = '$type' && gov_id = '$gov' && area_id = '$area' && apartment_booked = 0";
            $result_apart = mysqli_query($con , $s);
        }

        while($row_apart = mysqli_fetch_assoc($result_apart)) {
            $roomId ;
        ?>
        <div class="col-12">
            <div class="work-box">

                <div class="row mr-0 ml-0">
                    <div class="work-img col-lg-4">
                        <div class="small-gallery">

                        <a class="example-image-link" href="assets/images/apartment/<?php echo $row_apart['apartment_photo']; ?>" data-lightbox="example-set-<?php echo $row_apart['id_apartment']; ?>" data-title="<?php echo $row_apart['apartment_info']; ?>"><img class="img-fluid" class="h-100 example-image w-100" src="assets/images/apartment/<?php echo $row_apart['apartment_photo']; ?>" alt=""/></a>

                            <?php
                                $aparId = $row_apart['id_apartment'];
                                $s = " SELECT * from room where apartment_id ='$aparId' ";
                                $result_room = mysqli_query($con , $s);

                                while($row = mysqli_fetch_assoc($result_room)) {
                            ?>

                                <a class="example-image-link" href="assets/images/rooms/<?php echo $row['room_photo']; ?>" data-lightbox="example-set-<?php echo $row_apart['id_apartment']; ?>" data-title="<?php echo $row['room_info']; ?>"><img class="img-fluid" class="h-100 example-image w-100" src="assets/images/rooms/<?php echo $row['room_photo']; ?>" alt=""/></a>

                                <?php
                                $roomId = $row['id_room'];
                                $s = " SELECT * from beds where room_id ='$roomId' ";
                                $result = mysqli_query($con , $s);

                                while($row_bed = mysqli_fetch_assoc($result)) {
                                ?>

                                <a class="example-image-link" href="assets/images/beds/<?php echo $row_bed['bed_photo']; ?>" data-lightbox="example-set-<?php echo $row_apart['id_apartment']; ?>" data-title="<?php echo $row_bed['bed_description']; ?>"><img class="img-fluid" class="h-100 example-image w-100" src="assets/images/beds/<?php echo $row_bed['bed_photo']; ?>" alt=""/></a>

                                <?php
                                    }
                                ?>

                            <?php
                                }
                            ?>
                        </div>
                    </div>

                    <div class="work-content col-lg-8  mt-0">
                        <div class="row pb-5">
                            <div class="col-8">
                                <h2 class="w-title">شقة بها 
                                <?php 
                                    $rooms = "SELECT COUNT(id_room) AS coun FROM room WHERE apartment_id = $aparId";
                                    $result_rooms = mysqli_query($con , $rooms);
                                    while($row_rooms = mysqli_fetch_assoc($result_rooms)) {
                                        echo $row_rooms['coun'];
                                    } 
                                ?>
                                    غرف
                                </h2>
                                <!-- <h12>العنوان : شارع الامل بجوار مدرسة التحرير </h12> -->
                                <div class="w-more pb-0"><span class="w-ctegory"> العنوان / </span><span class="w-date"> <?php echo $row_apart['apartment_address']; ?> </span></div>
                                <div class="w-more"><span class="w-ctegory">  الشقة بها / </span><span class="w-date">
                                 
                                <?php 
                                    $beds_count = "SELECT COUNT(id_room) AS coun FROM room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment WHERE id_apartment= '$aparId'";
                                    $result_beds  = mysqli_query($con , $beds_count);
                                    while($row_beds = mysqli_fetch_assoc($result_beds )) {
                                        echo $row_beds['coun'];
                                    } 
                                ?>
                                غرف
                                </span></div>
                            </div>
                            <div class="col-4">
                                <div class="w-like fa-pull-right text-dark">
                                <?php 
                                    $con = mysqli_connect('localhost','root','');
                                    mysqli_select_db($con, 'students');
                                    $price = "SELECT SUM(bed_price) AS price, apartment_address, id_apartment FROM beds INNER JOIN room ON beds.room_id = room.id_room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment WHERE id_apartment= '$aparId' GROUP BY apartment.apartment_address, id_apartment";
                                    $result = mysqli_query($con , $price);
                                    while($row_price = mysqli_fetch_assoc($result)) {
                                        echo $row_price['price'];
                                    }
                                ?>  
                                <img src="assets/images/egp.png" class="d-inline-block" style="width:32px;" alt="">
                                <!-- <i class="fas fa-plus"></i> -->
                                </div>
                            </div>
                            <div class="col-12 justify-content-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                <!-- <a href="room.php" class="btn my-btn-outline-info">عرض المزيد</a> -->
                                <a class="btn my-btn-outline-success" data-toggle="modal" data-target="#exampleModal<?php echo $aparId ?>">حجز الان</a>
                                <!-- ******************************** Modal ******************************** -->
                                <div class="modal fade" id="exampleModal<?php echo $aparId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="email.php" method="POST">
                                            <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">اسمك</label>
                                            <input name='name' type="text" class="form-control" id="recipient-name">
                                            <input name='type' hidden type="text" class="form-control" id="recipient-name" value="apartment">
                                            <input name='type_id' hidden type=text value="<?php echo $row_apart['id_apartment'] ?>">
                                            <input name='address' hidden type="text" class="form-control" id="recipient-name" value="<?php echo $row_apart['apartment_address'] ; ?>" >

                                            </div>
                                            <div class="form-group">
                                            <label for="message-text" class="col-form-label">رقم التليفون</label>
                                            <input name='phone' type="text" class="form-control" id="message-text"></input>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Send message</button>
                                            </div>
                                        </form>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                                <!-- ******************************** Modal ******************************** -->
                            </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            </div>

        <?php
        }
        ?>

        </div><!-- ./row -->
    </div>
  </section>