<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $dishes = Dish::where('title', 'LIKE', "%$keyword%")
                ->orWhere('desc', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $dishes = Dish::latest()->paginate($perPage);
        }

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        $validator = Validator::make($requestData, [
            'title' => 'bail|required|min:3',
            'price' => 'required',
            'category' => 'required',
            'photo' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/dishes');
        }
        if($request->has('photo')) {
            $path = $request->file('photo')->store('/images');
            $requestData['photo'] = $path;
        }
        Dish::create($requestData);

        return redirect('admin/dishes')->with('flash_message', 'Dish added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $dish = Dish::findOrFail($id);

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);

        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        $validator = Validator::make($requestData, [
            'title' => 'bail|required|min:3',
            'price' => 'required',
            'category' => 'required',
            'photo' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/dishes');
        }
        $dish = Dish::findOrFail($id);
        if ($request->has('photo')) {
            $path = $request->file('photo')->store('/images');
            $requestData['photo'] = $path;
            Storage::delete($dish->photo);
        }
        $dish->update($requestData);

        return redirect('admin/dishes')->with('flash_message', 'Dish updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        $dish->delete();

        return redirect('admin/dishes')->with('flash_message', 'Dish deleted!');
    }
}
