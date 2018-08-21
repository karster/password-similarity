<?php

namespace karster\security\tests;

use karster\security\CryptAlgorithm;
use karster\security\PasswordSimilarity;
use PHPUnit\Framework\TestCase;

class PasswordSimilarityTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $old_password
     * @param $new_password
     * @param $expect
     * @throws \Exception
     */
    public function testSha1($old_password, $new_password, $expect)
    {
        $password = new PasswordSimilarity(CryptAlgorithm::SHA1);
        $hash = sha1($old_password);

        $this->assertSame($expect, $password->isSimilar($new_password, $hash));
    }

    /**
     * @dataProvider dataProvider
     *
     * @param $old_password
     * @param $new_password
     * @param $expect
     * @throws \Exception
     */
    public function testBcrypt($old_password, $new_password, $expect)
    {
        $password = new PasswordSimilarity(CryptAlgorithm::BCRYPT);
        $hash = password_hash($old_password, PASSWORD_BCRYPT);

        $this->assertSame($expect, $password->isSimilar($new_password, $hash));
    }

    /**
     * @dataProvider dataProvider
     *
     * @param $old_password
     * @param $new_password
     * @param $expect
     * @throws \Exception
     */
    public function testMd5($old_password, $new_password, $expect)
    {
        $password = new PasswordSimilarity(CryptAlgorithm::MD5);
        $hash = md5($old_password);

        $this->assertSame($expect, $password->isSimilar($new_password, $hash));
    }

    /**
     * @dataProvider dataProvider
     *
     * @param $old_password
     * @param $new_password
     * @param $expect
     * @throws \Exception
     */
    public function testSha256($old_password, $new_password, $expect)
    {
        $password = new PasswordSimilarity(CryptAlgorithm::SHA256);
        $hash = hash('sha256', $old_password);

        $this->assertSame($expect, $password->isSimilar($new_password, $hash));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            ['plain text', 'plain text', true],
            ['foo', 'Foo', true],
            ['bar', 'BAR', true],
            ['FoO', '3FoO1', true]
        ];
    }
}