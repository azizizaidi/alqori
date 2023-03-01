<?php

namespace Tests\Unit\Policies;

use App\Models\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class TestPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_test()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Test));
    }

    /** @test */
    public function user_can_view_test()
    {
        $user = $this->createUser();
        $test = Test::factory()->create();
        $this->assertTrue($user->can('view', $test));
    }

    /** @test */
    public function user_can_update_test()
    {
        $user = $this->createUser();
        $test = Test::factory()->create();
        $this->assertTrue($user->can('update', $test));
    }

    /** @test */
    public function user_can_delete_test()
    {
        $user = $this->createUser();
        $test = Test::factory()->create();
        $this->assertTrue($user->can('delete', $test));
    }
}
