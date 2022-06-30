<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';

use Model\ActiveRecord;

//Conectar db y asignar a las instacias de propiedad
ActiveRecord::setDB(conectarDB());
