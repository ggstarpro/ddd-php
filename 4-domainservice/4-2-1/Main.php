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
class UserName
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
    public function __construct(UserId $id, UserName $name)
    {
        if ($id === null) throw new Exception('error');
        if ($name === null) throw new Exception('errror');
        $this->id = $id;
        $this->name = $name;
    }
    public function Exists(User $user): bool
    {
      // 重複確認処理
      return true;
    }
}

$userId = new UserId('id');
$userName = new UserName('tanaka');
$user = new User($userId, $userName);
$duplicateCheckResult = $user->Exists($user);
echo $duplicateCheckResult;