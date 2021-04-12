<?php

namespace App\Http\Controllers;

use App\Domain\Services\CoursesService;
use App\Domain\Services\EnrollmentsService;
use App\Domain\Services\StudentService;
use Illuminate\Http\Request;

class EnrollmentsController extends Controller
{
    private $service;
    private $coursesServices;
    private $studentsServices;

    public function __construct(
        EnrollmentsService $service,
        StudentService $studentService,
        CoursesService $coursesService
    ) {
        $this->service = $service;
        $this->studentsServices = $studentService;
        $this->coursesServices = $coursesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrollments = $this->service->listAll();
        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = $this->studentsServices->listAll();
        $courses = $this->coursesServices->listAll();

        return view('enrollments.create', compact(
            'students',
            'courses'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data = $this->service->create($data);
        return redirect()->route('enrollments.index')->with([
            'status' => 'success',
            'data' => $data,
            'message' => 'Matrícula adicionada.' 
        ]);
        try {
        } catch (\Exception $e) {
            return redirect()->route('enrollments.create')->with([
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
        $enrollment = $this->service->findById($id);
        $students = $this->studentsServices->listAll();
        $courses = $this->coursesServices->listAll();
        
        return view('enrollments.edit', compact(
            'enrollment',
            'students',
            'courses'
        ));
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
        try {
            $data = $request->all();
            $data = $this->service->update($id, $data);
            return redirect()->route('enrollments.index')->with([
                'status' => 'success',
                'data' => $data,
                'message' => 'Matrícula atualizada.' 
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
            return redirect()->route('enrollments.index')->with([
                'status' => 'success',
                'data' => $data,
                'message' => 'Matrícula apagada.' 
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
