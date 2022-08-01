<?php
namespace App\Http\Repository;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class GridRepository
{
  /**
   * Get a matrix
   *
   * @return array
   */
  public function generateColumGrid($col){
    $dataCol = array();
    for ($i = 0; $i < $col; $i++) {
      array_push($dataCol,rand(0,1));
    }
    return $dataCol;
  }

  public function getGridData($default = true, $row = 5, $col = 6)
  {
    $map = array();

    if (!$default) {
        for ($i = 1; $i < $row; $i++) {
          array_push($map,$this->generateColumGrid($col));
        }
        return $map;
    }

    array_push($map,[0, 0, 0, 1, 0, 0]);
    array_push($map,[0, 0, 0, 1, 0, 1]);
    array_push($map,[0, 1, 0, 0, 1, 0]);
    array_push($map,[1, 0, 0, 1, 0, 0]);

   return $map;
  }
}