<?php

namespace App\Http\Controllers\Backend;

use App\Models\GeneralSetting;
use App\Models\ResponsibleArea;
use Illuminate\Http\Request;
use App\Models\Representative;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class RepresentativeController extends Controller
{
    // representive index methode ----GET

    public function index()
    {

        //return Representative::where('sp_id',auth()->user()->sp_id)->with('areas')->get();
        return view('backend.representative.index');
    }

    // REPRESENTATIVE CREATE METHODE ---GET

    public function create()
    {
        return view('backend.representative.create');
    }

    // REPRESNTATIVE INSERT METHODE ---POST

    public function store(Request $request)
    {

        //return $request->all();
        $request->validate([
            "employee_name"   => "required",
            "employee_designation"   => "required",
            "cell_number"   => "required",
            "responsible_area"   => "required",
        ]);



        $employee = Representative::create([
            "sp_id"                         => auth()->user()->sp_id,
            "pin"                           => Hash::make('dishnet'),
            "employee_name"                 => $request->employee_name,
            "employee_designation"          => $request->employee_designation,
            "cell_number"                   => $request->cell_number,
        ]);

        $emp_id = auth()->user()->sp_id.'em'.$employee->id;
        $employee->employee_id = $emp_id;
        $employee->save();

        if ($request->has('responsible_area')){
            for ($a = 0; $a < count($request->responsible_area); $a++){
               $responsible =  new ResponsibleArea();
               $responsible->sp_id = auth()->user()->sp_id;
               $responsible->em_id = $emp_id;
               $responsible->area_id = $request->responsible_area[$a];
               $responsible->save();
            }
        }



        Toastr::success('Employee save successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.representative.index');

    }

    public function edit($id)
    {
        $edit = Representative::where('id',$id)->with('areas')->first();

        $area_list = [];
        foreach ($edit->areas as $area){
            $area_list[] = $area->area_id;
        }

        //return $edit;
        return view('backend.representative.edit', compact('edit','area_list'));
    }

    public function update(Request $request)
    {


        Representative::where('id',$request->id)->update([
            "employee_name"                 => $request->employee_name,
            "employee_designation"          => $request->employee_designation,
            "cell_number"                   => $request->cell_number,
        ]);

        $employee = Representative::find($request->id);

        if ($request->has('responsible_area')){

            $representatives = ResponsibleArea::where('sp_id', auth()->user()->sp_id)->where('em_id',$employee->employee_id)->get();

                foreach ($representatives as $representative){
                    $representative->delete();
                }
//            $representative->delete();

            if ($request->has('responsible_area')){
                for ($a = 0; $a < count($request->responsible_area); $a++){
                    $responsible =  new ResponsibleArea();
                    $responsible->sp_id = auth()->user()->sp_id;
                    $responsible->em_id = $employee->employee_id;
                    $responsible->area_id = $request->responsible_area[$a];
                    $responsible->save();
                }
            }

        }

        Toastr::success('Employee update successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.representative.index');
    }

    public function status($id)
    {
        $employee = Representative::find($id);

        if($employee->status == 1){
            $employee->status = 0;
            $employee->save();
            Toastr::success('Employee inactive successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.representative.index');
        }else{
            $employee->status = 1;
            $employee->save();
            Toastr::success('Employee active successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.representative.index');
        }
    }

}
