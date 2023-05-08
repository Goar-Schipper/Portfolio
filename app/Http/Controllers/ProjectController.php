<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use http\Message;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->get('categories');

        if ($filter) {
            $projects = Project::whereHas('categories', function ($query) use ($filter) {
                $query->whereIn('id', $filter);
            })->get();
        } else {
            $projects = Project::all();
        }

        return view('projects.index', ['projects' => $projects, 'categories' => Category::all(), 'filter' => $filter ?: [] ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create',['categories' => Category::all()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'created_at' => 'required',
        ]);

        $project = new Project([
            'title' => $request->get('title'),
            'description' =>$request->get('description'),
            'created_at' =>$request->get('created_at'),
        ]);


        $project->save();

        $project->categories()->detach();
        $project->categories()->attach($request->get('category'));

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('projects.edit',['project' => Project::findOrFail($id), 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        if ($request->file('image2'))
            $path = $request->file('image2')->store('images', ['disk' => 'public']);

        $project->title = $request->get('title');

        if (isset($path))
            $project->image = $path;

        $project->description = $request->get('description');
        $project->created_at = $request->get('created_at');

        $project->categories()->detach();
        $project->categories()->attach($request->get('category'));

        $project->save();

        return redirect()->route('projects.index')->with('msg', 'Project aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->categories()->detach();
        $project->delete();

        return redirect()->route('projects.index')->with('msg2', 'Project verwijdered');
    }
}
