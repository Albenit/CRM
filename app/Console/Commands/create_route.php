<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class create_route extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cr {--m=} {--u=}';

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
     * @return int
     */
    public function handle()
    {
        $file  = file(base_path('app/http/controllers/RouteController.php'));
        array_pop($file);
        $fp = fopen(base_path('app/http/controllers/RouteController.php'),'w');
        fwrite($fp, implode('',$file));
        fclose($fp);
        $routee = 'route::' . $this->option('m') . '("' . $this->option('u') . '",[RouteController::class,"' . $this->option('u') . '"])->name("' . $this->option('u') . '");' . PHP_EOL;
        $controller = 'public function ' . $this->option('u') . '(Request $req){' . PHP_EOL . PHP_EOL . '}' . PHP_EOL . '}';
        $FILE = fopen(base_path('routes/webv2.php'),"a");
        $FILE2 = fopen(base_path('app/http/controllers/RouteController.php'),"a");
        fputs($FILE,$routee);
        fputs($FILE2,$controller);
        return $this->info('ok');
    }
}
