<?php

//Make an array with all the CPU options
$cpuOptions = array(
  "1" => 5,
  "2" => 10,
  "4" => 18,
  "8" => 30,
  "16" => 45,
);

//Make an array with all the RAM options
$ramOptions = array(
  "512" => 5,
  "1'024" => 10,
  "2'048" => 20,
  "4'096" => 40,
  "8'192" => 80,
  "16'384" => 160,
  "32'768" => 320,
);

//Make an array with all the SSD options

$ssdOptions = array(
  "10" => 5,
  "20" => 10,
  "40" => 20,
  "80" => 40,
  "240" => 120,
  "500" => 250,
  "1'000" => 500,
);


//Can also loop up in array the value of the CPU, RAM, and SSD
//$totalPrice = $CPU * 5 + $RAM * 5 + $SSD * 10;


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <main class="container">
      <div class="container-margin-provisioning">
        <h2 class="provisioning-title">Our Servers, Your Customization</h2>
        <section class="provisioning-section-container">
          <div class="provisioning-section-container-padding">
            <form method="POST" action="dashboared.php" class="provisioning-section-form">
            <div class="provisioning-section">
              <h3>Choose CPU Cores</h3>
              <!--Loop through the array and create a checkbox for each option-->
              <?php foreach ($cpuOptions as $key => $value) : ?>
                <div class="provisioning-checkbox-label-container">
                  <input type="radio" name="CPU" value="<?php echo $key; ?>" />
                  <label for="CPU"><?php echo $key; ?></label>
                  <p><?php echo $value; ?> CHF</p>
                </div>
                <?php endforeach; ?> 
           </div>
            <div class="provisioning-section">
            <h3>Choose RAM Size</h3>
                <!--Loop through the array and create a checkbox for each option-->
                <?php foreach ($ramOptions as $key => $value) : ?>
                  <div class="provisioning-checkbox-label-container">
                    <input type="radio" name="RAM" value="<?php echo $key; ?>" />
                    <label for="RAM"><?php echo $key; ?></label>
                  <p><?php echo $value; ?> CHF</p>
                </div>
                <?php endforeach; ?> 
                </div>
                <div class="provisioning-section">
                <h3>Choose SSD Storage</h3>
                <!--Loop through the array and create a checkbox for each option-->
                <?php foreach ($ssdOptions as $key => $value) : ?>
                  <div class="provisioning-checkbox-label-container">
                    <input type="radio" name="SSD" value="<?php echo $key; ?>" />
                    <label for="SSD"><?php echo $key; ?></label>
                  <p><?php echo $value; ?> CHF</p>
                </div>
                <?php endforeach; ?> 
                </div>
                
          </div>
        <section>
      <section class="provisioning-bottom-container">
      <div class="provisioning-total-price-container">
          <!-- <p><?php echo $totalPrice; ?> CHF</p> -->
      </div>
      </form>
    </section>  
    </main>
  </body>
</html>
