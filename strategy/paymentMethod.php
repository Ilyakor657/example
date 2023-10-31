<?php
interface Payment {
  public function pay($amount);
}

class Card implements Payment {
  private $cardNumber;

  public function __construct($cardNumber) {
    $this->cardNumber = $cardNumber;
  }

  public function pay($amount) {
    echo "Оплачено $amount c карты: {$this->cardNumber}";
  }
}

class PayPal implements Payment {
  private $email;

  public function __construct($email) {
    $this->email = $email;
  }

  public function pay($amount) {
    echo "Оплачено $amount через PayPal (email: {$this->email})";
  }
}