<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Car;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarsDBTest extends TestCase
{
    /**
     * Use factory to create and insert seed record
     * Assert that the local copy of the ID is in the DB
     *
     * @return void
     */
    public function testCarInsert()
    {
        $NewCar = factory(Car::class)->create();
        $this->assertDatabaseHas('cars',['id'=>$NewCar->id]);
    }

    /**
     * Find MaxID with Year not equal to the target
     * Record the year; Change it; Take copy of the changed year
     * Use assertion but also echo the copies for visual inspection
     *
     * @return void
     */
    public function testCarUpdateYear()
    {
        $tgtYear = 2000;
        $tgtCarID = DB::table('cars')
                        ->where('year', '<>', $tgtYear)
                        ->max('id');

        $tgtCarYearB4 = DB::table('cars')->where('id',$tgtCarID)->max('year');
        DB::table('cars')->where('id',$tgtCarID)->update(['year'=>$tgtYear]);
        $tgtCarYearAfter = DB::table('cars')->where('id',$tgtCarID)->max('year');

        echo PHP_EOL . 'testCarUpdate: target carID = '. (string)$tgtCarID
            . '; Year before = ' . (string)$tgtCarYearB4
            . '; AND Year after = ' . (string)$tgtCarYearAfter . PHP_EOL;

        $this->assertDatabaseHas('cars',['id'=>$tgtCarID, 'year'=>$tgtYear]);
    }
}
