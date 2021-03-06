<!DOCTYPE html>

<html>
<head>

<title>BROCKHAMPTON</title>

<link rel="stylesheet" type="text/css" href="https://meyerweb.com/eric/tools/css/reset/reset.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body id="top_page">

  <!-- Nav bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="Index.html"> BROCKHAMPTON</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarColor01" >
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
        <li class="nav-item"><a class="nav-link" href="members.html">Members</a></li>
        <li class="nav-item"><a class="nav-link" href="albums.html">Albums</a></li></li>
        <li class="nav-item"><a class="nav-link" href="tours.html">Tours</a></li>
        <li class="nav-item active"><a class="nav-link" href="catalog.html">Catalog<span class="sr-only">(current)</span></a></li>
      </ul>
    </div>
  </nav>

  <!-- Level 1 -->
  <div class="container-fluid">
  <div class="row">

  <!-- Filter forms -->
    <div class="col-lg-2" style="background-color: #e6e6e6;
    padding: 1.5em;">
      <h5>Filters</h5>
      <fieldset>

      <!-- Location Availability -->
      <form action="http://www.randyconnolly.com/tests/process.php"
      target="_blank" method="get">

      <label class="col-form-label"><h6>Locations Available</h6></label>

      <div class="form-group">
      <div class="custom-control custom-radio">
        <input type="radio" id="customRadio1" name="location" class="custom-control-input" value="exclusive" checked="">
        <label class="custom-control-label" for="customRadio1">Online Exclusive</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" id="customRadio2" name="location" class="custom-control-input" value="in-store">
        <label class="custom-control-label" for="customRadio2">Available in Stores</label>
      </div>
      </div>

      <!-- Search bar -->
      <div class="form-group">
        <label class="col-form-label"><h6>Search for items</h6></label>
        <input type="text" class="form-control" placeholder="ex: BH Hoodie"
        id="inputDefault" name="search_item" value="">
      </div>
      <!-- Category -->
      <div class="form-group">
        <label class="col-form-label" ><h6>Category</h6></label>
        <select class="custom-select" name="category">
          <option selected="">Any</option>
          <optgroup label="APPAREL">
          <option value="hoodies">Hoodies</option>
          <option value="sweaters">Sweaters</option>
          <option value="t-shirts">T-Shirts</option>
          </optgroup>
          <optgroup label="OTHER">
          <option value="bags">Bags</option>
          <option value="mugs">Mugs</option>
          </optgroup>
        </select>
      </div>
      <!-- Sizes -->
      <div class="form-group">
        <label class="col-form-label" ><h6>Sizes</h6></label>
        <select class="custom-select" name="sizes">
          <option selected="">Any</option>
          <option value="xs">XS - Extra Small</option>
          <option value="s">S - Small</option>
          <option value="m">M - Medium</option>
          <option value="l">L - Large</option>
          <option value="xl">XL - Extra Large</option>
        </select>
      </div>

      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Submit</button>
      </form>
      </fieldset>

    </div>
  <!-- Merchandise -->
    <div class="col-lg-10" style="padding: 1.5em; padding-left:2.5em;">
      <h1 style="padding: 0.5em; padding-bottom: 1em;" >Merchandise</h1>

  <!-- Row 1 -->
      <?php

      function print_cards($result, $counter){
        while ($row = $result->fetch()) {
          if ($counter == 0){
            echo '<div class="row">';
          }

          echo '<div class="col-lg-3">';
          echo '<div class="card mb-3">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $row['name'] . '</h5>';
          echo '</div>';
          echo '<img style=" width: 100%; display: block;" src="'.
               $row['path'] . '" alt="Card image">';
          echo '<ul class="list-group list-group-flush">';
          echo '<li class="list-group-item"></li>';
          echo '<li class="list-group-item">Price:'. $row['price'] . '</li>';
          echo '<li class="list-group-item">Size:'. $row['size'] . '</li>'
          echo '</ul>';
          echo '</div>';
          echo '</div>';

          if ($counter == 3){
            echo '</div>';
            $counter = 0;
          }

          ;
        }
      }

      try {
        $connString = "mysql:host=localhost;dbname=bh_catalog";
        $user = "testuser";
        $pass = "mypassword";

        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $tables = array('hoodies', 'sweaters', 'shirts', 'posters', 'bags', 'mugs')
        $counter = 0;

        for($i=0; $i<count($tables); $i++){
          $sql = 'SELECT * FROM ' . $tables[$i];
          $result = $pdo->query($sql);

          print_cards($result, $counter);
        }

        $sql = '';


        // $pdo = null;
      }
      catch (PDOException $e){
        die( $e->getMessage());
      }

      ?>

      <!-- <div class="row" style> -->
        <!-- Row 1 item 1 -->
        <!-- <div class="col-lg-3"> -->
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Iridescence Hoodie (Black)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/hoodies/hoodie.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: XS, S, L, XL</li>
            </ul>
          </div>
        </div>

        <!-- Row 1 item 2 -->
        <!-- <div class="col-lg-3"> -->
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Iridescence Hoodie (Blue)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/hoodies/hoodie2.1.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: XS, M, L</li>
            </ul>
          </div>
        </div>

        <!-- Row 1 item 3 -->
        <!-- <div class="col-lg-3"> -->
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Saturation Hoodie (White)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/hoodies/hoodie3.png" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: XS, S, M, XL</li>
            </ul>
          </div>
        </div>

        <!-- Row 1 item 4 -->
        <!-- <div class="col-lg-3"> -->
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Gold Sweater (Black)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/sweaters/sweater.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: XS, M, L, XL</li>
            </ul>
          </div>
        </div>

      <!-- </div> -->
  <!-- Row 2 -->
      <!-- <div class="row"> -->
        <div class="col-lg-3">
          <!-- Row 2 item 1 -->
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Gold Sweater (White)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/sweaters/sweater2.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: S, M, L</li>
            </ul>
          </div>
        </div>
        <!-- Row 2 item 2 -->
        <div class="col-lg-3">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Ginger Sweater (Blue)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/sweaters/sweater3.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: S, M, L</li>
            </ul>
          </div>
        </div>

        <!-- Row 2 item 3 -->
        <div class="col-lg-3">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Brockhampton Shirt (Black)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/shirts/shirt.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: XS, S, M, L, XL</li>
            </ul>
          </div>
        </div>

        <!-- Row 2 item 4 -->
        <div class="col-lg-3">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Ginger Shirt (White)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/shirts/shirt2.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: XS, S, M, L, XL</li>
            </ul>
          </div>
        </div>

      </div>
  <!-- Row 3 -->
      <!-- <div class="row"> -->
        <div class="col-lg-3">
          <!-- Row 3 item 1 -->
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Ginger Shirt (Blue)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/shirts/shirt3.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: XS, S, M, L, XL</li>
            </ul>
          </div>
        </div>
        <!-- Row 3 item 2 -->
        <div class="col-lg-3">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Saturation III Poster</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/posters/poster4.1.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: None</li>
            </ul>
          </div>
        </div>

        <!-- Row 3 item 3 -->
        <div class="col-lg-3">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Ginger Poster (Exclusive)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/posters/poster2.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: None</li>
            </ul>
          </div>
        </div>

        <!-- Row 3 item 4 -->
        <div class="col-lg-3">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">Ginger Poster (Exclusive)</h5>
            </div>
            <img style=" width: 100%; display: block;" src="img/merch/posters/poster3.jpg" alt="Card image">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item">Price: 24 USD</li>
              <li class="list-group-item">Size: None</li>
            </ul>
          </div>
        </div>

      </div>

      <!-- <div class="row"> -->

        <!-- Back to Top -->
        <button type="button" class="btn btn_backtop btn-secondary">
        <a href="#top_page">back to top</a>
        </button>

        <!-- Footer -->
        <footer>
            <p>
                <em>
                    &copy; Copyright
                    <script>
                        var CurrentYear = new Date().getFullYear()
                        document.write(CurrentYear)
                    </script>, BROCKHAMPTON <br>
                    Credits to Michaella Magtibay
                </em>
            </p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://twitter.com/brckhmptn">Twitter</a></li>
                <li class="breadcrumb-item"><a href="http://instagram.com/brckhmptn">Instagram</a></li>
                <li class="breadcrumb-item"><a href="http://youtube.com/BROCKHAMPTON">Youtube</a></li>
            </ol>
        </footer>

      </div>
    </div>

  </div>
  </div>


</body>

</html>
