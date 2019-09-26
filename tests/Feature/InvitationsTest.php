<?php

namespace Tests\Feature;

use App\User;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_owners_may_invite_users()
    {
        $project = ProjectFactory::create();
        $user = factory(User::class)->create();

        $this->signIn($user);
        $this->post($project->path() . '/invitations')
            ->assertStatus(403);

        $project->invite($user);
        $this->signIn($user);
        $this->post($project->path() . '/invitations')
            ->assertStatus(403);
    }
    /** @test */
    public function a_project_owner_can_invite_a_user()
    {

        $project = ProjectFactory::create();

        $userToInvite = factory(User::class)->create();

        $this->signIn($project->owner);
        $this->post($project->path() . '/invitations' , [
            'email' => $userToInvite->email
        ])
        ->assertRedirect($project->path());

        $this->assertTrue($project->members->contains($userToInvite));
    }

    /** @test */
    public function the_invited_email_must_associate_with_a_valid_account()
    {
        $project = ProjectFactory::create();

        $this->signIn($project->owner);
        $this->post($project->path() . '/invitations' , [
            'email' => 'notauser@example.com'
        ])
        ->assertSessionHasErrors([
            'email' => 'The user you invited must have a birdboard account'
        ], null, 'invitations');
    }

    /** @test */
    public function invited_users_may_update_projects()
    {
        $project = ProjectFactory::create();

        $project->invite($newUser = factory(User::class)->create());

        $this->signIn($newUser);
        $this->post(action('ProjectTasksController@store', $project), $task = ['body' => 'foo task']);

        $this->assertDatabaseHas('tasks', $task);
    }
}
