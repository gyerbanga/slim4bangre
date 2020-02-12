<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Data\UserData;
use DomainException;
use PDO;

/**
 * Repository.
 */
class UserReaderRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get user by the given user id.
     *
     * @param int $id_tech The user id
     *
     * @throws DomainException
     *
     * @return UserData The user data
     */
    public function getUserById(int $id_tech): UserData
    {
        $sql = "SELECT id_tech, nom, prenom,  email FROM inno_ta_technicien WHERE id_tech = :id_tech;";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id_tech' => $id_tech]);

        $row = $statement->fetch();

        if (!$row) {
            throw new DomainException(sprintf('User not found: %s', $id_tech));
        }

        // Map array to data object
        $user = new UserData();
        $user->id_tech = (int)$row['id_tech'];
        $user->nom = (string)$row['nom'];
        $user->prenom = (string)$row['prenom'];
        /*$user->lastName = (string)$row['last_name'];*/
        $user->email = (string)$row['email'];

        return $user;
    }
}