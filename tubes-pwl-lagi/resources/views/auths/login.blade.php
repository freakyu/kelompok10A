<!DOCTYPE html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | KoBer Web</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/icon-kober.png') }}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{ asset('assets/img/logo-kober.png') }}"width="390" alt="KoBer Web Logo"></div>
							</div>
							<form class="form-auth-small" action="/post-login" method="POST">
                                {{ csrf_field() }}
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
									<label for="password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
									@if ($errors->has('password'))
										<span class="help-block">
											{{ $errors->first('password') }}
										</span>
									@endif
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-user-plus"></i> <a href="/register">Register Account</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Aplikasi Pengelolaan Data Barang</h1>
							<p>by KoBer Web Devs</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
