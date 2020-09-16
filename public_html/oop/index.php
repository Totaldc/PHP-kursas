<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Objektinis programavimas</title>
</head>

<body>
  <h1>Sveiki</h1>
  <?php
  include 'entities/Location.php';
  include 'entities/Ship.php';
  include 'entities/ShipPort.php';
  include 'entities/Cruise.php';
  include 'entities/CruiseStop.php';

  $dateFormat = 'Y-m-d H:i';

  // Ship Ports 
  $barselonaPort = new ShipPort("Port of Barcelona", "Barcelona", "Spain", 41.3462356, 2.1333451);
  $hamburgPort = new ShipPort("Port of Hamburg", "Hamburg", "Germany", 53.5095114, 9.8954374);
  $marceilleStop = new ShipPort("Port of Marceille", "Marceille", "France", 53.55465114, 6.84509374);
  $genoaPort = new ShipPort("Port of Genoa", "Genoa", "Italy", 47.5360178, -0.5748012);
  $guardalavacaPort = new ShipPort("Puerto de Guardalamaca", "Guardalavaca", "Cuba", 21.1231251, -75.830705);


  // 1. Nuo Rugsėjo 15, 18 valandos(GMT +1) Barselona(Spain) 
  //  iki Rugsėjo 18, 14 valandos(GMT +1) Genoa(Italy) - 240 eurų
  $startDate = DateTime::createFromFormat($dateFormat, '2020-09-15 18:00', new DateTimeZone('Etc/GMT+1'));
  $finishDate = DateTime::createFromFormat($dateFormat, '2020-09-18 14:00', new DateTimeZone('Etc/GMT+1'));
  $cruiseSimple = new Cruise($startDate, $finishDate, $barselonaPort, $genoaPort, 240);

  // 2. Nuo Rugsėjo 17, 15 valandos(GMT +1) Hamburg(Vokietija) 
  //  iki Spalio 8, 11 valandos(GMT -5) Guardalavaca(Cuba) - 2240 eurų
  $cruiseFancy = new Cruise(
    DateTime::createFromFormat($dateFormat, '2020-09-17 18:00', new DateTimeZone('Etc/GMT+1')),
    DateTime::createFromFormat($dateFormat, '2020-10-08 11:00', new DateTimeZone('Etc/GMT-4')),
    $hamburgPort,
    $guardalavacaPort,
    2240
  );

  // 3. Sukurti 2 laivus. Vieną didelį(500 kambarių) kita vidutinio dydžio(100 kambarių)
  $ship = new Ship("Shipy", "Lat-3200", 100);
  $fancyShip = new Ship("Shipy", "Lat-6700", 500);

  // 4. Priskirti sukurtus laivus kruizams, naudojant Cruise::setShip metodą
  $cruiseSimple->setShip($ship);
  $cruiseFancy->setShip($fancyShip);

  // 5. Sukurti ir priskirti Kruizams stoteles

  $marceilleStop = ($marceillePort, 
  DateTime::createFromFormat($dateFormat,
   '2020-09-18 14:00', new DateTimeZone('Etc/GMT+1')),
   DateTime::createFromFormat($dateFormat,
   '2020-09-19 14:00', new DateTimeZone('Etc/GMT+1'));




   $cruiseSimple->setStops([$marceilleStop, $niceStop]);

  // 6. Pridėti kruizams po 3 nuotraukas

  var_dump($cruiseSimple);
  var_dump($cruiseFancy);


  // SUNKIOS UŽDUOTYS
  //  S-1. Sukurtite Room klasę,  kuri turėtų savybes: $bedCount, $roomType
  //  S-2. Sukurkite statinį Room metodą, kuris generuoja kambarį
  //  S-3. Ship konstruktoriuje parašykite logiką, kuri generuoja Room objektų masyvą pagal 
  // $rooms argumentu paduotą skaičių
  //  S-4. Parašykite Ship ir Cruise klasėse metodus "getTotalSpaces" ir "getFreeSpaces" kurie
  // remtūsi tuo pagal sugeneruotų kambarių esamą padėtį
  //



  ?>
</body>

</html>