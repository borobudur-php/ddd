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

namespace Borobudur\Component\Ddd\Exception;

use Borobudur\Component\Exception\Exception;
use Throwable;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class ModelNotFoundException extends Exception
{
    /**
     * @var string
     */
    protected $modelClass;

    /**
     * @var array
     */
    protected $ids;

    /**
     * @var string
     */
    protected $format = '%model% with id [%ids] was not found';

    public function __construct(string $modelClass, array $ids, Throwable $previous = null)
    {
        $this->modelClass = $modelClass;
        $this->ids = $ids;
        $params = [];

        if (null !== $this->params) {
            $params = ['ids' => implode(', ', $ids)];
        }

        parent::__construct($this->format, $params, 404);
    }

    protected static function underscore(string $text): string
    {
        return strtolower(
            preg_replace(
                ['/([A-Z]+)([A-Z][a-z])/', '/([a-z\d])([A-Z])/'],
                ['\\1_\\2', '\\1_\\2'],
                str_replace('_', '.', $text)
            )
        );
    }

    protected function getModelName(): string
    {
        return self::underscore(
            substr($this->modelClass, strrpos($this->modelClass, '\\'))
        );
    }
}
