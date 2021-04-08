<?php
function personNameVal($str){
    if(preg_match("/^[a-zA-Z ]+$/",$str) and strlen($str)>=3 and strlen($str)<=30){
        return true;
    }
    else{
        return false;
    }
}

function phoneVal($str){
    if(preg_match("/^[06789][0-9]+$/",$str) and strlen($str)>=10 and strlen($str)<=15){
        return true;
    }
    else{
        return false;
    }
}

function emailVal($str){
    if(preg_match("/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/",$str) and strlen($str)>=3 and strlen($str)<=50){
        return true;
    }
    else{
        return false;
    }
}

function entityNameVal($str){
    if(preg_match("/^[a-zA-Z ]{3,50}$/",$str) and strlen($str)>=3 and strlen($str)<=50){
        return true;
    }
    else{
        return false;
    }
}

function numberOnlyVal($str){
    if(preg_match("/^[0-9]+$/",$str)){
        return true;
    }
    else{
        return false;
    }
}

function usnVal($str){
    if(preg_match("/^[0-9a-zA-Z]+$/",$str) and strlen($str)>=3 and strlen($str)<=15){
        return true;
    }
    else{
        return false;
    }
}

function pinVal($str){
    if(preg_match("/^[1-9][0-9]{5}$/",$str) and strlen($str)==6){
        return true;
    }
    else{
        return false;
    }
}

function passwordMatch($passOne,$passTwo){
    if($passOne==$passTwo)
        return true;
    return false;
}
?>