<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = Doctor::find($request->doctor_id);

        if (!$doctor || $this->isDoctorFullyBooked($doctor)) {
            return response()->json(['message' => 'Doctor is fully booked'], 400);
        }
        
        $appointment = Appointment::create([
            'doctor_id' => $request->doctor_id,
            'patient_name' => $request->patient_name,
            'appointment_time' => $request->appointment_time
        ]);

        return response()->json($appointment, 201);
    }

    public function listAppointments()
    {
        $appointments = Appointment::all();
        if(!$appointments){
            return response()->json(['message' => 'No Apppointements Booked '], 404);
        }
        return response()->json($appointments);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    private function isDoctorFullyBooked(Doctor $doctor)
    {
        $countOfAppointments = $doctor->appointments()
            ->whereBetween('appointment_time', [
                now()->startOfWeek(),
                now()->endOfWeek(),
            ])->count();

        return $countOfAppointments >= $doctor->num_appointments;
    }

    public function getAppointmentsForDoctor($doctorId)
    {
        $doctor = Doctor::find($doctorId);
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $appointments = $doctor->appointments()->get();
        if(!$appointments){
            return response()->json(['message' => 'No Apppointements Booked '], 404);
        }

        return response()->json($appointments);
    }
}
