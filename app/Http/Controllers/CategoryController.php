<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DataTables;
use Sentinel;

class CategoryController extends Controller
{
    protected $_view = 'homepage/data/stock/category/';

    public function index(){
        $data = Category::with('createdBy')->orderBy('sort_order','asc')->paginate(10);
        return view($this->_view.'index',compact('data'));
    }

    public function store(Request $request){
        $query = new Category;
        $query->name = $request->name;
        $query->sort_order = $request->sort_order;
        $query->created_by = Sentinel::getUser()->id;
        $query->save();
        return redirect('/category');
    }

    public function show($id){
        $data = Category::find($id);
        return response()->json([
            "data"=>$data
        ]);
    }

    public function update(Request $request, $id){
        $query = new Category;
        $query = $query->where('id',$id);
        $query->update([
            "name"          =>  $request->name,
            "sort_order"    =>  $request->sort_order
        ]);
        return redirect('/category');
    }
}
