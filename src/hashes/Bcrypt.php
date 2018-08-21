<?php

namespace karster\security\hashes;

class Bcrypt implements HashInterface
{
    /**
     * @param string $password
     * @return string
     */
    public function hash(string $password): string
    {
        return $password;
    }

    /**
     * @param string $old_password_hash
     * @param string $new_password_hash
     * @return bool
     */
    public function compare(string $old_password_hash, string $new_password_hash): bool
    {
        return password_verify($new_password_hash, $old_password_hash);
    }
}