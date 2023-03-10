<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\CoursesModel;
use Illuminate\Http\Request;
use App\Models\StudentsModel;
use App\Models\BatchStudentsModel;
use App\Traits\MiscellaneousTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AcademicSessionsModel;

class StudentsManagementController extends Controller
{
  use MiscellaneousTrait;

  public function index()
  {
    $data['batches'] = AcademicSessionsModel::find(getCurrentAcademicSession())->getBatches;
    $data['totalStudents'] = 0;

    foreach($data['batches'] as $batch)
    {
      $data['totalStudents'] += count($batch->getStudents);
    }
    
    $data['courses'] = CoursesModel::all();
    return view('backend.studentsManagement.index', $data);
  }

  public function create(Request $request)
  {
    $request->validate(
      [
        'firstName' => 'required|max:255',
        'lastName' => 'required|max:255',
        'guardianName' => 'required|max:255',
        'contactNumber' => 'required',
        'batchId' => 'required',
        'courseId' => 'required',
      ]
    );

    DB::transaction(function () use ($request)
      {
        $newStudent = StudentsModel::create($request->all());
        BatchStudentsModel::create(['batchId' => $request->batchId, 'studentId' => $newStudent->id]);
      }
    );
    $request->session()->flash('success', 'Student added successfully!');
    return 'success';
  }

  public function update(Request $request)
  {
    $request->validate(
      [
        'firstName' => 'required|max:255',
        'lastName' => 'required|max:255',
        'guardianName' => 'required|max:255',
        'contactNumber' => 'required',
        'batchId' => 'required',
        'courseId' => 'required',
      ]
    );

    StudentsModel::find($request->id)->update($request->all());
    $request->session()->flash('success', 'Student updated successfully!');
    return 'success';
  }

  public function delete($id)
  {
    DB::transaction(function () use ($id)
      {
        $student = StudentsModel::findOrFail($id);
        BatchStudentsModel::where('studentId', $student->id)->delete();
        $student->delete();
      }
    );
    return back()->with('success', 'Student deleted successfully!');
  }
}
