<?php

/*
 * This file is part of https://github.com/josantonius/php-session repository.
 *
 * (c) Josantonius <hello@josantonius.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Josantonius\Session\Exceptions;

class HeadersSentException extends SessionException
{
    public function __construct(string $file, int $line)
    {
        parent::__construct(sprintf(
            'Session->start(): The headers have already been sent in "%s" at line %d.',
            $file,
            $line
        ));
    }
}
