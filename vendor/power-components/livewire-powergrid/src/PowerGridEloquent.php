<?php

namespace PowerComponents\LivewirePowerGrid;

use Closure;
use Illuminate\Support\Collection;

final class PowerGridEloquent
{
    protected Collection $collection;

    public array $columns = [];

    public function __construct()
    {
        $this->collection = collect([]);
    }

    /**
     * @param string $field
     * @param Closure|null $closure
     * @return $this
     */
    public function addColumn(string $field, Closure $closure = null): PowerGridEloquent
    {
        $this->columns[$field] = $closure ?? fn ($model) => e(strval(data_get($model, $field)));

        return $this;
    }
}
