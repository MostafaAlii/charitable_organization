<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\PersonalStatusDataTable;
use App\Http\Controllers\Controller;
use App\Models\PersonalStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PersonalStatusController extends Controller
{
    public function index(PersonalStatusDataTable $section) {
        return $section->render('dashboard.admin.personalStatus.index', ['title' => 'الحالات']);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'children_number' => 'required|string|max:255',
            'wife_name' => 'required|string|max:255',
            'nationality_id' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'address' => 'nullable|string',
            'section_id' => 'required|exists:sections,id',
        ]);
        $validatedData['family_code'] = PersonalStatus::generateUniqueFamilyCode();
        $validatedData['admin_id'] = get_user_data()->id;
        $personalStatus = new PersonalStatus();
        $personalStatus->fill($validatedData);
        $personalStatus->save();
        Session::flash('message', 'تم الحفظ بنجاح');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $slider = PersonalStatus::findOrFail($id);
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