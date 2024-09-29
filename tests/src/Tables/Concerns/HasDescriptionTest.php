<?php

use Filament\Tables\Columns\Concerns\HasDescription;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tests\Tables\TestCase;

uses(TestCase::class);

it('can set and get description with default position', function () {
    $trait = new class extends Component
    {
        use HasDescription;
    };

    $trait->description('Test Description');

    expect($trait->getDescriptionBelow())->toBe('Test Description');
    expect($trait->getDescriptionAbove())->toBeNull();
});

it('can set and get description with specific position', function () {
    $trait = new class extends Component
    {
        use HasDescription;
    };

    $trait->description('Test Description', 'above');

    expect($trait->getDescriptionAbove())->toBe('Test Description');
    expect($trait->getDescriptionBelow())->toBeNull();
});

it('can handle Closure for description', function () {
    $trait = new class extends Component
    {
        use HasDescription;
    };

    $trait->description(fn () => 'Closure Description');

    expect($trait->getDescriptionBelow())->toBe('Closure Description');
});

it('can handle Closure for position', function () {
    $trait = new class extends Component
    {
        use HasDescription;
    };

    $trait->description('Test Description', fn () => 'above');

    expect($trait->getDescriptionAbove())->toBe('Test Description');
    expect($trait->getDescriptionBelow())->toBeNull();
});
