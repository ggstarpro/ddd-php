# 2-1 値オブジェクトとは?
システム固有の値を表現するために定義されたオブジェクト。
```
class FullName
{
  public function __construct(string $firstName, string $lastName)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }

  public function getFirstName()
  {
    return $this-firstName;
  }

  public fucntion getLastName()
  {
    return $this->lastName;
  }
}
```
# 2-2 値の性質と値オブジェクトの実装
* 不変である
* 交換が可能である
* 等価性によって比較される

# 2-2-1 不変である
FullNameは不変にすべきです。
値を変更するための振る舞いであるChangeLastNameメソッドはFUllNameに定義されるものではありません。
$fullName = ne FullName("jun", 'naruse');
$fullName.ChangeLastName('satou');

# 2-2-2 交換が可能である
値は不変ですが、値を変更することは必要です。
$num = 0;
$num = 1;
$fullName = new FullName("masanobu", "naruse");
$fullName = new FullName("masanobu", "satou");
上おきは
値オブジェクトが不変であるため、代入操作による交換以外の手段で変更を表現できない。

# 2-2-3 等価性によって比較される
・ 属性によって比較されている。
0 == 0
値オブジェクトを値と同じように比較する。
```
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
```
# 2-3 値オブジェクトにする基準
* 「そこにルールが存在しているか」
* 「それ単体で扱いたいか」
例えば、氏名は「姓と名で構成されている」
また単体でも取り扱っています。
重要なのは、値オブジェクトを避けることではなく、
すべきかどうかを見極めて、
そうすべきとするなら大胆に実行するべき。

# 2-4

