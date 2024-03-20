<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content goes here -->
</head>

<body class="light">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="<?= base_url('home/aksi_login')?>" method="POST">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                    <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                        <g>
                            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                        </g>
                    </svg>
                </a>
                <h1 class="h6 mb-3">Sign in</h1>
                <div class="form-group">
                    <input type="text" id="inputEmail" name="username" class="form-control form-control-lg" placeholder="Username" required="" autofocus="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" required="">
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Stay logged in
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
                <p class="mt-5 mb-3 text-muted">© 2020</p>
            </form>
        </div>
    </div>
    <script src="<?= base_url('js/jquery.min.js')?>"></script>
    <script src="<?= base_url('js/popper.min.js')?>"></script>
    <script src="<?= base_url('js/moment.min.js')?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('js/simplebar.min.js')?>"></script>
    <script src="<?= base_url('js/daterangepicker.js')?>"></script>
    <script src="<?= base_url('js/jquery.stickOnScroll.js')?>"></script>
    <script src="<?= base_url('js/tinycolor-min.js')?>"></script>
    <script src="<?= base_url('js/config.js')?>"></script>
    <script src="<?= base_url('js/apps.js')?>"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag()
        {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>
