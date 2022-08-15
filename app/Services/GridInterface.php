<?php
namespace App\Services;

interface GridInterface
{
    public function getState(int $number): array;

    public function getGrid(bool $default): array;

    public function getGridSolved(array $matrix): array;
}