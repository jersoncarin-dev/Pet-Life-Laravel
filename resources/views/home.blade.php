<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Pet's Life - Home</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
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
              <a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact Us</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endguest
            @auth
              <li class="nav-item">
                <a class="nav-link" href="/appointment">View Appointments</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="">Login as {{ strstr(auth()->user()->name,' ',true) }}</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/logout">Logout</a>
              </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>All Items</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="featured container no-gutter">

        <div class="row posts">
            @forelse($products as $product)
              <div id="1" class="item new col-md-4">
                <a href="/product/{{ $product->id }}">
                  <div class="featured-item">
                    <img src="/storage/{{ str_replace('\\','/',json_decode($product->thumbnail)[0]->download_link) }}" alt="">
                    <h4>{{ $product->name }}</h4>
                    <h6>Available : {{ $product->is_available ? 'Yes' : 'Out of Stock'}}</h6>
                  </div>
                </a>
              </div>
            @empty
              <div class=" col-md-12">
                <h1>No Product Found</h1>
              </div>
            @endforelse
        </div>
    </div>

    {{ $products->links() }}

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @auth
      <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
        import { getMessaging, getToken, onMessage } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-messaging.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        const firebaseConfig = {
          apiKey: "AIzaSyAJoY98qj387s64h4_dVVmAk0aHsGPMzuA",
          authDomain: "pet-life-ab8d3.firebaseapp.com",
          projectId: "pet-life-ab8d3",
          storageBucket: "pet-life-ab8d3.appspot.com",
          messagingSenderId: "122430054317",
          appId: "1:122430054317:web:1cbc0a507c4536b7054b24"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const messaging = getMessaging(app);

        getToken(messaging).then((currentToken) => {
          if (currentToken) {

            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              }
            });

            $.ajax({
                url: '{{ route("save-token") }}',
                type: 'POST',
                data: {
                    device_token: currentToken
                },
                dataType: 'JSON',
                success: function (response) {
                    console.log(response.message)
                },
                error: function (err) {
                    console.log('Token error: '+ err);
                },
            });

          } else {
            // Show permission request UI
            console.log('No registration token available. Request permission to generate one.');
            // ...
          }
        }).catch((err) => {
          console.log('An error occurred while retrieving token. ', err);
          // ...
        });

        onMessage(messaging,(payload) => {
          const msg = JSON.parse(payload.notification.body)

          Swal.fire({
            title: payload.notification.title,
            text: msg.message,
            icon: msg.status,
            confirmButtonText: 'OK'
          });
        });

      </script>
      
    @endauth
  </body>

</html>