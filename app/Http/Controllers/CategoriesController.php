<?php

namespace App\Http\Controllers;
use App\Category;
use Image;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $categories = Category::orderBy('updated_at', 'desc')->paginate(6);
        if (View::exists('inc.search')) {
            //
            //return view('categories.index')->withCategories($categories);
        }
        return 'The view inc.search doesn\'t exist';

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return views/categories/create.blade.php
        return view('categories.create');
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
        $this->validate($request, ['category_title'=>'required|Max:255',
        'category_image'=>'required', 'category_slug'=>'required']);
        //uploading image
        //file to upload set to request from form
        $fileToUpload = $request->file('category_image');
        //get file to upload name
        $fileToUploadName=$fileToUpload->getClientOriginalName();
        //file to upload extension
        $fileToUploadExtension=$fileToUpload->getClientOriginalExtension();
        //get the file size
        $fileToUploadSize=$fileToUpload->getSize();
        //get mime type
        $fileToUploadMimeType=$fileToUpload->getMimeType();
        //Checking errors and filtering before upload
        $allowedExtensions=['jpg','png','jpeg'];
        if (!in_array($fileToUploadExtension , $allowedExtensions)){
            return redirect('categories/create')->with('error', 'Only jpg, jpeg and png images are allowed');
        }elseif($fileToUploadSize > 2048000){
            return redirect('categories/create')->with('error', 'The image size:' .$fileToUploadSize.'  exceeds the allowed size of 2Mbs');
        }else{
            $folderToUploadFilePath='storage/images/category_images';
            $uploadedFileName=$fileToUploadName.$fileToUploadSize.time().'.'.$fileToUploadExtension;
            $fileToUpload->move($folderToUploadFilePath, $uploadedFileName);
            
            
            
            //Resize and edit image using Intervention Image Package
        $resizedImg = Image::make('storage/images/category_images/'.$uploadedFileName);

        // now you are able to resize the instance
        $resizedImg->resize(200, 200);

        // draw transparent text
        $resizedImg->text('gataka.com', 50, 50, function($font) {
            $font->color('#fff');
            $font->size(200);
            $font->align('center');
        });
        // finally we save the image as a new file
        $resizedImg->save('storage/images/category_images/'.$uploadedFileName);  

        }

        

        //Get inputs submitted in form

        $category = new Category;
        $category->category_title=$request->input('category_title');
        $category->category_slug=$request->input('category_slug');
        $category->category_description=$request->input('category_description');
        $category->category_image=$uploadedFileName;
        $category->save();

        $currentDate = date("d/M/Y h:i:s A"); 
        $text = " Admin has added a new product category\n"
            . "<b>Category Name: </b>\n"
            . "$request->category_title\n"
            .'on date: '."<b>$currentDate </b>\n"
            . "<b>Category Description: </b>\n"
            . "$request->category_description\n"
            ."Visit: www.gataka.co.ke to view products in this category";
 
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', -1001487464525.0),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);


        return redirect('/')->with('success', 'The category has been added successfull');
    
        
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
        $category=Category::find($id);
        $expiresAt = now()->addHours(3);
                    views($category)
                    ->delayInSession($expiresAt)
                    ->record();
        return view('categories.show')->withCategory($category);

        
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
    }
}
