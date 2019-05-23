<?php

namespace InnotecScotlandLtd\ChangeToFake\Commands;

use Faker\Factory;
use Illuminate\Console\Command;

class FakeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change-to-fake {entity} {field} {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $entity = 'App\Models\\'.$this->argument('entity');
        $field = $this->argument('field');
        $type = $this->argument('type');

        $faker = Factory::create('en_GB');
        $data = $entity::all();

        foreach ($data as $item) {
            $item->update([
                $field => $faker->{$type},
            ]);
        }
    }
}
