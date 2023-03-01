<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyStdntRgstrRequest;
use App\Http\Requests\StoreStdntRgstrRequest;
use App\Http\Requests\UpdateStdntRgstrRequest;
use App\Models\Registrar;
use App\Models\StdntRgstr;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StdntRgstrController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('stdnt_rgstr_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stdntRgstrs = StdntRgstr::with(['registrar', 'student'])->get();

        $registrars = Registrar::get();

        $students = Student::get();

        return view('admin.stdntRgstrs.index', compact('stdntRgstrs', 'registrars', 'students'));
    }

    public function create()
    {
        abort_if(Gate::denies('stdnt_rgstr_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrars = Registrar::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stdntRgstrs.create', compact('registrars', 'students'));
    }

    public function store(StoreStdntRgstrRequest $request)
    {
        $stdntRgstr = StdntRgstr::create($request->all());

        return redirect()->route('admin.stdnt-rgstrs.index');
    }

    public function edit(StdntRgstr $stdntRgstr)
    {
        abort_if(Gate::denies('stdnt_rgstr_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrars = Registrar::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stdntRgstr->load('registrar', 'student');

        return view('admin.stdntRgstrs.edit', compact('registrars', 'students', 'stdntRgstr'));
    }

    public function update(UpdateStdntRgstrRequest $request, StdntRgstr $stdntRgstr)
    {
        $stdntRgstr->update($request->all());

        return redirect()->route('admin.stdnt-rgstrs.index');
    }

    public function show(StdntRgstr $stdntRgstr)
    {
        abort_if(Gate::denies('stdnt_rgstr_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stdntRgstr->load('registrar', 'student');

        return view('admin.stdntRgstrs.show', compact('stdntRgstr'));
    }

    public function destroy(StdntRgstr $stdntRgstr)
    {
        abort_if(Gate::denies('stdnt_rgstr_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stdntRgstr->delete();

        return back();
    }

    public function massDestroy(MassDestroyStdntRgstrRequest $request)
    {
        StdntRgstr::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
