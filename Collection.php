<?php
/**
 * This file is part of the Borobudur package.
 *
 * (c) 2018 Borobudur <http://borobudur.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Borobudur\Component\Ddd;

use Borobudur\Component\Collection\Collection as BaseCollection;
use Borobudur\Component\Identifier\Identifier;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class Collection extends BaseCollection implements CollectionInterface
{
    /**
     * {@inheritdoc}
     */
    public function find(Identifier $id): ?Model
    {
        $filtered = $this->filter(
            function (Model $model) use ($id) {
                return $model->getId()->equals($id);
            }
        );

        if ($filtered->count()) {
            return $filtered->first();
        }

        return null;
    }
}
