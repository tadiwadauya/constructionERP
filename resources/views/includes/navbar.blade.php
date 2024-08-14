
<div class="container-fluid bg-light p-0">
      <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
          <div
            class="h-100 d-inline-flex align-items-center border-start border-end px-3"
          >
            <small class="fa fa-phone-alt me-2"></small>
            <small>+263 4 790290 </small>
          </div>
          <div class="h-100 d-inline-flex align-items-center border-end px-3">
            <small class="far fa-envelope-open me-2"></small>
            <small>helensvalefire@gmail.com</small>
          </div>
         
        </div>
        <div class="col-lg-5 px-5 text-end">
          <div class="h-100 d-inline-flex align-items-center">
            <a class="btn btn-square border-end border-start" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square border-end" href=""><i class="fab fa-twitter"></i></a>
            <a class="btn btn-square border-end" href="" ><i class="fab fa-linkedin-in"></i></a>
            <a class="btn btn-square border-end" href=""><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
  <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
    <img src="{{asset('design/frontend/img/logo.png')}}" alt="hcl">
  </a>
  <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-3 py-lg-0">
      <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
      <a href="{{ url('/aboutus') }}" class="nav-item nav-link {{ Request::is('aboutus') ? 'active' : '' }}">About Us</a>
      <a href="{{ url('/ourservices') }}" class="nav-item nav-link {{ Request::is('ourservices') ? 'active' : '' }}">Our Services</a>
      <a href="{{ url('/works') }}" class="nav-item nav-link {{ Request::is('works') ? 'active' : '' }}">Our Works</a>
      <a href="#" class="nav-item nav-link {{ Request::is('ourgallery') ? 'active' : '' }}">Gallery</a>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Group Of Companies</a>
        <div class="dropdown-menu bg-light m-0">
          <a href="feature.html" class="dropdown-item">Helensvale Cleaning</a>
          <a href="appointment.html" class="dropdown-item">Helensvale Fire Technologoes</a>
        </div>
      </div>
      <a href="{{ url('/contactus') }}" class="nav-item nav-link {{ Request::is('contactus') ? 'active' : '' }}">Contact Us</a>
    </div>
  </div>
</nav>