<?php

namespace karster\security\hashes;

class Md5 implements HashInterface
{
    /**
     * @param string $password
     * @return string
     */
    public function hash(string $password): string
    {
        return md5($password);
    }

    /**
     * @param string $old_password_hash
     * @param string $new_password_hash
     * @return bool
     */
    public function compare(string $old_password_hash, string $new_password_hash): bool
    {
        return $old_password_hash === $new_password_hash;
    }
}