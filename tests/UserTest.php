<?php

use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testNotifyReturnsTrue()
    {
        $user = new User('dave@example.com');

        $mock = Mockery::mock('alias:Mailer');

        $mock->shouldReceive('send')
            ->with($user->email, 'Hello!')
            ->andReturn(true);

        $this->assertTrue($user->notify('Hello!'));
    }
}
