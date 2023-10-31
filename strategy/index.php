<?php
require_once 'paymentMethod.php';

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