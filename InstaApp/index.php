<?php
include "connect.php";

session_start();

// cek apakah yang mengakses halaman ini sudah login dan levelnya admin
if (!isset($_SESSION["login"])) {
  header("location:login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="css/index,css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>InstaApp</title>
</head>

<body>
  <div class="navbar-fixed">
    <nav class="light-blue lighten-5">
      <div class="nav-wrapper">
        <div class="container">
          <a href="#!" class="brand-logo grey-text text-darken-4">InstaApp</a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a class="grey-text text-darken-4" href="">Home</a></li>
            <li><a class="grey-text text-darken-4" href="">Message</a></li>
            <li><a class="grey-text text-darken-4" href="">Notif</a></li>
            <li><a class="grey-text text-darken-4" href="">
                <?= $_SESSION['nama']; ?>
              </a></li>
            <li><a class="grey-text text-darken-4" href="logout.php">Logout</li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- sidenav -->
  <ul class="sidenav" id="mobile-nav">
    <li><a href="">Home</a></li>
    <li><a href="">Message</a></li>
    <li><a href="">Notif</a></li>
    <li><a href="">Profile</a></li>
  </ul>

  <div class="row">
    <form enctype="multipart/form-data" method="post" class="col s12" action="aksi.php">
      <div class="row">
        <div class="container blue-grey lighten-5">
          <div class="input-field col s12">
            <textarea id="textarea1" name="caption" class="materialize-textarea"></textarea>
            <label for="textarea1">Caption</label>
            <div class="btn">
              <input type="file" name="file" multiple>
            </div>
          </div>
          <button class="btn" name="upload">Post</button>
        </div>
      </div>
  </div>
  </form>
  </div>
  <div class="container">
    <table>
      <?php
      include "connect.php";

      $tampil = mysqli_query($koneksi, "SELECT * FROM upload");
      while ($data = mysqli_fetch_array($tampil)) {
        ?>
        <tr>
          <td>
            <img src="<?= "image/" . $data['foto'] ?>">
          </td>
          <td>
            <?= $data['caption']; ?>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>


  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    const sidenav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sidenav);
  </script>
</body>

</html>