<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Todo;

class CreateTodoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a todo.
     *
     * @return void
     */
    public function test_todo_creation()
    {
        $todo = Todo::factory()->create();

        $this->assertDatabaseHas('todos', [
            'id' => $todo->id,
            'title' => $todo->title,
            'subtitle' => $todo->subtitle,
            'description' => $todo->description,
            'is_closed' => $todo->is_closed,
        ]);
    }

    /**
     * Test todo attributes.
     *
     * @return void
     */
    public function test_todo_attributes()
    {
        $todo = Todo::factory()->create();

        $this->assertNotNull($todo->id);
        $this->assertNotNull($todo->user_id);
        $this->assertNotNull($todo->title);
        $this->assertNotNull($todo->subtitle);
        $this->assertNotNull($todo->description);
        $this->assertNotNull($todo->is_closed);
    }

    /**
     * Test todo relations.
     *
     * @return void
     */
    public function test_todo_relations()
    {
        $todo = Todo::factory()->create();

        $this->assertInstanceOf('App\Models\User', $todo->user);
    }
}
