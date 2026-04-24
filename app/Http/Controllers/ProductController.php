<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
	    return view('products.all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. التحقق من البيانات
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:1|max:999999',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2. معالجة الصورة
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // نقل الصورة للمجلد المطلوب
            $image->move(public_path('img'), $imageName);
        }

        // 3. تخزين البيانات بشكل صريح (تجنباً لخطأ الـ MassAssignment)
        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image'       => "img/" . $imageName, 
        ]);

        // 4. العودة مع رسالة نجاح
        return redirect()->back()->with('success', 'Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $products = Product::findOrFail($id);
        return response()->view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);

        return response()->view('products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 1. جلب المنتج من قاعدة البيانات
    $product = Product::findOrFail($id);

    // 2. التحقق من البيانات
    $request->validate([
        'name'        => 'required|string|max:255',
        'description' => 'required|string',
        'price'       => 'required|numeric|min:1|max:999999',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // الصورة هنا nullable (اختيارية)
    ]);

    // 3. تحديث النصوص الأساسية
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;

    // 4. التعامل مع الصورة (إذا تم رفع صورة جديدة فقط)
    if ($request->hasFile('image')) {
        
        // (اختياري) حذف الصورة القديمة من المجلد لكي لا يتراكم ملفات بلا فائدة
        if ($product->image && file_exists(public_path('img/' . $product->image))) {
            unlink(public_path('img/' . $product->image));
        }

        // رفع الصورة الجديدة
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img'), $imageName);
        
        // تحديث اسم الصورة في قاعدة البيانات
        $product->image = "img/" . $imageName;
    }

    // 5. حفظ كل التغييرات
    $product->save();

    // 6. التوجيه لصفحة العرض مع رسالة نجاح
    return redirect()->back()->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'The Product Deleted Successfully!');
    }
}
