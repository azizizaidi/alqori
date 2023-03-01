<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyClassPackageRequest;
use App\Http\Requests\StoreClassPackageRequest;
use App\Http\Requests\UpdateClassPackageRequest;
use App\Models\ClassPackage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClassPackageController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('class_package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classPackages = ClassPackage::all();

        return view('admin.classPackages.index', compact('classPackages'));
    }

    public function create()
    {
        abort_if(Gate::denies('class_package_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classPackages.create');
    }

    public function store(StoreClassPackageRequest $request)
    {
        $classPackage = ClassPackage::create($request->all());

        return redirect()->route('admin.class-packages.index');
    }

    public function edit(ClassPackage $classPackage)
    {
        abort_if(Gate::denies('class_package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classPackages.edit', compact('classPackage'));
    }

    public function update(UpdateClassPackageRequest $request, ClassPackage $classPackage)
    {
        $classPackage->update($request->all());

        return redirect()->route('admin.class-packages.index');
    }

    public function show(ClassPackage $classPackage)
    {
        abort_if(Gate::denies('class_package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classPackages.show', compact('classPackage'));
    }

    public function destroy(ClassPackage $classPackage)
    {
        abort_if(Gate::denies('class_package_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classPackage->delete();

        return back();
    }

    public function massDestroy(MassDestroyClassPackageRequest $request)
    {
        ClassPackage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
