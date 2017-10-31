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

use Borobudur\Component\Collection\CollectionInterface as BaseCollection;
use Borobudur\Component\Identifier\Identifier;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
interface CollectionInterface extends BaseCollection
{
    /**
     * Gets the model from specified identifier.
     *
     * @param Identifier $id
     *
     * @return Model|mixed|null
     */
    public function find(Identifier $id): ?Model;
}
