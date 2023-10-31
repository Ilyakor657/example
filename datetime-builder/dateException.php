<?php
class DateException {
  public static function dateException($date) {
    $dateNew = new DateTime($date);
    while (true) {
      $i = 0;
      if ($dateNew->format('d') <= 8 && $dateNew->format('m') == 1) {
        $dateNew = $dateNew->setDate($dateNew->format('Y'), 1, 9);
        $i = 1;
      } elseif ($dateNew->format('d') == 23 && $dateNew->format('m') == 2) {
        $dateNew = $dateNew->setDate($dateNew->format('Y'), 2, 24);
        $i = 1;
      } elseif ($dateNew->format('d') == 8 && $dateNew->format('m') == 3) {
        $dateNew = $dateNew->setDate($dateNew->format('Y'), 3, 9);
        $i = 1;
      } elseif ($dateNew->format('d') == 1 && $dateNew->format('m') == 5) {
        $dateNew = $dateNew->setDate($dateNew->format('Y'), 5, 2);
        $i = 1;
      } elseif ($dateNew->format('d') == 9 && $dateNew->format('m') == 5) {
        $dateNew = $dateNew->setDate($dateNew->format('Y'), 5, 10);
        $i = 1;
      } elseif ($dateNew->format('d') == 12 && $dateNew->format('m') == 6) {
        $dateNew = $dateNew->setDate($dateNew->format('Y'), 6, 13);
        $i = 1;
      } elseif ($dateNew->format('d') == 4 && $dateNew->format('m') == 11) {
        $dateNew = $dateNew->setDate($dateNew->format('Y'), 11, 5);
        $i = 1;
      } elseif ($dateNew->format('N') == 7) {
        $dateNew = $dateNew->modify('+1 day');
        $i = 1;
      }
      if ($i == 0) { 
        break;
      }
    }
    return $dateNew->format('Y-m-d');
  }
}