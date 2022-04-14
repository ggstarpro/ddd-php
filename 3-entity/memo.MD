# 3-1 エンティティとは
値オブジェクトとの違いは「属性ではなく同一性」によって識別されるか否か
例えば体重や身長趣味といった変化するものによってその人が別人になることはない。

# 3-2 エンティティの性質
* 可変である
* 同じ属性であっても区別される
* 同一性により区別される

# 3-2-1 可変である
Userオブジェクトは下記のように無味無色のセッターによってユーザ名の交換を行わず、
振る舞いを通じて属性を変更します。(必要に応じてで良い。)
```
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
```

# 3-2-2 同じ属性であっても区別される
氏名が全く同じ人間でも同一人物でない。(属性だけでは区別されない。)
区別するためには、識別子を利用します。