<?php


//1

// $arr = [1, 2, 3, 4, 5];

// function all($arr){
//     foreach($arr as $value){
//        print $value;
//     }
// }

// print(all($arr));


//2

// $arr = [1, 2, 3, 4, 5];

// function all($arr){
//     $sum = 0;
//     foreach($arr as $value){
//         $sum += $value;
//     }
//     print $sum;
// }

// print(all($arr));

//3


// $arr = [1, 2, 3, 4, 5];

// function all($arr){
//     $sum = 0;
//     foreach($arr as $value){
//         $sum += $value;
//         $avg = $sum / count($arr);
//     }
//     print $avg;
// }

// print(all($arr));


//4

// $arr = [1, 2, 30, 4, 5];

// function max($arr){
//     $max = 0;
//     foreach($arr as $value){
//        if($value > $max){
//            $max = $value;
//        }
//     }
//     print $max;
// }

// print(max($arr));


//5

// $arr = [1, 2, 30, 4, 5];

// function min($arr){
//     $min = 999;
//     foreach($arr as $value){
//        if($value < $min){
//            $min = $value;
//        }
//     }
//     print $min;
// }

// print(min($arr));


//6



// $arr = [1, 2, 30, 4, 5];

// function sort($arr)
// {
//     sort($arr);
//     foreach($arr as $value){
//         print $value;
//     }
// }

// print(sort($arr));]


//7 + 8

$arr = [
    [
        'brand' => 'bmw',
        'model' => 'm-klase',
        'year' => '1990',
        'price' => '30000'
    ],

    [
        'brand' => 'audi',
        'model' => 'bulka',
        'year' => '1990',
        'price' => '5000'
    ],

    [
        'brand' => 'opel',
        'model' => 'ascona',
        'year' => '1980',
        'price' => '500'
    ],

    [
        'brand' => 'opel',
        'model' => 'record',
        'year' => '2000',
        'price' => '1000'
    ],
];

// function allCars($arr){
//     foreach($arr as $value){
//         print $value['brand'] . ' ';
//     }
// }

// print(allCars($arr));


// 9


// function brandCars($arr){
//     print '<table>';
//         foreach($arr as $value){
//             print '<tr>';
//             // var_dump($value['brand']);
//             if($value['brand'] === 'opel'){
//                 foreach($value as $item){
//                     print '<td>' . $item . '</td>';
//                 }
//             }
//             print '</tr>';
//         }
//         print '</table>';
// }

// print(brandCars($arr));

//10

// function priceCars($arr){
//     $price = 500;
//     print '<table>';
//         foreach($arr as $value){
//             print '<tr>';
//             // var_dump($value['brand']);
//             if($value['price'] > $price){
//                 foreach($value as $item){
//                     print '<td>' . $item . '</td>';
//                 }
//             }
//             print '</tr>';
//         }
//         print '</table>';
// }

// print(priceCars($arr));

//11

// function priceCars($arr){
//     $price = 99999;
//     print '<table>';
//         foreach($arr as $value){
//             print '<tr>';
//             // var_dump($value['brand']);
//             if($value['price'] < $price){
//                 foreach($value as $item){
//                     print '<td>' . $item . '</td>';
//                 }
//             }
//             print '</tr>';
//         }
//         print '</table>';
// }

// print(priceCars($arr));

//12

// function sortByPrice($arr){
//     print '<table>';
//     $keys = array_column($arr, 'price');

//     array_multisort($keys, SORT_ASC, $arr);
    
//     var_dump($arr);
//         foreach($arr as $value){
//             print '<tr>';
//                 foreach($value as $item){
//                     print '<td>' . $item . '</td>';
//                 }
            
//             print '</tr>';
//         }
//         print '</table>';
// }

// print(sortByPrice($arr));

//13

function sortLast($a, $b)
{
   
    return ($a > $b);
}

usort($arr, "sortLast");
print '<table>';
foreach ($arr as $value) {
    print '<tr>';
    foreach($value as $item){
        print '<td>' .  $item . '</td>';

    }
    print '</tr>';
}
print '</table>';