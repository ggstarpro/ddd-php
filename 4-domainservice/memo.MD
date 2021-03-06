# 4-1 サービスが指し示すもの
ドメイン駆動設計でえは大きく分けて２つ
* ドメインのためのサービス「ドメインサービス」
* アプリケーションのためのサービス「アプリケーションサービス」
# 4-2 ドメインサービスとは
値オブジェクト・エンティティなどのドメインオブジェクトにはふるまいが記述されるが、不自然になってしまうものがある。
この不自然さを解決するオブジェクトのことである。
# 4-2-1 不自然なふるまいを確認する
ユーザ名の重複を許可しない。このふるまいはどこに記述されるべきでしょうか？
4-2-1のように地震が重複しているかどうかを自身に依頼した時結果はどうなるかは開発者を惑わせる。
こういった不自然さを解消するために利用するのがドメインサービスです。
# 4-2-2 不自然さを解決するオブジェクト
ドメインサービスは値オブジェクトやエンティティと異なり自身の振る舞いを変更するようなインスタンス特有の状態を持たないオブジェクトです。

値オブジェクトやエンティティに定義すると不自然に感じる楚王さはドメインサービスに定義することで、不自然さは解消されます。

# 4-3 ドメインサービスの濫用が行き着く先
重要なのは「不自然なふるまい」に限定すること。
考えなしにドメインサービスにふるまいを書けばドメインオブジェクトはデータを保持するだけの無口なオブジェクトとなってしまいます。これはドメインモデル貧血症と呼ぶ。

# 4-3-1 可能な限りドメインサービスを避ける
全てのふるまいはドメインサービスに移設できてしまうが、それをすると貧血症になってしまう。
ふるまいをどこに書いたらいいか迷った場合、まずはエンティティや値オブジェクトに定義しましょう。

# 4-4 エンティティや値オブジェクトと共にユースケースを組み立てる
ドメインサービスはエンティティや値オブジェクトと共に組み合わせて利用されます。
利用例4-4-1で見てみましょう。

# 4-4-1 ユーザエンティティの確認
ユーザ名の重複にはDBへの問い合わせが必要。
そのためUserServiceの重複確認処理はデータストアの操作に終始している。
例えばDBが変わったらユーザ作成の本質は変わっていないのにコードの変更が必要。
この問題はリポジトリというパターンで解決できる。

# 物流システムに見るドメインサービスの例
ドメインサービスはデータストアと言ったインフラストラクチャが絡まないドメインオブジェクトの操作に徹したものが存在します。

物流拠点 =輸送=> 物流拠点 =配送=> 配送先

# 4-5-1 物流拠点のふるまいとして定義する
```
// 物流拠点エンティティ
class PhysicalDistributionBase
{
    public function ship(Bagage $baggage): Baggage
    {

    }
    public function receive(Bagage $baggage): Baggage
    {

    }

    public function transport(PhysicalDistributionBase $to, Bagage $baggage)
    {
        $shippedBaggage = Ship($baggages);
        to.Recive($shippedBaggage);

        // 配送の記録
    }
}
```
物流拠点には出庫(ship)と入庫(recive)のふるまいがあります。
輸送処理はどこに記述すべきでしょうか？
物流拠点に書いた場合、物流拠点が他の物流拠点に直接荷物を渡すと言うのは少しぎこちなさを感じます、
また、配送記録が必要となる場合もあります。それらが物流拠点オブジェクトによって執り行なわれるのは不自然です。

# 4-5-2 輸送ドメインサービスを定義する　
```
class TransportService
{
    public function transport(PhysicalDistributionBase $to, Bagage $baggage)
    {
        $shippedBaggage = Ship($baggages);
        to.Recive($shippedBaggage);

        // 配送の記録
    }
}
```
輸送という概念は特定オブジェクトのふるまいとすると不都合がある振る舞いのようです。
輸送を執り行うドメインサービスとすると違和感がない。
このように、オブジェクトの定義としておさまらない場合、ドメインサービスとして切り出すのはあり。