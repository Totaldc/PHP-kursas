<!------------------------Funkcijos-------------------------- -->
<?php $numbers = [-2, 5, 9, 7, 5, 12, 56, 8, 16, 32, -32, -2]; ?>
<?php $numbersBinary = [1, 0, 0, 1, 1, 0, 1, 0, 0, 1, 1, 1, 1, 0]; ?>
<!--    1. Sukurti funkciją, kuri ima masyvą ir atspausdina kiek- -->
<!--  vieną jo reikšmę stulpeliu: [0] => 64. (nieko negrąžina) -->
<?php
/**
 * Spausdina masyvo skaičius stulpeliu.
 *
 * @param Array $numberArr primityvių reikšmių masyvas
 */
function printNumbersVertically($numberArr)
{
  foreach ($numberArr as $number) : ?>
    <div><?= $number ?></div>
<?php endforeach;
}
// printNumbersVertically($numbers);
// printNumbersVertically($numbersBinary);
?>
​
<!--    1.1 Sukurti funkciją, kuri ima masyvą ir atspausdina kiek- -->
<!--  vieną jo reikšmę eilute, atskyrus kableliu:  -->
<?php
function printArray($arr)
{
?>
  <span>[ <?= join(', ', $arr) ?> ]</span>
<?php
}
?>
<div>Pradinis masyvas: <?php printArray($numbers) ?></div>
<div>Pradinis masyvas: <?php printArray($numbersBinary) ?></div>
<hr>
<hr>
​
<!--    2. Sukurti funkciją, kuri ima masyvą ir grąžina visų -->
<!--  jo elementų sumą -->
<?php
function arrSum($arr)
{
  $totalSum = 0;
  foreach ($arr as $val) $totalSum += $val;
  return $totalSum;
}
?>
<div>Narių suma: <?= arrSum($numbers) ?></div>
<div>Narių suma: <?= arrSum($numbersBinary) ?></div>
<hr>
<hr>
​
<!--    3. Sukurti funkciją, kuri ima masyvą ir grąžina visų ele- -->
<!--  mentų vidurkį -->
<?php
function arrAverage($arr)
{
  $avg = 0;
  foreach ($arr as $num)
    $avg += $num / count($arr);
  return $avg;
}
?>
<div>Vidurkis: <?= arrAverage($numbers) ?></div>
<div>Vidurkis: <?= arrAverage($numbersBinary) ?></div>
<hr>
<hr>
<!--    4. Sukurti funkciją, kuri ima masyvą ir grąžina didžiau- -->
<!--  sią skaičių masyve. -->
<?php
function arrMax($arr)
{
  $max = $arr[0];
  for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] > $max) $max = $arr[$i];
  }
  return $max;
}
?>
<div>Max: <?= arrMax($numbers) ?></div>
<div>Max: <?= arrMax($numbersBinary) ?></div>
<hr>
<hr>
​
<!--    5. Sukurti funkciją, kuri ima masyvą ir grąžina mažiau- -->
<!--  sią skaičių masyve. -->
<?php
function arrMin($arr)
{
  $min = $arr[0];
  for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] < $min) $min = $arr[$i];
  }
  return $min;
}
?>
<div>Min: <?= arrMin($numbers) ?></div>
<div>Min: <?= arrMin($numbersBinary) ?></div>
<hr>
<hr>
​
<!--    6. Sukurti funkciją, kuri ima masyvą ir išrikiuja jo ele- -->
<!--  mentus nuo mažiausio iki didžiausio ir grąžina tą masyvą. -->
<?php
function arrSort($arr)
{
  sort($arr);
  return $arr;
}
$numbersSorted = arrSort($numbers);
$numbersBinarySorted = arrSort($numbersBinary);

?>
<div>Išikiuotas: <?php printArray($numbersSorted); ?></div>
<div>Išikiuotas: <?php printArray($numbersBinarySorted); ?></div>
<hr>
<hr>
<!--    
    7. Sukurti asociatyvų mašinų masyvą, su savybėmis
  'brand', 'model', 'year', 'price',
 -->
<?php
$cars = [
  [
    'brand' => 'BMW',
    'model' => 'X5',
    'year' => 2015,
    'price' => 30000
  ],
  [
    'brand' => 'Audi',
    'model' => 'A6',
    'year' => 2018,
    'price' => 45000
  ],
  [
    'brand' => 'Škoda',
    'model' => 'Superb',
    'year' => 2011,
    'price' => 25000,
  ],
  [
    'brand' => 'Honda',
    'model' => 'Jazz',
    'year' => 2005,
    'price' => 5000,
  ],
  [
    'brand' => 'Toyota',
    'model' => 'Auris',
    'year' => 2009,
    'price' => 4000,
  ],
  [
    'brand' => 'Lexus',
    'model' => 'X1',
    'year' => 2020,
    'price' => 50000,
  ],
];

