<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Objektinis programavimas</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/cruiseCard.css">
</head>

<body>
  <h1>Sveiki</h1>
  <?php
  include 'constants.php';
  include 'entities/Location.php';
  include 'entities/Ship.php';
  include 'entities/ShipPort.php';
  include 'entities/Cruise.php';
  include 'entities/CruiseStop.php';

 

  // Ship Ports 
  $barselonaPort = new ShipPort("Port of Barcelona", "Barcelona", "Spain", 41.3462356, 2.1333451);
  $marseillePort = new ShipPort("Port of Marseille", "Marseille", "France", 43.2944643, 5.3557599);
  $nicePort = new ShipPort("Port of Nice", "Nice", "France", 43.6949772, 7.2809274);
  $amsterdamPort = new ShipPort("Port of Amsterdam", "Amsterdam", "Nederlands", 52.3781413, 4.6640168);
  $lisabonaPort = new ShipPort("Port of Lisabona", "Lisabona", "Portugal", 38.7436883, -9.1952226);
  $pontaDeLagadaPort = new ShipPort("Port of Ponta De Lagada", "Ponta De Lagada", "Portugal", 38.7436883, -9.1952226);
  $genoaPort = new ShipPort("Port of Genoa", "Genoa", "Italy", 47.5360178, -0.5748012);
  $hamburgPort = new ShipPort("Port of Hamburg", "Hamburg", "Germany", 53.5095114, 9.8954374);
  $guardalavacaPort = new ShipPort("Puerto de Guardalamaca", "Guardalavaca", "Cuba", 21.1231251, -75.830705);

  // 1. Nuo Rugsėjo 15, 18 valandos(GMT +1) Barselona(Spain) 
  //  iki Rugsėjo 18, 14 valandos(GMT +1) Genoa(Italy) - 240 eurų
  $startDate = DateTime::createFromFormat(DATE_FORMAT, '2020-09-15 18:00', new DateTimeZone('Etc/GMT+1'));
  $finishDate = DateTime::createFromFormat(DATE_FORMAT, '2020-09-18 14:00', new DateTimeZone('Etc/GMT+1'));
  $cruiseSimple = new Cruise($startDate, $finishDate, $barselonaPort, $genoaPort, 240);

  // 2. Nuo Rugsėjo 17, 15 valandos(GMT +1) Hamburg(Vokietija) 
  //  iki Spalio 8, 11 valandos(GMT -5) Guardalavaca(Cuba) - 2240 eurų
  $cruiseFancy = new Cruise(
    DateTime::createFromFormat(DATE_FORMAT, '2020-09-17 18:00', new DateTimeZone('Etc/GMT+1')),
    DateTime::createFromFormat(DATE_FORMAT, '2020-10-08 11:00', new DateTimeZone('Etc/GMT-4')),
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
  $marseilleStop = new CruiseStop(
    $marseillePort,
    DateTime::createFromFormat(DATE_FORMAT, '2020-09-16 11:00', new DateTimeZone('Etc/GMT+1')),
    DateTime::createFromFormat(DATE_FORMAT, '2020-09-16 21:00', new DateTimeZone('Etc/GMT+1'))
  );
  $niceStop = new CruiseStop(
    $nicePort,
    DateTime::createFromFormat(DATE_FORMAT, '2020-09-17 9:00', new DateTimeZone('Etc/GMT+1')),
    DateTime::createFromFormat(DATE_FORMAT, '2020-09-17 22:00', new DateTimeZone('Etc/GMT+1'))
  );
  $cruiseSimple->setStops([$marseilleStop, $niceStop]);

  $cruiseFancy->setStops([
    new CruiseStop(
      $amsterdamPort,
      DateTime::createFromFormat(DATE_FORMAT, '2020-09-19 10:00', new DateTimeZone('Etc/GMT+1')),
      DateTime::createFromFormat(DATE_FORMAT, '2020-09-19 22:00', new DateTimeZone('Etc/GMT+1'))
    ),
    new CruiseStop(
      $lisabonaPort,
      DateTime::createFromFormat(DATE_FORMAT, '2020-09-22 11:00', new DateTimeZone('Etc/GMT+0')),
      DateTime::createFromFormat(DATE_FORMAT, '2020-09-22 22:00', new DateTimeZone('Etc/GMT+0 '))
    ),
    new CruiseStop(
      $pontaDeLagadaPort,
      DateTime::createFromFormat(DATE_FORMAT, '2020-09-25 03:00', new DateTimeZone('Etc/GMT-2')),
      DateTime::createFromFormat(DATE_FORMAT, '2020-09-26 21:00', new DateTimeZone('Etc/GMT-2'))
    )
  ]);

  // 6. Pridėti kruizams po 5 nuotraukas
  $cruiseSimple->addImage(DOMAIN_NAME.IMAGES.'barselona-port.jpg');
  $cruiseSimple->addImage(DOMAIN_NAME.IMAGES.'cruise-ship-simple.jpg');
  $cruiseSimple->addImage(DOMAIN_NAME.IMAGES.'nice.jpg');
  $cruiseSimple->addImage('https://raphaeltours.com/images/genoahighlightstour3.jpg');
  $cruiseSimple->addImage('https://lp-cms-production.imgix.net/2019-06/b089c412c647e05341592171b6d34ba8-marseille.jpg');

  $cruiseFancy->addImage(DOMAIN_NAME.IMAGES.'cruise-ship-fancy.jpg');
  $cruiseFancy->addImage('https://www.makalius.lt/wp-content/travel-destination-images/90222-travel-destination/lisabona-790x363.jpg');
  $cruiseFancy->addImage('https://top-lankytinos-vietos.lt/wp-content/uploads/2019/01/Hamburgas.jpg');
  $cruiseFancy->addImage('https://www.holland.com/upload_mm/8/2/7/68467_fullimage_amsterdam_canal2_1360x.jpg');
  $cruiseFancy->addImage('https://havanatimes.org/wp-content/uploads/2019/05/22.5-Puerto-de-la-Habana-.jpg');

  $cruiseSimple->renderAsCard();
  $cruiseFancy->renderAsCard();
  



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