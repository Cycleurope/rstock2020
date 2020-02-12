<?php

use Illuminate\Database\Seeder;
use App\Models\BikeFamily;

class MMITGRTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $family = BikeFamily::create(['mmitgr' => 'B100', 'name' => 'CITY']);
        $family = BikeFamily::create(['mmitgr' => 'B200', 'name' => 'MTB']);
        $family = BikeFamily::create(['mmitgr' => 'B300', 'name' => 'SPORT']);
        $family = BikeFamily::create(['mmitgr' => 'B350', 'name' => 'TREKKING']);
        $family = BikeFamily::create(['mmitgr' => 'B400', 'name' => 'RACING']);
        $family = BikeFamily::create(['mmitgr' => 'B500', 'name' => 'JUNIOR']);
        $family = BikeFamily::create(['mmitgr' => 'B600', 'name' => 'OTHER']);
        $family = BikeFamily::create(['mmitgr' => 'B700', 'name' => 'EBIKE']);
        $family = BikeFamily::create(['mmitgr' => 'B710', 'name' => 'E-BIKE CITY']);
        $family = BikeFamily::create(['mmitgr' => 'B720', 'name' => 'E-BIKE SPORT']);
        $family = BikeFamily::create(['mmitgr' => 'B730', 'name' => 'E-BIKE MTB']);
        $family = BikeFamily::create(['mmitgr' => 'B740', 'name' => 'E-BIKE ROAD']);
        $family = BikeFamily::create(['mmitgr' => 'B750', 'name' => 'E-BIKE S-PEDELEC']);
        $family = BikeFamily::create(['mmitgr' => 'B760', 'name' => 'E-BIKE JUNIOR']);
        $family = BikeFamily::create(['mmitgr' => 'B770', 'name' => 'E-BIKE OTHER']);
        $family = BikeFamily::create(['mmitgr' => 'B780', 'name' => 'E-BIKE FOLDING']);
        $family = BikeFamily::create(['mmitgr' => 'B790', 'name' => 'E-BIKE CARGO']);
        $family = BikeFamily::create(['mmitgr' => 'B800', 'name' => 'FOLDING BIKES']);
        $family = BikeFamily::create(['mmitgr' => 'B900', 'name' => 'BMX']);


    }
}
