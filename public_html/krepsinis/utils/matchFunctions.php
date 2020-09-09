<?php
// 1. Sukurti asociatyvų masyvą, kuris atspindi varžybas ir turi tokias savybes:
//   date,
//   time,
//   location,
//   team1,
//   team2,
//   score


$games = [
    'game1' => [
        'time' => '2020-10-10',
        'location' => 'Vilnius',
        'team1' => 'team_name',
        'team2' => 'team_name',
        'score' => '1:0',
    ]

    ];

$places = ['Vilnius', 'Klaipeda', 'Kaunas', 'Šiauliai', 'Panevezys'];



// 2. Sukurkite galimų rungtynių vietų masyvą (CONST)

// 3. Parašyti funkciją [create_match] kuri atsitiktinai sugeneruoja rungtynes, pagal |1.| užduoties struktūrą:
//   data - bet kurią dieną atsitiktinai pradedant rytojumi baigiant už 7 dienų
//   time - laiku nuo 18:00 iki 22:00 atsitiktinai. 
//     prasidėti gali pagal **:00 arba **:30 laikais, pvz. :
//       18:00, 18:30, ... , 21:30, 22:00
//   location - atsitiktina vieta iš |2.| punkte sukurtų vietų masyvo
//   team1 - atsitiktina komanda iš parametru paduoto komandų masyvo
//   team2 - atsitiktina komanda iš parametru paduoto komandų masyvo
//   score - '' (Reneruojant paliekama tuščia)

// 4. Parašykite funkciją [print_match] kuri spausdina rungtynes. (sugalvoti savo dizainą)
//   Jeigu rungtynės dar neįvyko - spausdinti "Neįvyko"
//   Jeigu rungtynės įvyko spausdinti reikšmę esančią raktu "score"

// 5. Parašykite funkciją[complete_match], kuri atsitiktiniu būdu nustato rungtynių rezultatą:
//   Rungtynių rezultatas turi būti sudarytas iš dviejų atsitiktinių skaičiu nuo 50 iki 160 atskirtų ':' pvz.:
//     "78:64", "52:144", "69:69" ir t.t.

// 6. Sukurkite funkciją [assign_score_to_players], kuri atsitiktiniu būdu išdelioja taškus žaidėjams komandoje.
//   Sukūrę funkciją, panaudokite |5| punkte aprašytoje funkcijoje[complete_match].