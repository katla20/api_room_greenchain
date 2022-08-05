<?php

namespace App\Services;

use App\Models\GridDto;
use App\Services\DtaService;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class GridService extends GridDto implements State
{
    public function __construct(
        DtaService $dta)
    {
        $this->dta = $dta;
    }
    
    public function getGrid(bool $default): array
    {
        return $this->dta->dataGridProperties($default);
    }

    public function getMatrix(bool $default): array
    {
        return $this->dta->getMatrix($default);
    }

    public function getState(int $number): array
    {
        return [];
    }

    public function resolve(){
    
        //$this->matrix = $this->getMatrix(true);
        // dump('matrix',$this->matrix);

        $this->matrix = [
            [1, 0, 1, 1, 1, 0],
            [0, 1, 1, 0, 0, 0],
            [0, 0, 1, 0, 1, 1],
            [1, 1, 1, 0, 0, 0],
            [0, 0, 1, 0, 0, 0],
            [0, 0, 1, 0, 1, 1],
          ];

        $visited = array();
        $adj = array();
        $cont = 0;
        for ($r = 0; $r < count($this->matrix); $r++) { 
            for ($c = 0; $c < count($this->matrix[0]); $c++) {
                dump('exploreGrid',$this->exploreGrid($this->matrix,$r,$c,$visited));
                if($this->exploreGrid($this->matrix,$r,$c,$visited)==true)
                {
                    //se visita y se cuenta
                    $cont++;
                }
            }
        }

        dump($cont);

        // foreach ($this->matrix as $key => $value) {
        //    dump($key,$value);
        // }
        
    }

    public function exploreGrid($matrix,$r,$c,$visited){
    
        $rowInbounds = 0 <= $r && $r < count($matrix);
        $colInbounds = 0 <= $c && $c < count($matrix[0]);
        //dump('row',$rowInbounds,'col',$colInbounds);
        if(!$rowInbounds || !$colInbounds) return false;
        
        if($this->matrix[$r][$c]=== 1) return false;
            
        $pos = "({$r},{$c})";
        if(Arr::has($visited, $pos)) return false;

        array_push($visited, $pos);

        //explorando vecinos
        $rsub = $r - 1;
        $radd = $r + 1;
        $csub = $c - 1;
        $cadd = $c + 1;

        // $adjacent["({$rsub},{$c})"] = $this->exploreGrid($matrix, $r - 1, $c, $visited);
        // $adjacent["({$radd},{$c})"] = $this->exploreGrid($matrix, $r + 1, $c, $visited);
        // $adjacent["({$r},$csub)"] = $this->exploreGrid($matrix, $r, $c - 1, $visited);
        // $adjacent["({$r},$cadd)"] = $this->exploreGrid($matrix, $r, $c + 1, $visited);

       
        $this->exploreGrid($matrix, $r - 1, $c, $visited); //up
        $this->exploreGrid($matrix, $r + 1, $c, $visited);//down
        $this->exploreGrid($matrix, $r, $c - 1, $visited);//left
        $this->exploreGrid($matrix, $r, $c + 1, $visited);//right

        dump("position({$r},{$c})");

        return true;
    }

}