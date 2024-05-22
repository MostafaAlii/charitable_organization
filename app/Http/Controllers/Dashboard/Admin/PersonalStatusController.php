<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\PersonalStatusDataTable;
use App\Http\Controllers\Controller;
use App\Models\{PersonalStatus, PersonalImage};
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

    public function destroy(string $id) {
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

    public function addImages($personalStatusId) {
        $personalStatus = PersonalStatus::findOrFail($personalStatusId);
        $images = PersonalImage::get(['photo']);
        return view('dashboard.admin.personalStatus.images', ['title' => 'صور الحاله', 'personalStatus' => $personalStatus, 'images' => $images]);
    }

    public function savePersonalStatusCaseImages(Request $request) {
        $file = $request->file('dzfile');
        $filename = uploadImage('personal', $file);
        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function savePersonalStatusCaseImagesDB(Request $request){
        try {
            if ($request->has('document') && count($request->document) > 0) {
                foreach ($request->document as $image) {
                    PersonalImage::create([
                        'personal_statuses_id' => $request->personal_statuses_id,
                        'photo' => $image,
                    ]);
                }
            }
            Session::flash('message', 'تم الحفظ بنجاح');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        }catch(\Exception $ex){
            Session::flash('message', 'حدث خطا حاول مره اخرى');
            Session::flash('alert-class', 'alert-danger');
        }
    }
}