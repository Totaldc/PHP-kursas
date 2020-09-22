<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Objektinis programavimas</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/cruises.css">
</head>

<body>
  <div class="container">
    <?php
    include 'constants.php';
    include 'entities/Location.php';
    include 'entities/Ship.php';
    include 'entities/ShipPort.php';
    include 'entities/Cruise.php';
    include 'entities/CruiseStop.php';
    include 'viewModels/CruiseCardGridViewModel.php';

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
    $firstStop =  new CruiseStop(
      $barselonaPort,
      null,
      DateTime::createFromFormat(DATE_FORMAT, '2020-09-15 18:00', new DateTimeZone('Etc/GMT+1'))
    );
    $lastStop =  new CruiseStop(
      $genoaPort,
      DateTime::createFromFormat(DATE_FORMAT, '2020-09-18 14:00', new DateTimeZone('Etc/GMT+1'))
    );
    $cruiseSimple = new Cruise($firstStop, $lastStop, 240);

    // 2. Nuo Rugsėjo 17, 15 valandos(GMT +1) Hamburg(Vokietija) 
    //  iki Spalio 8, 11 valandos(GMT -5) Guardalavaca(Cuba) - 2240 eurų
    $cruiseFancy = new Cruise(
      new CruiseStop(
        $hamburgPort,
        null,
        DateTime::createFromFormat(DATE_FORMAT, '2020-09-17 18:00', new DateTimeZone('Etc/GMT+1'))
      ),
      new CruiseStop(
        $guardalavacaPort,
        DateTime::createFromFormat(DATE_FORMAT, '2020-10-08 11:00', new DateTimeZone('Etc/GMT-4'))
      ),
      2240
    );

    // 3. Sukurti 2 laivus. Vieną didelį(500 kambarių) kita vidutinio dydžio(100 kambarių)
    $ship = new Ship("Shipy", "Lat-3200", 100);
    $ship->addImage(DOMAIN_NAME . IMAGES . 'cruise-ship-simple.jpg');
    $fancyShip = new Ship("Shipy", "Lat-6700", 500);
    $fancyShip->addImage(DOMAIN_NAME . IMAGES . 'cruise-ship-fancy.jpg');

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
    $cruiseSimple->setRoute([$marseilleStop, $niceStop]);

    $cruiseFancy->setRoute([
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
    $cruiseSimple->addImage(DOMAIN_NAME . IMAGES . 'barselona-port.jpg');
    $cruiseSimple->addImage(DOMAIN_NAME . IMAGES . 'cruise-ship-simple.jpg');
    $cruiseSimple->addImage(DOMAIN_NAME . IMAGES . 'nice.jpg');
    $cruiseSimple->addImage('https://raphaeltours.com/images/genoahighlightstour3.jpg');
    $cruiseSimple->addImage('https://lp-cms-production.imgix.net/2019-06/b089c412c647e05341592171b6d34ba8-marseille.jpg');

    $cruiseFancy->addImage(DOMAIN_NAME . IMAGES . 'cruise-ship-fancy.jpg');
    $cruiseFancy->addImage('https://www.makalius.lt/wp-content/travel-destination-images/90222-travel-destination/lisabona-790x363.jpg');
    $cruiseFancy->addImage('https://top-lankytinos-vietos.lt/wp-content/uploads/2019/01/Hamburgas.jpg');
    $cruiseFancy->addImage('https://www.holland.com/upload_mm/8/2/7/68467_fullimage_amsterdam_canal2_1360x.jpg');
    $cruiseFancy->addImage('https://havanatimes.org/wp-content/uploads/2019/05/22.5-Puerto-de-la-Habana-.jpg');

    $cruiseGrid = new CruiseCardGridViewModel('All cruises', [
      $cruiseSimple,
      $cruiseFancy
    ]);

    $cruiseGrid->render();

    //  7. Pridėti kainos atvaizdavimą kruizo atvaizdavimo metode

    //  8. "Cruise" klasėje perrašyti pradžios ir pabaigos laikus bei uostus kaip "CruiseStop" klasės objektus
    // ir perkelti juos į $stops masyvą. Stops masyvą pervadinti į "route". Priderinti esamus pakeitimus,
    // kad nepakistų kitų metodų veikimas 
    //  8.1 Cruise klasėje panaikinti savybes:
    //   private DateTime $startDateTime;
    //   private DateTime $finishDateTime;
    //   private ShipPort $startLocation;
    //   private ShipPort $finishLocation;
    //  8.2 Cruise klasėje pertvarkyti konstruktoriaus argumentų sąrašą - panaikinti :
    //    ... DateTime $startDateTime, DateTime $finishDateTime, ShipPort $startLocation, ShipPort $finishLocation, ...
    //  8.3 Cruise klasėje konstruktoriuje ištrinti 8.1 punkte ištrintų savybių priskyrimus
    //  8.4 Šiame (index.php) faile pašalinti nereikalingus parametrus kuriant "Cruise" klasės objektus
    //  8.5 Cruise klasėje suformuoti "CruiseStop" klasės objektus Kruizų pradžiai ir pabaigai
    //  8.6 "Cruise" klasėje konstruktoriuje priimti į argumentų sąrašą CruiseStop klasės obektus ir įdėti juos į 
    //   stops savybę
    //  8.7 Pertvarkyti "setStops" metodą, jog papildomus sustojimu įdėtų tarp pirmos ir paskutinės stotelės;
    //  Pirmas Cruise Stop klasės objektas masyve $stops turi būti pirma stotelė, o paskutinis turi būti paskutinė stotelė.
    //  8.8 CruiseStop klasėje parašyti metodus suformuotui pradios ir pabaigos laikams gauti: 
    //     getDepartureTime() 
    //     getArrivalTime()
    //  8.9 Cruise klasėje pervadinti $stops masyvą kaip $route;
    //  8.10 Cruise klasėje pervadinti setStops metodą kaip setRoute;
    //  8.11 Cruise klasėje pertvarkyti duomenų panaudojima metode renderAsCard
    ?>
  </div>
</body>

</html>