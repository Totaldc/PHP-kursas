<?php

$money = rand(1, 30);
$cost = 3;

print "Money: $money";

print "<br>";


$count = floor($money / $cost);

print "count: $count mugs for $money eur";



print "<br>";



print '<br>';


// if($total >= 0 ){
//     print $total;
//     for($i = 1; $i <= $total; $i++){
//         print "<img src=\"https://images-na.ssl-images-amazon.com/images/I/81-UXgGcn7L._AC_SL1500_.jpg\" width=\"100px\">";
//     } 
// }

for($count; $count > 0; $count-=3){
    if($count !== 0){
        print "<br>";
        print $count;
        for($i = 1; $i <= $count; $i++){
            if($i < $count){
                print "<img src=\"https://previews.123rf.com/images/belchonock/belchonock1802/belchonock180279729/96003599-almost-empty-beer-glass-isolated-on-white.jpg\" width=\"100px\">";
            }else{
                print "<img src=\"https://images-na.ssl-images-amazon.com/images/I/81-UXgGcn7L._AC_SL1500_.jpg\" width=\"100px\">";
            }
        } 



}
}



