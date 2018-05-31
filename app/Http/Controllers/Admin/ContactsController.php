<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\FollowUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
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
            $followUs = FollowUs::where('social_type', 'LIKE', "%$keyword%")
                ->orWhere('value', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $followUs = FollowUs::latest()->paginate($perPage);
        }

        return view('admin.followus.index', compact('followUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.followus.create');
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
            'social_type' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/followus');
        }
        FollowUs::create($requestData);

        return redirect('admin/follow-us')->with('flash_message', 'Follow Us added!');
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
        $followUs = FollowUs::findOrFail($id);

        return view('admin.followus.show', compact('followUs'));
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
        $followUs = FollowUs::findOrFail($id);

        return view('admin.followus.edit', compact('followUs'));
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
            'social_type' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/FollowUss');
        }
        $followUs = FollowUs::findOrFail($id);
        $followUs->update($requestData);

        return redirect('admin/follow-us')->with('flash_message', 'Follow Us updated!');
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
        $followUs = FollowUs::find($id);
        $followUs->delete();

        return redirect('admin/follow-us')->with('flash_message', 'Follow Us deleted!');
    }
}
