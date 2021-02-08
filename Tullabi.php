<?php include 'header.php'; ?> 

<link rel="stylesheet" href="assets/css/libs/main/dash_form.css">


  <section class="header">
    <div class="overley"></div>

    <div class="content w-75">
        <form action="valid.php" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2">@</span>
                </div>

                <input type="text" name="user" class="form-control" placeholder="email" aria-label="email" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-lock"></i></span>
                </div>

                <input type="password" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon3">
            </div>

            <div class="row text-center justify-content-center">
                <div class="btn-groub" role="group" aria-label="Button group with nested dropdown">
                    <button type="submit" class="btn btn-success">login</button>
                    <a href="regist.php" class="btn btn-light" role="button">or register here</a>                
                </div>
            </div>
        </form>
    </div>
  </section>

  <div id="preloader"></div>

<?php include 'footer.php' ;?>

<script>
    if( window.innerHeight != $("header").height() ){
    $(".header").height(window.innerHeight);
    }

    $(window).resize(function() {
        $(".header").height(window.innerHeight);
    });
</script>