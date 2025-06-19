<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Filters;

use Filament\Tables\Filters\BaseFilter;

abstract class Filter
{
    abstract public static function make(): BaseFilter;
}
