<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyClassNameRequest;
use App\Http\Requests\StoreClassNameRequest;
use App\Http\Requests\UpdateClassNameRequest;
use App\Models\ClassName;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClassNameController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('class_name_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classNames = ClassName::all();

        return view('admin.classNames.index', compact('classNames'));
    }

    public function create()
    {
        abort_if(Gate::denies('class_name_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classNames.create');
    }

    public function store(StoreClassNameRequest $request)
    {
        $className = ClassName::create($request->all());

        return redirect()->route('admin.class-names.index');
    }

    public function edit(ClassName $className)
    {
        abort_if(Gate::denies('class_name_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classNames.edit', compact('className'));
    }

    public function update(UpdateClassNameRequest $request, ClassName $className)
    {
        $className->update($request->all());

        return redirect()->route('admin.class-names.index');
    }

    public function show(ClassName $className)
    {
        abort_if(Gate::denies('class_name_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classNames.show', compact('className'));
    }

    public function destroy(ClassName $className)
    {
        abort_if(Gate::denies('class_name_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $className->delete();

        return back();
    }

    public function massDestroy(MassDestroyClassNameRequest $request)
    {
        ClassName::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
