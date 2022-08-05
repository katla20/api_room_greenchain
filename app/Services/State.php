<?php
namespace App\Services;

interface State
{
    public function getState(int $number): array;
}