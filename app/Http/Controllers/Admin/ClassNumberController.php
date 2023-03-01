<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyClassNumberRequest;
use App\Http\Requests\StoreClassNumberRequest;
use App\Http\Requests\UpdateClassNumberRequest;
use App\Models\ClassNumber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClassNumberController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('class_number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classNumbers = ClassNumber::all();

        return view('admin.classNumbers.index', compact('classNumbers'));
    }

    public function create()
    {
        abort_if(Gate::denies('class_number_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classNumbers.create');
    }

    public function store(StoreClassNumberRequest $request)
    {
        $classNumber = ClassNumber::create($request->all());

        return redirect()->route('admin.class-numbers.index');
    }

    public function edit(ClassNumber $classNumber)
    {
        abort_if(Gate::denies('class_number_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classNumbers.edit', compact('classNumber'));
    }

    public function update(UpdateClassNumberRequest $request, ClassNumber $classNumber)
    {
        $classNumber->update($request->all());

        return redirect()->route('admin.class-numbers.index');
    }

    public function show(ClassNumber $classNumber)
    {
        abort_if(Gate::denies('class_number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classNumbers.show', compact('classNumber'));
    }

    public function destroy(ClassNumber $classNumber)
    {
        abort_if(Gate::denies('class_number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classNumber->delete();

        return back();
    }

    public function massDestroy(MassDestroyClassNumberRequest $request)
    {
        ClassNumber::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
