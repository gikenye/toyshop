<!DOCTYPE html>
<html lang="en">

<body>

  <header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.php">
        <span>
          Toy House
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link" value="home" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" value="shop" href="shop.php">
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" value="why" href="why.php">
              About Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" value="testimonials" href="testimonials.php">
              Testimonial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" value="contactus" href="contactus.php">Contact Us</a>
          </li>
        </ul>

        <span style="color:red;margin-left:auto">
          <?php
          if (isset($_SESSION['name'])) {
            echo 'Welcome ', $_SESSION["name"];
          } ?>
        </span>
        <div class="user_option">
          <?php
          if (!isset($_SESSION['user_id'])) {
            echo
            '<a class="logbutton" href="login.php">
            <span>
              Login
            </span>
          </a>';
          } else {
            echo '<a class="logbutton" href="logout.php">
            <span>
              Logout
            </span>
          </a>';
          }
          ?>
        </div>
      </div>
    </nav>
  </header>

  <script>
    let links = document.querySelectorAll("li")
    const page = window.location.href.split(".php")[0].split("/")[3]
    console.log(links);
    links.forEach(link => {
      if (link.value == page) {
        link.classList.add("active")
      } else {
        link.classList.remove("active")
      }
    })
  </script>
</body>

</html>