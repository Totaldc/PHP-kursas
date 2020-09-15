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
  include 'entities/Cruise.php';
  include 'entities/Location.php';
  include 'entities/ShipPort.php';
  include 'entities/Ship.php';
  $dateFormat = 'Y-m-d H:i';
  $barcelonaPort = new ShipPort("Port of Barcelona", "Barcelona", "Spain", 41.3462356, 2.1333451);
  $hamburPort = new ShipPort("Port of Hamburg", "Hamburg", "Germany", 53.5095114, 9.8954374);
  $genoaPort = new ShipPort("Port of Genoa", "Genoa", "Italy", 47.5360178, -05748012);
  $guardalavacaPort = new ShipPort("Puerto de Guordalamaca", "Guardalamaca", "Cuba", 21.1231251, -75.830705);
  $ship1 = new Ship("Titanic", "Cruise ship", 500);
  $ship2 = new Ship("Kurenas", "Small boat", 1);
  // 1. Nuo Rugsėjo 15, 18 valandos(GMT +1) Barselona(Spain) 
  //  iki Rugsėjo 18, 14 valandos(GMT +1) Genoa(Italy) - 240 eurų
  $startDate = DateTime::createFromFormat($dateFormat, '2020-09-15 18:00', new DateTimeZone('Etc/GMT+1'));
  $finishDate = DateTime::createFromFormat($dateFormat, '2020-09-18 14:00', new DateTimeZone('Etc/GMT+1'));
  $cruiseSimple = new Cruise($startDate, $finishDate, 'Barcelona/Spain', 'Genoa/Italy', 240);

  // 2. Nuo Rugsėjo 17, 15 valandos(GMT +1) Hamburgas(Vokietija) 
  //  iki Spalio 8, 11 valandos(GMT -5) Guardalavaca(Cuba) - 2240 eurų
  $cruiseFancy = new Cruise(
    DateTime::createFromFormat($dateFormat, '2020-09-17 18:00', new DateTimeZone('Etc/GMT+1')),
    DateTime::createFromFormat($dateFormat, '2020-10-08 11:00', new DateTimeZone('Etc/GMT-4')),
    $hamburPort, $guardalavacaPort, 2240
  );
  // 3. Sukurti savo kelionę, kurioje mielai sudalyvautum

  var_dump($cruiseSimple);
  var_dump($cruiseFancy);




  ?>
</body>

</html>