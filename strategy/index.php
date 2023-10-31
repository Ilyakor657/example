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

class ShoppingCart {
  private $paymentMethod;

  public function setPaymentMethod($paymentMethod) {
    $this->paymentMethod = $paymentMethod;
  }

  public function checkPayment($amount) {
    $this->paymentMethod->pay($amount);
  }
}

$method = 'card'; //paypal card
$amount = 10000;

$cart = new ShoppingCart();

switch ($method) {
  case 'paypal':
    $paymentMethod = new PayPal('example@gg.com');
    break;
  case 'card':
    $paymentMethod = new Card(4567123498769182);
    break;
}

$cart->setPaymentMethod($paymentMethod);
$cart->checkPayment($amount);