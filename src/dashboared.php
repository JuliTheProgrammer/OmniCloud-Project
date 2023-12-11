<!--Write PHP to make a reusable component-->
<?php

//Get the data from the global array
global $bookedServers;
$bookedServers = array();

//Make classes for each server

class Server {
  public $type;
  public $id;
  public $price;
  public $cpu;
  public $ram;
  public $ssd;
}

//Create a new server
$server1 = new Server();
$server1->type = "small";
$server1->id = "0";
$server1->price = 5;
$server1->cpu = 6;
$server1->ram = 8;
$server1->ssd = 100;

//Create a new server
$server2 = new Server();
$server2->type = "medium";
$server2->id = "1";
$server2->price = 10;
$server2->cpu = 8;
$server2->ram = 16;
$server2->ssd = 200;

//Create a new server
$server3 = new Server();
$server3->type = "large";
$server3->id = "2";
$server3->price = 20;
$server3->cpu = 12;
$server3->ram = 32;
$server3->ssd = 400;


function bookServer($server, $CPU, $RAM, $SSD) {
  $server->cpu = $server->cpu - $CPU;
  $server->ram = $server->ram - $RAM;
  $server->ssd = $server->ssd - $SSD; //The server is now booked

  //Tessing if the values are being passed
  echo $server->cpu;
  echo $server->ram;
  echo $server->ssd;

  global $bookedServers;

  
    //Add the server to the booked servers
    array_push($bookedServers, $CPU);
  
  

}




$CPU = "";
$RAM = "";
$SSD = "";

if (isset($_POST['submit'])) {
  $CPU = $_POST['CPU'];
  $RAM = $_POST['RAM'];
  $SSD = $_POST['SSD'];
  //Tesing if the values are being passed
  echo "The values are being passed";
  echo $CPU;
  echo $RAM;
  echo $SSD;

  //Create the booking process
if ($CPU > $server1->cpu || $RAM > $server1->ram || $SSD > $server1->ssd) {
  //Check for the other servers
  if ($CPU > $server2->cpu || $RAM > $server2->ram || $SSD > $server2->ssd) {
    echo "Booking Big Boy Server";
      //Make the booking process
      if ($CPU > $server3->cpu || $RAM > $server3->ram || $SSD > $server3->ssd) {
        echo "We don't have enough servers";
      } else {
        echo "Booking Large Server";
        //Make the booking process
        bookServer($server3, $CPU, $RAM, $SSD); //Add server to the booked servers
      }

  } else {
    echo "Booking Medium Server";
    //Make the booking process
    bookServer($server1, $CPU, $RAM, $SSD); //Add server to the booked servers
  }

} else {
  echo "Booking Small Server";
  //Making the booking process
  bookServer($server1, $CPU, $RAM, $SSD); //Add server to the booked servers
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="style.css" rel="stylesheet" />
  </head>
  <body>
    <main class="container">
      <div class="container-margin-provisioning">
        <h2 class="dashboared-title">My Dashboard</h2>
        <section class="dashboared-section-container">
          <div class="dashbaored-container">
            <p>Server ID</p>
            <div class="dashbaored-container-server-info">
              <!--diplay the for loop in the html-->
              <?php 
                //Loop through the data and make a reusable component
                global $bookedServers;
                if ($bookedServers != null) {
                  echo "<p>$bookedServers[0]</p>";
                }
              ?>
            </div>
          </div>
        </section>
      </div>
    </main>
  </body>
</html>
