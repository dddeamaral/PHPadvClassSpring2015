<?php

function load_lib($class) {
    include 'DataObjects/'.$class . '.php';
};
spl_autoload_register('load_lib');