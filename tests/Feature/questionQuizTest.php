<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class questionQuizTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_of_validate_question_on_quiz(): void
    {
        // 1. ARRANGE
        $user = User::factory()->create();

        $question = Question::factory()
        ->has(
            Answer::factory()->count(3)
            ->has(
                Answer::factory()->state(['is_correct' => true]))
        )->create([ 'user_id' => $user->id ]);
    

        // 2. ACT
        $test = new GenerateQuiz();
        $response1 = $test->selectAnswer();
    

        // 3. ASSERT
        $response1->assertStatus(200);
    }
}