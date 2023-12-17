<!--Write PHP to make a reusable component-->
<?php

// Retrieve the bookedServers from cookies
if (isset($_COOKIE['bookedServers'])) {
  $bookedServers = json_decode($_COOKIE['bookedServers'], true);
} else {
  $bookedServers = [];
}

class bookedServerObject {
  public $id;
  public $price;
  public $cpu;
  public $ram;
  public $ssd;
}

$newArray = [];

foreach ($bookedServers as $serverData) {
  $newServer = new bookedServerObject();
  $newServer->price = $serverData['price'];
  $newServer->cpu = $serverData['cpu'];
  $newServer->ram = $serverData['ram'];
  $newServer->ssd = $serverData['ssd'];
  $newServer->id = $serverData['id'];
  array_push($newArray, $newServer);
}


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

  //Make new server Object
  $newServer = new bookedServerObject();
  $newServer->cpu = $CPU;
  $newServer->ram = $RAM;
  $newServer->ssd = $SSD;
  $newServer->price = $CPU * 5 + $RAM * 5 + $SSD * 10;
  $newServer->id = format_uuidv4(random_bytes(16));

  global $bookedServers;
  //Add the server to the booked servers
  array_push($bookedServers, $newServer);

  setcookie('bookedServers', json_encode($bookedServers), time()+3600);

}


function format_uuidv4($data)
{
  assert(strlen($data) == 16);

  $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
  $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    
  return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

$CPU = "";
$RAM = "";
$SSD = "";

if (isset($_POST['submit'])) {
  $CPU = $_POST['CPU'];
  $RAM = $_POST['RAM'];
  $SSD = $_POST['SSD'];

  //Create the booking process
if ($CPU > $server1->cpu || $RAM > $server1->ram || $SSD > $server1->ssd) {
  //Check for the other servers
  if ($CPU > $server2->cpu || $RAM > $server2->ram || $SSD > $server2->ssd) {
  
      //Make the booking process
      if ($CPU > $server3->cpu || $RAM > $server3->ram || $SSD > $server3->ssd) {
        echo "We don't have enough servers";
      } else {
     
        //Make the booking process
        bookServer($server3, $CPU, $RAM, $SSD); //Add server to the booked servers
      }

  } else {
  
    //Make the booking process
    bookServer($server1, $CPU, $RAM, $SSD); //Add server to the booked servers
  }

} else {
  //Making the booking process
  bookServer($server1, $CPU, $RAM, $SSD); //Add server to the booked servers
}
}

//Delte the server
if (isset($_POST['delete'])) {
      $btnValue = $_POST['btnValue']; 
      $newArray = array_filter($newArray, function($server) use ($btnValue) {
        return $server->id !== $btnValue;
      });
};
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
            <div class="dashbaored-container-server-info">

           

              <?php
                foreach ($newArray as $server) {

                  $cpu = $server->cpu;
                  $ram = $server->ram;
                  $ssd = $server->ssd;
                  $totalPrice = $cpu * 5 + $ram * 5 + $ssd * 10;

                  $id = $server->id;

                    echo '<div class="info-container">';
                    echo '<div class="server-price">';
                    echo '<p>Total Server Price</p>';
                    echo '<span>' . $totalPrice . '</span>';
                    echo '</div>';

                    echo '<div class="server-cpu">';
                    echo '<p>CPU</p>';
                    echo '<span>' . $cpu . '</span>';
                    echo '</div>';

                    echo '<div class="server-ram ">';
                    echo '<p>RAM</p>';
                    echo '<span>' .$ram . '</span>';
                    echo '</div>';

                    echo '<div class="server-ssd">';
                    echo '<p>SSD</p>';
                    echo '<span>' . $ssd . '</span>';
                    echo '</div>';

                    echo '<div class="server-ssd">';
                    echo '<p>Id</p>';
                    echo '<span>' . $id . '</span>';
                    echo '</div>';

                    echo '<div class="button-price">';
                    echo '<button type="delete" name="delete" value="delete"> Delete Me </button>';
                    echo '</div>';

                    echo '</div>';
                }
              ?>
    
            
          </div>
        </section>
      </div>
    </main>
  </body>
</html>
