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

namespace Borobudur\Component\Ddd\Lock;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
final class PessimisticLock implements LockingInterface
{
    public const WRITE = 1;
    public const READ = 2;

    /**
     * @var int
     */
    private $mode;

    public function __construct(int $mode)
    {
        if (!in_array($mode, [self::WRITE, self::READ])) {
            throw new \InvalidArgumentException(
                sprintf('Lock mode "%d" not supported', $mode)
            );
        }

        $this->mode = $mode;
    }

    public function getMode(): int
    {
        return $this->mode;
    }
}

