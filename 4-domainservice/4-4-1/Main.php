<?php
class UserId
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
      if ($value === null) throw new Exception('null');
      if (strlen($value) < 3) throw new Exception('name < 3');
    }

    public function getValue()
    {
      return $this->value;
    }
}
class UserName
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
      if ($value === null) throw new Exception('null');

      $this->value = $value;
    }

    public function getValue()
    {
      return $this->value;
    }
}

class User
{
    /** @var UserName */
    private $name;

    /** @var UserId */
    private $id;

    public function __construct(UserName $name)
    {
        if ($name === null) throw new Exception('errror');
        $this->name = $name;
        $this->id = new UserId(uniqid(rand().'_'));
    }

    public function getUserName()
    {
        return $this->name;
    }

    public function getUserId()
    {
        return $this->id;
    }
}

class UserService
{
    public function exists(User $user): bool
    {
        // dbに問い合わせる処理
        return true;
    }
}

$user = new User(
  new UserName('test-user')
);
$usereSerVice = new UserService();
echo $usereSerVice->exists($user);
