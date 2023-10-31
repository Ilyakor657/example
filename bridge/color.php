<?php
interface Color {
  public function fill();
}

class Red implements Color {
  public function fill() {
    return "красный";
  }
}

class Blue implements Color {
  public function fill() {
    return "синий";
  }
}