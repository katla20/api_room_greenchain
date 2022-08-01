<?php
namespace App\Http\Repository;

class GridRepository
{
  /**
   * Get a matrix
   *
   * @return array
   */
  public function getGridData($default=true, $row=5, $column=6)
  {
    // let getRandomInt = (min: number = 0, max: number = 2): number => {
    //   let rnd: number = Math.floor(Math.random() * (max - min)) + min;
    //   rnd >= 2 ? rnd = 1 : rnd = rnd;
    //   return rnd;
    // }
    // $grid: Array<Array<0 | 1>> = new Array();
    // if (!!$default) {
    //   mtx.push([0, 0, 0, 1, 0, 0])
    //   mtx.push([0, 0, 0, 1, 0, 1])
    //   mtx.push([0, 1, 0, 0, 1, 0])
    //   mtx.push([1, 0, 0, 1, 0, 0]);
    //   mtx.push([1, 0, 0, 1, 1, 0]);
    // } else {

    //   for (let index = 0; index < rows; index++) {

    //     let dataColumns: Array<0 | 1> = new Array();
    //     for (let index1 = 0; index1 < column; index1++) {
    //       dataColumns.push((getRandomInt() as 0 | 1))
    //     }
    //     mtx.push([...dataColumns])

    //   }
    // }
    // return mtx;



    if(!$default){
      return [
        [0,0,0,1,0,1,1,1],
        [0,1,0,0,0,0,0,0],
        [0,1,0,0,0,1,1,1],
        [0,1,1,1,1,0,0,0],
        [0,1,0,0,0,0,0,0]
      ];
    }

    return [
        [0,0,0,1,0,1,1,1],
        [0,1,0,0,0,0,0,0],
        [0,1,0,0,0,1,1,1],
        [0,1,1,1,1,0,0,0],
        [0,1,0,0,0,0,0,0]
    ];
  }
}