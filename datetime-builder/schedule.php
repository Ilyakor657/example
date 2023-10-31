<?php
require_once 'dateException.php';

class Schedule {
  private $payments = [];
  private $key = 0;
  private $number = 0;
  private $dateLast;
  private $dateNext;
  private $balance;
  private $percent;
  private $amountPayment;
  private $period;
  private $rate;
  private $debt;

  public function __construct($period, $rate, $dateOpen, $amount) {
    $this->period = $period;
    $this->rate = $rate;
    $this->dateLast = new DateTime();
    $this->dateNext = new DateTime($dateOpen);
    $this->balance = round($amount, 2);
    $rateMonth = $rate/(100*12);
    $this->amountPayment = round((
      $amount*(($rateMonth*pow((1 + $rateMonth), $period))/
      (pow((1 + $rateMonth), $period) - 1))
    ), 2);
  }

  public function monthlyPayments() {
    for ($i = 0; $i < $this->period; $i++) {
      $this->key++;
      $this->number++;
      $this->dateLast = $this->dateLast->setDate(
        $this->dateNext->format('Y'), 
        $this->dateNext->format('m'), 
        $this->dateNext->format('d')
      );
      $dateNew = new DateTime(DateException::dateException($this->dateNext->modify('+1 month')->format('Y-m-d')));
      $this->dateNext = $this->dateNext->setDate(
        $dateNew->format('Y'), 
        $dateNew->format('m'), 
        $dateNew->format('d')
      );
      if ($this->dateLast->format('Y') != $this->dateNext->format('Y')) {
        $dayInYear1 = $this->dateLast->format('L') == 1 ? 366 : 365;
        $differenceDay1 = $this->dateLast->diff(new DateTime(''.$this->dateLast->format('Y').'-12-31'))->days;
        $percent1 = round(((($this->balance*($this->rate/100))/$dayInYear1)*$differenceDay1), 2);
        $dayInYear2 = $this->dateNext->format('L') == 1 ? 366 : 365;
        $differenceDay2 = $this->dateNext->diff(new DateTime(''.$this->dateLast->format('Y').'-12-31'))->days;
        $percent2 = round(((($this->balance*($this->rate/100))/$dayInYear2)*($differenceDay2)), 2);
        $this->percent = round(($percent1 + $percent2), 2);
      } else {
        $dayInYear = $this->dateNext->format('L') == 1 ? 366 : 365;
        $differenceDay = $this->dateLast->diff($this->dateNext)->days;
        $this->percent = round(((($this->balance*($this->rate/100))/$dayInYear)*$differenceDay), 2);
      }
      if ($i == ($this->period - 1)) {
        $this->amountPayment = round(($this->balance + $this->percent), 2);
        $this->debt = $this->balance;
      } else {
        $this->debt = round(($this->amountPayment - $this->percent), 2);
        $this->balance = round(($this->balance - $this->debt), 2);
      }
      $payment = [
        "key" => $this->key,
        "number" => $this->number,
        "date" => $this->dateNext->format('d.m.Y'),
        "amountPayment" => number_format($this->amountPayment, 2, ',', ' '),
        "percent" => number_format($this->percent, 2, ',', ' '),
        "debt" => number_format($this->debt, 2, ',', ' ')
      ];
      array_push($this->payments, $payment);
    }
    return var_dump($this->payments);
  }
}