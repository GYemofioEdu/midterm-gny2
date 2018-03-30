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
}
