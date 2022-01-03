<!DOCTYPE html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{  asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{  asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{  asset('assets/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{  asset('assets/css/main.css') }}">  
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{  asset('assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{  asset('assets/img/icon-kober.png') }}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<h1 class="sr-only">KoBer Web</h1>
						<div class="logo text-center">
                            <img src="{{  asset('assets/img/logo-kober.png') }}" width="400" height="150" alt="Klorofil Logo">
                        </div>
						<form class="form-auth-small" action="/post-register" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
							<input type="hidden" name="role" value="user">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="control-label sr-only">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="Nama">
								@if ($errors->has('name'))
									<span class="help-block">
										{{ $errors->first('name') }}
									</span>
								@endif
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="control-label sr-only">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="" placeholder="Email">
								@if ($errors->has('email'))
									<span class="help-block">
										{{ $errors->first('email') }}
									</span>
								@endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password" class="control-label sr-only">Kata Sandi</label>
                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
								@if ($errors->has('password'))
									<span class="help-block">
										{{ $errors->first('password') }}
									</span>
								@endif
                            </div>
							<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
								<label for="avatar">Avatar</label>
								<input type="file" class="form-control" id="avatar" name="avatar">
								@if ($errors->has('avatar'))
									<span class="help-block">
										{{ $errors->first('avatar') }}
									</span>
								@endif
							</div>
                            <button type="submit" class="btn btn-success btn-lg btn-block">REGISTER</button>
                        </form><br>
						<div class="bottom text-center">
							<span class="helper-text"><i class="fa fa-sign-in"></i> <a href="/login">Login with your account</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
