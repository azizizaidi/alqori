<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRegisterClassRequest;
use App\Http\Requests\StoreRegisterClassRequest;
use App\Http\Requests\UpdateRegisterClassRequest;
use App\Models\ClassName;
use App\Models\ClassNumber;
use App\Models\ClassPackage;
use App\Models\ClassType;
use App\Models\RegisterClass;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterClassController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('register_class_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registerClasses = RegisterClass::with(['class_type', 'class_name', 'class_package', 'class_numer'])->get();

        $class_types = ClassType::get();

        $class_names = ClassName::get();

        $class_packages = ClassPackage::get();

        $class_numbers = ClassNumber::get();

        return view('admin.registerClasses.index', compact('registerClasses', 'class_types', 'class_names', 'class_packages', 'class_numbers'));
    }

    public function create()
    {
        abort_if(Gate::denies('register_class_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $class_types = ClassType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $class_names = ClassName::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $class_packages = ClassPackage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $class_numers = ClassNumber::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.registerClasses.create', compact('class_types', 'class_names', 'class_packages', 'class_numers'));
    }

    public function store(StoreRegisterClassRequest $request)
    {
        $registerClass = RegisterClass::create($request->all());

        return redirect()->route('admin.register-classes.index');
    }

    public function edit(RegisterClass $registerClass)
    {
        abort_if(Gate::denies('register_class_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $class_types = ClassType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $class_names = ClassName::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $class_packages = ClassPackage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $class_numers = ClassNumber::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registerClass->load('class_type', 'class_name', 'class_package', 'class_numer');

        return view('admin.registerClasses.edit', compact('class_types', 'class_names', 'class_packages', 'class_numers', 'registerClass'));
    }

    public function update(UpdateRegisterClassRequest $request, RegisterClass $registerClass)
    {
        $registerClass->update($request->all());

        return redirect()->route('admin.register-classes.index');
    }

    public function show(RegisterClass $registerClass)
    {
        abort_if(Gate::denies('register_class_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registerClass->load('class_type', 'class_name', 'class_package', 'class_numer');

        return view('admin.registerClasses.show', compact('registerClass'));
    }

    public function destroy(RegisterClass $registerClass)
    {
        abort_if(Gate::denies('register_class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registerClass->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegisterClassRequest $request)
    {
        RegisterClass::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
