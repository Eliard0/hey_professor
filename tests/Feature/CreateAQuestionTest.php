<?php

use App\Models\User;

use function Pest\Laravel\{assertDatabaseCount, assertDatabaseHas, post};

// conceito de tests 3s As
// arrange = preparar
it("pergunta pode ser grande", function () {

    $user = User::factory()->create();
    $this->actingAs($user);

    // act = agir
    $request = post(route("question.store"), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    // assert = verificar

    $request->assertRedirect(route("dashboard"));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?']);
});

it("verificando se er uma pergunta", function () {
    expect(true)->toBeTrue();
});

it("pergunta deve conter mais de 10 caracteres", function () {
    expect(true)->toBeTrue();
});
