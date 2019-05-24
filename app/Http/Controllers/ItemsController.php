<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Item;
use App\User;
use App\Category;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class ItemsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show', 'search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $items=Item::orderBy('created_at', 'desc')->paginate(4);
        return view('home.index')->with('items', $items);
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return item details form
        return view('home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating
        $this->validate($request, array('item_name'=>'required|Max:255',
    'item_price'=>'required', 'category_id'=>'required', 'item_description'=>'required', 'item_vendor'=>'required', 'item_vendor_phone'=>'required'));
     
    //adding the details to the database
    //Upload the image
    $uploadedFile = $request->file('item_image');

    //Get File Name
    $file_name = $uploadedFile->getClientOriginalName();

    //Display File Extension
    $file_extension= $uploadedFile->getClientOriginalExtension();

    //Display File Size
    $file_size= $uploadedFile->getSize();

    //Display File Mime Type
    $file_mime= $uploadedFile->getMimeType();

    //Move Uploaded File
    $destinationPath = 'storage/images/items_images';

    $uploadedFileName= $file_name.$file_size.time().'.'.$file_extension;
    $uploadedFile->move($destinationPath, $uploadedFileName);

    //Resize image here
    // open an image file
    $resizedImg = Image::make('storage/images/items_images/'.$uploadedFileName);
   
    // now you are able to resize the instance
    $resizedImg->resize(200, 200);
    //open logo image to resize
    $resizedImg->text('www.gataka.com', 0, 0, function($font) {
        $font->color(array(255, 255, 255, 0.5));
        $font->align('center');
        $font->valign('top');
        $font->angle(45);
        $font->size(24);
    });
    
    // finally we save the image as a new file
    $resizedImg->save('storage/images/items_images/'.$uploadedFileName);

    $item= new Item;
    $item->item_name=$request->item_name;
    $item->item_quantity=$request->item_quantity;
    $item->item_vendor=$request->item_vendor;
    $item->item_vendor_phone=$request->item_vendor_phone;
    $item->item_location=$request->item_location;
    $item->item_description=$request->item_description;
    $item->item_price=$request->item_price;
    $item->category_id=$request->category_id;
    $item->item_user_id=$request->item_user_id;
    $item->item_image=$uploadedFileName;
    $item->save();

    $text = "A new Item has been published to the website\n"
            . "<b>Item Name: </b>\n"
            . "$request->item_name\n"
            . "<b>Item Vendor: </b>\n"
            . "$request->item_vendor\n"
            . "<b>Item Price: </b>\n"
            . "$request->item_price\n"
            . "<b>Item Description: </b>\n"
            . "$request->item_description\n"
            ."Visit: www.gataka.co.ke to view the full product details";
 
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', -1001487464525.0),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
        // $photo = $request->file('item_image');
 
        // Telegram::sendPhoto([
        //     'chat_id' => env('TELEGRAM_CHANNEL_ID', -1001487464525.0),
        //     'photo' => InputFile::createFromContents(file_get_contents($photo->getRealPath()), str_random(10) . '.' . $photo->getClientOriginalExtension())
        // ]);
    return redirect('/')->with('success', 'The item has been added successfully');
    

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
        
        $item=Item::find($id);
        $expiresAt = now()->addHours(3);

            views($item)
            ->delayInSession($expiresAt)
            ->record();
             
            
            $currentDate = date("d/M/Y h:i:s A");
            $text = "<b>www.gataka.co.ke views reports</b>\n"
            . "Someone  has viewed:\n"
            . "<b>$item->item_name</b>\n"
            .'on date: '.$currentDate;
 
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', -1001487464525.0),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

return view('home.show')->withItem($item);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return edit view
        $item=Item::find($id);
        return view('home.edit')->with('item', $item);
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
           //validating
           $this->validate($request, array('item_name'=>'required|Max:255',
           'item_price'=>'required', 'item_description'=>'required', 'item_vendor'=>'required', 'item_vendor_phone'=>'required'));
            
           //adding the details to the database
           //Upload the image
           $uploadedFile = $request->file('item_image');
       
           //Get File Name
           $file_name = $uploadedFile->getClientOriginalName();
       
           //Display File Extension
           $file_extension= $uploadedFile->getClientOriginalExtension();
       
           //Display File Size
           $file_size= $uploadedFile->getSize();
       
           //Display File Mime Type
           $file_mime= $uploadedFile->getMimeType();
       
           //Move Uploaded File
           $destinationPath = 'storage/images/items_images';
       
           $uploadedFileName= $file_name.$file_size.time().'.'.$file_extension;
           $uploadedFile->move($destinationPath, $uploadedFileName);
       
           //Resize image here
           // open an image file
           $resizedImg = Image::make('storage/images/items_images/'.$uploadedFileName);
          
           // now you are able to resize the instance
           $resizedImg->resize(200, 200);
           //open logo image to resize
           $resizedImg->text('Gataka Online.');
           
           // finally we save the image as a new file
           $resizedImg->save('storage/images/items_images/'.$uploadedFileName);
       
           $item= Item::find($id);
           $item->item_name=$request->input('item_name');
           $item->item_quantity=$request->input('item_quantity');
           $item->item_vendor=$request->input('item_vendor');
           $item->category_id=$request->input('category_id');
           $item->item_user_id=$request->input('item_user_id');
           $item->item_vendor_phone=$request->input('item_vendor_phone');
           $item->item_location=$request->input('item_location');
           $item->item_description=$request->input('item_description');
           $item->item_price=$request->input('item_price');
           $item->item_image=$uploadedFileName;
           $item->save();
 
           $currentDate = date("d/M/Y h:i:s A"); 
           $text = "<b>www.gataka.co.ke product edit reports</b>\n"
            . "A product has been edited to :\n"
            . "<b>$request->item_name</b>\n"
            .'on date: '.$currentDate;
 
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', -1001487464525.0),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
           return redirect('/')->with('success', 'The item has been updated successfully');
           
       
    }



    public function search(Request $request)
    {
// Gets the query string from our form submission
$query = $request->input('search');
// Returns an array of articles that have the query string located somewhere within
// our articles titles. Paginates them so we can break up lots of search results.
$items = Item::where('item_name', 'LIKE', '%' . $query . '%')->get();

$currentDate = date("d/M/Y h:i:s A"); 
$text = "<b>www.gataka.co.ke search reports</b>\n"
            . "Someone is searching for:\n"
            . "<b>$query</b>\n"
            .'on date: '."<b>$currentDate </b>\n"
            ."Please whoever has can upload it on the website";
 
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', -1001487464525.0),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

// returns a view and passes the view the list of articles and the original query.
return view('home.search_results')->withItems($items);
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

    public function featured()
    {
        //send data to featured
        return view('items.featured');
    }

    public function usersonline()
    {
        $user= new User;
        $usersOnline= $user->allOnline();
        return view('inc.nav')->withUsersOnline($usersOnline);
    }
    
}
