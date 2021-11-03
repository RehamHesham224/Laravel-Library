<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    public  function  index(){
        return view('upload');
    }
    public function upload(Request  $request){
        $this->validate($request,[
            'title'=>'required',
            'author'=>'required',
            'info'=>'required',
            'image'=>'required|image',
            'bookfile'=>'required|mimes:pdf',
        ]);
        if($request->hasFile('image')){
            $imageExt=$request->file('image')->getClientOriginalExtension();
            $imageName=time().'thumbnail'.'.'.$imageExt;
//            $request->file('image')->storeAs('storage/thumbnails',$imageName);
            $request->file('image')->move(public_path('storage/thumbnails'),$imageName);
        }
        if($request->hasFile('bookfile')){
            $bookExt=$request->file('bookfile')->getClientOriginalExtension();
            $bookName=time().'bookfile'.'.'.$bookExt;
//            $request->file('bookfile')->storeAs('storage/thumbnails',$bookName);
            $request->file('bookfile')->move(public_path('storage/thumbnails'),$bookName);
        }
        $book=new Book();
        $book->title=$request->title;
        $book->author=$request->author;
        $book->info=$request->info;
        $book->image=$imageName;
        $book->bookfile=$bookName;
        $book->user_id=auth()->user()->id;
        $book->category_id=$request->category;
        $book->save();
        return redirect(route('upload'))->with('msg','Uploaded Successfully');
//        return public_path('storage\thumbnails');

    }
}
