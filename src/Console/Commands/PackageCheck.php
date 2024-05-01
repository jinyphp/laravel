<?php
namespace Jiny\Laravel\Console\Commands;

use Illuminate\Console\Command;

class PackageCheck extends Command
{
    protected $signature = 'package:check {packageName}';

    protected $description = 'Check if a package is installed';

    public function handle()
    {
        $packageName = $this->argument('packageName');

        $composerJson = json_decode(file_get_contents(base_path('composer.json')), true);

        $dependencies = $composerJson['require'];

        if (isset($dependencies[$packageName])) {
            $this->info("The package '{$packageName}' is installed.");
        } else {
            $this->error("The package '{$packageName}' is not installed.");
        }
    }
}
