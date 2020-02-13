<?php

use Illuminate\Database\Seeder;
use App\Models\ProductFamily;

class ProductFamilyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $family = ProductFamily::create(['mmitgr' => 'B100', 'name' => 'CITY']);
        $family = ProductFamily::create(['mmitgr' => 'B200', 'name' => 'MTB']);
        $family = ProductFamily::create(['mmitgr' => 'B300', 'name' => 'SPORT']);
        $family = ProductFamily::create(['mmitgr' => 'B350', 'name' => 'TREKKING']);
        $family = ProductFamily::create(['mmitgr' => 'B400', 'name' => 'RACING']);
        $family = ProductFamily::create(['mmitgr' => 'B500', 'name' => 'JUNIOR']);
        $family = ProductFamily::create(['mmitgr' => 'B600', 'name' => 'OTHER']);
        $family = ProductFamily::create(['mmitgr' => 'B700', 'name' => 'EBIKE']);
        $family = ProductFamily::create(['mmitgr' => 'B710', 'name' => 'E-BIKE CITY']);
        $family = ProductFamily::create(['mmitgr' => 'B720', 'name' => 'E-BIKE SPORT']);
        $family = ProductFamily::create(['mmitgr' => 'B730', 'name' => 'E-BIKE MTB']);
        $family = ProductFamily::create(['mmitgr' => 'B740', 'name' => 'E-BIKE ROAD']);
        $family = ProductFamily::create(['mmitgr' => 'B750', 'name' => 'E-BIKE S-PEDELEC']);
        $family = ProductFamily::create(['mmitgr' => 'B760', 'name' => 'E-BIKE JUNIOR']);
        $family = ProductFamily::create(['mmitgr' => 'B770', 'name' => 'E-BIKE OTHER']);
        $family = ProductFamily::create(['mmitgr' => 'B780', 'name' => 'E-BIKE FOLDING']);
        $family = ProductFamily::create(['mmitgr' => 'B790', 'name' => 'E-BIKE CARGO']);
        $family = ProductFamily::create(['mmitgr' => 'B800', 'name' => 'FOLDING BIKES']);
        $family = ProductFamily::create(['mmitgr' => 'B900', 'name' => 'BMX']);


    }
}
