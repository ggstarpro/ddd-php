<?php

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

class UserService
{
    public function exsits(User $user): bool
    {
      // 省略
      return true;
    }
}