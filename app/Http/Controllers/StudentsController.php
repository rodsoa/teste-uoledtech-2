<?php

namespace App\Http\Controllers;

use App\Domain\Services\StudentService;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    private $service;

    public function __construct(StudentService $service)
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
        $students = $this->service->listAll();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        try {
            $data = $request->all();
            $data = $this->service->create($data);
            return redirect()->route('students.index')->with([
                'status' => 'success',
                'data' => $data,
                'message' => 'Aluno adicionado.' 
            ]);
        } catch (\Exception $e) {
            return redirect()->route('students.create')->with([
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
        $student = $this->service->findById($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data = $this->service->update($id, $data);
            return redirect()->route('students.index')->with([
                'status' => 'success',
                'data' => $data,
                'message' => 'Aluno atualizado.' 
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
            return redirect()->route('students.index')->with([
                'status' => 'success',
                'data' => $data,
                'message' => 'Aluno apagado.' 
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
