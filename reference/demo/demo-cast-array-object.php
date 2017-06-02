<?php
$tableau = [
    'mona' => "hinhin",
    'benoit' => 'ouaiiiiiis'
];
var_dump((object) $tableau);

$objet = new stdClass();
$objet->mona = "hinhin";
$objet->benoit = 'ouaiiiiiis';

var_dump((array) $objet);
