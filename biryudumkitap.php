<?php
/*
Plugin Name: Her Gün Bir Kitap Sözü
Plugin URI: https://wordpress.org/plugins/hergunbirkitapsozu/
Description: Bir yudum kitap projesi kapsamında Wordpress için her gün bir kitap sözünü rastgele gösterene eklenti
Version: 0.1.0
Author: Fuat POYRAZ
Author URI: https://gurmewoo.com/ucretsiz-eklentiler/hergunbirkitapsozu/
*/
require_once("includes/bir-yudum-kitap.php");

$kitap = new BirYudumKitap();
$kitap->init();
