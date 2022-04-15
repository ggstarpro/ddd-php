<?php

class FullName
{
  /** @var string */
  private $name;

  public function __construct(string $firstName, string $lastName)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }

  public function equals(FullName $other): bool
  {
    return $this->firstName === $other->firstName
      && $this->lastName === $other->lastName;
  }
}


$user1 = new FullName('a', 'b');
$user2 = new FullName('a', 'b');
$user3 = new FullName('a', '');

echo '>';
echo $user1->equals($user2);
echo '>>';
echo $user1->equals($user3);