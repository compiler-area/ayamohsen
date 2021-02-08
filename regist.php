<?php include 'header.php'; ?>

    <link rel="stylesheet" href="assets/css/libs/main/dash_form.css">


  <section class="header">
    <div class="overley"></div>

    <div class="content w-75">
        <form action="reg.php" method="post"  enctype="multipart/form-data" >
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                </div>

                <input type="text" name="user_name" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2">@</span>
                </div>

                <input type="email" name="user_email" class="form-control" placeholder="email" aria-label="email" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><i class="fa fa-lock"></i></span>
                </div>

                <input type="password" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon3">
            </div>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input name="file" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"></label>
                </div>
            </div>

            <div class="row text-center justify-content-center">
                <div class="btn-groub" role="group" aria-label="Button group with nested dropdown">
                    <button type="submit" class="btn btn-danger">register</button>
                    <a href="Tullabi.php" class="btn btn-light" role="button">or ligin here</a>                
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
    $('.custom-file-input').on(
        'change' , 
        function () {
            $('.custom-file-label').text(document.querySelector(".custom-file-input").value);
        }
    )
</script>