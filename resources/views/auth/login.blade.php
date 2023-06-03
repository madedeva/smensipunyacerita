<!doctype html>
<html lang="en">

<head>
	<title>Sipata - Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/login.css">

	<!-- icon -->
	<link rel="icon" href="https://i.ibb.co/qpgRvbq/image.png" type="image/icon type">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
                            <img src="https://i.ibb.co/qpgRvbq/image.png" alt="logo" width="100px" height="100px">
						</div>
                        <h2 class="heading-section mt-3 mb-4 text-center">Smensi Punya Cerita</h2>
						<form action="{{ route('login') }}" method="POST" class="login-form">
                            @csrf
							<div class="form-group">
								<input type="text" id="email" name="email" class="form-control rounded-left" placeholder="Email" required>
                                <!-- error -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        email/password Anda salah
                                    </div>
                                @enderror
							</div>
							<div class="form-group d-flex">
								<input type="password" id="password" name="password" class="form-control rounded-left" placeholder="Password" required>
                                <!-- error -->
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        email/password Anda salah
                                    </div>
                                @enderror
							</div>
							<div class="form-group">
								<div class="text-center">
									<a href="{{ route('password.request') }}">Lupa password?</a>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>