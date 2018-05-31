<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GeneralDesc;
use Illuminate\Http\Request;

class GeneralDescController extends Controller
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
            $generaldesc = GeneralDesc::where('category', 'LIKE', "%$keyword%")
                ->orWhere('desc', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $generaldesc = GeneralDesc::latest()->paginate($perPage);
        }

        return view('admin.general-desc.index', compact('generaldesc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.general-desc.create');
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
        
        GeneralDesc::create($requestData);

        return redirect('admin/general-desc')->with('flash_message', 'GeneralDesc added!');
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
        $generaldesc = GeneralDesc::findOrFail($id);

        return view('admin.general-desc.show', compact('generaldesc'));
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
        $generaldesc = GeneralDesc::findOrFail($id);

        return view('admin.general-desc.edit', compact('generaldesc'));
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
        
        $generaldesc = GeneralDesc::findOrFail($id);
        $generaldesc->update($requestData);

        return redirect('admin/general-desc')->with('flash_message', 'GeneralDesc updated!');
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
        $generalDesc = GeneralDesc::find($id);
        $generalDesc->delete();

        return redirect('admin/general-desc')->with('flash_message', 'GeneralDesc deleted!');
    }
}
