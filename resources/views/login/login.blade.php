<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Satuan Tugas Pencegahan dan Penanganan Kekerasan Seksual</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ ('assets/img/favicon.png') }}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body style="background-image: url(assets/img/background-stmik.png); background-size: cover; background-position: center;">
    <form action="{{ route('post.login') }}" method="post">
        {{ csrf_field() }}
        <div class="form" style="text-align:center; display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100vh;">
            <div>
                <img src="assets/img/icon-login.png" alt="Login Icon" style="width:150px; height:150px;">
            </div>
            <br>
            <div class="col-md-3" style="position: relative;">
                <input type="text" name="id_login" class="form-control" style="border-color: yellow; border-radius: 20px; padding-left: 40px;" placeholder="Username">
                <img src="assets/img/user.png" alt="Icon" style="position: absolute; top: 50%; left: 15px; transform: translateY(-50%); width: 20px;">
            </div>
            <br>
            <div class="col-md-3" style="position: relative;">
                <input type="password" name="password" id="password" class="form-control" style="border-color: yellow; border-radius: 20px; padding-left: 40px;" placeholder="Password">
                <img src="assets/img/key.png" alt="Icon" style="position: absolute; top: 50%; left: 15px; transform: translateY(-50%); width: 20px;">
                <i class="fa fa-eye" id="togglePassword" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer;"></i>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <button id="btnLogin" type="submit" style="border-radius:10px; background-color: yellow; color: red; border-color:white; padding: 10px 20px; font-size: 16px; font-weight:700">LOGIN</button>
            </div>
        </div>
    </form>
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
        window.location.href = "/dashboard";
    </script>
    @endif

    @if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
    @endif

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>