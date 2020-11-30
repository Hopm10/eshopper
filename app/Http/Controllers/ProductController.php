<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Categories;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = DB::table('products')->paginate(3);
        return view('products.products')->with(['products' => $products]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = DB::table('brands')->get();
        $categories = DB::table('categories')->get();
        return view('products.create_product_form')->with(['brands' => $brands, 'categories' => $categories]);
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
        // dd($request->detail_description);
        $title = $request->title;
        $description = $request->description;
        $detail_description = $request->detail_description;
        $price = $request->price;
        $quantity_in_stock = $request->quantity_in_stock;
        $quantity_sold = $request->quantity_sold;
        $sale = $request->sale;
        $category = $request->category;
        $brand = $request->brand;

        $path = $request->image->getClientOriginalName();
        $request->image->storeAs('images', $path, 'public');
        $image = $path;
        DB::table('products')->insert(
            [
                'title' => $title,
                'description' => $description,
                'detail_description' => $detail_description,
                'quantity_in_stock' => $quantity_in_stock,
                'quantity_sold' => $quantity_sold,
                'sale' => $sale,
                'price' => $price,
                'category_id' => $category,
                'brand_id' => $brand,
                'image' => $image,
            ]
        );

        // dd($path);
        // return $path;
        return redirect(route('products.index'));
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
        // dd($id);



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
        $product = DB::table('products')
        ->where('products.id','=',$id)
        ->first();
        $brands = DB::table('brands')->get();
        $categories = DB::table('categories')->get();
        return view('products.edit_product_form')->with(['product' => $product, 'brands'=> $brands, 'categories' => $categories]);

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
        if ($request->hasFile('image')) {
            $path = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $path, 'public');
            $image = $path;
        }else{
            $image = $request->image_old;
        }

        $title_update = $request->title;
        $description = $request->description;
        $detail_description = $request->detail_description;
        $price = $request->price;
        $quantity_in_stock = $request->quantity_in_stock;
        $quantity_sold = $request->quantity_sold;
        $sale = $request->sale;
        $category = $request->category;
        $brand = $request->brand;
        DB::table('products')
            ->where('id', $id)->update([
                'title' => $title_update,
                'description' => $description,
                'detail_description' => $detail_description,
                'quantity_in_stock' => $quantity_in_stock,
                'quantity_sold' => $quantity_sold,
                'sale' => $sale,
                'price' => $price,
                'category_id' => $category,
                'brand_id' => $brand,
                'image' => $image]);
            return redirect(route('products.index'));
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
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect(route('products.index'));
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
