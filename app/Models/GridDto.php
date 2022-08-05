<?php

namespace App\Models;

class GridDto
{

    protected $_matrix;
 
    protected array $_grid;
 
    public function __construct(array $_matrix, array $_grid)
    {
        $this->_matrix = $_matrix;
        $this->_grid = $_grid;
    }
}