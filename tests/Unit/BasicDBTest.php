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
        echo 'testUserUpdate: name before change = ' . $NewUser->name
                . '; AND the target name = ' . $tgtName;
        DB::table('users')->where('id',$NewUser->id)->update(['name'=>$tgtName]);

        $this->assertDatabaseHas('users',['id'=>$NewUser->id, 'name'=>$tgtName]);
        DB::table('users')->where('id',$NewUser->id)->delete();
    }
}
