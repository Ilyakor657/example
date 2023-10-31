<?php
abstract class Shape {
  protected $color;

  public function __construct($color) {
    $this->color = $color;
  }

  abstract public function draw();
}

class Circle extends Shape {
  public function draw() {
    echo "Рисуем круг, цвет: ".$this->color->fill()."";
  }
}

class Square extends Shape {
  public function draw() {
    echo "Рисуем квадрат, цвет: ".$this->color->fill()."";
  }
}