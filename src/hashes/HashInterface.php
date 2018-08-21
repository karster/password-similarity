<?php

namespace karster\security\hashes;

interface HashInterface
{
    /**
     * @param string $password
     * @return string
     */
    public function hash(string $password): string;

    /**
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public function compare(string $old_password_hash, string $new_password_hash): bool;
}