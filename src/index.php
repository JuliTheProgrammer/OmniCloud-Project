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
    <title>Cloud-Dienste | OmniCloud</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  </head>
  <body>
  <nav>
      <ul>
        <li><img src="logos/omnicloud_logo.png" alt="omnicloud" class="logo"></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="provisioning.php">Dienste</a></li>
        <li><a href="#kontakt">Kontakt</a></li>
        <li><a href="admin.php">Admin</a></li>
      </ul>
    </nav>
    <main class="container">
      <div class="container-margin">
        <head>
          <h1>OmniCloud</h1>
          <div class="head-description">
            <p>
            Egal ob grosses Unternehmen oder kleines Start-up, OmniCloud bietet hochmoderne Cloud-Lösungen an, 
              die vollständig an ihr Unternehmen angepasst werden können.
            </p>
            <a href="dashboared.php" class="button">Dashboard</a>
            <a href="provisioning.php" class="button">Start</a>
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
                  <select name="CPU" onchange="calculatePrice()">
                    <option value="5">1 Core - CHF 5.-</option>
                    <option value="10">2 Cores- CHF 10.-</option>
                    <option value="18">4 Cores - CHF 18.-</option>
                    <option value="30">8 Cores - CHF 30.-</option>
                    <option value="45">16 Cores - CHF 45.-</option>
                  </select>
                  </div>
                  <p>5 CHF / Core</p>
                </div>
                <!--Second Text Field-->
                <div class="our-prices-text-field">
                  <div class="our-prices-text-field-container">
                  <label>RAM</label>
                  <select name="RAM" onchange="calculatePrice()">
                    <option value="5">512 MB - 5 CHF.-</option>
                    <option value="10">1024 MB - CHF 10.-</option>
                    <option value="20">2048 MB - CHF 20.-</option>
                    <option value="40">4096 MB - CHF 40.-</option>
                    <option value="80">8192 MB - CHF 80.-</option>
                    <option value="160">16384 MB - CHF 160.-</option>
                    <option value="320">32768 MB - CHF 320.-</option>
                  </select>
                  </div>
                  <p>5 CHF / 512MB</p>
                </div>
                <!--Third Text Field-->
                <div class="our-prices-text-field">
                  <div class="our-prices-text-field-container">
                    <label>SSD</label>
                    <select name="SSD" onchange="calculatePrice()">
                      <option value="5">10 GB - CHF 5.-</option>
                      <option value="10">20 GB - CHF 10.-</option>
                      <option value="20">40 GB - CHF 20.-</option>
                      <option value="40">80 GB - CHF 40.-</option>
                      <option value="120">240 GB - CHF 120.-</option>
                      <option value="250">500 GB - CHF 250.-</option>
                    </select>
                  </div>
                  <p>5 CHF / 10GB</p>
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
      </div>
    </main>
    <script src="script.js"></script>
    
    <footer>
    <div class="footer-content">
      <p>Copyright &copy; 2023 OmniCloud AG</p>
      <ul>
        <li><a href="#contact">Kontakt</a></li>
        <li><a href="impressum.html">Impressum</a></li>
      </ul>
    </div>
</footer>
  </body>
</html>
