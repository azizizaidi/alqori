<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class TestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_test_has_name_link_attribute()
    {
        $test = Test::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $test->name, 'type' => __('test.test'),
        ]);
        $link = '<a href="'.route('tests.show', $test).'"';
        $link .= ' title="'.$title.'">';
        $link .= $test->name;
        $link .= '</a>';

        $this->assertEquals($link, $test->name_link);
    }

    /** @test */
    public function a_test_has_belongs_to_creator_relation()
    {
        $test = Test::factory()->make();

        $this->assertInstanceOf(User::class, $test->creator);
        $this->assertEquals($test->creator_id, $test->creator->id);
    }
}
