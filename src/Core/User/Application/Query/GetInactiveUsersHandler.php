<?php

namespace App\Core\User\Application\Query;

use App\Core\User\Domain\Repository\UserRepositoryInterface;
use App\Core\User\Domain\User;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class GetInactiveUsersHandler
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {}

    public function __invoke(GetInactiveUsersQuery $query): array
    {
        $inactiveUsers = $this->userRepository->findInactiveUsers();

        return array_map(function (User $user) {
            return $user->getEmail();
        }, $inactiveUsers);
    }
}