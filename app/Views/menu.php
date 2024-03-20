<body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"></span>
            </a>
          </li>
          <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
              <span class="fe fe-bell fe-16"></span>
              <span class="dot dot-md bg-success"></span>
            </a>
          </li>
          </li>
          <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="<?= base_url('home/profile')?>" data-toggle="modal" data-target=".modal-notif">
              <span class="fe fe-user fe-16"></span>
            
            </a>
          </li>
         
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
     <div class="w-100 mb-4 d-flex">
    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html" style="display: flex; flex-direction: column; align-items: center;">
        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve" style="margin-bottom: 10px;">
            <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15" />
            </g>
        </svg>
        <span style="font-weight:bold;">Schedule Maker</span>
         <p class="text-muted nav-heading mt-4 mb-1">
  
          </p>
    </a>
    
</div>


          

              <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="<?= base_url('home/dashboard')?>">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
              </a>
            </li>
          </ul>
           
          
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Components</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            
            
            <li class="nav-item dropdown">
              <a href="<?= base_url('home/guru')?>" data-toggle="collapse" aria-expanded="false" class=" nav-link">
                <i class="fe fe-grid fe-16"></i>

                <span class="ml-3 item-text">Guru</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="<?= base_url('home/jadwal')?>" data-toggle="collapse" aria-expanded="false" class=" nav-link">
                <i class="fe fe-grid fe-16"></i>
                
                <span class="ml-3 item-text">Jadwal</span>
              </a>
            </li>
         
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->