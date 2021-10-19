<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Pet's Life - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">

    @laravelPWA
  </head>

  <body>

  <style>
      .brand-text {
          color: black;
          font-weight: bold;
          font-size: 1.3rem;
          padding: 0;
          margin: 0;
      }
  </style>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="/"><div class="brand-text">Pet's Life</div></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact Us </span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About Us</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link active" href="/login">Login <span class="sr-only">(current)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Content -->
    <!-- About Page Starts Here -->
    <div class="contact-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Login to your account</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <div class="container px-md-0 ">
                @if($errors->any())
                    {!! implode(',', $errors->all('<div class="alert alert-danger" role="alert">:message</div>')) !!}
                @endif
                <form id="contact" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                        <fieldset>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter your username" required="">
                        </fieldset>
                        </div>
                        <div class="col-md-6">
                        <fieldset>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password" required="" autocomplete="current-password">
                        </fieldset>
                        </div>
                        <div class="col-md-12">
                        <fieldset>
                            <button type="submit" id="form-submit" class="button">{{ __('Log in') }}</button>
                        </fieldset>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About Page Ends Here -->

   <!-- Sub Footer Starts Here -->
   <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>Copyright &copy; {{ date('Y') }} PET'S LIFE VETERINARY CLINIC</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </body>

</html>
