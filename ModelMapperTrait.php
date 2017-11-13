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

use Borobudur\Component\Identifier\Identifier;
use Borobudur\Component\Mapper\ObjectMapper;
use ReflectionProperty;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
trait ModelMapperTrait
{
    /**
     * Fill the model with given data.
     *
     * @param Model  $model
     * @param object $data
     *
     * @return Model|mixed
     */
    protected function fill(Model $model, object $data): Model
    {
        $mapper = new ObjectMapper();

        return $mapper->map($model)->fill($data);
    }

    /**
     * Set the protected id value.
     *
     * @param Identifier $id
     * @param Model      $model
     */
    protected function setId(Identifier $id, Model $model): void
    {
        $prop = new ReflectionProperty(get_class($model), 'id');
        $prop->setAccessible(true);
        $prop->setValue($model, $id);
    }
}
