<?php
interface IUserRepositoy
{
    public function save(User $user): void;
    public function find(UserName $user): User;
}
