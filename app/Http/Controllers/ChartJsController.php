<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

use Carbon\Carbon;
use DB;


class ChartJsController extends Controller
{
    //
	public function index()
    {
        $year = ['2018','2019','2020','2021'];

        $user = [];
        foreach ($year as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }

        $category = ['1','2','3'];
        $products =[];
        foreach ($category as $catId ) {
           $category = Category::find($catId);
           $products[]= $category->allProducts()->count();
        }
        		
            

       

    	return view('super_admin')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK))->with('category',json_encode($category,JSON_NUMERIC_CHECK))->with('products',json_encode($products,JSON_NUMERIC_CHECK));
    }
}
