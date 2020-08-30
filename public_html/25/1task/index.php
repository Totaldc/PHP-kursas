<?php
// $arr = ['a', 'b', 'c'];

// foreach($arr as &$item){
//     $item = 'x';
// }

// var_dump($arr);


// #9

// $arr = ['a', 'b', 'c' => ['b']];

// foreach($arr as &$item){
//     $item = 'x';
// }

// var_dump($arr);

//9

$arr = ['a', 'b', 'c' => ['b']];
  
    function printAll($arr) {
        if (!is_array($arr)) {
            print $arr .  ' ';
            return;
        }
    
        foreach($arr as $value) {
          
                 printAll($value);
            }
        }
    


    printAll($arr);

