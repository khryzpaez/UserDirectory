<?php
echo exec('composer install');
require "start.php";
use \App\Classes\CustomerData\CustomerData;
require "app/Classes/CustomerData.php";
require "app/Database/CountryMigration.php";
require "app/Database/UserMigration.php";
require "app/Database/ContactMigration.php";

CustomerData::populateCountries();
CustomerData::populateUsers();
echo "Se ha instalado el proyecto";