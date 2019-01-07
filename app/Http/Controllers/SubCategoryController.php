<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class SubCategoryController extends Controller
{
    protected $_view = 'homepage/data/stock/sub-category/';

    public function index(){
        $data = Category::orderBy('sort_order','asc')->get();
        return view($this->_view.'index',compact('data'));
    }

    public function store(Request $request){
        dd($request->all());
    }
}
