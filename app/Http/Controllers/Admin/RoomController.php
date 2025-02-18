<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index')->with(['rooms'=>$rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenities = Amenity::all();
        $services = Service::all();

        return view('admin.rooms.create')->with(['amenities'=>$amenities,'services'=>$services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|string|min:2',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
            'description' => 'required|string|min:50',
            'allowd_guests' => 'required|integer|min:0',
            'size' => 'required|integer|min:0',
            'bed_quantity' => 'required|integer|min:0',
            'bed_name' => 'required|string|min:1',
            'amenities' => 'array',
            'services' => 'array',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_images' => 'required|min:1',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ];

        $messages = [
            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a valid string.',
            'title.min' => 'The title must be at least 2 characters.',
            'quantity.required' => 'Quantity is required.',
            'quantity.integer' => 'Quantity must be a valid number.',
            'quantity.min' => 'Quantity must be at least 1.',
            'price.required' => 'Price is required.',
            'price.integer' => 'Price must be a valid number.',
            'price.min' => 'Price cannot be negative.',
            'description.required' => 'Description is required.',
            'description.string' => 'Description must be a valid string.',
            'description.min' => 'Description must be at least 50 characters.',
            'allowd_guests.required' => 'Allowed guests field is required.',
            'allowd_guests.integer' => 'Allowed guests must be a number.',
            'allowd_guests.min' => 'Allowed guests cannot be negative.',
            'size.required' => 'Size is required.',
            'size.integer' => 'Size must be a valid number.',
            'size.min' => 'Size cannot be negative.',
            'bed_quantity.required' => 'Bed quantity is required.',
            'bed_quantity.integer' => 'Bed quantity must be a valid number.',
            'bed_quantity.min' => 'Bed quantity cannot be negative.',
            'bed_name.required' => 'Bed name is required.',
            'bed_name.string' => 'Bed name must be a valid string.',
            'bed_name.min' => 'Bed name must be at least 1 character.',
            'amenities.array' => 'Amenities must be an array.',
            'services.array' => 'Services must be an array.',
            'featured_image.required' => 'A featured image is required.',
            'featured_image.image' => 'The featured image must be a valid image file.',
            'featured_image.mimes' => 'The featured image must be a file of type: jpeg, png, jpg, webp.',
            'featured_image.max' => 'The featured image size must not exceed 2MB.',
            'gallery_images.required' => 'Gallery images are required.',
            'gallery_images.min' => 'Please upload at least one gallery image.',
            'gallery_images.*.image' => 'Each gallery image must be a valid image file.',
            'gallery_images.*.mimes' => 'Each gallery image must be a file of type: jpeg, png, jpg, webp.',
            'gallery_images.*.max' => 'Each gallery image must not exceed 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $featuredImageUrl = $request->hasFile('featured_image') ? $this->uploadImage($request->file('featured_image')) : null;

            $galleryImageUrls = [];
            if ($request->has('gallery_images')) {
                foreach ($request->file('gallery_images') as $galleryImage) {
                    if ($galleryImage->isValid()) {
                        $galleryImageUrls[] = $this->uploadImage($galleryImage);
                    }
                }
            }

            $new_room =  Room::create([
                'name' => $request->title,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'description' => $request->description,
                'allowd_guests' => $request->allowd_guests,
                'size' => $request->size,
                'beds' => json_encode(["quentity"=>$request->bed_quantity,'name'=>$request->bed_name]),
                'amenities' => json_encode($request->amenities),
                'service' => json_encode($request->services),
                'feature_img' => $featuredImageUrl,
                'gallery_img' => json_encode($galleryImageUrls),
            ]);

            if($new_room){
                return redirect()->route('rooms.index');
            }else{
                return redirect()->back() ->withErrors(['general' => 'Unable to create or update the room.']);
            }
        }

    }

    /**
     * Upload image and return the url.
     */
    private function uploadImage($file)
    {
        $filePath = "images/rooms/listings/";
        $directoryPath = public_path($filePath);

        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        $originalFileName = $file->getClientOriginalName();

        $imgName = pathinfo($originalFileName, PATHINFO_FILENAME);

        $fileName = md5(time().rand(100000,999999)).'.' . $file->getClientOriginalExtension();

        $file->move($directoryPath, $fileName);

        return url($filePath . $fileName);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::findOrFail($id);
        $amenities = Amenity::all();
        $services = Service::all();

        return view('admin.rooms.edit')->with(['room'=>$room,'amenities'=>$amenities,'services'=>$services]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('rooms.index');
    }

    public function remove_gallery_img(Request $request){
        dd($request->all());

    }
}
