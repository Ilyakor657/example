<?php
require_once 'builder.php';

$builder = new ScheduleBuilder();
$schedule = $builder->setPeriod(13)->setRate(5)->setDateOpen('2023-10-21')->setAmount(100000)->buildSchedule();

$schedule->monthlyPayments();