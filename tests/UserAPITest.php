<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UserAPITest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    protected $users;

    public function setUp() {
        parent::setUp();
        $this->beginDatabaseTransaction();

        $this->users = [];
        for($i = 0; $i < 10; $i++) {
            $user = $this->users[] = factory(User::class)->make();
            $user->save();
        }
    }

    /**
     * test GET /users
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/users');
        foreach($this->users as $user) {
            $response->seeJson($user->toArray());
        }
    }

    /**
     * test GET /users/{id}
     *
     * @return void
     */
    public function testShow() {
        foreach($this->users as $user) {
            $response = $this->get('/users/' . $user->id);
            $response->seeJson($user->toArray());
        }
    }
}
