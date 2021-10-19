<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Pet's Life - Contact Us</title>

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
              <a class="nav-link active" href="/contact">Contact Us <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About Us</a>
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
    <!-- About Page Starts Here -->
    <div class="contact-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Contact Us</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div id="map">
            		<!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3852.8978433041116!2d120.70853701530525!3d15.053765669844957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396f7586679e9a1%3A0x826466ff0b733425!2sLagundi!5e0!3m2!1sen!2sph!4v1634547835900!5m2!1sen!2sph" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <div class="container">
                <form id="contact" action="mailto:contact@testform.com" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <fieldset>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Your email..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">Send Message</button>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <div class="share">
                        <h6>You can also keep in touch on: <span><a href="https://web.facebook.com/Pets-Life-Pets-Shop-101654775413929"><i class="fa fa-facebook"></i></a></span></h6>
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
