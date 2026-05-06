<?php

declare(strict_types=1);

namespace Tests\Support;

class UniqueJob extends BaseJob
{
    public int $uniqueFor = 3600;
    public int $tries = 3;

    public function __construct(public readonly int $id = 1)
    {
        //
    }

    public function handle(): void
    {
        event(new JobOutput('UniqueJob:success'));
    }

    public function uniqueId(): string
    {
        return 'UniqueJob-'.$this->id;
    }
}
