<?php 
function e($value):string{
    return htmlspecialchars($value, ENT_QUOTES, true);
}