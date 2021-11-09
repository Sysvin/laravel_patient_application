<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Patient;
    use App\Models\Pressure;
    use Illuminate\Support\Facades\DB;
    use Session;

    class PatientController extends Controller
        {
            public function add (Request $request){

                $validateData = $request->validate([
                    'name'=>'required',
                ]);

                $name=$request->name;
                $patient = DB::table('patients')->where('name', $name)->first();

                 if ($patient !== null) {
                    return view ('add', ['patient' => $patient]);
                }else {
                    return redirect()->back()->with('status', 'This record does not exist');

                }
            }

            public function submitPressureForm (Request $request){

                $request->validate([
                    'systolic' => 'required',
                    'diastolic' => 'required',
                ], [
                    'systolic.required' => "Please enter a number!",
                    'diastolic.required' => "Please enter a number!",
                ]);

                //getting information from the form
                $systolic = $request->systolic;
                $diastolic = $request->diastolic;
                $id = $request->id;

                //current patient we are looking at
                $patient = Patient::where('id', '=', $id)->first();


                $pressure = new Pressure();
                $pressure->name = $patient->name;
                $pressure->systolic = $systolic;
                $pressure->diastolic = $diastolic;
                $pressure->patient_id = $patient->id;

                $pressure->save();

                Session::put('success', 'The Blood Pressure has been entered successfully');


                return view ('add', ['patient' => $patient, 'status']);
            }

            public function view ($id){

                $patient = DB::table('patients')->where('id', $id)->first();


                $pressures = DB::table('pressures')->where('patient_id', $id)->get();


                if ($pressures !== null) {
                    return view ('view', ['pressures' => $pressures, 'patient' => $patient]);
                }else {
                    return redirect()->back()->with('status', 'These records do not exist');
                }
            }

            public function __construct()
                {
                    $this->middleware('auth');
                }

    }
