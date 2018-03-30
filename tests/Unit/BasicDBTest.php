<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class BasicDBTest extends TestCase
{
    public function testUserInsert()
    {
        $numUsersB4 = DB::table('users')->count();
        $NewUser = factory(User::class)->create();
        $numUsersAfter = DB::table('users')->count();

        $numUsersIncreased = ($numUsersAfter > $numUsersB4);
        $newUserID_isInDB = (DB::table('users')->where('id',$NewUser->id)->count())==1;

        $this->assertTrue($numUsersIncreased and $newUserID_isInDB);
        DB::table('users')->where('id',$NewUser->id)->delete();
    }

    public function testUserUpdate()
    {
        $tgtName = 'Steve Smith';

        $NewUser = factory(User::class)->create();
        echo PHP_EOL . 'testUserUpdate: name before change = ' . $NewUser->name
                . '; AND the target name = ' . $tgtName . PHP_EOL;
        DB::table('users')->where('id',$NewUser->id)->update(['name'=>$tgtName]);

        $this->assertDatabaseHas('users',['id'=>$NewUser->id, 'name'=>$tgtName]);
        DB::table('users')->where('id',$NewUser->id)->delete();
    }

    public function testUserDelete()
    {
        $NewUser = factory(User::class)->create();
        $insertConfirmed = (DB::table('users')->where('id',$NewUser->id)->count())==1;

        DB::table('users')->where('id',$NewUser->id)->delete();
        $deletionConfirmed = (DB::table('users')->where('id',$NewUser->id)->count())==0;

        $this->assertTrue($insertConfirmed and $deletionConfirmed);
    }

    public function testUserSeededCount()
    {   /* Required Preconditions:
                1. Run after Migrate Refresh/Reset, before making any changes to the DB
                2. All tests must leave the number of users unchanged
            Note: Sorry if I missed notes on how to do this the correct way.
                  This approach is awful but I don't know how to call migration reset, and the seeder here
                  Also do not know whether it's OK ot have unit testing reset the DB
        */

        $numUsers = DB::table('users')->count();
        $this->assertTrue($numUsers == 50);
    }
}
