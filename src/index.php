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
  "Google" => "OmniCloud hebt mit maßgeschneiderten Cloud-Lösungen unsere Effizienz auf ein neues Level.",
  "Meta" => "OmniCloud bietet uns die Flexibilität und Skalierbarkeit, die für die digitale Welt entscheidend sind.",
  "X" => "OmniCloud revolutioniert unsere Cloud-Strategie und trägt maßgeblich zu unserem Erfolg bei.",
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
              Egal ob grosses Unternehmen oder kleines Start-up, OmniCloud bietet hochmoderne Cloud-Lösungen an, 
              die vollständig an ihr Unternehmen angepasst werden können.
            </p>
            <div id="containerButton1">
            <a href="dashboared.php">
            <button class="learn-more">
              <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
              </span>
              <span class="button-text">Dashboard</span>
            </button>
            </a>
          </div>
          </div>
          <div id="containerButton1">
            <a href="provisioning.php">
            <button class="learn-more">
              <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
              </span>
              <span class="button-text">Start</span>
            </button>
            </a>
          </div>
          </div>
        </head>
        <section class="our-customers">
          <h2>Unsere Kunden</h2>
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
          <h2>Unsere Services</h2>
          <div class="our-services-container">
            <div class="our-services-description">
              <p>
              Entdecken Sie die Zukunft der IT-Infrastruktur mit unseren innovativen IaaS-Lösungen. 
              Wir präsentieren wir leistungsstarke, 
              flexible und skalierbare Infrastrukturdienste, 
              die Ihr Unternehmen auf die nächste Stufe heben.
              </p>
            </div>
            <div class="our-services-IaaS-container">
            <p class="our-services-IaaS">IaaS</p>
            </div>
            
          </div>
        </section>
        <section class="our-prices">
          <h2>Preise</h2>
          <div class="our-prices-container">
            <div class="our-prices-description">
              <p>
              Sichern Sie sich klare Preise und maximale Flexibilität.
              Gestalten Sie Ihre Ressourcen nach Bedarf und erleben Sie
              den einfachen Weg zu kosteneffizienter Innovation.
              </p>
            </div>
            <div class="our-prices-calculater">
              <form method="post" action="" class="our-prices-text-fields">
                <!--First Text Field-->
                <div class="our-prices-text-field">
                  <div class="our-prices-text-field-container">
                    <label>CPU</label>
                    <input type="number" name="CPU" placeholder="1" min=1 max=2/>
                  </div>
                  <p>5 CHF / Core</p>
                </div>
                <!--Second Text Field-->
                <div class="our-prices-text-field">
                  <div class="our-prices-text-field-container">
                    <label>RAM</label>
                    <input type="number" name="RAM" placeholder="1" min=1 max=2/>
                  </div>
                  <p>5 CHF / Core</p>
                </div>
                <!--Third Text Field-->
                <div class="our-prices-text-field">
                  <div class="our-prices-text-field-container">
                    <label>SSD</label>
                    <input type="number" name="SSD" placeholder="1" min=1 max=2 />
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
          <a href="provisioning.php" class="cta-button">Leg Los!</a>
        </div>
      </div>
    </main>
  </body>
</html>
