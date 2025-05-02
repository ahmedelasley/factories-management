<?php

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Settings\Entities\Setting;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $settings = Setting::all();
        // $settings = Setting::where('type', 0)->get();
        // $settings = Setting::where('type', 0)->where('status', 1)->get();
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('key')->get();
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('key')->paginate(10);
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('key')->simplePaginate(10);
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('key')->cursorPaginate(10);
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('key')->get();
        $settings = Setting::where('type', 0)->where('status', 1)->orderBy('id')->get();
        return view('settings::index', compact('settings'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('settings::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('settings::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
