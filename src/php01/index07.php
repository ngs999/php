<?php
function getSquareArea($base,$height){
    return $base*$height;
}
function getTriangleArea($base,$height){
    return $base*$height*0.5;
}
function getTrapezoidArea($upperBase,$lowerBase,$height){
    return ($upperBase+$lowerBase)*$height*0.5;
}

echo getSquareArea(5,5).'<br />';
echo getTriangleArea(7,8).'<br />';
echo getTrapezoidArea(4,5,4);