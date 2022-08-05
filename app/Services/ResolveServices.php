<?php

namespace App\Services;

use App\Services\DtaService;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class ResolveService
{

    public function __construct(
        DtaService $dta)
    {
        $this->dta = $dta;
    }


    public function gridSolution(){
        //$this->dta->matrix = $this->getMatrix(true);
        // dump('matrix',$this->dta->matrix);

        $this->matrix = [
            [1, 0, 1, 1, 1, 0],
            [0, 1, 1, 0, 0, 0],
            [0, 0, 1, 0, 1, 1],
            [1, 1, 1, 0, 0, 0],
            [0, 0, 1, 0, 0, 0],
            [0, 0, 1, 0, 1, 1],
          ];

        $visited = array();
        $cont = 0;
        for ($r = 0; $r < count($this->matrix); $r++) { 
            for ($c = 0; $c < count($this->matrix[0]); $c++) {

                dump("explorando ({$r},{$c})");
                if($this->exploreGrid($this->matrix,$r,$c,$visited) == true)
                {
                   
                }
                $cont++;
            }
        }

        dump($cont);

        // foreach ($this->matrix as $key => $value) {
        //    dump($key,$value);
        // }
        
    }

    public function exploreGrid($matrix,$r,$c,$visited){
    
        $pos = "({$r},{$c})";
        $rowInbounds = 0 <= $r && $r < count($matrix);
        $colInbounds = 0 <= $c && $c < count($matrix);
        if(!$rowInbounds || !$colInbounds) return false;
        
        if($this->matrix[$r][$c]=== 1) return false;
            
        if(Arr::has($visited, $pos)) return false;

        array_push($visited, $pos);

        //explorando vecinos
        $rsub = $r - 1;
        $radd = $r + 1;
        $csub = $c - 1;
        $cadd = $c + 1;

        //$up = $this->exploreGrid($matrix, $rsub, $c, $visited); //up
        //$down = $this->exploreGrid($matrix, $radd, $c, $visited);//down
        /* $this->exploreGrid($matrix, $r, $csub, $visited);//left
        $this->exploreGrid($matrix, $r, $cadd, $visited);//right*/

        return true;
    }
    
}