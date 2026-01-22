<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class NoteFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const BODY = 'body';
    public const DATE = 'date';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::BODY => [$this, 'body'],
            self::DATE => [$this, 'date'],
        ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function body(Builder $builder, $value): void
    {
        $builder->where('body', 'like', "%{$value}%");
    }

    public function date(Builder $builder, $value): void
    {
        $builder->where('date', 'like', "%{$value}%");
    }
}
