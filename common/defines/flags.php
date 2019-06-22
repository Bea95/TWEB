<?php
/**
 * Created by PhpStorm.
 * User: owlita
 * Date: 1/02/19
 * Time: 0:04
 */

define ('SPANISH', 'img/flags/spain.png');
define ('ITALIAN', 'img/flags/italy.png');
define ('GERMAN', 'img/flags/germany.png');
define ('FRENCH', 'img/flags/france.png');
define ('ENGLISH_UK', 'img/flags/uk.png');
define ('ENGLISH_USA', 'img/flags/usa.png');
define ('JAPANESE', 'img/flags/japon.png');



function recoverLanguage($language)
{
    static $languages = array(SPANISH => "SPANISH", ITALIAN => "ITALIAN", GERMAN => "GERMAN", FRENCH => "FRENCH", ENGLISH_UK => "ENGLISH_UK", ENGLISH_USA => "ENGLSIH_USA", JAPANESE => "JAPANESE");
    $result = $languages[$language];

    if($result != ""){
        return $result;
    }else{
        return $language;
    }
}
?>