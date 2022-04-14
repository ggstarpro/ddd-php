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

# 3-2-1 同一性を持つ
オブジェクトには属性が異なっていても同じものと見なす必要があるもがあります。それらは、同一性により識別されるオブジェクトです。
idでみよう。

# 3-3 エンティティの判断基準としてのライフサイクルと連続性
エンティティは「ライフサイクルが存在」しそこに「連続性」が存在する場合が多い。
例として:ユーザ。ユーザは作成されてから生を受け削除されて死を迎える。
できるだけvalueobjectのままにしておくほうが良い。

# 3-4 値オブジェクトとエンティティどちらにもなりうるモデル
ソフトウェアにとっての表現方法で異なる。

# 3-5 ドメインオブジェクトを定義するメリット
エンティティと値オブジェクトは異なる性質を持ちますが、どちらもドメインモデルの表現であるドメインオブジェクトです。
・コードのドキュメント性が高まる
・ドメインにおける変更をコードに伝えやすくする

# 3-5-1 コードのドキュメント性が高まる
ソフトウェアが満たす要件を知るのに、ドキュメントが役に立たないのであれば、開発者はコードに頼ることににある。
```
class User
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
      $this->name = $name;
    }
}

class User
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
      if ($name === null) throw new Exception('name === null');
      if (strlen($name) < 3) throw new Exception('name < 3');
      $this->name = $name;
      }
}
```
# 3-5-2 ドメインにおける変更をコードに伝えやすくする
ドメインオブジェクトに振る舞いやルールを記述することは、ドメインにおける変更をコードに伝えやすくする公開があります。
