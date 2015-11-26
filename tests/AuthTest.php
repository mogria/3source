<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;

class AuthTest extends TestCase
{

    // reset db after each test case
    use DatabaseTransactions;

    /**
     * @var User $johnny
     */
    protected $johnny;

    /**
     * Create johnny. Johnny is a nice guy that
     * just wants to help us test the authentication
     * features of this application.
     */
    public function setUp() {
        parent::setUp();

        $this->beginDatabaseTransaction();

        $this->johnny = factory(\App\User::class)->create([
            'name' => 'johnny',
            'email' => 'johnny@example.com',
            'password' => Hash::make('whatever')
        ]);
        $this->johnny->save();
    }

    /**
     * helper method to login on web page
     * with given username and password
     */
    protected function loginUser($username, $password)
    {
        return $this->visit('/')
            ->type($username, 'name')
            ->type($password, 'password')
            ->press('Login');

    }

    /**
     * helper method to register on web page
     * with given credentials.
     */
    protected function registerUser($username, $email, $password, $password_confirmation = null)
    {
        if($password_confirmation === null) $password_confirmation = $password;

        return $this->visit('/register')
            ->type($username, 'name')
            ->type($email, 'email')
            ->type($password, 'password')
            ->type($password_confirmation, 'password_confirmation')
            ->press('Register');
    }

    /**
     * test if the login fails if the
     * user doesn't exist
     */
    public function testLoginFailNoUser()
    {
        $this->loginUser('does-not-exist', 'doesnt-matter-anyway')
             ->seePageIs('/');
    }

    /**
     * test if the login fails if the
     * password is wrong
     */
    public function testLoginFailWrongPassword()
    {
        $this->loginUser('johnny', 'wrong-password')
            ->seePageIs('/');
    }


    /**
     * test if the login works
     *
     * @return void
     */
    public function testLogin()
    {
        $this->loginUser('johnny', 'whatever')
             ->seePageIs('/play');
    }

    /**
     * test if the registration works
     */
    public function testRegister()
    {
        $this->registerUser('joe', 'joe@example.com', 'whatelse')
            ->seePageIs('/play');
        $this->seeInDatabase('users', ['name' => 'joe', 'email' => 'joe@example.com']);
    }

    public function testRegisterAndLogin() {
        $this->registerUser('joe', 'joe@example.com', 'somepw');
        $this->visit('auth/logout')->seePageIs('/');
        $this->loginUser('joe', 'somepw')->seePageIs('/play');
    }

    /**
     * test if the registration fails if two different
     * passwords are entered
     */
    public function testRegisterFailPasswordConfirmation() {
        $this->registerUser('joe', 'joe@example.com', 'whatelse', '_whatelse');
        $this->seePageIs('/register');
    }

    /**
     * test if the registration fails if the username
     * is already taken
     */
    public function testRegisterFailUsernameTaken() {
        $this->registerUser('johnny', 'joe@example.com', 'whatelse');
        $this->seePageIs('/register');
    }

    /**
     * test if the registration fails if the email
     * is already taken
     */
    public function testRegisterFailEmailTaken() {
        $this->registerUser('joe', 'johnny@localhost', 'whatelse');
        $this->seePageIs('/register');
    }
}
