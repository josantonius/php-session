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

/**
 * You can use an exception and error handler with this library.
 *
 * @link https://github.com/josantonius/php-error-handler
 */
class SessionException extends \Exception
{
    public function __construct(string $message = 'Unknown error')
    {
        parent::__construct(rtrim($message, '.') . '.');
    }
}
