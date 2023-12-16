<?php 

$CPU = "";
$RAM = "";
$SSD = "";

if (isset($_POST['Calculate'])) {
  $CPU = $_POST['CPU'];
  $RAM = $_POST['RAM'];
  $SSD = $_POST['SSD'];
}

$CPU = (int) $CPU;
$RAM = (int) $RAM;
$SSD = (int) $SSD;


$totalPrice = $CPU * 5 + $RAM * 5 + $SSD * 10;

//Images Name
$images = array(
  "Google" => "logos/Google.png",
  "Meta" => "logos/Meta.png",
  "X" => "logos/X2.png",
);

$messages = array(
  "Google" => "The best cloud service provider to host our Indian Call Centers.",
  "Meta" => "I hope they don't steal my data.",
  "X" => "Freedom of speech is a human right.",
);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css"<?php echo time(); ?>" />
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  </head>
  <body>
    <main class="container">
      <div class="container-margin">
        <head>
          <h1>OmniCloud</h1>
          <div class="head-description">
            <p>
              Lorem ipsum dolor sit amet consectetur. Morbi sed maecenas dui in
              nullam sed neque. Ornare porttitor nunc elementum cum quis tellus
              metus. Et egestas a turpis sed platea.
            </p>
            <div class="head-btn-container">
              <a href="dashboared.php" class="l"
                >Go to Dashboared</a
              >
              <div class="provisioning-container">
                <a href="provisioning.php" class="btn-get-started"
                  >Get Started</a
                >
              </div>
            </div>
          </div>
        </head>
        <section class="our-customers">
          <div class="our-customers-container">
          <h2>Our Customers</h2>
          <div class="customer-figures">
            
              <?php 
                //Loop through the data and make a reusable component
                foreach($images as $key => $value) {
                  echo "<figure class='customer-figure'>";
                  echo "<img src='" . $value . "' alt='" . $key . " logo' />";
                  echo "<p>" . $messages[$key] . "</p>";
                  echo "</figure>";
                }
              ?>
    
          </div>
          </div>
         
        </section>
        <section class="our-services">
          <h2>Our Services</h2>
          <div class="our-services-container">
            <div class="our-services-description">
              <p>
                Lorem ipsum dolor sit amet consectetur. Proin at id lectus
                sagittis gravida tellus. Nulla egestas a amet lacus. Nec
                dignissim eget non quis ac aliquam orci. Aliquam amet
                pellentesque tempor ac mauris.
              </p>
            </div>
            <div class="our-services-IaaS-container">
            <p class="our-services-IaaS">IaaS</p>
            </div>
            
          </div>
        </section>
        <section class="our-prices">
          <h2>Our Prices</h2>
          <div class="our-prices-container">
            <div class="our-prices-description">
              <p>
                Lorem ipsum dolor sit amet consectetur. Egestas pulvinar varius
                dui a quis proin ipsum consequat eu. Ut sed quis faucibus urna
                massa laoreet nisl laoreet. Maecenas eget faucibus eget ac. In
                aliquet placerat.
              </p>
            </div>
            <div class="our-prices-calculater">
              <form method="post" action="" class="our-prices-text-fields">
                <!--First Text Field-->
                <div class="our-prices-text-field">
                  <div class="our-prices-text-field-container">
                    <label>CPU</label>
                    <input type="number" name="CPU" placeholder="1"/>
                  </div>
                  <p>5 CHF / Core</p>
                </div>
                <!--Second Text Field-->
                <div class="our-prices-text-field">
                  <div class="our-prices-text-field-container">
                    <label>RAM</label>
                    <input type="number" name="RAM" placeholder="1" min=1 max=4/>
                  </div>
                  <p>5 CHF / Core</p>
                </div>
                <!--Third Text Field-->
                <div class="our-prices-text-field">
                  <div class="our-prices-text-field-container">
                    <label>SSD</label>
                    <input type="number" name="SSD" placeholder="1" />
                  </div>
                  <p>5 CHF / Core</p>
                </div>
                <!--Submit Button-->
                <div>
                  <input class="our-prices-submit-button" type="submit" name="Calculate">
                  </input>
                </div>
              </form>
              <div class="our-prices-charge">
                <p>
                <?php echo $totalPrice ?>
                .-
              </p>
              </div>
            </div>
          </div>
        </section>
        <div class="cta-button-container">
          <a href="provisioning.php" class="cta-button">Get Started</a>
        </div>
      </div>
    </main>
  </body>
</html>
