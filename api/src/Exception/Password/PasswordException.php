<?php

declare(strict_types=1);

namespace App\Exception\Password;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class PasswordException extends BadRequestHttpException
{
    public static function invalidLength(): self
    {
        throw new self('Password debe tener al menos 6 carácteres');
    }
}