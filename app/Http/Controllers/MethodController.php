<?php

namespace App\Http\Controllers;

use App\Models\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Method::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:7',
        ]);

        return Method::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Method $method)
    {
        return $method;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Method $method)
    {
        $method->update($request->all());
        return $method;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Method $method)
    {
        $name = $method->name;
        $method->destroy($method->id);
        return "'" . $name . "'" . ' method has been deleted!';
    }
}
