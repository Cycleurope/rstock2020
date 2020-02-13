<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;


class UpdateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mise à jour du fichier de stocks';

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

        $filename       = "public/export_products_".date('Ymd') . ".csv";
        $filecontent    = $ftp->get($filename);
        Storage::disk('local')->put('products.csv', $filecontent);
        $path = storage_path('app/products.csv');

        Excel::import(new ProductsImport, $path);

    }
}
