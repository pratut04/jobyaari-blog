<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display settings
     */
    public function index()
    {
        $setting = Setting::first();

        return view('settings.index', compact('setting'));
    }

    /**
     * Update settings
     */
    public function store(Request $request)
    {
        $setting = Setting::first();

        if(!$setting) {

            $setting = new Setting();
        }

        $setting->site_name = $request->site_name;
        $setting->footer_text = $request->footer_text;
        $setting->seo_title = $request->seo_title;
        $setting->seo_description = $request->seo_description;
        $setting->contact_email = $request->contact_email;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;

        $setting->save();

        return redirect()->back()
            ->with('success', 'Settings updated successfully');
    }
}