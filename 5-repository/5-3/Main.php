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
