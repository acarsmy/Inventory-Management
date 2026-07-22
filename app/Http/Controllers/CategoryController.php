<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function Store(Request $request)
    {
        $request->validate([ //Formdan gelen name alanının dolu geldiğinden ve veritabanındaki categories tablosunda aynısının bulunmadığından emin ol
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.required' => 'Kategori adı boş bırakılamaz.',
            'name.unique' => 'Bu kategori zaten mevcut.',
        ]);
        Category::create([ //Category modelini kullanarak gelen name değerini veritabanındaki categories tablosuna yazar
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'Kategori başarıyla eklendi.');
    }
   
    public function Destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Kategori başarıyla silindi.');
    }
}
