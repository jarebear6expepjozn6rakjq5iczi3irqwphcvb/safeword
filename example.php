<?php

require __DIR__ . '/src/SafeWord.php';

use safeword\SafeWord;

$i = new SafeWord();
print_r($i->build_slug());

//print_r($i);