<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = request()->query('search_text');
        $mincena = request()->query('mincena');
        $maxcena = request()->query('maxcena');

        $farbicky = $request->input('c');
        $order = $request->input('order', 'DESC');
        $farba = $farbicky;
        //dd(request()->query);



        if($farbicky != null) {
            $farba = array_values(array_filter($farbicky));
        }

        if ($farba != null) {
            $count_farba = count($farba);
        }
        else{
            $count_farba = 0;
        }

        $category = request()->segment(2);
        $nazov_kategorie = 'Náušnice';
        if ($category == 'Gombiky'){
            $nazov_kategorie = 'Manžety';
        }
        else if($category == 'Privesky'){
            $nazov_kategorie = 'Prívesky';
        }
        else if($category == 'Noze'){
            $nazov_kategorie = 'Nože';
        }
        else if($category == 'Vyvrtky'){
            $nazov_kategorie = 'Vývrtky';
        }

        if ($count_farba > 0){
            if($count_farba == 1) {
                $products = Color::find($farba[0])->products()->where('type', 'like', $category)->get();
            }

            if($count_farba == 2){
                $products1 = Color::find($farba[0])->products()->where('type','like', $category)->get();
                $products2 = Color::find($farba[1])->products()->where('type','like', $category)->get();
                $products = $products1->merge($products2);
            }
            if($count_farba == 3){
                $products1 = Color::find($farba[0])->products()->where('type','like', $category)->get();
                $products2 = Color::find($farba[1])->products()->where('type','like', $category)->get();
                $products3 = Color::find($farba[2])->products()->where('type','like', $category)->get();
                $products = $products1->merge($products2);
                $products = $products->merge($products3);
            }

        }
        //ak farba nie je ziadna zaskrtnuta
        else{
            $products = Product::all()->where('type','like', $category);
        }


        $products = $products->when
        ($mincena, function($query, $mincena){
            return $query->where('price','>',$mincena);
        })->when($maxcena, function($query, $maxcena){
            return $query->where('price','<',$maxcena);
        });


        //dd($order);
        if ($order == 'DESC'){
            $products = $products->sortByDesc('price');
        }

        else{
            $products = $products->sortBy('price');
        }

        $products = collect($products)->filter(function ($item) use ($search) {
            return false !== stristr($item->name, $search);
        });

        $products = $products->paginate(9);

/*
                $products = Product::all();
        $products =Product::find(1)->colors()->where('color_id', '3');
        //$products->colors();
                //$products->colors()->where('color_id', '1');
                $products = $products->paginate(9);


                $products1 = Product::whereHas('colors', function($q) {
                    $q->where('color_id', 1);
                })->get();
                $products = $products->paginate(9);
        */


        $photos = array();
        //dd($products->items());
