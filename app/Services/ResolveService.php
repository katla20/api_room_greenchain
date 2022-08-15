<?php

namespace App\Services;

use App\Services\DtaService;

use App\Models\Cell;
use App\Models\Adjacent;
use App\Models\Grid;
use Illuminate\Support\Arr;

class ResolveService
{

    public function __construct(
        DtaService $dta
        // Cell $cell
        )
    {
        $this->dta = $dta;
        //$this->cell = $cell;
    }


    public function gridSolution(){
        //$this->dta->matrix = $this->getMatrix(true);
        // dump('matrix',$this->dta->matrix);
        $objsCell = array();

        $this->matrix = [
            [1, 0, 1, 1, 1, 0],
            [0, 1, 1, 0, 0, 0],
            [0, 0, 1, 0, 1, 1],
            [1, 1, 1, 0, 0, 0],
            [0, 0, 1, 0, 0, 0],
            [0, 0, 1, 0, 1, 1],
          ];

        $visited = array();//parent visited
        $cont = 0;
        $start= array();
        for ($r = 0; $r < count($this->matrix); $r++) { 
            for ($c = 0; $c < count($this->matrix[0]); $c++) {
                $content = $this->getValueNode($this->matrix,$r,$c);//value position
                $state = ($content)? 1 : 2;//wall or dark
                $objsCell[$r][$c] = new Cell($r,$c,"({$r},{$c})",$content,$state);
                if($cont==0)
                        $start = $objsCell[$r][$c];
                $cont++;
 
            }
        }


        for ($r = 0; $r < count($objsCell); $r++) { 
            for ($c = 0; $c < count($objsCell[0]); $c++) {

                $rsub = $r - 1;
                $radd = $r + 1;
                $csub = $c - 1;
                $cadd = $c + 1;

                if($visit = $this->visit($objsCell, $rsub, $c,'UP')){ //up

                    $objsCell[$r][$c]->adjacent[] = $visit;
                }

                if($visit = $this->visit($objsCell,$radd,$c,'DOWN')){ //down
                    $objsCell[$r][$c]->adjacent[] = $visit;
                }

                if($visit = $this->visit($objsCell,$r,$csub,'LEFT')){ //left
                    $objsCell[$r][$c]->adjacent[] = $visit;
                }

                if($visit = $this->visit($objsCell,$r,$cadd,'RIGHT')){ //right
                    $objsCell[$r][$c]->adjacent[] = $visit;
                }

                //dump('current',$objsCell[$r][$c]);
    
            }
        }

        return $objsCell;
   
    }


    public function getValueNode($matrix,$r,$c){
        return $this->matrix[$r][$c];
    }

    private function visit($cells,$r,$c,$dir) {

        $rowInbounds = 0 <= $r && $r < count($cells);
        $colInbounds = 0 <= $c && $c < count($cells);
        if(!$rowInbounds || !$colInbounds) return false;

        if($cells[$r][$c]->state === 1) return false;//wall
    
        //dump($dir,"({$r},{$c})"); //position string);

        return new Adjacent($dir,1,$r,$c,"({$r},{$c})",$cells[$r][$c]->content);
    }
    
}