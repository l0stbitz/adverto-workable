<?php

namespace EmpireBundle\Service;

use Guff\Entity\User;
use Guff\Entity\UserRole;
use Guff\Entity\Role;

use Carbon\Carbon;

/**
 * Description of UserService
 *
 * @author Josh Murphy
 */
class UserService extends BaseService
{
    const DEFAULT_USER_ID           = 1;

    /**
     *
     * @param type $container
     */
    public function __construct($container)
    {
        parent::__construct($container);
    }

    /**
     * get the Users
     *
     * @param int $offset
     * @param array $filters
     * @param int $limit
     * @return array
     */
    public function getUsers($offset = 0, $filters = [], $limit = 10)
    {
        $users = $this->em->getRepository('EmpireBundle:User')->findBy([],
            [], $limit, $offset * $limit);

        return $users;
    }


    /**
     * @param string $role
     *
     * @return array
     */
    public function findByRole($role)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('u')
            ->from('EmpireBundle:User', 'u')
            ->join('EmpireBundle:UserRole', 'ur', 'WITH', 'u.id = ur.user')
            ->join('EmpireBundle:Role', 'r', 'WITH', 'r.id = ur.role')
            ->where('r.name LIKE :roles')
            ->setParameter('roles', '%'.$role.'%');

        return $qb->getQuery()->getResult();
    }

    /**
     * @param $user
     */
    public function clearRolesForUser($user)
    {
        $userRoles = $this->em->getRepository('EmpireBundle:UserRole')->findBy(['user' => $user]);
        foreach ($userRoles as $ur) {
            $this->em->remove($ur);
            $this->em->flush();
        }
    }

    /**
    *
    */
    public function getSitesAndCategories($user)
    {
        $userRoles = $this->em->getRepository('EmpireBundle:UserRole')->findBy(['user' => $user]);
        $sites = [];
        $cats = [];
        foreach ($userRoles as $r) {
            if (!is_null($r->getSiteId()) && !isset($sites[$r->getSiteId()])) {
                $sites[$r->getSiteId()] = $this->em->getRepository('EmpireBundle:Site')->find($r->getSiteId());
                $siteCats = $this->em->getRepository('EmpireBundle:SiteCategory')->findBy(['site'=>$r->getSiteId()]);
                foreach ($siteCats as $c) {
                    $cats[] = $c;
                }
            }
        }
        return ['sites'=>$sites,'siteCategories'=>$cats];
    }

    /**
     * @param string $role
     *
     * @return array
     */
    public function findBySiteRole($role, $siteId)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('u')
            ->from('EmpireBundle:User', 'u')
            ->join('EmpireBundle:UserRole', 'ur', 'WITH', 'u.id = ur.user')
            ->join('EmpireBundle:Role', 'r', 'WITH', 'r.id = ur.role')
            ->where('r.name LIKE :roles')
            ->andWhere('ur.siteId = :site_id')
            ->setParameter('site_id', $siteId)
            ->setParameter('roles', '%'.$role.'%');

        return $qb->getQuery()->getResult();
    }


    /**
    *
    */
    public function getVisibleAuthors($user)
    {
        $qb = $this->em->createQueryBuilder();
        $sites = $this->em
            ->createQueryBuilder()
            ->select('ur.siteId')
            ->from('EmpireBundle:UserRole', 'ur')
            ->where('ur.user = :user')
            ->andWhere('ur.siteId IS NOT NULL')
            ->setParameter('user', $user)
            ->groupBy('ur.siteId')
            ->getQuery()->getScalarResult();
        $siteIds = array_map('current', $sites);
        $sql = 'SELECT u.id, u.username, u.display_name '.
            'FROM User u '.
            'JOIN Post p ON p.author_id = u.id '.
            'WHERE p.site_id IN ('.implode($siteIds, ',').') '.
            'GROUP BY u.id';
        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
