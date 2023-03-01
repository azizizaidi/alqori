<?php

namespace Tests\Feature;

use App\Models\Test;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_test_list_in_test_index_page()
    {
        $test = Test::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('tests.index');
        $this->see($test->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Test 1 name',
            'description' => 'Test 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_test()
    {
        $this->loginAsUser();
        $this->visitRoute('tests.index');

        $this->click(__('test.create'));
        $this->seeRouteIs('tests.create');

        $this->submitForm(__('test.create'), $this->getCreateFields());

        $this->seeRouteIs('tests.show', Test::first());

        $this->seeInDatabase('tests', $this->getCreateFields());
    }

    /** @test */
    public function validate_test_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('tests.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_test_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('tests.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_test_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('tests.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Test 1 name',
            'description' => 'Test 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_test()
    {
        $this->loginAsUser();
        $test = Test::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('tests.show', $test);
        $this->click('edit-test-'.$test->id);
        $this->seeRouteIs('tests.edit', $test);

        $this->submitForm(__('test.update'), $this->getEditFields());

        $this->seeRouteIs('tests.show', $test);

        $this->seeInDatabase('tests', $this->getEditFields([
            'id' => $test->id,
        ]));
    }

    /** @test */
    public function validate_test_name_update_is_required()
    {
        $this->loginAsUser();
        $test = Test::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('tests.update', $test), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_test_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $test = Test::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('tests.update', $test), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_test_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $test = Test::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('tests.update', $test), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_test()
    {
        $this->loginAsUser();
        $test = Test::factory()->create();
        Test::factory()->create();

        $this->visitRoute('tests.edit', $test);
        $this->click('del-test-'.$test->id);
        $this->seeRouteIs('tests.edit', [$test, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('tests', [
            'id' => $test->id,
        ]);
    }
}
