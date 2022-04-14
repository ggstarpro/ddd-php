<?php

class UserId
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
      $this->value = $value;
    }

    public function getValue()
    {
      return $this->value;
    }
}


class User
{
    /** @var string */
    private $name;

    /** @var UserId */
    public function __construct(UserId $userId, string $name)
    {
      $this->userId = $userId;
      $this->name = $name;
    }

    public function getUserId()
    {
      return $this->userId;
    }
}


$userId = new UserId('12345');
$user = new User($userId, 'ta');
echo $user->getUserId()->getValue();