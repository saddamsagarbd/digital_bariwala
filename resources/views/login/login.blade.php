<!DOCTYPE html>
<html>
<head>
	<title>Login - Digital Bariwala</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<div class="container">
    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
            <span> <img src="https://amar.vote/assets/img/amarVotebd.png" class="w-75" alt="Logo"> </span><br/>
            <span class="logo_title mt-5"> Login Dashboard </span>
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

        </div>
        <div class="card-body">
            <form id="login_form" method="post" action="javascript:void(0)">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="userid" id="userid" class="form-control" placeholder="User ID">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group float-left">
                	<a href="#">Forget Password?</a>
                </div>
                <div class="form-group">
                	<button type="button" id="actionBtn" class="btn btn-outline-danger float-right login_btn">Login</button>
                    <!-- <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn"> -->
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#actionBtn").on("click", function(){
			var userId = $("#userid").val();
			var password = $("#password").val();
			$.ajax({
				url:"/login",
				method:"POST",
				data: {"_token": "{{ csrf_token() }}", "userId": userId, "password":password},
				dataType: "JSON",
				success:function(data){
					
				}
			});
		});

	});
</script>
</body>
</html>