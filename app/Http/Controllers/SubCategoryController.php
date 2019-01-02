<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $_view = 'homepage/data/stock/sub-category/';
    public function index(){
        return view($this->_view.'index');
    }
}
