<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" defer></script>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: 'Poppins', sans-serif;
    background-color: aliceblue;
}

.wrapper{
    padding: 30px 50px;
    border: 1px solid #ddd;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 600px;
}
h4{
    letter-spacing: -1px;
    font-weight: 400;
}
.img{
    width: 70px;
    height: 70px;
    border-radius: 6px;
    object-fit: cover;
}
#img-section p,#deactivate p{
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
    text-align: justify;
}
#img-section b,#img-section button,#deactivate b{
    font-size: 14px; 
}

label{
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    color: #777;
    padding-left: 3px;
}

.form-control{
    border-radius: 10px;
}

input[placeholder]{
    font-weight: 500;
}
.form-control:focus{
    box-shadow: none;
    border: 1.5px solid #0779e4;
}
select{
    display: block;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 10px;
    height: 40px;
    padding: 5px 10px;
    /* -webkit-appearance: none; */
}

select:focus{
    outline: none;
}
.button{
    background-color: #fff;
    color: #0779e4;
}
.button:hover{
    background-color: #0779e4;
    color: #fff;
}
.btn-primary{
    background-color: #0779e4;
}
.danger{
    background-color: #fff;
    color: #e20404;
    border: 1px solid #ddd;
}
.danger:hover{
    background-color: #e20404;
    color: #fff;
}
@media(max-width:576px){
    .wrapper{
        padding: 25px 20px;
    }
    #deactivate{
        line-height: 18px;
    }
}
</style>
<body>
    <div class="container">
        <div class="wrapper bg-white mt-sm-5">
            <h4 class="pb-4 border-bottom">Informasi Akun</h4>
            <div class="d-flex align-items-start py-3 border-bottom">
                <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                    class="img" alt="">
                <div class="pl-sm-4 pl-2" id="img-section">
                    <b>I Made Deva Kerti Wijaya</b>
                    <p>deva@smensi.sch.id</p>
                    <p></p>
                </div>
            </div>
            <form action="{{ route('password.update') }}" method="POST">
                 @csrf
                @method('put')
                <div class="py-2">
                    <b>Ubah Password</b>
                    @if (session('status') === 'password-updated')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sukses!</strong> Password telah berhasil dirubah.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="row py-2">
                        <div class="col-md-12">
                            <label for="firstname">Password Lama</label>
                            <input type="password" name="current_password" id="current_password" class="bg-light form-control">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-12">
                            <label for="firstname">Password Baru</label>
                            <input type="password" name="password" id="password" class="bg-light form-control">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-12 pt-md-0 pt-3">
                            <label for="firstname">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="bg-light form-control">
                        </div>
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <button class="btn btn-primary mr-3">Ubah Password</button>
                    </div>
                    <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                        <div>
                            <b>Peringatan</b>
                            <p>Jaga kerahasiaan informasi akun Anda.</p>
                        </div>
                        <div class="ml-auto">
                        <a href="/" class="btn btn-primary">Beranda</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // close alerts
        $(".alert").alert();
    </script>
</body>
</html>