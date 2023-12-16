<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Render;

class WebHookController extends Controller
{
    /**
    * @param Request $request
    * @return json
    */
    public function webhookHandler(Request $request){
        // We have access to the request body here
        // So, you can perform any logic with the data
        // In my own case, I will add the delay function
        // dd($request);
        for ($i=0; $i < count($request['images']); $i++) { 

            $before_src = $request['images'][$i]['before_src'];
            $after_src = $request['images'][$i]['after_src'];
            
            
            Render::create([
                "order_id" => isset($request['order_id']) ? $request['order_id'] : null,
                "service_name" => $request['service_name'],
                "user_id" => $request['user_id'],
                "image_id" => $request['images'][$i]['id'],
                "before_src" => $before_src,
                "after_src" => $after_src,
                "regenerated" => $request['images'][$i]['regenerated'],
                "style" =>  $request['images'][$i]['style'],
                "type" => $request['images'][$i]['type'],
                "requested_at" => $request['images'][$i]['created_at']
            ]);
            
        }
        // sleep(50); //this will delay the script for 50 seconds
        return response()->json([
            'status' => 200,
            'message' => 'Got it!'
        ]);
    }

    public function getGeneratedImageHandle($order_id){
        $generated_images=Render::where('order_id',$order_id)
                                ->get();
        

        if(isset($generated_images)){

            return response()->json([
                'generated_images' => $generated_images, 
                'status' => 200,
                'message' => 'Ok'
            ]);
        }
        else{
            return response()->json([
                'status' => 500,
                'message' => 'Internal server error'
            ]);
        }
    }
}