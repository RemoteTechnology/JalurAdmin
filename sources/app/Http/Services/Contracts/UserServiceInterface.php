<?php

namespace App\Http\Services\Contracts;
use App\Models\User;
use \Illuminate\Http\UploadedFile;

interface UserServiceInterface
{
    public function create(array $user, UploadedFile|null $request_files, string $mode): User;
    public function send_code(string $phone): array;
    public function auth(User $user, string $secret, string $mode): ?array;
    public function logout(User $user, string $mode): void;
    public function findById(int $id): ?User;
    public function findByPhone(string $phone): ?User;
    public function update(User $user, array $request, UploadedFile|null $request_files=null): ?User;
    public function resetToPassword(User $user): User;
}
