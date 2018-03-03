<?php

namespace App\Scheduler;

use App\Scheduler\Frequencies;

class FrequencyBuilder
{
    use Frequencies;

    protected $expression = '* * * * *';

    public function frequency($value)
    {
        if (method_exists($this, $value)) {
            $this->{$value}();
        }

        return $this;
    }

    public function day($value)
    {
        if (!empty($value)) {
            $this->days($value);
        }

        return $this;
    }

    public function date($value)
    {
        if (!empty($value)) {
            $this->on($value);
        }

        return $this;
    }

    public function time($hour, $minute)
    {
        $this->at($hour, $minute);

        return $this;
    }

    public function expression()
    {
        return $this->expression;
    }
}