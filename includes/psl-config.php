<?php

// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////  LOCALHOST ///////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
define("HOST", "localhost"); 			// The host you want to connect to. 
define("USER", "root"); 			// The database username. 
define("PASSWORD", ""); 	// The database password. 
define("DATABASE", "lux");             // The database name.
$hostname = 'localhost';
$database = 'lux';
$username = 'root';
$password = '';
$database = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8",$username,$password);



// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////// VARIABLES  ///////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // change paramettre de URL HOSTING
        // $url = "http://localhost/lux/";
        $url = "https://matelaslux.elbossinmobiliaria.es/";
        $hostingUrlimage="imgs";
        $ImageDefault="645dsfssd65f98sdf5sd6f5ssfsddsff.png";
        $SymbolDinar = "DZD";
        $SymbolSub = "m²";
        // $emailhosting = "omar01031962@gmail.com";
        $emailhosting = "zs7@gcloud.ua.es";
        $Adresse = "PFX7+9FR, Boumerdes, Algerie";
        $telsystem = '0550693200';


        // cripting
        $crypting = 'AES-256-CBC';
        $key = "siphax";
        $iv = '1234567812345678';

        
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////// ACCES ADMINS  ////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $Admin1='KH1';
        $Admin2='KH2';
        $Admin3='SF';
        $Admin4='YOUVA';
        $Admin5='AM';










/**
 * Who can register and what the default role will be
 * Values for who can register under a standard setup can be:
 *      any  == anybody can register (default)
 *      admin == members must be registered by an administrator
 *      root  == only the root user can register members
 * 
 * Values for default role can be any valid role, but it's hard to see why
 * the default 'member' value should be changed under the standard setup.
 * However, additional roles can be added and so there's nothing stopping
 * anyone from defining a different default.
 */
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

/**
 * Is this a secure connection?  The default is FALSE, but the use of an
 * HTTPS connection for logging in is recommended.
 * 
 * If you are using an HTTPS connection, change this to TRUE
 */
define("SECURE", true);    // For development purposes only!!!!






