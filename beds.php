<?php
        $type = $_SESSION['m'];
        if ($type == 1) {$artype = 'ذكور' ;} else {$artype = 'اناث' ;}
                
        $gov = $_SESSION['gov'] ;
        $area = $_SESSION['area'] ;
        $room_or_bed = $_SESSION['live'] ;
        $price = $_SESSION['price'];
?>
<section class="portfolio">
    <div class="container">
      <div class="text-info text-center">
        <h3 class="title-a">سراير</h3>
        <p class="subtitle-a">الاسرة الفارغة من شقق ال <?php echo $artype ?></p>
      </div>

      <div class="row">

       <?php
        $con = mysqli_connect('localhost','root','');
        mysqli_select_db($con, 'students');


        // $s = " SELECT * from beds WHERE m_f = '$type'";
        if($gov == 'all'){
            $s = "SELECT * FROM beds INNER JOIN room ON beds.room_id = room.id_room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment INNER JOIN area ON apartment.area_id = area.id_area INNER JOIN government ON area.gov_id = government.id_gov WHERE m_f = '$type' && beds_booked = 0 ";
            $result = mysqli_query($con , $s);
        } else {
            $s = "SELECT * FROM beds INNER JOIN room ON beds.room_id = room.id_room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment INNER JOIN area ON apartment.area_id = area.id_area INNER JOIN government ON area.gov_id = government.id_gov WHERE m_f = '$type' && gov_id = '$gov' && area_id = '$area' && beds_booked = 0";
            $result = mysqli_query($con , $s);
        }

        while($row_bed = mysqli_fetch_assoc($result)) {
            $roomId = $row_bed['room_id'] ;
        ?>

        <div class="col-12">
            <div class="work-box">
                <div class="row mr-0 ml-0">
                    <div class="work-img col-lg-4">
                        <div class="small-gallery">

                            <a class="example-image-link" href="assets/images/beds/<?php echo $row_bed['bed_photo']; ?>" data-lightbox="example-set-<?php echo $row_bed['id_beds']; ?>" data-title="<?php echo $row_bed['bed_description']; ?>"><img class="img-fluid" class="h-100 example-image w-100" src="assets/images/beds/<?php echo $row_bed['bed_photo']; ?>" alt=""/></a>

                        </div>
                    </div>

                    <div class="work-content col-lg-8  mt-0">
                        <div class="row pb-4">
                            <div class="col-8">
                                <h2 class="w-title">شقة بها 
                                <?php 
                                    $bedId = $row_bed['id_beds'];
                                    $get_apar_id = "SELECT * FROM beds INNER JOIN room ON beds.room_id = room.id_room INNER JOIN apartment ON room.apartment_id = apartment.id_apartment WHERE id_beds= '$bedId'";
                                    $result_apar = mysqli_query($con , $get_apar_id);
                                    while($row_apar_id = mysqli_fetch_assoc($result_apar)) {
                                        $apar_id = $row_apar_id['id_apartment'];

                                    $price = "SELECT COUNT(id_room) AS coun FROM room WHERE apartment_id = $apar_id";
                                    $result_price = mysqli_query($con , $price);
                                    while($row_price = mysqli_fetch_assoc($result_price)) {
                                    echo $row_price['coun'];
                                    } 
                                ?>
                                    غرف
                                </h2>
                                <!-- <h12>العنوان : شارع الامل بجوار مدرسة التحرير </h12> -->
                                <div class="w-more pb-0"><span class="w-ctegory"> العنوان / </span><span class="w-date"> <?php echo $row_apar_id['apartment_address']; ?> </span></div>
                                <div class="w-more"><span class="w-ctegory"> المتبقي 2 غرف / </span><span class="w-date">
                                الغرفة بها 
                                <?php 
                                    $coun = "SELECT COUNT(id_beds) AS coun FROM beds WHERE room_id = $roomId";
                                    $result_price_2 = mysqli_query($con , $coun);
                                    while($row_price = mysqli_fetch_assoc($result_price_2)) {
                                    echo $row_price['coun'];
                                    } 
                                ?>
                                اسرة
                                </span></div>
                            </div>
                            <div class="col-4">
                                <div class="w-like fa-pull-right text-dark">
                                <?php 
                                // $con = mysqli_connect('localhost','root','');
                                // mysqli_select_db($con, 'students');
                                
                                $price = $row_bed['bed_price'];
                                echo $price;
                                ?>  
                                <img src="assets/images/egp.png" class="d-inline-block" style="width:32px;" alt="">
                                <!-- <i class="fas fa-plus"></i> -->
                                </div>
                            </div>
                            <div class="col-12 justify-content-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="...">

                                <form action="" method="post">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                        <!-- <a href="room.php" class="btn my-btn-outline-info">عرض المزيد</a> -->
                                        <a class="btn my-btn-outline-success" data-toggle="modal" data-target="#exampleModal<?php echo $row_bed['id_beds']; ?>">حجز الان</a>
                                    </div>
                                </form>

<!-- 
                                <a href="room.php" class="btn my-btn-outline-info">عرض المزيد</a>
                                <a class="btn my-btn-outline-success" data-toggle="modal" data-target="#exampleModal<?php echo $row_bed['id_beds']; ?>">حجز الان</a>
 -->
                                <!-- ******************************** Modal ******************************** -->
                                <div class="modal fade" id="exampleModal<?php echo $row_bed['id_beds']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">book <?php echo $row_apar_id['apartment_address'] ; ?> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="email.php" method="POST">
                                            <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">اسمك</label>
                                            <input name='name' type="text" class="form-control" id="recipient-name">
                                            <input name='type' hidden type="text" class="form-control" id="recipient-name" value="beds">
                                            <input name='type_id' hidden type=text value="<?php echo $row_bed['id_beds'] ?>">
                                            <input name='address' hidden type="text" class="form-control" id="recipient-name" value="<?php echo $row_apar_id['apartment_address'] ; ?>" >

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
        <?php
        }
        ?>

        </div><!-- ./row -->
    </div>
  </section>

  