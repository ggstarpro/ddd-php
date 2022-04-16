# 5-1 リポジトリとは
リポジトリはデータの保管庫。
ソフトウェア上にドメインの概念を表現しただけでは、アプリケーションとして成り立たない。
特にエンティティはライフサイクルのあるオブジェクトなので、プログラム終了したからと言って消えてはまずい。
リポジトリはデータを永続化し再構築すると言った処理を抽象的に扱うためのオブジェクトです。
リポジトリにインスタンスの永続化を依頼し、またインスタンスを再構築したいときもリポジトリにデータの再構築を依頼します。
値オブジェクト・エンティティ <==> リポジトリ <==> データストア

# 5-2 リポジトリの責務
リポジトリの責務はドメインオブジェクトの永続化や再構築を行うこと。
永続化はリレーショナルデータベース・ファイル・NoSQLデータベースなど。

# 5-3 リポジトリのインターフェース
リポジトリの責務はあくまでオブジェクトの永続化(インスタンスを保存し、復元できるようにすること)なので重複チェックを目的とするExistsメソッドをリポジトリに実装すると言うのはダメです。
重複チェックはドメインルールに近く、リポジトリに実装すると言うのは責務として相応しくない。
重複チェックはあくまで、ドメインサービスが「主体」となって行うべきです。
ドメインサービスにインフラストラクチャにまつわる処理を嫌って、リポジトリに重複確認を定義する場合。
具体的な重複確認のキーを渡すようにすると良いでしょう。
```
<?php
interface IUserRepository
{
    public function save(User $user): void;
    public function find(UserName $user): User;
    // public function exsits(User $user): bool;
    public function exsits(UserName $name): bool;
}

class UserService
{
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function exsits(User $user)
    {
        // ユーザ名により重複確認するという知識は失われている
        return $this->userRepository->exsits();
    }
}

```