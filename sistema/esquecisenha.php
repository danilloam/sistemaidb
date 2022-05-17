<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
<link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">

<link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">

<link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">

<link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">

<link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">

<link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">

<link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">

<link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">

<link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">

<link rel="icon" type="image/png" sizes="192x192"  href="android-icon-192x192.png">

<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">

<link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">

<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />

  <title>SGE - Igreja de Deus no Brasil</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">
    
       <!--start content-->
       <main class="authentication-content">
        <div class="container-fluid">
          <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 d-flex align-items-center justify-content-center border-end">
                  <img src="assets/images/error/forgot-password-frent-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title">Esqueceu a Senha?</h5>
                    <p class="card-text mb-5">Digite seu e-mail cadastrado para redefinir a senha</p>
                    <form class="form-body" action="recuperar-senha.php" method="post">
                        <div class="row g-3">
                          <div class="col-12">
                            <label for="inputEmailid" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg radius-30" id="inputEmailid" placeholder="Email">
                          </div>
                          <div class="col-12">
                            <div class="d-grid gap-3">
                              <button type="submit" class="btn btn-lg btn-primary radius-30">Enviar</button>
							                <a href="login.php" class="btn btn-lg btn-light radius-30">Voltar para tela de Login</a>
                            </div>
                          </div>
                        </div>
                    </form>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </main>
        
       <!--end page main-->

  </div>
  <!--end wrapper-->


  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/pace.min.js"></script>


</body>

</html>