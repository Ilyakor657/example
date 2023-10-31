<?php
require_once 'color.php';
require_once 'shape.php';

$red = new Red();
$blue = new Blue();

$circle = new Circle($red);
$square = new Square($blue);

$circle->draw();
$square->draw();