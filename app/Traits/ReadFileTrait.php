<?php
  
namespace App\Traits;
  
use Illuminate\Http\Request;
  
trait ReadFileTrait {
  
    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function verifyAndRead(Request $request, $fieldname = 'txt', $directory = 'txt' ) {
  
        if( $request->hasFile( $fieldname ) ) {
  
            if (!$request->file($fieldname)->isValid()) {
  
                return response()->json([
                    'status' => false,
                    'message' => 'sorry'
                ],500);
            }
  
            return $request->file($fieldname)->store($directory, 'public');
  
        }
  
        return null;
  
    }

    public function LoadTxtFile(Request $request)
    {

        try {

            $map = json_decode(file_get_contents(public_path(). "/matrix.txt"), true);

            return response()->json($map);

        } catch (\Exception $e) {
     
            return $e;
        }

    }
  
}