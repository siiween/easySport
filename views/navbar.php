      <nav
        class="navbar navbar-expand-lg navbar-dark"
        style="background-color: #000;font-family: 'Quantico', sans-serif;"
      >
        <div class="container">
          <a class="navbar-brand" href="/easySport/views/"
            ><img
              src="assets/images/logo.png"
              alt="EasySport"
              style="height: 50px"
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            <!-- login required -->
              <li>
                <a class="nav-link" href="/easySport/controllers/bookings_controller.php">Reservas</a>
              </li>

              <li>
                <a class="nav-link" href="/easySport/controllers/suscriptions_controller.php">Suscripciones</a>
              </li>



              <li>
                <a class="nav-link" href="/easySport/controllers/facilities_controller.php">Instalaciones</a>
              </li>

              <li>
                <a class="nav-link" href="/easySport/controllers/classes_controller.php">Clases</a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto">
              <li>
                <a class="nav-link" href="/easySport/controllers/login_controller.php">Login</a>
              </li>
              <li>
                <a class="nav-link" href="/easySport/controllers/profile_controller.php">Profile</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>