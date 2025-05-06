<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Setting\Models\Setting;

use Modules\Setting\Enums\SettingType;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $settings = Setting::all();
        // $settings = Setting::where('type', 0)->get();
        // $settings = Setting::where('type', 0)->where('status', 1)->get();
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('key')->get();
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('key')->paginate(10);
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('key')->simplePaginate(10);
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('key')->cursorPaginate(10);
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('key')->get();
        // $settings = Setting::where('type', 0)->where('status', 1)->orderBy('id')->get();
        // return view('setting::index', compact('settings'));


                // كل الأنواع
                $types = SettingType::cases();

                // النوع الحالي من الـ query string أو الافتراضي
                $current = $request->query('type')
                    ? SettingType::from($request->query('type'))
                    : $types[0];

                // جلب الإعدادات الخاصة بالنوع الحالي
                $settings = Setting::get();

                return view('setting::index', compact('types', 'current', 'settings'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setting::create');
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
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('setting::edit');
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
