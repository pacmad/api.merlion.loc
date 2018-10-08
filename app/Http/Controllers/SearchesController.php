<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Search;
use Illuminate\Http\Request;

class SearchesController extends Controller
{
    //
    public function search(Request $request)
    {
        //

        $q = $request->input('q');
        $max_page = 10;
        if (empty($q)) {
            $products = Product::paginate($max_page);
        } else {
            // $persons = $this->search($q, $max_page);
            // $persons = Person::searchByQuery(['multi_match' => ['name' => $q]])->paginate(10) ;
            $products = Search::searchByQuery([
//                'multi_match' => [
//                    'query' => $q,
//                    'fields' => [ "name", "about"]
//                ]
                'match' => ['name' => $q]
            ])->paginate($max_page);
        }


//        $categories = Category::get()->toTree();
        $categories = Category::all();
//        $products = Product::get()->toTree();
//        $products = Product::with('ancestors')->paginate(15);
//        return view('products.index', compact('categories', 'products'));
        return view('searches.product', compact('products', 'categories'))->render();

    }
}
