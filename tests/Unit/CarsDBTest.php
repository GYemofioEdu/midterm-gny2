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

    /**
     * Goal: Delete the last car to have been inserted
     * Use assertion but also echo a description of it for visual inspection
     * Need to figure out how to work with collections
     *
     * @return void
     */
    public function testCarDelete()
    {
        $tgtCarID = DB::table('cars')->max('id');

        /* Figure out how to use a record; like the one below:
                 $tgtCar = DB::table('cars')->where('id',$tgtCarID)->get();
            For now, fetch one primitive item at a time
        */
        $tgtCarYear = (string)(DB::table('cars')->where('id',$tgtCarID)->max('year'));
        $tgtCarMake = DB::table('cars')->where('id',$tgtCarID)->max('make');
        $tgtCarModel = DB::table('cars')->where('id',$tgtCarID)->max('model');
        echo 'testCarDelete: target carID = '. (string)$tgtCarID
            . '; Description = ' . $tgtCarYear . ' '
            . $tgtCarMake . ' ' . $tgtCarModel . PHP_EOL;

        DB::table('cars')->where('id',$tgtCarID)->delete();

        $this->assertDatabaseMissing('cars',['id'=>$tgtCarID]);
    }

    public function testSeededCarsCount()
    {   /* Required Preconditions:
                1. Runs after Migrate Refresh/Reset, before changing the number of seeded records
                2. All tests must leave the number of seeded records unchanged
            Note: Yeah, not great.
        */

        $numCars = DB::table('cars')->count();
        $this->assertTrue($numCars == 50);
    }

    /* This asserts that all cars have integers in the year field
     * Ordinarily, however, the ORM returns a string, which can be cast to int.
     *
     *  I tried "DB::getSchemaBuilder()->getColumnType('cars', 'year')" but it did not work for me
     *  I got: PHP Error:  Class 'Doctrine\DBAL\Driver\PDOSqlite\Driver' not found
    */
    public function testCarYearIsInt()
    {
        $numCars = DB::table('cars')->count();
        $numCarsWithIntYears = DB::table('cars')->whereraw('typeof(year) == "integer"')->count();
        $this->assertTrue($numCars == $numCarsWithIntYears);
    }

    /* This asserts there is no car in the table with make not in the target set
     * That is, every car in the table is either a ford, honda or toyota
     *
    */
    public function testCarMakeInTargetSet()
    {
        $numCars = DB::table('cars')->count();
        $numCarsNotInTargetSet = DB::table('cars')
                                    ->whereraw('make not in ("Ford","Honda","Toyota")')
                                    ->count();
        $this->assertTrue($numCars > 0 and $numCarsNotInTargetSet == 0);
    }

    /* This asserts that for all cars in the table, model is text/string (i.e. not numeric)
     * NOTE: ORM returns strings for everything, including ID.
     *
    */
    public function testCarModelIsString()
    {
        $numCars = DB::table('cars')->count();
        $numCarsModelIsNotString = DB::table('cars')
                                    ->whereraw('typeof(model) <> "text"')
                                    ->count();
        $this->assertTrue($numCars > 0 and $numCarsModelIsNotString == 0);
    }
}
