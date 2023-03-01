<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the test.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $testQuery = Test::query();
        $testQuery->where('name', 'like', '%'.request('q').'%');
        $tests = $testQuery->paginate(25);

        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new test.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Test);

        return view('tests.create');
    }

    /**
     * Store a newly created test in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Test);

        $newTest = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newTest['creator_id'] = auth()->id();

        $test = Test::create($newTest);

        return redirect()->route('tests.show', $test);
    }

    /**
     * Display the specified test.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\View\View
     */
    public function show(Test $test)
    {
        return view('tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified test.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\View\View
     */
    public function edit(Test $test)
    {
        $this->authorize('update', $test);

        return view('tests.edit', compact('test'));
    }

    /**
     * Update the specified test in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Test $test)
    {
        $this->authorize('update', $test);

        $testData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $test->update($testData);

        return redirect()->route('tests.show', $test);
    }

    /**
     * Remove the specified test from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Test $test)
    {
        $this->authorize('delete', $test);

        $request->validate(['test_id' => 'required']);

        if ($request->get('test_id') == $test->id && $test->delete()) {
            return redirect()->route('tests.index');
        }

        return back();
    }
}