$cars2 = [
    [
      'brand' => 'BMW',
      'model' => 'X5',
      'year' => 2015,
      'price' => 30000
    ],
    [
      'brand' => 'Audi',
      'model' => 'A6',
      'year' => 2018,
      'price' => 45000
    ],
    [
      'brand' => 'Škoda',
      'model' => 'Superb',
      'year' => 2011,
      'price' => 25000,
    ],
    [
      'brand' => 'Honda',
      'model' => 'Jazz',
      'year' => 2005,
      'price' => 5000000,
    ],
  ];
?>
​
<!--   8. Sukurti funkciją kuri spausdina visas mašinas. -->
<?php
function printCarsTable($carArr, $title)
{
?>
  <div class="cars-table">
    <div class="p-1 pb-0 cars-table__title"><?= $title ?></div>
    <div class="row cars-table__header">
      <div class="col p-1">Markė</div>
      <div class="col p-1">Modelis</div>
      <div class="col p-1">Metai</div>
      <div class="col p-1">Kaina</div>
    </div>
    <div class="cars-table__body">
      <?php foreach ($carArr as $car) : ?>
        <div class="row">
          <div class="col p-1"><?= $car['brand'] ?></div>
          <div class="col p-1"><?= $car['model'] ?></div>
          <div class="col p-1"><?= $car['year'] ?></div>
          <div class="col p-1"><?= $car['price'] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php
}
printCarsTable($cars, 'Visos mašinos');
?>
​
<!--   
    9. Sukurti funkciją kuri atrenka visas tik tam tikros markės mašinas.
  Atvaizduoti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
 -->
<?php
function filterCarsByBrand($cars, $brand)
{
  $carsByBrand = [];
  foreach ($cars as $car) {
    if ($car['brand'] === $brand)
      $carsByBrand[] = $car;
  }
  return $carsByBrand;
}

$carsAudi = filterCarsByBrand($cars, 'Audi');
$carsBMW = filterCarsByBrand($cars, 'BMW');
?>
<div><?php printCarsTable($carsAudi, 'Audi') ?></div>
<div><?php printCarsTable($carsBMW, 'BMW') ?></div>
<br><br>
<!--   
    10. Sukurti funkciją kuri atrenka mašinas brangesnes, nei parametru paduodama reikšmė.
  Atvaizduoti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
 -->
<?php
function filterCarsPriceFrom($cars, $minPrice)
{
  $carsPriceFrom = [];
  foreach ($cars as $car) {
    if ($car['price'] >= $minPrice)
      $carsPriceFrom[] = $car;
  }
  return $carsPriceFrom;
}

$carsPriceFrom30k = filterCarsPriceFrom($cars, 30000);
$carsPriceFrom5k = filterCarsPriceFrom($cars, 5000);
printCarsTable($carsPriceFrom30k, 'Mašinos brangesnės nei 30000');
printCarsTable($carsPriceFrom5k, 'Mašinos brangesnės nei 5000');
?>
<br><br>
​
​
<!--   
    11. Sukurti funkciją kuri atrenka mašinas pigesnes, nei parametru paduodama reikšmė.
  Atvaizduoti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
 -->
<?php
function filterCarsPriceTo($cars, $maxPrice)
{
  $filteredCars = [];
  foreach ($cars as $car) {
    if ($car['price'] <= $maxPrice) {
      $filteredCars[] = $car;
    }
  }
  return $filteredCars;
}
$carsPriceTo30k = filterCarsPriceTo($cars, 30000);
$carsPriceTo15k = filterCarsPriceTo($cars, 15000);
printCarsTable($carsPriceTo30k, 'Auto under 30000');
printCarsTable($carsPriceTo15k, 'Auto under 15000');
?>
<br><br>
​
<!--   
    12. Sukurti funkciją kuri išrikiuoja mašinas pagal kainą.
  Atvaizduoti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
 -->
<?php
function byPriceASC($curr, $next)
{
  return $curr['price'] - $next['price'];
}
function byPriceDESC($curr, $next)
{
  return $next['price'] - $curr['price'];
}
function sortCarsByPrice($cars)
{
  usort($cars, 'byPriceASC');
  return $cars;
}
$carsSortedByPriceASC = sortCarsByPrice($cars);
printCarsTable($carsSortedByPriceASC, 'Mašinos išrikiuotas pagal kainą didėjimo tvarka');
?>
​
<!--   
    13. Sukurti funkciją kuri išrikiuoja mašinas pagal parametru paduotą funkciją.
  Atvaizduoti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
 -->
