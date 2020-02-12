<?php

namespace App\Domain\User\Service;

use App\Domain\User\Data\UserData;
use App\Domain\User\Repository\UserReaderRepository;
use UnexpectedValueException;

/**
 * Service.
 */
final class UserReader
{
    /**
     * @var UserReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserReaderRepository $repository The repository
     */
    public function __construct(UserReaderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Read a user by the given user id.
     *
     * @param int $userId The user id
     *
     * @throws UnexpectedValueException
     *
     * @return UserData The user data
     */
    public function getUserDetails(int $id_tech): UserData
    {
        // Validation
        if (empty($id_tech)) {
            throw new UnexpectedValueException('User ID required');
        }

        $user = $this->repository->getUserById($id_tech);

        return $user;
    }
}