/*
        $produkty = $products->items();
        $produkt = reset($produkty);
        //dd($produkt);
        $fotky = $produkt->images()->get();
        if(!empty($fotky)) {
            $fotka = $fotky[0];
            //dd($fotka);
            //$photos = $photos->merge($fotka);

            array_push($photos, $fotka);
        }*/
        //dd($photos);


        foreach ($products as $product){
            //dd($product);
            //$photos = Product::find($product->id)->images;
            $fotky = $product->images()->get();
            if(!empty($fotky)) {
                $fotka = $fotky[0];
                //dd($fotka);
                //$photos = $photos->merge($fotka);

                array_push($photos, $fotka);
            }
            //dd($photos);
        }
        //$photos = Product::find($product->id)->images;
        //dd($photos);

        return view('layout.products', compact('photos', $photos, 'products', $products, 'nazov_kategorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        /**
        Product::create(['name' => $request->name,'description' => $request->description, 'price' => $request->price]);
        Product::create(['name' => $request->name,'description' => $request->description, 'price' => $request->price]);

        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        $product = Product::create(['name' => $request->name,'description' => $request->description, 'price' => $request->price]);

        return redirect('/produkt');
         */

        $validation = $request->validate([
        'image1' => 'required_without_all:image2,image3|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image2' => 'required_without_all:image1,image3|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image3' => 'required_without_all:image1,image2|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'type' => 'required',
        'quantity' => 'required',
        'color1' => 'required_without_all:color2,color3',
        'color2' => 'required_without_all:color1,color3',
        'color3' => 'required_without_all:color2,color1',

        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'quantity' => $request->quantity,
        ]);

        // Fotka
        //$imageName = time().'.'.$request->image->extension();
        if ($request->has('image1')) {
            $image = $validation['image1'];
            $imageName = $product->id . '-' . md5($image->getClientOriginalName()) . time() . '.' . $image->getClientOriginalExtension();

            //$request->image->move(public_path('img/Sperky'), $imageName);
            //$uploadedImage = $image->storeAs(config('app.tasks_images_path'), $imageName);
            $uploadedImage = $request->image1->move(public_path('img/Sperky'), $imageName);

            if ($uploadedImage) {
                Image::create(['file' => $imageName, 'product_id' => $product->id]);
            } else {
            }
        }

        if ($request->has('image2')) {
            $image = $validation['image2'];
            $imageName = $product->id . '-' . md5($image->getClientOriginalName()) . time() . '.' . $image->getClientOriginalExtension();

            //$request->image->move(public_path('img/Sperky'), $imageName);
            $uploadedImage = $request->image2->move(public_path('img/Sperky'), $imageName);

            if ($uploadedImage) {
                Image::create(['file' => $imageName, 'product_id' => $product->id]);
            } else {
            }
        }

        if ($request->has('image3')) {
            $image = $validation['image3'];
            $imageName = $product->id . '-' . md5($image->getClientOriginalName()) . time() . '.' . $image->getClientOriginalExtension();

            //$request->image->move(public_path('img/Sperky'), $imageName);
            //$uploadedImage = $image->storeAs(config('app.tasks_images_path'), $imageName);
            $uploadedImage = $request->image3->move(public_path('img/Sperky'), $imageName);

            if ($uploadedImage) {
                Image::create(['file' => $imageName, 'product_id' => $product->id]);
            } else {
            }
        }

        if ($request->has('color1')){
            $product->colors()->attach(1);
        }

        if ($request->has('color2')){
            $product->colors()->attach(2);
        }

        if ($request->has('color3')){
            $product->colors()->attach(3);
        }


        return redirect('produkt/'. $product->type. '/' . $product->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $photos = Product::find($product->id)->images;
        return view('layout.productdetail',compact('product', $product, 'photos', $photos));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $photos = Product::find($product->id)->images;
        return view('layout.admin_update', compact('product', $product, 'photos', $photos));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        // dostanem ID fotky $request->remove_images[0];
        //dostanem pocet fotiek na zmazanie count($request->remove_images)
        //$photo = Image::find($request->remove_images[0]);
        //dd($request->remove_images);




        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->save();

        //odstranenie fotiek
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $image_id) {
                $photo = Image::find($image_id);
                unlink(public_path('img/Sperky/') . $photo->file);
                $photo->delete();
            }
        }


        //pridanie fotky
        $validation = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->has('image')) {
            $image = $validation['image'];

            $imageName = $product->id . '-' . md5($image->getClientOriginalName()) . time() . '.' . $image->getClientOriginalExtension();

            //$request->image->move(public_path('img/Sperky'), $imageName);
            //$uploadedImage = $image->storeAs(config('app.tasks_images_path'), $imageName);
            $uploadedImage = $request->image->move(public_path('img/Sperky'), $imageName);

            if ($uploadedImage) {
                Image::create(['file' => $imageName, 'product_id' => $product->id]);
            } else {
            }
        }

        return redirect('produkt/'. $product->type. '/' . $product->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $photos = Product::find($product->id)->images;

        foreach ($photos as $photo) {
            unlink(public_path('img/Sperky/') . $photo->file);
        }

        $product->delete();
        return redirect('/');

    }
}
