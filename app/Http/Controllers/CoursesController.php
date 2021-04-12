<?php

namespace App\Http\Controllers;

use App\Domain\Services\CoursesService;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    private $service;

    public function __construct(CoursesService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->service->listAll();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        try {
            $data = $request->all();
            $data = $this->service->create($data);
            return redirect()->route('courses.index')->with([
                'status' => 'success',
                'data' => $data,
                'message' => 'Curso adicionado.' 
            ]);
        } catch (\Exception $e) {
            return redirect()->route('courses.create')->with([
                'status' => 'danger',
                'data' => null,
                'message' => 'Ocorreu um erro no processamento. Tente novamente.' 
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = $this->service->findById($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data = $this->service->update($id, $data);
            return redirect()->route('courses.index')->with([
                'status' => 'success',
                'data' => $data,
                'message' => 'Curso atualizado.' 
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'status' => 'danger',
                'data' => null,
                'message' => 'Ocorreu um erro no processamento. Tente novamente.' 
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = $this->service->delete($id);
            return redirect()->route('courses.index')->with([
                'status' => 'success',
                'data' => $data,
                'message' => 'Curso apagado.' 
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'status' => 'danger',
                'data' => null,
                'message' => 'Ocorreu um erro no processamento. Tente novamente.' 
            ]);
        }
    }
}
