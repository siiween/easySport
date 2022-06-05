<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="assets/styles/profile.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Quantico&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="image/x-icon" href="assets/images/logo.png" />

    <title>Profile</title>
  </head>
  <body>
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"
    ></script>

    <div class="container-fluid p-0">
      <?php include('navbar.php') ?>

      <div class="row m-0">
        <div class="col-md-1 navbar-dark px-3 text-center navLeft py-5">
          <ul
            class="navbar-nav navbar-center mx-auto"
            style="background-color: #000; font-family: 'Quantico', sans-serif"
          >
            <li>
              <a class="nav-link active" href="#">Editar perfil</a>
            </li>
            <li>
              <a class="nav-link" href="#">Privacidad</a>
            </li>

            <li>
              <a class="nav-link" href="#">Pagos</a>
            </li>

            <li>
              <a class="nav-link">Historial</a>
            </li>

            <li>
              <a class="nav-link">Idioma</a>
            </li>

            <li>
              <a class="nav-link">Ayuda</a>
            </li>

            <li>
              <a class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>