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
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 577 Liberty Market

https://templatemo.com/tm-577-liberty-market

-->
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


  <div class="item-details-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>View Details <em>For Item</em> Here.</h2>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="left-image">
          <img src="book/{{$data->book_img}}" alt="" style="border-radius: 20px; width: 300px; height: auto;">
          
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <h4>{{$data->title}}</h4>
          <span class="author">
            <img src="auther/{{$data->auther_img}}" alt="" style="max-width: 50px; border-radius: 50%;">
            <h6>{{$data->auther_name}}</h6>
          </span>
          <p>{{$data->description}}</p>
          <div class="row">
            <div class="col-3">
              <span class="bid">
                Price by day<br><strong>{{$data->price}}</strong><br>
              </span>
            </div>
            
            <div class="col-5">
              <span class="ends">
                Total Quantity<br><strong>{{$data->quantity}}</strong><br>
              </span>
            </div>
          </div>
          
        </div>
        
  </div>
    </div>
      </div>

      <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          
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