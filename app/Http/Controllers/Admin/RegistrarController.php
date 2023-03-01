<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRegistrarRequest;
use App\Http\Requests\StoreRegistrarRequest;
use App\Http\Requests\UpdateRegistrarRequest;
use App\Models\Registrar;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrarController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('registrar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrars = Registrar::with(['registrar'])->get();

        $users = User::get();

        return view('admin.registrars.index', compact('registrars', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('registrar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrars = User::where('usertype','registrar')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.registrars.create', compact('registrars'));
    }

    public function store(StoreRegistrarRequest $request)
    {
        $registrar = Registrar::create($request->all());

        return redirect()->route('admin.registrars.index');
    }

    public function edit(Registrar $registrar)
    {
        abort_if(Gate::denies('registrar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrars = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrar->load('registrar');

        return view('admin.registrars.edit', compact('registrars', 'registrar'));
    }

    public function update(UpdateRegistrarRequest $request, Registrar $registrar)
    {
        $registrar->update($request->all());

        return redirect()->route('admin.registrars.index');
    }

    public function show(Registrar $registrar)
    {
        abort_if(Gate::denies('registrar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrar->load('registrar');

        return view('admin.registrars.show', compact('registrar'));
    }

    public function destroy(Registrar $registrar)
    {
        abort_if(Gate::denies('registrar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrar->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegistrarRequest $request)
    {
        Registrar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
