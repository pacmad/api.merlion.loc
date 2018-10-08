<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

/**
 * @property  category
 */
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

//        $categories = Category::where('parent_id', '=', 0)->get();
//        $allCategories = Category::pluck('name','id')->all();
//        return view('welcome', compact('categories','allCategories'));

        $categories = Category::get()->toTree();
//        $categories = Category::defaultOrder()->withDepth()->get();
        return view('welcome', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::where('id', $id)->firstOrFail();
//        $categories = Category::get()->toTree();
//        $products = $category->products()->paginate(2);
//        $categories = $category->categories()->paginate(2);


        $products = $category->products()->paginate(10);
//          $products = Category::find($id)->with('products')->paginate(10);




        $nodes = Category::get()->toTree();
        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
            foreach ($categories as $category) {
                echo '<li>'. PHP_EOL.$prefix.' '.$category->name .'</li>';

                $traverse($category->children, $prefix.'-');
            }
        };




        $result = Category::where('parent_id', $id)->get();

//            $results  =  Category::ancestorsOf($id);
        $resultId = Category::where('id', $category->parent_id)->get();

//        $results = Category::defaultOrder()->ancestorsAndSelf($id);
//        dd($results);

        return view('categories.show', compact('category', 'products', 'result', 'nodes', 'traverse' ,'resultId'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
