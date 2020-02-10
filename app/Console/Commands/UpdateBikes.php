<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateBikes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
        $ftp = Storage::createFtpDriver([
            'host'      => '51.83.69.192',
            'username'  => 'gsvftp2020',
            'password'  => 'Gsv2020ftp!',
            'port'      => 21,
            'timeout'   => 30
        ]);

        // $filename       = "Suivi_CIC_".date('Ymd') . ".CSV";
        // $filename       = "Suivi_CIC_20200128.CSV";
        // $filecontent    =  $ftp->get($filename);
        // Storage::disk('local')->put('SERIALS.CSV', $filecontent);
        // $path = storage_path('app/SERIALS.CSV');
    }
}
