<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAssignClassTeacherRequest;
use App\Http\Requests\StoreAssignClassTeacherRequest;
use App\Http\Requests\UpdateAssignClassTeacherRequest;
use App\Models\AssignClassTeacher;
use App\Models\ClassName;
use App\Models\ClassPackage;
//use App\Models\RegisterClass;
use App\Models\User;
use Gate;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssignClassTeacherController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('assign_class_teacher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignClassTeachers = AssignClassTeacher::with(['teacher', 'registrar'])->get();

       $teachers=User::whereHas('roles', function($q){$q->whereIn('title', ['teacher']);})->get();
       $students=User::whereHas('roles', function($q){$q->whereIn('title', ['registrar']);})->get();
       
        $register_classes = ClassName::get();

        return view('admin.assignClassTeachers.index', compact('assignClassTeachers', 'teachers','students', 'register_classes'));
    }

    public function create()
    {
        abort_if(Gate::denies('assign_class_teacher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        
        $teachers = User::with('roles')
                        ->whereRelation('roles','id', 'like', '%'.'2'.'%')
                        ->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
                        
        $students = User::with('roles')
                        ->whereRelation('roles','id', 'like', '%'.'4'.'%')
                        ->select('id', DB::raw("CONCAT(users.name,' ',code) AS full_name"))->get()->pluck('full_name', 'id');
                
       $classes = ClassName::pluck('name', 'id');

       $classpackage = ClassPackage::pluck('name', 'id');
       

        return view('admin.assignClassTeachers.create', compact('teachers', 'students', 'classes','classpackage'));
    }

    public function store(StoreAssignClassTeacherRequest $request)
    {
      
        $assignClassTeacher = AssignClassTeacher::create($request->all());
        $assignClassTeacher->classes()->sync($request->input('classes', []));
        $assignClassTeacher->classpackage()->sync($request->input('classpackage', []));

        return redirect()->route('admin.assign-class-teachers.index');
    }

    public function edit(AssignClassTeacher $assignClassTeacher)
    {
        abort_if(Gate::denies('assign_class_teacher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teachers = User::with('roles')
        ->whereRelation('roles','id', 'like', '%'.'2'.'%')
        ->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
         $registrars = User::with('roles')
        ->whereRelation('roles','id', 'like', '%'.'4'.'%')
        ->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        $classes = ClassName::pluck('name', 'id');

        $classpackages = ClassPackage::pluck('name', 'id');
      
        $assignClassTeacher->load('teacher', 'registrar', 'classes','classpackage');

        return view('admin.assignClassTeachers.edit', compact('teachers', 'registrars', 'classes', 'assignClassTeacher','classpackages'));
    }

    public function update(UpdateAssignClassTeacherRequest $request, AssignClassTeacher $assignClassTeacher)
    {
        $assignClassTeacher->update($request->all());
        //$assignClassTeacher->classpackage()->sync($request->input('classpackage', []));
       // $assignClassTeacher->classes()->sync($request->input('classes', []));
       if ($request->has('classpackage')) {
        $assignClassTeacher->classpackage()->sync($request->input('classpackage'));
    }

    if ($request->has('classes')) {
        $assignClassTeacher->classes()->sync($request->input('classes'));
    }
       

        return redirect()->route('admin.assign-class-teachers.index');
    }

    public function show(AssignClassTeacher $assignClassTeacher)
    {
        abort_if(Gate::denies('assign_class_teacher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignClassTeacher->load('teacher', 'student', 'class');

        return view('admin.assignClassTeachers.show', compact('assignClassTeacher'));
    }

    public function destroy(AssignClassTeacher $assignClassTeacher)
    {
        abort_if(Gate::denies('assign_class_teacher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignClassTeacher->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssignClassTeacherRequest $request)
    {
        AssignClassTeacher::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
