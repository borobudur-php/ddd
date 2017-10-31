<?php
/**
 * This file is part of the Borobudur package.
 *
 * (c) 2017 Borobudur <http://borobudur.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Borobudur\Component\Ddd;

use Borobudur\Component\Ddd\Lock\LockingInterface;
use Borobudur\Component\Identifier\Identifier;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
interface RepositoryInterface
{
    /**
     * Find an entity from specified identifier.
     *
     * @param Identifier            $id
     * @param LockingInterface|null $lockMode
     *
     * @return Model|mixed|null
     */
    public function find(Identifier $id, LockingInterface $lockMode = null): ?Model;

    /**
     * Find an entity from specified criteria.
     *
     * @param array      $criteria
     * @param array|null $orderBy
     *
     * @return Model|mixed|null
     */
    public function findOneBy(array $criteria, array $orderBy = null): ?Model;

    /**
     * Find models by a set of criteria.
     *
     * @param array      $criteria
     * @param array|null $orderBy
     * @param int|null   $limit
     * @param int|null   $offset
     *
     * @return CollectionInterface|Model[]|mixed
     */
    public function findAllBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null): CollectionInterface;

    /**
     * Find all entities from this repository.
     *
     * @return CollectionInterface|Model[]|mixed
     */
    public function findAll(): CollectionInterface;

    /**
     * Save model to persistent storage.
     *
     * @param Model $model
     */
    public function save(Model $model): void;
}
