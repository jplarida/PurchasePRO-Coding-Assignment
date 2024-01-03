<?php

namespace App\Console\Commands;

use Illuminate\Database\Console\Seeds\SeederMakeCommand;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class SeederMakeCustom extends SeederMakeCommand
{

    protected $name = 'seeder:make:custom';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:make:custom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    protected function getSeederPath()
    {
        $customPath = Config::get('custom.seeder_path');
        return $customPath ? base_path($customPath) : parent::getSeederPath();
    }

    public function handle()
    {
        //
        $name = $this->argument('name') ?? $this->ask('Enter the seeder class name');

        parent::handle($name);

        $customPath = Config::get('custom.seeder_path');

        if ($customPath) {
            // Adjust the namespace based on the custom path
            $name = Str::replaceFirst($this->laravel->getNamespace(), '', $name);
            $name = rtrim($customPath, '/') . '/' . $name;
        }

        return $name;
    }

    protected function getArguments()
    {
        return parent::getArguments();
        // return [
        //     ['class', null, InputOption::VALUE_OPTIONAL, 'The name of the seeder class'],
        // ];
    }
}
