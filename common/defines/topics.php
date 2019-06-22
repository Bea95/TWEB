<?php
/**
 * Created by PhpStorm.
 * User: owlita
 * Date: 1/02/19
 * Time: 20:48
 */

define ('ANIMALS', 'img/topics/animals.png');
define ('ART', 'img/topics/art.png');
define ('COMPUTER', 'img/topics/computer.png');
define ('LITERATURE', 'img/topics/literature.png');
define ('NATURE', 'img/topics/nature.png');
define ('SPORT', 'img/topics/sport.png');
define ('TRAVEL', 'img/topics/travel.png');


function recoverTopic($topic)
{
    static $topics = array(ANIMALS => "ANIMALS", ART => "ART", COMPUTER => "COMPUTER", LITERATURE => "LITERATURE", NATURE => "NATURE", SPORT => "SPORT", TRAVEL => "TRAVEL");
    $result =  $topics[$topic];
    if($result != ""){
        return $result;
    }else{
        return $topic;
    }
}