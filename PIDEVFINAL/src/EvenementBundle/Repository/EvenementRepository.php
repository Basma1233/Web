<?php

namespace EvenementBundle\Repository;

/**
 * EvenementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EvenementRepository extends \Doctrine\ORM\EntityRepository
{
    public function statistique_participer()
    {

        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = "SELECT count(idUser) as nombre,e.titre FROM `reservation` r INNER JOIN evenement e WHERE r.idevenement=e.id GROUP by e.titre";

        try {
            $stmt = $conn->prepare($sql);
        } catch (DBALException $e) {
        }
        $stmt->execute();
        return $stmt->fetchAll();

    }
}
