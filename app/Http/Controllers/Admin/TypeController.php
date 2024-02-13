<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\updateTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = Type::all();
        return view('admin.project.typeIndex', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = Type::all();
        return view('admin.project.typesCreate', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->validated();
        $type = new Type();

        $type->fill($data);
        $type->slug = Str::of($type->name)->slug('-');

        $type->save();
        return redirect()->route('admin.types.show', $type->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.project.typeShow', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.project.typeEdit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateTypeRequest $request, Type $type)
    {
        $data = $request->validated();
        $type->slug = Str::of($data['name'])->slug('-');
        $type->update($data);
        return redirect()->route('admin.types.show', $type->slug)->with('message', "$type->slug");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        $type_slug = $type->slug;
        return redirect()->route('admin.types.index')->with('message', "$type_slug");
    }
}
