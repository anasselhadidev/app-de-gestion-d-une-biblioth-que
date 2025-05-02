<!DOCTYPE html>
<html lang="en">

<head>
  <base href="/public">
  <meta charset="utf-8">
  <meta name="author" content="templatemo">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <title>Liberty Template - NFT Item Detail Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-liberty-market.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  <!-- Custom CSS -->
  <style>
    body {
      background-color: #000; /* Arrière-plan noir */
      color: #fff; /* Couleur du texte en blanc pour la lisibilité */
    }
    .section-padding {
      background-color: #000; /* Arrière-plan noir de la section */
    }
    .container {
      background-color: #333; /* Fond de conteneur en gris foncé */
      padding: 20px;
      border-radius: 10px;
      margin-top: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
      color: #fff; /* Couleur du texte en blanc pour la lisibilité */
    }
    input[type="date"], input[type="text"], input[type="email"] {
      width: 100%;
      background-color: #000; /* Fond des champs de formulaire en noir */
      color: #fff; /* Couleur du texte en blanc */
      border: 1px solid #444; /* Bordure des champs de formulaire en gris plus clair */
      padding: 10px;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004085;
    }
    .alert {
      background-color: #333; /* Fond de l'alerte en gris foncé */
      color: #fff; /* Couleur du texte de l'alerte en blanc */
      border: 1px solid #444; /* Bordure de l'alerte en gris plus clair */
    }
  </style>
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="" class="logo">
              <img src="assets/images/logo.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="/home">Home</a></li>
              <li><a href="/home">Explore</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
<!-- Reservation Section -->
<section class="section-padding">
  <div class="container">
    <h2 class="section-title">Book Reservation</h2>
    <form id="reservationForm" action="{{ route('reservation.submit', $book->id) }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="book_title">Book Title:</label>
        <input type="text" id="book_title" name="book_title" class="form-control" value="{{ $book->title }}" readonly style="background-color: #000;">
      </div>
      <div class="form-group">
        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly style="background-color: #000;">
      </div>
      <div class="form-group">
        <label for="reserve_date">Reservation Date:</label>
        <input type="date" id="reserve_date" name="reserve_date" class="form-control" min="{{ $nextReturnDate }}" required>
        @if ($errors->has('reserve_date'))
        <span class="text-danger">{{ $errors->first('reserve_date') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="return_date">Expected Return Date:</label>
        <input type="date" id="return_date" name="return_date" class="form-control" required>
        @if ($errors->has('return_date'))
        <span class="text-danger">{{ $errors->first('return_date') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Reserve</button>
    </form>
  </div>
</section>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script>
  document.getElementById('reservationForm').addEventListener('submit', function(event) {
    var reserveDate = new Date(document.getElementById('reserve_date').value);
    var returnDate = new Date(document.getElementById('return_date').value);

    if (reserveDate >= returnDate) {
      alert('The reservation date must be before the expected return date');
      event.preventDefault();
    }
  });
</script>
</body>

</html>


  <!-- Footer Section -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <p>
                    Contact the administrator: <br>
                    Email: <a href="mailto:anasselhadi9@gmail.com" style="color: black;">anasselhadi9@gmail.com</a> <br>
                    Phone: <a href="tel:+33615479516" style="color: black;">0615479516</a>
                </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>
