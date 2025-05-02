<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner">
    <div class="container">
      <div class="row">
      @if(session('success'))
    <div class="alert alert-success">
    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
        {{ session('success') }}
    </div>
@endif


      @if(session()->has('message'))
         <div class="alert alert-success">
          <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
         {{session()->get('message')}}
         <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
         </div>
         @endif
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
            <h6>Book is Knowledge</h6>
            <h2>Knowledge is Power</h2>
            <p>Open a book, unlock your mind. Dive into stories, ignite your imagination. Discover worlds within pages, endless possibilities await</p>
            <div class="buttons">
              
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="">
            <div class="item">
              <img src="assets/images/banner.png" alt="">
            </div>
            <div class="item">
              <img src="assets/images/banner2.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->
  