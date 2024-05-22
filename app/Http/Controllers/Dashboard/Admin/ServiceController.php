<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function index(ServiceDataTable $service)
    {
        return $service->render('dashboard.admin.services.index', ['title' => 'الخدمات']);
    }

    public function store(Request $request)
    {
        try {
            $slider = Service::create($request->input());
            Session::flash('message', 'تم الحفظ بنجاح');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Try again later Something went wrong');
        }
    }


    public function update(Request $request, $id)
    {

        try {
            $section = Service::findorfail($id);
            $section->update($request->input());
            Session::flash('message', 'تم التحديث بنجاح');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'عفوا حاول مره اخرى');
        }
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $slider = Service::findOrFail($id);
            $slider->delete();
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حاول مره اخرى');
        }
        Session::flash('message', 'تم الحذف بنجاح');
        Session::flash('alert-class', 'alert-danger');
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}