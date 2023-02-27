<?php

namespace Jetimob\RDStation\Tests\Feature;

use Jetimob\RDStation\Tests\AbtractTestCase;

class IntallPackageTest extends AbtractTestCase
{
    protected string $configPath;

    protected function cleanUp(): void
    {
        if (file_exists($this->configPath)) {
            unlink($this->configPath);
        }
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->configPath = config_path('rdstation.php');
        $this->cleanUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->cleanUp();
    }

    /** @test */
    public function installShouldCopyConfigFiles(): void
    {
        $this->assertFileDoesNotExist($this->configPath);

        $this->artisan('rdstation:install')
            ->expectsOutput('Arquivo de configuração copiado para ./config/rdstation.php')
            ->assertExitCode(0);

        $this->assertFileExists($this->configPath);
        $this->cleanUp();
    }

    /** @test */
    public function existingFileCanBeOverwritten(): void
    {
        $this->configPath = config_path('rdstation.php');
        file_put_contents($this->configPath, '');
        $this->assertFileExists($this->configPath);

        $command = $this->artisan('rdstation:install');
        $command->expectsQuestion('O arquivo de configuração já existe, deseja sobrescrever?', 'no');
        $command->assertExitCode(0);
    }

    /** @test */
    public function existingFileShouldBeOverwritten(): void
    {
        $this->configPath = config_path('rdstation.php');
        file_put_contents($this->configPath, '');
        $this->assertFileExists($this->configPath);

        $command = $this->artisan('rdstation:install');
        $command->expectsQuestion('O arquivo de configuração já existe, deseja sobrescrever?', 'yes');
        $command->expectsOutput('Arquivo de configuração sobrescrito');
        $command->assertExitCode(0);
    }
}
