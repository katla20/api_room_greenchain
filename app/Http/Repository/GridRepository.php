<?php
namespace App\Http\Repository;

class GridRepository
{
  /**
   * Get a matrix
   *
   * @return array
   */
  public function getGridData()
  {
    return [
        [0,0,0,1,0,1,1,1],
        [0,1,0,0,0,0,0,0],
        [0,1,0,0,0,1,1,1],
        [0,1,1,1,1,0,0,0],
        [0,1,0,0,0,0,0,0]
    ];
  }
}