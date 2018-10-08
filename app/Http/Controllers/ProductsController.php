<?php

namespace App\Http\Controllers;

use App\Category;
use App\CatList;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $q = $request->input('q');
        $max_page = 10;
        if (empty($q)) {
            $products = Product::paginate($max_page);
        } else {
            // $persons = $this->search($q, $max_page);
            // $persons = Person::searchByQuery(['multi_match' => ['name' => $q]])->paginate(10) ;
            $products = Product::searchByQuery([
                'multi_match' => [
                    'query' => $q,
                    'fuzziness' => 'AUTO',
                    'fields' => [ "name^3", "about"]
                ]
//                'match' => ['name' => $q]
            ])->paginate($max_page);
        }


//        $categories = Category::get()->toTree();
//        $categories = Category::all();
//        $products = Product::get()->toTree();
//        $products = Product::with('ancestors')->paginate(15);
//        return view('products.index', compact('categories', 'products'));
        return view('products.index', compact('products'))->render();

        //
//        $categories = Category::get()->toTree();
////        $products = Product::get()->toTree();
//        $products = Product::with('ancestors')->paginate(15);
//        return view('products.index', compact('categories', 'products'));
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
        $product = Product::find($id);
        $categories = Category::get()->toTree();

        $categoris = CatList::pluck('name', 'id')->all();
//        $selectedCategories = $product->categoris->pluck('id')->all();


        return view('products.edit', compact('product', 'categories', 'categoris', 'selectedCategories'));
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

        $product = Product::find($id);
        $product->edit($request->all());
        $product->setCategory($request->get('category_id'));

        return redirect()->route('products.index');
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
