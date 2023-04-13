<?php
require("db.php");
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <?php require("title.php") ?>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="body1">
  <div class="hero_area">
    <!-- header section strats -->
    <?php require("header.php") ?>
    <!-- end header section -->
    <!-- slider section -->

    <section class="slider_section">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                        Toys for <br>
                        All
                      </h1>
                      <p>
                        Welcome to our doll shop! We are a team of passionate doll enthusiasts dedicated to providing you with high-quality dolls that bring joy and comfort to your life.

                        Our shop offers a wide variety of dolls, including collectible dolls, play dolls, baby dolls, and many more. We source our dolls from trusted manufacturers around the world, ensuring that each doll is made with the utmost care and attention to detail.

                        At our shop, we believe that dolls are more than just toys. They are companions that bring a sense of comfort and security to both children and adults alike. That's why we take great care in curating our collection of dolls, selecting only those that we know will bring a smile to your face.

                      </p>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img class="carousel-img" src="pics/Free Vector _ Font design for word toy shop with many toys Background Removed.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="carousel-item ">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                        More of Our <br>
                        Toy Shop
                      </h1>
                      <p>Our team is made up of doll experts who are passionate about what they do. We love nothing more than helping our customers find the perfect doll to add to their collection or to give as a gift. Whether you are looking for a specific type of doll or need guidance on which doll to choose, we are always here to help.

                        We are committed to providing our customers with exceptional service and quality products. When you shop with us, you can expect to receive personalized attention and care from start to finish. We believe that every customer deserves the best, and we strive to exceed your expectations every time.

                        Thank you for choosing our doll shop. We look forward to serving you and helping you find the perfect doll for your needs</p>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img class="carousel-img" src="pics/Premium Vector _ Logo design for kids toys Background Removed.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel_btn-box">
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
              <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
  <?php require("shop_items.php") ?>


  <!-- end shop section -->

  <!-- saving section -->

  <section class="saving_section ">
    <div class="box">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="img-box">
              <img src="pics/Ted_landingpage.jpeg" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  Best Savings on <br>
                  new arrivals
                </h2>
              </div>
              <p>
                At toyhouse, we're excited to announce the arrival of new products to our collection! We're constantly adding new items to our website to ensure that you have access to the latest trends and styles.
              </p>
              <div class="btn-box">
                <a href="#" class="btn2">
                  See More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end saving section -->

  <!-- why section -->
  <?php
  require("about.php")
  ?>
  <?php require("contact.php") ?>
  <?php require("testimonial.php") ?>
  <?php require("footer.php") ?>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>