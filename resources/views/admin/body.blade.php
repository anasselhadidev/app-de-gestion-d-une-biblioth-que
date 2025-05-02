<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Dashboard</h2>
    </div>
  </div>
  <section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
      <!-- Première ligne avec Total Users et Total Books -->
      <div class="row justify-content-center d-flex">
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-user-1"></i></div><strong>Total Users</strong>
              </div>
              <div class="number dashtext-1">{{$user}}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-contract"></i></div><strong>Total Books</strong>
              </div>
              <div class="number dashtext-2">{{$book}}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Deuxième ligne avec Borrowed Books et Returned Books -->
      <div class="row justify-content-center d-flex">
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Borrowed Books</strong>
              </div>
              <div class="number dashtext-3">{{$borrow}}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Returned Books</strong>
              </div>
              <div class="number dashtext-4">{{$returned}}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Troisième ligne avec Total Categories et Total Reservations -->
      <div class="row justify-content-center d-flex">
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-list"></i></div><strong>Total Categories</strong>
              </div>
              <div class="number dashtext-4">{{$categories}}</div> <!-- Utilisez dashtext-4 pour correspondre à Returned Books -->
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon"><i class="icon-calendar"></i></div><strong>Total Reservations</strong>
              </div>
              <div class="number dashtext-2">{{$reservations}}</div> <!-- Utilisez dashtext-2 pour correspondre à Total Books -->
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
