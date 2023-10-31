<?php
require_once 'schedule.php';

class ScheduleBuilder {
  private $period;
  private $rate;
  private $dateOpen;
  private $amount;

  public function setPeriod($period) {
    $this->period = $period;
    return $this;
  }

  public function setRate($rate) {
    $this->rate = $rate;
    return $this;
  }

  public function setDateOpen($dateOpen) {
    $this->dateOpen = $dateOpen;
    return $this;
  }

  public function setAmount($amount) {
    $this->amount = $amount;
    return $this;
  }

  public function buildSchedule() {
    return new Schedule($this->period, $this->rate, $this->dateOpen, $this->amount);
  }
}