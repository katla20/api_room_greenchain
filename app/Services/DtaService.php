<?php

namespace App\Services;

use Illuminate\Support\Arr;

class DtaService {

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

  public function getMatrix($default = true, $row = 9, $col = 8): array
  {
    $map = array();

    if (!$default) {//matrix random
        for ($i = 0; $i < $row; $i++) {
          array_push($map,$this->generateColumMatrix($col));
        }
        return $map;
    }
      //matrix default
      array_push($map,[0, 0, 0, 0, 0, 1, 0, 1]);
      array_push($map,[0, 1, 0, 0, 0, 0, 0, 0]);
      array_push($map,[0, 1, 0, 0, 0, 1, 1, 1]);
      array_push($map,[0, 1, 1, 1, 1, 0, 0, 0]);
      array_push($map,[0, 1, 0, 0, 1, 0, 0, 0]);
      array_push($map,[0, 1, 0, 0, 1, 0, 1, 0]);
      array_push($map,[0, 1, 0, 1, 1, 0, 1, 0]);
      array_push($map,[0, 0, 0, 0, 1, 0, 0, 0]);
      array_push($map,[0, 1, 1, 0, 1, 1, 0, 1]);
      return $map;
  }

  public function mapGrid(array $matrix): array
  {
    //separar en una clase
    $states = [
      self::DARK => 'dark',
      self::WALL => 'wall',
      self::LIGHT => 'light',
      self::BULB => 'bulb'
    ];
    $properties = [
      'state'    => null,
      'positionx'=> 0,
      'positiony'=> 0
    ];


    $map_grid = array();
    foreach ($matrix as $posx => $row) {
      $map_col = array();
      foreach ($row as $posy => $dta) {
        $properties['state']=($dta == 1)?$states[self::WALL]:$states[self::DARK];
        $properties['positionx']=$posx;
        $properties['positiony']=$posy;
        array_push($map_col,$properties);
      }
      array_push($map_grid,$map_col);
    }
    return $map_grid;
  }


  public function mapGridSolved(array $matrix = []): array
  {
    $map = array();

    array_push($map,
    [
      [
        'state'     =>'bulb',
        'positionx' => 0,
        'positiony' => 0
      ],
      [
        'state'     =>'light',
        'positionx' => 0,
        'positiony' => 0
      ],
      [
        'state'     =>'bulb',
        'positionx' => 0,
        'positiony' => 0
      ],
      [
        'state'    =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'    =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'    =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'    =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'    =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ]
    ]);
    array_push($map,[
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ]
    ]);
    array_push($map,[
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ]
    ]);
    array_push($map,[
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ],
      [
        'state' => 'light',
        'positionx'=>0,
        'positiony'=>0
      ]
    ]);
    array_push($map,
    [
      [
      'state'     =>'bulb',
      'positionx' => 4,
      'positiony' => 0
      ],
      [
        'state' => 'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'=> 'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'=> 'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'=> 'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'=> 'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'=> 'light',
        'positionx'=> 0,
        'positiony'=> 0
      ]
  ]);
    array_push($map,
    [
      [
        'state'=> 'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'=> 'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state'=> 'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'light',
        'positionx' => 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'light',
        'positionx' => 0,
        'positiony'=> 0
      ]
    ]);
    array_push($map,
    [
      [
        'state' => 'light',
        'positionx' => 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ]
    ]);
    array_push($map,
    [ 
      [
        'state' =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ], 
      [
        'state' =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ], 
      [
        'state' =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ], 
      [
        'state' =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ], 
      [
        'state' => 'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ], 
      [
        'state' =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ], 
      [
        'state' =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ], 
      [
        'state' =>'light',
        'positionx'=> 0,
        'positiony'=> 0
      ]
    ]);
    array_push($map,
    [
      [
        'state'     =>'bulb',
        'positionx' => 8,
        'positiony' => 0
      ],
      [
        'state' => 'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'light',
        'positionx'=> 0,
        'positiony'=> 0
      ],
      [
        'state' => 'wall',
        'positionx'=> 0,
        'positiony'=> 0
      ]
    ]);

    foreach ($map as $posx => $row) {
      foreach ($row as $posy => $data) {
        $map[$posx][$posy]['positionx']= $posx;
        $map[$posx][$posy]['positiony']= $posy;
      }
    }

    return $map;
  }


}




