<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Todo;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // variable kategori nilainya dari model kategori yang hubungannya langsung ke tabel kategori
        $category = Category::all();

        // variabel category_id berisi nilai dari parameter category yg di url
        $category_id = $request->category;

        // php kalo bikin variable identik dengan dollar (?)
        $todo = Todo::where('id','!=',0);

        // dicek dulu, kalo category ada nilai dia bakal nambahin where lagi sesuai dgn variable di kategori id
        if(isset($category_id)){
            $todo = $todo->where('category_id', $category_id);
        }

        // ditampilkan dalam bentuk page, tergantung nilai maks per page
        $todo = $todo->paginate(5);

        // untuk menampilkan halaman welcome dgn nambahin data yg mau di-parsing, compact adalah jenis data yg mau ditampilin
        return view('welcome', compact('category','todo'));

    }

}
