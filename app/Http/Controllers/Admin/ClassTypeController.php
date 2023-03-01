<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyClassTypeRequest;
use App\Http\Requests\StoreClassTypeRequest;
use App\Http\Requests\UpdateClassTypeRequest;
use App\Models\ClassType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClassTypeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('class_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classTypes = ClassType::all();

        return view('admin.classTypes.index', compact('classTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('class_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classTypes.create');
    }

    public function store(StoreClassTypeRequest $request)
    {
        $classType = ClassType::create($request->all());

        return redirect()->route('admin.class-types.index');
    }

    public function edit(ClassType $classType)
    {
        abort_if(Gate::denies('class_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classTypes.edit', compact('classType'));
    }

    public function update(UpdateClassTypeRequest $request, ClassType $classType)
    {
        $classType->update($request->all());

        return redirect()->route('admin.class-types.index');
    }

    public function show(ClassType $classType)
    {
        abort_if(Gate::denies('class_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classTypes.show', compact('classType'));
    }

    public function destroy(ClassType $classType)
    {
        abort_if(Gate::denies('class_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classType->delete();

        return back();
    }

    public function massDestroy(MassDestroyClassTypeRequest $request)
    {
        ClassType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
