<?php

namespace Tests\Unit;

use App\User;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /** @test
     * A basic test example.
     *
     * @return void
     */
    public function a_user_has_projects()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->projects);
    }

    /** @test */
    public function a_user_has_all_accessible_projects(){

        $ben = $this->signIn();

        ProjectFactory::ownedBy($ben)->create();

        $this->assertCount(1,$ben->allProjects());

        $dea = factory(User::class)->create();
        $giza = factory(User::class)->create();

        $deasProject = tap(ProjectFactory::ownedBy($dea)->create())->invite($giza);

        $this->assertCount(1,$ben->allProjects());

        $deasProject->invite($ben);

        $this->assertCount(2,$ben->allProjects());
    }
}
