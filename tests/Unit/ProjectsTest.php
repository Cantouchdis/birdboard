<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_has_a_path(){
    $project = factory('App\Project')->create();

    $this->assertEquals('/projects/'. $project->id, $project->path());
}

    /** @test */
    public function it_belongs_to_a_user(){
        $project = factory('App\Project')->create();

        $this->assertInstanceOf('App\User', $project->owner);
    }

    /** @test */
    public function it_can_add_a_task(){
        $project = factory('App\Project')->create();

        $task = $project->addTask('test tasks');

        $this->assertCount(1, $project->tasks);
        $this->assertTrue($project->tasks->contains($task));
    }

    /** @test */
    public function it_can_add_a_member(){

        $project = factory('App\Project')->create();

        $project->invite($newUser = factory(User::class)->create());

        $this->assertTrue($project->members->contains($newUser));
    }
}
