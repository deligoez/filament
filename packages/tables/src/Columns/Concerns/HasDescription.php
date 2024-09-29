<?php

namespace Filament\Tables\Columns\Concerns;

use Closure;
use Illuminate\Contracts\Support\Htmlable;

trait HasDescription
{
    protected string | Htmlable | Closure | null $description = null;

    protected string | Closure | null $position = 'below';

    public function description(string | Htmlable | Closure | null $description, string | Closure | null $position = 'below'): static
    {
        $this->description = $description;
        $this->position = $position;

        return $this;
    }

    public function getDescriptionAbove(): string | Htmlable | null
    {
        if ($this->evaluate($this->position) === 'above') {
            return $this->evaluate($this->description);
        }

        return null;
    }

    public function getDescriptionBelow(): string | Htmlable | null
    {
        if ($this->evaluate($this->position) === 'below') {
            return $this->evaluate($this->description);
        }

        return null;
    }
}
