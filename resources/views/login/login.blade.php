<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - Digital Bariwala</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/horizontal-layout/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row w-100" style="margin: 0px auto;">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo" style="text-align: center;">
                  <img src="{{ asset('assets/images/logo.svg') }}" alt="logo">
                </div>
                <div id="error_msg">
                </div>
                <form class="pt-3" id="login">
                  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="user_id" name="user_id" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN">
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                    Don't have an account? <a href="register.html" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/template.js') }}"></script>
  <script src="{{ asset('assets/js/settings.js') }}"></script>
  <script src="{{ asset('assets/js/todolist.js') }}"></script>
  <!-- endinject -->

  <script type="text/javascript">
        $(document).ready(function(){
            $("#login").submit(function(e){
                e.preventDefault();
                var formData = {
                    userId: $("#user_id").val(),
                    password: $("#password").val(),
                    _token: $("#_token").val()
                };
                $.ajax({
                    url:"{{url('/login-check')}}",
                    type: "POST",
                    data: formData,
                    dataTyep: "JSON",
                    success: function(response){
                        if(response.status == "error"){
                            $("#error_msg").html("<p class='alert alert-danger'>"+ response.message+"</p>");
                            setTimeout(function() { $("#error_msg").fadeIn("slow"); }, 1000);
                        }else{
                            window.location.replace(response.url);
                        }
                    }
                });
            });
            $("#erease").on("click", function(){
                $("#error_msg").html();
            });
        });
    </script>
</body>

</html>
