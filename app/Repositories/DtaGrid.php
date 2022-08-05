<?php

namespace App\Repositories;

use Illuminate\Support\Arr;

class DtaGrid {

  const SCOPE = 3;
  const WALL = 1;
  const DARK = 2;
  const LIGHT = 3;
  const BULB = 4;

  private function generateColumMatrix(int $col): array
  {
    $dataCol = array();
    for ($i = 0; $i < $col; $i++) {
      array_push($dataCol,rand(0,1));
    }
    return $dataCol;
  }

  public function getMatrix($default = true, $row = 10, $col = 8): array
  {
    $map = array();

    if (!$default) {//matrix random
        for ($i = 1; $i < $row; $i++) {
          array_push($map,$this->generateColumMatrix($col));
        }
        return $map;
    }
      //matrix default
      array_push($map,[0, 0, 0, 1, 0, 1, 1, 1]);
      array_push($map,[0, 1, 0, 0, 0, 0, 0, 0]);
      array_push($map,[0, 1, 0, 0, 0, 1, 1, 1]);
      array_push($map,[0, 1, 1, 1, 1, 0, 0, 0]);
      array_push($map,[0, 1, 0, 0, 1, 0, 0, 0]);
      array_push($map,[0, 1, 0, 0, 1, 0, 1, 0]);
      array_push($map,[0, 1, 0, 1, 1, 0, 1, 0]);
      array_push($map,[0, 0, 0, 0, 1, 0, 0, 0]);
      array_push($map,[0, 1, 1, 0, 1, 1, 0, 1]);
      array_push($map,[0, 0, 0, 0, 1, 0, 0, 0]);
      array_push($map,[1, 0, 0, 1, 0, 0, 1, 1]);
      array_push($map,[0, 0, 1, 0, 0, 0, 0, 0]);

      return $map;
  }

  private function mapGrid(array $matrix, array $states = []): array
  {
    $map_grid = array();
    foreach ($matrix as $row) {
      $map_col = array();
      foreach ($row as $dta) {
        if($dta == 1){
          array_push($map_col,json_encode($states[self::WALL]['properties']));
        }else{
          array_push($map_col,json_encode($states[self::DARK]['properties']));
        }
      } 
      array_push($map_grid,$map_col); 
    }
    print_r($map_grid);//JSON.stringify()
    return $map_grid;
  }

  public function dataGridProperties($default = true):array
  {
    $states = [
      self::DARK => [
          'name' => 'DARK',
          'properties' => [
              'BULB' => false,
              'WALL' => false,
              'LIGHT' => true,
          ]
      ],
      self::WALL => [
          'name' => 'WALL',
          'properties' => [
              'BULB' => false,
              'WALL' => true,
              'LIGHT' => false,
          ]
      ],
      self::LIGHT => [
          'name' => 'LIGHT',
          'properties' => [
              'BULB' => false,
              'WALL' => false,
              'LIGHT' => true,
          ]
      ],
      self::BULB => [
          'name' => 'BULB',
          'properties' => [
              'BULB' => true,
              'WALL' => false,
              'LIGHT' => true,
          ]
      ]
    ];

    return $this->mapGrid($this->getMatrix($default),$states);
  }

  public function dataGridState():array
  {
    return $this->mapGrid($this->getMatrix());
  }

}




