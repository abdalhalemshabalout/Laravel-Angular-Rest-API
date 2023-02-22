<?php

namespace App\Http\Controllers;

use App\Models\Book;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $book = Book::select('id','name','price','description')->get();
        return $book;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required', 
            'discription' => 'required',
        ]);

            Book::create($request->post());
            return response()->json([
                'message' => 'new item added successfully'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response()->json([
            'book' => $book        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required', 
            'discription' => 'required',
        ]);
            $book->fill($request->post())->update();
            return response()->json([
                'message' => 'new item updated successfully'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message' => 'this item deleted successfully'
        ]);
    }
}
