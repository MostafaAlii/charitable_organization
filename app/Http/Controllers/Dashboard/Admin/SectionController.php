<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\SectionDataTable;
use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    public function index(SectionDataTable $section)
    {
        return $section->render('dashboard.admin.sections.index', ['title' => 'الاقسام']);
    }

    public function store(Request $request)
    {
        try {
            $slider = Section::create($request->input());
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
            $section = Section::findorfail($id);
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
            $slider = Section::findOrFail($id);
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