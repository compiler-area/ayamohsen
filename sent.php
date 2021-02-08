<?php include 'header.php' ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-blacktrans navbar-b fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">اختر مسكنك</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="index.php" data-target="header">الرئيسية<span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a class="nav-link" href="about.php" data-target="work">معلومات عننا<span class="sr-only">(current)</span></a></li>
          <li class="nav-item active"><a class="nav-link active2" href="comming_soon.php" data-target="services">خدمات اخري<span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a class="nav-link" href="contact_us.php" data-target="contact">تواصل معنا<span class="sr-only">(current)																								</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="header" style="height: 625px;">
    <div class="overley"></div>
    <div class="content w-75" style="text-align: left;">
        <div class="alert alert-success" role="alert">
            sent
        </div>
    </div>
  </section>

<?php include 'footer.php' ?>

<script>
    if( window.innerHeight != $("header").height() ){
      $(".header").height(window.innerHeight);
    }

  $(window).resize(function() {
      $(".header").height(window.innerHeight);
  });
</script>