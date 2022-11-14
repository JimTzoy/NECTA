<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use log;

class PlanesController extends Controller
{
    // https://carbon.now.sh/
    public function getAll(){
        $data = Plan::get();
        return response()->json($data, 200);
      }
  
      public function create(Request $request){
        $data['plan'] = $request['plan'];
        $data['informacion'] = $request['informacion'];
        $data['precio'] = $request['precio'];
        Plan::create($data);
        return response()->json([
            'message' => "Successfully created",
            'success' => true
        ], 200);
      }
  
      public function delete($id){
        $res = Plan::find($id)->delete();
        return response()->json([
            'message' => "Successfully deleted",
            'success' => true
        ], 200);
      }
  
      public function get($id){
        $data = Plan::find($id);
        return response()->json($data, 200);
      }
  
      public function update(Request $request,$id){
        $data['plan'] = $request['plan'];
        $data['informacion'] = $request['informacion'];
        $data['precio'] = $request['precio'];
        Plan::find($id)->update($data);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
      }
}