<?php
function byYearASC($curr, $next)
{
  return $curr['year'] - $next['year'];
}
function byYearDESC($curr, $next)
{
  return $next['year'] - $curr['year'];
}
function byBrandASC($curr, $next)
{
  return strcmp($curr['brand'], $next['brand']);
}
function byBrandDESC($curr, $next)
{
  return strcmp($curr['brand'], $next['brand']) * -1;
}
function byModelASC($curr, $next)
{
  return strcmp($curr['model'], $next['model']);
}
function byModelDESC($curr, $next)
{
  return strcmp($curr['model'], $next['model']) * -1;
}
function sortCars($cars, $cmpFunction){
  usort($cars, $cmpFunction);
  return $cars;
}
$carsSortedByYearASC = sortCars($cars, 'byYearASC');
$carsSortedByYearDESC = sortCars($cars, 'byYearDESC');
printCarsTable($carsSortedByYearASC, 'Mašinos išrikiuotos pagal metus didėjimo tvarka');
printCarsTable($carsSortedByYearDESC, 'Mašinos išrikiuotos pagal metus mažėjimo tvarka');
?>
​
<!--   
    14. Sukurti funkciją kuri atrenka mašinas pagal parametru paduotą funkciją.
  Parašyti panaudojimo pavyzdžių ir atspausdinti mašinas lentele panaudojant funkciją, sukurtą 8 punkte.
 -->
​
 <?php
function priceFrom($el, $minPrice)
{
    return $el['price'] >= $minPrice;
}
function priceTo($el, $maxPrice)
{
    return $el['price'] <= $maxPrice;
}
function priceBetween($el, $from, $to)
{
    return $el['price'] >= $from && $el['price'] <= $to;
}
function yearFrom($el, $minYear)
{
    return $el['year'] >= $minYear;
}
function yearTo($el, $maxYear)
{
    return $el['year'] >= $maxYear;
}
function brandEqual($el, $brand)
{
    return $el['brand'] === $brand;
}
function modelEqual($el, $model)
{
    return $el['model'] === $model;
}
/**
 * Atrenka auto naudojant filtravimo funkcija
 * 
 * @param Array $cars auto masyvas.
 * @param Function $filterFunction filtravimo funkcija, kuri grazina true ar false.
 * @param Array $args filtravimo funkcijai perduodami papildomi (šalia tikrinamojo elemento) parametrai.
 * @return Array auto atrinktos pagal filtravimo funkcija.
 * 
*/
function filterCars($cars, $filterFunction, $args)
{
    $filteredCars = [];
    foreach ($cars as $car) {
        if ($filterFunction($car, ...$args)) {
            $filteredCars[] = $car;
        }
    }
    return $filteredCars;
}
$filteredCars = filterCars($cars, 'priceFrom', [5000]);
printCarsTable($filteredCars, 'Auto nuo 5k');
$filteredCars = filterCars($cars, 'priceBetween', [8000, 20000]);
printCarsTable($filteredCars, 'Auto nuo 8k iki 20k');
?>
​
<!-- ---------------------------------- KOMPLEKSINĖS UŽDUOTYS ---------------------------------------- -->
<!--   
    1. Atrinkti BMW automobilius brangesnius nei 30 000 ir iškikiuokite pagal kainą mažėjančia tvarka
 -->
​
<!--   
    2. Atrinkti Toyota automobilius pigesnius nei 10 000 ir iškikiuokite pagal markę tvarka
 -->
​
<!--   
    3. Atrinkti Audi automobilius naujesnius nei 2010 metai, rėžiuose [10000; 50000], išrikiuoti pagal metus didėjančia tvarka
 -->
​
<!--   
    4. Parašyti funkciją kuri palygina du mašinų masyvus, pagal suminę mašinų kainą
      grąžinti true - jei pirmojo masyvo kainų suma didenė už antrojo,
      grąžinti false - mei antrojo masyvo kainų suma NEdidenė už antrojo
​
      Atspausdinti ekrane "Pirmojo masyvo mašinų kainų suma yra didesnė" 
        arba  "Antrojo masyvo mašinų kainų suma NĖRA didesnė"
 -->

 <?php
 
 function carsTotalPrice($cars){

    $totalPrice = 0;

    foreach($cars as $car){
        $totalPrice += $car['price'];
    }

    return $totalPrice;

 }

 function compareCarsByTotalPrice($cars, $cars2){
     return carsTotalPrice($cars) > carsTotalPrice($cars2);

 }
 
 ?>

 <h3>
     <?= compareCarsByTotalPrice($cars, $cars2) 
     ? 'Pirmojo masyvo mašinų kainų suma yra didesnė' 
     : 'Antrojo masyvo mašinų kainų suma NĖRA didesnė' ?>
</h3>
​
<!--   
    5. Parašyti funkciją kuri palygina du mašinų masyvus, pagal vidutinę mašinų kainą
      grąžinti true - jei pirmojo masyvo kainų vidurkis didesnis už antrojo,
      grąžinti false - jei masyvo kainų vidurkis NĖRA didenis už antrojo
​
      Atspausdinti ekrane "Pirmojo masyvo mašinų kainų vidurkis yra didesnis" 
        arba "Pirmojo masyvo mašinų kainų vidurkis NĖRA didesnis"
-->