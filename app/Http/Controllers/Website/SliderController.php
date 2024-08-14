<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('mywebsite.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('mywebsite.sliders.create');
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
        'image' => 'required|image',
    ]);

    $slider = new Slider;
    $slider->title = $request->input('title');
    $slider->service = $request->input('service');
    $slider->description = $request->input('description');

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move('images/', $fileName);
        $filePath = 'images/' . $fileName;
        $slider->image = $filePath;
    }

    $slider->save();

    return redirect()->route('mywebsite.sliders.index')->with('success', 'Slider created successfully');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);
         return view('mywebsite.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('mywebsite.sliders.edit', compact('slider'));
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
    $validatedData = $request->validate([
        'image' => 'image',
    ]);

    $slider = Slider::findOrFail($id);
    $slider->title = $request->input('title');
    $slider->service = $request->input('service');
    $slider->description = $request->input('description');

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move('images/', $fileName);
        $filePath = 'images/' . $fileName;
        $slider->image = $filePath;
    }

    $slider->save();

    return redirect()->route('mywebsite.sliders.index')->with('success', 'Slider updated successfully');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy($id)
{
    $slider = Slider::findOrFail($id);
   
    $slider->delete();

    return redirect()->route('mywebsite.sliders.index')->with('success', 'Slider deleted successfully');
}
}
