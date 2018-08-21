<?php

namespace karster\security;

class CryptAlgorithm
{
    const BCRYPT = 'bcrypt';

    const MD5 = 'md5';

    const SHA1 = 'sha1';

    const SHA256 = 'sha256';

    /**
     * @param string $algorithm
     * @return bool
     */
    public static function isValid(string $algorithm): bool
    {
        return in_array($algorithm, [
            static::BCRYPT,
            static::MD5,
            static::SHA1,
            static::SHA256
        ]);
    }
}