<?php

namespace Microweber\Controllers;

use Microweber\View;
use User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;;
use Auth;

class DocController extends Controller
{
    public $app;
    public function __construct($app = null)
    {
        if (!is_object($this->app)) {
            if (is_object($app)) {
                $this->app = $app;
            } else {
                $this->app = mw();
            }
        }
    }

    public function api(Request $request)
    {
    	// $docurl = "http://127.0.0.1:9999/secp/userfiles/media/docdemo.docx";
    	$onyofficeserver = $GLOBALS['ONlYOFFICE_SERVER']; 
    	$docurl = $request->input('doc');

        $filename = basename($docurl);
        $key = getDocEditorKey($docurl);
        $documentType = getDocumentType($filename);
        $fileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        $is_admin = $this->app->user_manager->is_admin();
        $permissions_eidt = $is_admin ? "true" : "false";

        $data = [
            'onyofficeserver'    => $onyofficeserver,
            'docurl'             => $docurl,
            'key'                => $key,
            'filename'           => $filename,
            'documentType'       => $documentType,
            'fileType'           => $fileType,
            'permissions_eidt'   => $permissions_eidt
        ];
    	return view("doc.index" ,$data);

    }

    /**
    *onlyoffice 保存文件
    */
    public function savedoc()
    {

        if (($body_stream = file_get_contents("php://input"))===FALSE){
            echo "Bad Request";
        }

        $data = json_decode($body_stream, TRUE);

        if ($data["status"] == 2){
            $downloadUri = $data["url"];
                
            if (($new_data = file_get_contents($downloadUri))===FALSE){
                echo "Bad Response";
            } else {
                file_put_contents($path_for_save, $new_data, LOCK_EX);
            }
        }
        echo "{\"error\":0}";

    }



}
