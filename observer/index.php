<?php
interface Observer {
  public function notify($state);
}

class Order {
  private $observers = [];
  private $state;

  public function subscribe($observer) {
    $this->observers[] = $observer;
  }

  public function setState($state) {
    $this->state = $state;
    $this->trigger();
  }

  public function trigger() {
    foreach ($this->observers as $observer) {
      $observer->notify($this->state);
    }
  }
}

class ConcreteObserver implements Observer {
  private $name;

  public function __construct($name) {
    $this->name = $name;
  }

  public function notify($state) {
    echo "Пользователь, {$this->name}, появилась новая заявка от {$state}<br>";
  }
}

$newOrder = new Order();

$manager = new ConcreteObserver('Молодой');
$admin = new ConcreteObserver('Пожилой');

$newOrder->subscribe($manager);
$newOrder->subscribe($admin);

$newOrder->setState('GG');
$newOrder->setState('WP');