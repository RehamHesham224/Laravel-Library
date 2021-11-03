<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public  function  index(){
        $books=Book::latest()->get();
//        $books=Book::latest()->paginate(1);
        return view('welcome')->with('books',$books);
    }
    public  function  viewCategory($id){
        $category=Category::find($id);
        $books=$category->books;
        return view('viewcategory')->with(['books'=>$books,'category'=>$category]);
    }
    public  function viewBook($id){
        $book=Book::find($id);
        return view('book')->with('book',$book);
    }
    public  function  addComment(Request $request,$id){
        $this->validate($request,[
            'comment'=>'required|max:200'
        ]);
        $book=Book::find($id);
        $comment=new Comment();
        $comment->comment=$request->comment;
        $comment->user_id=auth()->user()->id;
        $comment->book_id=$book->id;
        $comment->save();
        return redirect()->back();
    }
}
