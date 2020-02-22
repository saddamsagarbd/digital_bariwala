<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>Login- Digital Bariwala</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/css/helper.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <div id="error_msg">
                                    
                                </div>
                                <form id="login">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label>Userid</label>
                                        <input type="text" id="user_id" name="user_id" class="form-control" placeholder="Put your user id here...">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="checkbox">
                                        <label class="pull-right">
        										<a href="#">Forgotten Password?</a>
        									</label>

                                    </div>
                                    <input type="submit" value="Login" class="btn btn-primary btn-flat m-b-30 m-t-30">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- <script src="{{asset('assets/js/lib/jquery/jquery.min.js')}}"></script> -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/js/lib/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
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