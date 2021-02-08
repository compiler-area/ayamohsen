<?php include 'header.php' ?>

    <!-- inputs -->
    <style>
      input , textarea , .more-info{
        text-align: right ; 
      }
    </style>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-b fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">اختر مسكنك</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link " href="index.html" data-target="header">الرئيسية<span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a class="nav-link" href="about.php" data-target="work">معلومات عننا<span class="sr-only">(current)</span></a></li>
          <li class="nav-item active"><a class="nav-link active2" href="comming_soon.html" data-target="services">خدمات اخري<span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a class="nav-link" href="contact_us.html" data-target="contact">تواصل معنا<span class="sr-only">(current)																								</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <a class="back-to-top" href="#"><i class="fas fa-chevron-up"></i></a>

  <section class="portfolio mt-5">
    <div class="container mt-5">
      <div class="text-info text-center">
        <h3 class="title-a">تفاصيل اكثر عن شقة رقم 2 في منطقة سيتي</h3>
        <p class="subtitle-a"> محافظة سوهاج </p>
      </div>

        

      <div class="row">

        <div class="col-12">
            <div class="work-box">
                <div class="row mr-0 ml-0">
                    <div class=" col-lg-12">
                        <div class="row">
                            <div class="col-6 pl-0 ">
                              <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="m-0 example-image w-100" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt=""/></a>
                            </div>
                            <div class="col-6">
                              <div class="row h-100">
                                <a class="example-image-link col-4 p-0 h-50" href="http://lokeshdhakar.com/projects/lightbox2/images/image-4.jpg" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="m-0 example-image w-100 h-100" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-4.jpg" alt="" /></a>
                                <a class="example-image-link col-4 p-0 h-50" href="http://lokeshdhakar.com/projects/lightbox2/images/image-5.jpg" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="m-0 example-image w-100 h-100" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-5.jpg" alt="" /></a>
                                <a class="example-image-link col-4 p-0 h-50" href="http://lokeshdhakar.com/projects/lightbox2/images/image-6.jpg" data-lightbox="example-set" data-title="Click anywhere outside the image or the X to the right to close."><img class="m-0 example-image w-100 h-100" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-6.jpg" alt="" /></a>
                                <a class="example-image-link col-4 p-0 h-50" href="assets/images/work-1.jpg" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="m-0 example-image w-100 h-100" src="assets/images/work-1.jpg" alt="" /></a>
                                <a class="example-image-link col-4 p-0 h-50" href="assets/images/work-2.jpg" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="m-0 example-image w-100 h-100" src="assets/images/work-2.jpg" alt="" /></a>
                                <a class="example-image-link col-4 p-0 h-50" href="assets/images/work-3.jpg" data-lightbox="example-set" data-title="Click anywhere outside the image or the X to the right to close."><img class="m-0 example-image w-100 h-100" src="assets/images/work-3.jpg" alt="" /></a>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="work-content col-lg-12  mt-0">
                        <div class="row pb-5">
                          <div class="col-8">
                            <h2 class="w-title">غرفة بها 4 سرائر</h2>
                            <div class="w-more"><span class="w-ctegory"> المتبقي 3 غرف / </span><span class="w-date">الشقة بها 4 غرف</span></div>
                          </div>
                          <div class="col-4">
                              <div class="w-like fa-pull-right" style="font-size:20px ;">
                                500 EGP
                                <!-- <i class="fas fa-plus"></i> -->
                                <a class="btn my-btn-outline-success" data-toggle="modal" data-target="#exampleModal">حجز الان</a>
                                <!-- ******************************** Modal ******************************** -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <!-- <div class="col-12 justify-content-center">
                              <a class="btn my-btn-outline-success">حجز الان</a>
                          </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </section>

  <section class="contact">
    <div class="overley"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 mt-5">
          <div class="contact-mf">
            <div class="box-shadow-full" id="contact">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">ارسل الينا </h5>
                  </div>
                  <div>
                    <form class="contactForm" action="contact_form.php" method="post" role="form">
                      <div id="sendmessage">Your message has been sent. Thank you!</div>
                      <div id="errormessage"></div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input class="form-control" id="name" type="text" name="name" placeholder="اسمك" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input class="form-control" id="email" type="email" placeholder="الايميل الخاص بك" data-rule="email" data-msg="Please enter a valid email">
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input class="form-control" id="subject" type="text" name="name" placeholder="عنوان الرسالة" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <textarea class="form-control" name="message" data-rule="required" data-msg="Please write something for us" placeholder="الرسالة" rows="5"></textarea>
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button class="btn btn-primary" type="submit">ارسال الرسالة</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">تواصل معنا</h5>
                  </div>
                  <div class="more-info">
                    <p class="lead"> للتواصل في حالة حدوث مشكلة او لمعرفة تفاصيل اكثر </p>
                    <ul class="list-unstyled">
                      <li><i class="fas fa-map-marker-alt"></i>329 WASHINGTON ST BOSTON, MA 02108</li>
                      <li><i class="fas fa-phone-alt"></i>(617) 557-0089</li>
                      <li><i class="fas fa-envelope"></i>contact@example.com</li>
                    </ul>
                  </div>
                  <div class="social"><span class="ico-circle"><i class="fab fa-facebook  fa-2x"></i></span><span class="ico-circle"><i class="fab fa-instagram fa-2x"></i></span><span class="ico-circle"><i class="fab fa-twitter fa-2x"></i></span><span class="ico-circle"><i class="fab fa-pinterest-p fa-2x"></i></span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="preloader"></div>
  
  <?php include 'footer.php' ?>
