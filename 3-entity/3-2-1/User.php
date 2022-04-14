<?php

class User
{
  /** @var string */
  private $name;

  public function __construct(string $name)
  {
    $this->changeName($name);
  }

  public function changeName(string $name): void
  {
    if ($name === null) throw new Exception('name === null');
    if (strlen($name) < 3) throw new Exception('name < 3');
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}


$user = new User('ta');