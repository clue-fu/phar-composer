<?php

use Clue\PharComposer\Packager;

class PackagerTest extends TestCase
{
    private $packager;

    public function setUp()
    {
        $this->packager = new Packager();
    }

    /**
     * @param string $path
     * @param boolean $okay
     * @dataProvider providePackageGitCloneUrl
     */
    public function testPackageGitCloneUrl($path, $okay)
    {
        $this->assertEquals($okay, $this->packager->isPackageGitCloneUrl($path));
    }

    public function providePackageGitCloneUrl()
    {
        return $this->provideArray(array(
            'http://host/path/repo.git' => true,
            'git://user@host:path/repo.git' => true,
            __DIR__ . '/../' => true,

            'vendor/package' => false,
            'invalid' => false,
            __FILE__ => false
        ));
    }
}
