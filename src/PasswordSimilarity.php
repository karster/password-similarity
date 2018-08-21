<?php

namespace karster\security;

use karster\security\hashes\HashInterface;

class PasswordSimilarity
{
    /**
     * @var HashInterface
     */
    private $hashAlgorithm;

    /**
     * PasswordSimilarity constructor.
     * @param string $hashAlgorithm
     * @throws \Exception
     */
    public function __construct(string $hashAlgorithm)
    {
        if (!CryptAlgorithm::isValid($hashAlgorithm)) {
            throw new \Exception('Invalid hash algorithm');
        }

        $class = 'karster\security\hashes\\' . ucfirst($hashAlgorithm);
        $this->hashAlgorithm = new $class();
    }

    /**
     * @param string $new_password
     * @param string $old_password_hash
     * @return bool
     */
    public function isSimilar(string $new_password, string $old_password_hash): bool
    {
        $variations = $this->generateVariations($new_password);
        foreach ($variations as $variation) {
            $hash = $this->hashAlgorithm->hash($variation);
            if ($this->hashAlgorithm->compare($old_password_hash, $hash)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $password
     * @return array
     */
    private function generateVariations(string $password): array
    {
        return [
            $password,
            mb_strtolower($password, 'UTF-8'),
            mb_strtoupper($password, 'UTF-8'),
            trim($password, "1..9")
        ];
    }
}