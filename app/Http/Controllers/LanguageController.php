<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Language;
use File;
use Storage;
use DB;
use Session;
use Validator;
use App;
use View;
use Route;
use App\User;
use Carbon\Carbon;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = DB::table('languages')->get();
        return view('language.index',compact('languages'));
    }

    public function all(  )
    {
        return DB::table('languages')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['description'] = $input['languagename'];
        $rules = array('flag_name' => 'required | mimes:jpg,jpg,png,PNG,JPEG,JPG | max:6024');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->with('success', "Please choose file jpeg,jpg,png & maximum size 2mb!");
        }       
        $flag_image = $request->file('flag_name');
        if(!empty($flag_image)){
         $flag_image  = time() . '.' . $flag_image->getClientOriginalExtension();
         $request->file('flag_name')->move( base_path() . '/public/resources/assets/flags/', $flag_image );        
        }
         $foldername = $request->input('foldername');   
         $input['flag_name'] = $flag_image;
         $countdata = DB::table('languages')->where('foldername', $foldername)->get();  
          if(count($countdata) > 0){            
                return Redirect::back()->with('error', "Language already created!");
          }else{
          if(!empty($foldername)){                  
              Language::create($input);
              $folder = mkdir(base_path() .'/resources/lang/'.$foldername, 0777, true);
              File::copy(base_path() .'/resources/lang/en/app.php', base_path() .'/resources/lang/'.$foldername.'/app.php');
          }
        }   
        /*for user activity */

            
          return Redirect::back()->with('success', "Language create success!");
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
         $language_data = File::getRequire(base_path()."/resources/lang/{$id}/app.php");
          $foldername = $id;
        if($id == 'en'){
            return Redirect::back()->with('msg_delete',"This language not editable");
        }
        return view('language.edit',compact('language_data','foldername'));
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
        $data =  $request->all();
        $foldername = $request->input('foldername');
        $languagekey = $request->input('language_key');
        $languageval = $request->input('language_value');
        foreach($languagekey as $key=>$keyvalue){
            $nd[] = '"'.$keyvalue.'"'.' =>'.'"'.$languageval[$key].'",';    
        
        }       
        File::put( base_path() ."/resources/lang/{$foldername}/app.php","<?php return [ ".implode("\n",$nd)." ];");

        /*for user activity */

        return Redirect::back()->with('success', trans('app.update_success_message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty($id) && !empty($lan) && ($lan != 'en')){

            $data = Languages::findOrFail($id);
            if(!empty($data)){
             $data->delete();
             File::deleteDirectory(base_path() ."/resources/lang/{$lan}");

             /*for user activity */

            return Redirect::back()->with('msg_delete', trans('app.delete_success_message'));
            }
        }       
    }

    /**
     * Display the specified chooser_language.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chooser_language(Request $request,$id)
    {
        $language = DB::table('languages')->where('foldername', $id)->first();
        if ( !empty( $language ) ) {      
            Session::put('locale_image',$language->flag_name);
            Session::put('locale_name',$language->languagename);
            Session::put('locale', $id);

            #Set Timezone
            if ($language->languagename === 'Español') {
                date_default_timezone_set('Europe/Madrid');
            } else {
                date_default_timezone_set('UTC');
            }
        }       
         return Redirect::back();
    }
}
