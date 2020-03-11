<?php


use App\applicants_requests;
use Illuminate\Database\Eloquent\Collection;

if (!function_exists('makeNumber2Text')){
    function makeNumber2Text($numberValue){

        $textResult = ''; // so i can use .=
        $numberValue = "$numberValue";

        if($numberValue[0] == '-'){
            $textResult .= 'سالب ';
            $numberValue = substr($numberValue,1);
        }

        $numberValue = (int) $numberValue;
        $def = array(    "0" => 'صفر',
            "1" => 'واحد',
            "2" => 'اثنان',
            "3" => 'ثلاث',
            "4" => 'اربع',
            "5" => 'خمس',
            "6" => 'ست',
            "7" => 'سبع',
            "8" => 'ثمان',
            "9" => 'تسع',
            "10" => 'عشر',
            "11" => 'أحد عشر',
            "12" => 'اثنا عشر',
            "100" => 'مائة',
            "200" => 'مئتان',
            "1000" => 'ألف',
            "2000" => 'ألفين',
            "1000000" => 'مليون',
            "2000000" => 'مليونان');

        // check for defind values
        if(isset($def[$numberValue])) {
            // checking for numbers from 2 to 10 :reson = 2 to 10 uses 'ة' at the end
            if($numberValue < 11 && $numberValue > 2){
                if ($numberValue == 8 )
                    $textResult .= $def[$numberValue].'ية';
                else
                    $textResult .= $def[$numberValue].'ة';
            }
            else{
                // the rest of the defined numbers
                $textResult .= $def[$numberValue];
            }
        }
        else{
            $tensCheck = $numberValue%10;
            $numberValue = "$numberValue";

            for($x = strlen($numberValue); $x > 0; $x--){
                $places[$x] = $numberValue[strlen($numberValue)-$x];
            }

            switch(count($places)){
                case 2: // 2 numbers
                case 1: // or 1 number
                    {
                        if ($places[1] == 8 )
                            $textResult .= ($places[1] != 0) ? $def[$places[1]].(($places[1] > 2 || $places[2] == 1) ? 'ية' : '').(($places[2] != 1) ? ' و' : ' ') : '';
                        else

                            $textResult .= ($places[1] != 0) ? $def[$places[1]].(($places[1] > 2 || $places[2] == 1) ? 'ة' : '').(($places[2] != 1) ? ' و' : ' ') : '';
                        $textResult .= (($places[2] > 2) ? $def[$places[2]].'ون' : $def[10].(($places[2] != 2) ? '' : 'ون'));
                    }
                    break;
                case 3: // 3 numbers
                    {
                        $lastTwo = (int) $places[2].$places[1];
                        $textResult .= ($places[3] > 2) ? $def[$places[3]].' '.$def[100] : $def[(int) $places[3]."00"];
                        if($lastTwo != 0){
                            $textResult .= ' و'.makeNumber2Text($lastTwo);
                        }
                    }
                    break;
                case 4: // 4 numbrs
                    {
                        $lastThree = (int) $places[3].$places[2].$places[1];
                        $textResult .= ($places[4] > 2) ? $def[$places[4]].'ة الاف' : $def[(int) $places[4]."000"];
                        if($lastThree != 0){
                            $textResult .= ' و'.makeNumber2Text($lastThree);
                        }
                    }
                    break;
                case 5: // 5 numbers
                    {
                        $lastThree = (int) $places[3].$places[2].$places[1];
                        $textResult .= makeNumber2Text((int) $places[5].$places[4]).((((int) $places[5].$places[4]) != 10) ? ' الفاً' : ' الاف');
                        if($lastThree != 0){
                            $textResult .= ' و'.makeNumber2Text($lastThree);
                        }
                    }
                    break;
                case 6: // 6 numbers
                    {
                        $lastThree = (int) $places[3].$places[2].$places[1];
                        $textResult .= makeNumber2Text((int) $places[6].$places[5].$places[4]).((((int) $places[5].$places[4]) != 10) ? ' الفاً' : ' الاف');
                        if($lastThree != 0){
                            $textResult .= ' و'.makeNumber2Text($lastThree);
                        }
                    }
                    break;
                case 7: // 7 numbers 1 mill
                    {
                        $textResult .= ($places[7] > 2) ? $def[$places[7]].' ملايين' : $def[(int) $places[7]."000000"];
                        $textResult .= ' و';
                        $textResult .= makeNumber2Text((int) $places[6].$places[5].$places[4].$places[3].$places[2].$places[1]);
                    }
                    break;
                case 8: // 8 numbers 10 mill
                case 9: // 9 numbers 100 mill
                    {
                        $places[9] = (isset($places[9])) ? $places[9] : '';
                        $firstThree = (int) $places[9].$places[8].$places[7];
                        $textResult .=     makeNumber2Text($firstThree);
                        $textResult .=    ($firstThree < 11) ? ' ملايين ' : ' مليونا ';
                        if(((int) $places[6].$places[5].$places[4].$places[3].$places[2].$places[1]) != 0){
                            $textResult .= ' و';
                            $textResult .=    makeNumber2Text((int) $places[6].$places[5].$places[4].$places[3].$places[2].$places[1]);
                        }
                    }
                    break;
                default:
                    {
                        $textResult = 'هذا رقم كبير .. ';
                    }
            }

        }
        return $textResult;
    }
}
if (!function_exists('active_menu')){
    function active_menu($link = null) {
//        users:admin/i
        if (preg_match('/'.$link.'/i',Request::segment(2))){
            return ['menu-open','display:block'];
        }else{
            return ['',''];
        }
    }
}
if (!function_exists('getcontacts')){
    function getcontacts($id = null) {
        return \App\CompanyContact::where('company_id',$id)->get();
    }
}

if (!function_exists('getCompanies')){
    function getCompanies() {
        return \App\Company::get();
    }
}

if (!function_exists('getApplicantRequests')){
    function getApplicantRequests() {
        return   \App\ applicants_requests::where('job_id','!=',null)->groupBy('job_id')->get();

    }
}


if (!function_exists('getapplicants')){
    function getapplicants($job_spec_id = null,$job_id = null,$experiences = null,$degree = null,$grade = null,$company_id = null) {
//        users:admin/i
        $applicants = \App\Applicant::where('job_spec_id',$job_spec_id)->where('job_id',$job_id)->where('experience','>=',$experiences)->where('degree',$degree)->where('grade','>=',$grade)->pluck('id')->toArray();
        $applicant_company = \App\applicants_company::whereIn('applicants_id',$applicants)->where('companies_id',$company_id)->pluck('applicants_id')->toArray();
        return \App\Applicant::whereNotIn('id',$applicant_company)->where('job_spec_id',$job_spec_id)->where('job_id',$job_id)->where('experience','>=',$experiences)->where('degree',$degree)->where('grade','>=',$grade)->get();
    }
}
if (!function_exists('calcevaluation')){
    function calcevaluation($applicant_id = null) {
        $qexists = \Illuminate\Support\Facades\DB::table('applicants_questions')->where('applicants_id',$applicant_id)->exists();
        $eexists =\Illuminate\Support\Facades\DB::table('applicants_evaluation')->where('applicants_id',$applicant_id)->exists();
        $applicant_questions = null;
        $applicants_evaluation = null;
        if ($qexists){
            $applicant_questions = \Illuminate\Support\Facades\DB::table('applicants_questions')->where('applicants_id',$applicant_id)->sum('result');
        }
        if ($eexists){
            $applicants_evaluation = \Illuminate\Support\Facades\DB::table('applicants_evaluation')->where('applicants_id',$applicant_id)->sum('result');
        }
        return ($applicant_questions + $applicants_evaluation) / 10;
    }
}
if (!function_exists('calcEval')){
    function calcEval($applicant_id = null) {
        $skills = \Illuminate\Support\Facades\DB::table('applicants_company')->where('applicants_id',$applicant_id)->sum('skills');
        $general_look = \Illuminate\Support\Facades\DB::table('applicants_company')->where('applicants_id',$applicant_id)->sum('general_look');
        $technical = \Illuminate\Support\Facades\DB::table('applicants_company')->where('applicants_id',$applicant_id)->sum('technical');
        $educational = \Illuminate\Support\Facades\DB::table('applicants_company')->where('applicants_id',$applicant_id)->sum('educational');
        return ($skills + $general_look + $technical + $educational);
    }
}
if (!function_exists('getquestions')){
    function getquestions($applicant_id = null,$question_id = null){
        return \Illuminate\Support\Facades\DB::table('applicants_questions')->where('applicants_id',$applicant_id)->where('questions_id',$question_id)->exists();
    }
}
if (!function_exists('getsign')){
    function getsign($applicant_id = null,$requests_id = null,$companyies_id = null){
        $sign = [];
        $paper = \App\papers::where('applicants_id',$applicant_id)->first();
        $applicant_companies = \App\applicants_company::where('companies_id',$companyies_id)->where('applicants_id',$applicant_id)->where('applicants_requests_id',$requests_id)->first();
        $applicantcompanies = \App\applicants_company::where('companies_id',$companyies_id)->where('applicants_id',$applicant_id)->where('applicants_requests_id',$requests_id);
        $sign[0] = \App\applicants_company::where('companies_id',$companyies_id)->where('applicants_id',$applicant_id)->where('applicants_requests_id',$requests_id)->where('date',null)->where('schedules',null)->where('contacts_id',null)->where('salary',null)->where('countries_id',null)->exists();
        $sign[1] = \Illuminate\Support\Facades\DB::table('applicants_questions')->where('applicants_id',$applicant_id)->exists();
        $sign[2] = \App\papers::where('applicants_id',$applicant_id)->where('visa',null)->where('licence',null)->where('graduation',null)->where('medical',null)->where('experience',null)->exists();
        $sign[3] = \App\applicants_company::where('companies_id',$companyies_id)->where('applicants_id',$applicant_id)->where('applicants_requests_id',$requests_id)->where('flight_number',null)->where('airline',null)->where('departure_date',null)->where('arrival_date',null)->where('departure_time',null)->where('arrival_time',null)->where('airport_departure',null)->where('airport_arrival',null)->exists();
        $sign[4] = \App\applicants_company::where('companies_id',$companyies_id)->where('applicants_id',$applicant_id)->where('applicants_requests_id',$requests_id)->where('agreement_date',null)->where('price',null)->where('price_else',null)->where('company_fees',null)->exists();

        return $sign;
    }
}
if (!function_exists('getlang')){
    function getlang($id = null) {
//        users:admin/i
        return \App\Language::where('applicant_id',$id)->first();
    }
}
if (!function_exists('getContact')){
    function getContact($id = null) {
//        users:admin/i
        return \App\Contact::where('company_id',$id)->first();
    }
}
if (!function_exists('getdepartemnt')){
    function getdepartemnt($id = null) {
        return \App\Department::where('id',$id)->first();
    }
}
if (!function_exists('getpjitmmsfl')){
    function getpjitmmsfl($id = null,$month = null,$year = null) {
        return \App\pjitmmsfl::where('tree_id',$id)->where('type','=','1')->where('month',$month)->where('year',$year)->first();
    }
}
if (!function_exists('getpjitmmsflcc')){
    function getpjitmmsflcc($id = null,$month = null,$year = null) {
        return \App\pjitmmsfl::where('cc_id',$id)->where('type','=','2')->where('month',$month)->where('year',$year)->first();
    }
}
if (!function_exists('getSitioPadre')){
    function getSitioPadre($id = null,$debtor = null,$creditor = null,$date = null) {
        $department = \App\Department::where('id',$id)->first();
        $pjitmmsflexists = \App\pjitmmsfl::where('tree_id',$id)->exists();
        \App\Department::where('id',$department->id)->update(['estimite' => $department->creditor - $department->debtor]);
        if($pjitmmsflexists){
            \App\pjitmmsfl::where('tree_id',$id)->update(['current_balance' => $department->creditor - $department->debtor]);
        }
        if($department->parent_id !=  null){
            $parent = \App\Department::where('id',$department->parent_id)->first();
            \App\Department::where('id',$department->parent_id)->update(['estimite' => $parent->creditor - $parent->debtor]);
            $parentexists = \App\pjitmmsfl::where('tree_id',$department->parent_id)->exists();
            if($parentexists){
                \App\pjitmmsfl::where('tree_id',$department->parent_id)->update(['current_balance' => $parent->creditor - $parent->debtor]);
            }else{
                \App\pjitmmsfl::create(['debtor'=> $debtor,'creditor'=> $creditor,'tree_id'=>$department->parent_id,'month'=>date('m',strtotime($date)),'year'=>date('Y',strtotime($date)),'type'=>'1']);
                \App\pjitmmsfl::where('tree_id',$department->parent_id)->update(['current_balance' => $parent->creditor - $parent->debtor]);
            }
            if ($parent->debtor != null){
                \App\Department::where('id',$department->parent_id)->update(['debtor'=> \Illuminate\Support\Facades\DB::raw('debtor + '.$debtor)]);
                if($parentexists){
                    \App\pjitmmsfl::where('tree_id',$department->parent_id)->update(['debtor'=> \Illuminate\Support\Facades\DB::raw('debtor + '.$debtor)]);
                }
            }else{
                \App\pjitmmsfl::where('tree_id',$department->parent_id)->update(['debtor'=> $debtor]);
                $parent->debtor = $debtor;
                $parent->save();
            }
            if($parent->creditor != null){
                if($parentexists){
                    \App\pjitmmsfl::where('tree_id',$department->parent_id)->update(['creditor'=> \Illuminate\Support\Facades\DB::raw('creditor + '.$creditor)]);
                }
                \App\Department::where('id',$department->parent_id)->update(['creditor'=> \Illuminate\Support\Facades\DB::raw('creditor + '.$creditor)]);
            }else{
                \App\pjitmmsfl::where('tree_id',$department->parent_id)->update(['creditor'=> $creditor]);
                $parent->creditor = $creditor;
                $parent->save();
            }
        }else{
            return '';
        }
        return getSitioPadre($department->parent_id,$debtor,$creditor,$date);
    }
}
if (!function_exists('getSitiocc')){
    function getSitiocc($id = null,$debtor = null,$creditor = null,$date = null) {
        $glcc = \App\glcc::where('id',$id)->first();
        $pjitmmsflexists = \App\pjitmmsfl::where('cc_id',$id)->exists();
        \App\glcc::where('id',$glcc->id)->update(['estimite' => $glcc->creditor - $glcc->debtor]);
        if($pjitmmsflexists){
            \App\pjitmmsfl::where('cc_id',$id)->update(['current_balance' => $glcc->creditor - $glcc->debtor]);
        }
        if($glcc->parent_id !=  null){
            $parent = \App\glcc::where('id',$glcc->parent_id)->first();
            \App\glcc::where('id',$glcc->parent_id)->update(['estimite' => $parent->creditor - $parent->debtor]);
            $parentexists = \App\pjitmmsfl::where('cc_id',$glcc->parent_id)->exists();
            if($parentexists){
                \App\pjitmmsfl::where('cc_id',$glcc->parent_id)->update(['current_balance' => $parent->creditor - $parent->debtor]);
            }else{
                \App\pjitmmsfl::create(['debtor'=> $debtor,'creditor'=> $creditor,'cc_id'=>$glcc->parent_id,'month'=>date('m',strtotime($date)),'year'=>date('Y',strtotime($date)),'type'=>'2']);
                \App\pjitmmsfl::where('cc_id',$glcc->parent_id)->update(['current_balance' => $parent->creditor - $parent->debtor]);
            }
            if ($parent->debtor != null){
                \App\glcc::where('id',$glcc->parent_id)->update(['debtor'=> \Illuminate\Support\Facades\DB::raw('debtor + '.$debtor)]);
                if($parentexists){
                    \App\pjitmmsfl::where('cc_id',$glcc->parent_id)->update(['debtor'=> \Illuminate\Support\Facades\DB::raw('debtor + '.$debtor)]);
                }
            }else{
                \App\pjitmmsfl::where('cc_id',$glcc->parent_id)->update(['debtor'=> $debtor]);
                $parent->debtor = $debtor;
                $parent->save();
            }
            if($parent->creditor != null){
                \App\glcc::where('id',$glcc->parent_id)->update(['creditor'=> \Illuminate\Support\Facades\DB::raw('creditor + '.$creditor)]);
                if($parentexists){
                    \App\pjitmmsfl::where('cc_id',$glcc->parent_id)->update(['creditor'=> \Illuminate\Support\Facades\DB::raw('creditor + '.$creditor)]);
                }
            }else{
                \App\pjitmmsfl::where('cc_id',$glcc->parent_id)->update(['creditor'=> $creditor]);
                $parent->creditor = $creditor;
                $parent->save();
            }
        }else{
            return '';
        }
        return getSitiocc($glcc->parent_id,$debtor,$creditor,$date);
    }
}
if (!function_exists('generateBarcodeNumber')){
    function generateBarcodeNumber() {
        $number = mt_rand(100000000, mt_getrandmax()); // better than rand()

        // call the same function if the barcode exists already
        if (barcodeNumberExists($number)) {
            return generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    function barcodeNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return \App\receipts::where('invoice_id',$number)->exists();
    }
}
if (!function_exists('checkIdLimitation')){
    function checkIdLimitation($id = null) {
        $exists = \App\limitations::where('limitationsType_id',$id)->orderBy('limitationId', 'desc')->exists();
        if ($exists){
            $count = \App\limitations::where('limitationsType_id',$id)->orderBy('limitationId', 'desc')->first();
            $maxValue = $count->limitationId;
            return $maxValue + 1;
        }else{
            return 1;
        }
    }
}
if (!function_exists('checkIdReceipts')){
    function checkIdReceipts($id = null) {
        $exists = \App\receipts::where('receiptsType_id', $id)->orderBy('receiptId', 'desc')->exists();
        if ($exists) {
            $count = \App\receipts::where('receiptsType_id', $id)->orderBy('receiptId', 'desc')->first();
            $maxValue = $count->receiptId;
            return $maxValue + 1;
        }else{
            return 1;
        }
    }
}
if (!function_exists('limitationReceiptsid')){
    function limitationReceiptsid($id = null) {
       return \App\limitationReceipts::where('id', $id)->first()['limitationReceiptsId'];

    }
}
if (!function_exists('generateBarcodeNumber2')){
    function generateBarcodeNumber2() {
        $number = mt_rand(100000000, mt_getrandmax()); // better than rand()

        // call the same function if the barcode exists already
        if (barcodeNumberExists($number)) {
            return generateBarcodeNumber2();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    function barcodeNumberExists2($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return \App\limitations::where('invoice_id',$number)->exists();
    }
}
if (!function_exists('receiptsTypes')){
    function receiptsTypes($id = null) {
        return \App\receiptsType::where('receipts_id',$id)->get(); // better than rand()
        // otherwise, it's valid and can be used
    }

}
if (!function_exists('limitationsTypes')){
    function limitationsTypes($id = null) {
        return \App\limitationsType::where('limitations_id',$id)->get(); // better than rand()
        // otherwise, it's valid and can be used
    }

}

if (!function_exists('setting')){
    function setting($value = null){
        return \App\Setting::orderBy('id','desc')->first();
        
    }
}

if (!function_exists('slider')){
    function slider($value = null){
        return \App\Slider::all();
    }
}

if (!function_exists('branches')){
    function branches($value = null){
        return \App\Branches::all();
    }
}

if (!function_exists('about')){
    function about($value = null){
        return \App\AboutPage::where('id','=',1)->first();
    }
}

if (!function_exists('service')){
    function service($value = null){
        return \App\ServicePage::all();
    }
}

if (!function_exists('interview')){
    function interview($value = null){
        return \App\InterviewPage::all();
    }
}

if (!function_exists('paper')){
    function paper($value = null){
        return \App\PaperPage::all();
    }
}

if (!function_exists('blog')){
    function blog($value = null){
        return \App\blog::all();
    }
}

if (!function_exists('aurl')){
    function aurl($value = null){
        return url('admin/'.$value);
    }
}
if (!function_exists('admin')){
    function admin(){
        return auth()->guard('admin');
    }
}
if (!function_exists('getbus')){
    function getbus($id = null){
        return \App\bus::where('id','=',$id)->first();
    }
}
if (!function_exists('LimitationData')){
    function LimitationData($id = null,$date = null,$branch = null,$limitationsType_id = null){
        return \App\limitations::where('id',$id)->whereDate('created_at','=',$date)->where('branche_id',$branch)->where('limitationsType_id',$limitationsType_id)->first();
    }
}
if (!function_exists('getsubscriper')){
    function getsubscriper($id = null){
        return \App\subscription::where('id','=',$id)->first();
    }
}
if (!function_exists('getExcerpt')){
    function getExcerpt($str, $startPos=null, $maxLength=null) {
        if(strlen($str) > $maxLength) {
            $excerpt   = substr($str, $startPos, $maxLength-3);
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt   = substr($excerpt, 0, $lastSpace);
            $excerpt  .= '...';
        } else {
            $excerpt = $str;
        }

        return $excerpt;
    }
}
if (!function_exists('getdriver')){
    function getdriver($id = null){
        return \App\drivers::where('id','=',$id)->first();
    }
}
if (!function_exists('state')){
    function state($id = null){
        return \App\state::where('id','=',$id)->first();
    }
}
if (!function_exists('seating')){
    function seating($id = null,$date = null){
        return \App\book::where('transport_id',$id)->where('date',$date)->count();
    }
}
if (!function_exists('getschedule')){
    function getschedule($id = null){
        return \App\schedule::where('id','=',$id)->first();
    }
}
if (!function_exists('load_dep')){
    function load_dep($select = null,$dep_hide = null){
        $departments = \App\Department::selectraw('dep_name_'.session("lang").' as text')
        ->selectraw('id as id')
        ->selectraw('parent_id as parent')
        ->get(['text','parent','id']);
        $dep_arr = [];
        foreach($departments as $department){
            $list_arr = [];
            $list_arr['icon'] = '';
            $list_arr['li_attr'] = '';
            $list_arr['a_attr'] = '';
            $list_arr['children'] = [];
            if ($select !== null and $select == $department->id){
                $list_arr['state'] = [
                    'opened'=>true,
                    'selected'=>true,
                    'disabled'=>false
                ];
            }
            if ($dep_hide !== null and $dep_hide == $department->id){
                $list_arr['state'] = [
                    'opened'=>false,
                    'selected'=>false,
                    'disabled'=>true
                ];
            }
            $levelType = \App\Department::where('id',$department->id)->first()->parent_id == null ? '( '.\App\Enums\LevelType::getDescription(\App\Department::where('id',$department->id)->first()->levelType).' )' : null;
            $Operation = \App\Department::where('id',$department->id)->first()->operations ? '( '.session_lang(\App\Department::where('id',$department->id)->first()->operations->name_en,\App\Department::where('id',$department->id)->first()->operations->name_ar).' )' : null;
            $cc = \App\Department::where('id',$department->id)->first()->cc_id ? '( '.trans('admin.with_cc').' )' : null;
            $code = \App\Department::where('id',$department->id)->first()->code;
            $list_arr['id'] = $department->id;
            $list_arr['parent'] = $department->parent !== null?$department->parent:'#';
            $list_arr['text'] = $department->text .' '.'( '.$code.' )'.' '.$Operation.' '.$levelType.' '.$cc;
            array_push($dep_arr,$list_arr);
        }
        return json_encode($dep_arr,JSON_UNESCAPED_UNICODE);
    }
}
if (!function_exists('load_cc')){
    function load_cc($select = null,$cc_hide = null){
        $cc = \App\glcc::selectraw('name_'.session("lang").' as text')
        ->selectraw('id as id')
        ->selectraw('parent_id as parent')
        ->get(['text','parent','id']);
        $dep_arr = [];
        foreach($cc as $c){
            $list_arr = [];
            $list_arr['icon'] = '';
            $list_arr['li_attr'] = '';
            $list_arr['a_attr'] = '';
            $list_arr['children'] = [];
            if ($select !== null and $select == $c->id){
                $list_arr['state'] = [
                    'opened'=>true,
                    'selected'=>true,
                    'disabled'=>false
                ];
            }
            if ($cc_hide !== null and $cc_hide == $c->id){
                $list_arr['state'] = [
                    'opened'=>false,
                    'selected'=>false,
                    'disabled'=>true
                ];
            }
            $code = \App\glcc::where('id',$c->id)->first()->code;
            $list_arr['id'] = $c->id;
            $list_arr['parent'] = $c->parent !== null?$c->parent:'#';
            $list_arr['text'] = $c->text .' '.'( '.$code.' )'.'';
            array_push($dep_arr,$list_arr);
        }
        return json_encode($dep_arr,JSON_UNESCAPED_UNICODE);
    }
}
if (!function_exists('lang')){
    function lang(){
        if (session()->has('lang')){
            return session('lang');
        }else{
            session()->put('lang',setting()['main_lang']);
            return setting()['main_lang'];
        }
    }
}

if (!function_exists('direction')){
    function direction(){
        if (session()->has('lang')){
            if(session('lang') == 'ar'){
                return 'rtl';
            }else{
                return 'ltr';
            }
        }else{
            return 'ltr';
        }
    }
}

if (!function_exists('session_lang')){
    function session_lang($var1 = null,$var2 = null){
        if(session('lang')=='en')
        {
            return $var1;
        }else{
            return $var2;
        }
    }
}


if(!function_exists('validate_image')) {
    function validate_image($ext = null)
    {
        if ($ext === null) {
            return 'image|mimes:jpg,jpeg,png,gif,bmp';
        } else {
            return 'image|mimes:' . $ext;
        }
    }
}

if(!function_exists('sumallcc')) {

    function sumallcc($id = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {
        /*
                $value = [];
                $departments = \App\glcc::findOrFail($id);
                dd($departments);

                $pros = [];
                $products = [];
                $categories = $departments->children;

                while(count($categories) > 0){
                    $nextCategories = [];
                    foreach ($categories as $category) {
                        $products = array_merge($products, $category->children->all());
                        $nextCategories = array_merge($nextCategories, $category->children->all());
                    }
                    $categories = $nextCategories;
                }

                $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection

                $pros = $departments->children->pluck('id');

                $plucks = $pro->pluck('id');
                $values = $pros->concat($plucks);
        $depart = \App\glcc::where('type','1')->whereIn('id',$values)->pluck('id');

        $value1 = \App\limitationsType::whereIn('cc_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);
        dd($depart);
        $value2 = \App\receiptsType::whereIn('cc_id',$depart)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);
        return $value1 + $value2;

        */
        $departments= \App\glcc::where('type','1')->where('id',$id)->pluck('id');

        $value1 = \App\limitationsType::whereIn('cc_id',$departments)->whereHas('limitations', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', '<=', $to);
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);

        $value2 = \App\receiptsType::whereIn('cc_id',$departments)->whereHas('receipts', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', '<=',$to);
            $query->whereDate('created_at', $sign,$from);
        })->sum($sum);

//        $value3 = \App\receiptsData::whereIn('cc_id',$departments)->whereHas('receipts', function($query) use ($from,$to,$sign){
//            $query->whereDate('created_at', '<=', $to);
//            $query->whereDate('created_at', $sign, $from);
//        })->sum($sum);
        return $value1 + $value2;


    }
}


if(!function_exists('sumall_move_cc')) {
    function sumall_move_cc($id = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {


        $value = [];
        $departments = \App\glcc::findOrFail($id);


        $pros = [];
        $products = [];
        $categories = $departments->children;
        dd($categories);
        while(count($categories) > 0){
            $nextCategories = [];
            foreach ($categories as $category) {
                $products = array_merge($products, $category->children->all());
                $nextCategories = array_merge($nextCategories, $category->children->all());
            }
            $categories = $nextCategories;
        }

        $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection

        $pros = $departments->children->pluck('id');

        $plucks = $pro->pluck('id');
        $values = $pros->concat($plucks);

        $depart = \App\glcc::where('type','1')->whereIn('id',$values)->pluck('id');

        $value1 = \App\limitationsType::whereIn('cc_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);

        $value2 = \App\receiptsType::whereIn('cc_id',$depart)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at','<=', $to);
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);

        return $value1 + $value2;
    }
}

if(!function_exists('cc_first_balance')) {
    function cc_first_balance_public($id = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {
        $value = [];
        $departments = \App\glcc::findOrFail($id);


        $pros = [];
        $products = [];
        $categories = $departments->children;

        while(count($categories) > 0){
            $nextCategories = [];
            foreach ($categories as $category) {
                $products = array_merge($products, $category->children->all());
                $nextCategories = array_merge($nextCategories, $category->children->all());
            }
            $categories = $nextCategories;
        }


        $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection

        $pros = $departments->children->pluck('id');

        $plucks = $pro->pluck('id');
        $values = $pros->concat($plucks);

        $depart = \App\glcc::where('type','1')->whereIn('id',$values)->pluck('id');

        $value1 = \App\limitationsType::whereIn('cc_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);

        $value2 = \App\receiptsType::whereIn('cc_id',$depart)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){

            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);

        return $value1 + $value2;
    }
}



if(!function_exists('sumallcc3')) {


    function sumallcc3($id = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {

                $value = [];
                $departments = \App\glcc::findOrFail($id);


                $pros = [];
                $products = [];
                $categories = $departments->children;

                while(count($categories) > 0){
                    $nextCategories = [];
                    foreach ($categories as $category) {
                        $products = array_merge($products, $category->children->all());
                        $nextCategories = array_merge($nextCategories, $category->children->all());
                    }
                    $categories = $nextCategories;
                }

                $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection

                $pros = $departments->children->pluck('id');

                $plucks = $pro->pluck('id');
                $values = $pros->concat($plucks);
        $depart = \App\glcc::where('type','1')->whereIn('id',$values)->pluck('id');

        $value1 = \App\limitationsType::whereIn('cc_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);

        $value2 = \App\receiptsType::whereIn('cc_id',$depart)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);
        return $value1 + $value2;



    }
}



if(!function_exists('allcc')) {
    function allcc($id = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {
        $value1 = \App\limitationsType::where('cc_id',$id)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);
        $value2 = \App\receiptsType::where('cc_id',$id)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);
        return $value1 + $value2;
    }
}
if(!function_exists('cc_first_individual')) {
    function cc_first_individual($id = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {
        $value1 = \App\limitationsType::where('cc_id',$id)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);
        $value2 = \App\receiptsType::where('cc_id',$id)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);

        return $value1 + $value2;
    }
}

if(!function_exists('all_no_move_cc')) {
    function all_no_move_cc($id = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {
        $value1 = \App\limitationsType::where('cc_id','=',null)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);
        $value2 = \App\receiptsType::where('cc_id','=',null)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);
        dd($value2);

        return $value1 + $value2;
    }
}
if(!function_exists('all_move_cc2')) {
    function all_move_cc2($id = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {
        $value1 = \App\limitationsType::where('cc_id',$id)->where('debtor','!=','0')->where('creditor','!=','0')->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
            $query->whereDate('created_at', '<=', $to);
        })->exists();
        $value1 = \App\limitationsType::where('cc_id',$id)->where('debtor','!=','0')->where('creditor','!=','0')->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
                   $query->whereDate('created_at', '<=', $to);
        })->sum($sum);
        $value2 = \App\receiptsType::where('cc_id',$id)->where('debtor','!=',0)->where('creditor','!=',0)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
            $query->whereDate('created_at', '<=', $to);
        })->exists();
        $value2 = \App\receiptsType::where('cc_id',$id)->where('debtor','!=',0)->where('creditor','!=',0)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
            $query->whereDate('created_at', '<=', $to);
        })->sum($sum);
//        dd($id);
//        dd($value2);

        return $value1 + $value2;
    }
}

if(!function_exists('depratment_first')) {
    function depratment_first($id = null,$operations = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {

        if ($operations != null){
            $value1 = \App\limitationsType::where('relation_id',$id)->where('operation_id',$operations)->whereHas('limitations' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            $value2 = \App\receiptsType::where('relation_id',$id)->where('operation_id',$operations)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);

            return $value1 + $value2;
        }else{
            $value1 = \App\limitationsType::where('tree_id',$id)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            $value2 = \App\receiptsType::where('tree_id',$id)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            $value3 = \App\receiptsData::where('tree_id',$id)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            return $value1 + $value2 + $value3;
        }
    }
}
if(!function_exists('sumall')) {
    function sumall($id = null,$operations = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {
        if ($operations != null){
            $value1 = \App\limitationsType::where('relation_id',$id)->where('operation_id',$operations)->whereHas('limitations' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
            })->sum($sum);
            $value2 = \App\receiptsType::where('relation_id',$id)->where('operation_id',$operations)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
            })->sum($sum);
            return $value1 + $value2;
        }else{
            $value1 = \App\limitationsType::where('tree_id',$id)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
            })->sum($sum);
            $value2 = \App\receiptsType::where('tree_id',$id)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
            })->sum($sum);
            $value3 = \App\receiptsData::where('tree_id',$id)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
            })->sum($sum);
            return $value1 + $value2 + $value3;
        }
    }
}
if(!function_exists('sumallcc2')) {
    function sumallcc2($id = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {

        $value = [];
        $departments = \App\glcc::findOrFail($id);
        $pros = [];
        $products = [];
        $categories = $departments->children;
        while(count($categories) > 0){
            $nextCategories = [];
            foreach ($categories as $category) {
                $products = array_merge($products, $category->children->all());
                $nextCategories = array_merge($nextCategories, $category->children->all());
            }
            $categories = $nextCategories;
        }
        $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection
        $pros = $departments->children->pluck('id');
        $plucks = $pro->pluck('id');
        $values = $pros->concat($plucks);

        $depart = \App\glcc::where('type','1')->whereIn('id',$values)->pluck('id');
        $value1 = \App\limitationsType::whereIn('cc_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
            $query->whereDate('created_at', '<=', $to);
        })->sum($sum);
        $value2 = \App\receiptsType::whereIn('cc_id',$depart)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
            $query->whereDate('created_at', $sign, $from);
            $query->whereDate('created_at', '<=', $to);
        })->sum($sum);
        return $value1 + $value2;
    }
}
if(!function_exists('sumall2')) {
    function sumall2($id = null,$operations = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {
        if ($operations != null){
            $value1 = \App\limitationsType::where('relation_id',$id)->where('operation_id',$operations)->whereHas('limitations' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            $value2 = \App\receiptsType::where('relation_id',$id)->where('operation_id',$operations)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            return $value1 + $value2;
        }else{
            $value1 = \App\limitationsType::where('tree_id',$id)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            $value2 = \App\receiptsType::where('tree_id',$id)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            $value3 = \App\receiptsData::where('tree_id',$id)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            return $value1 + $value2 + $value3;
        }
    }
}
if(!function_exists('sum_cc')) {
    function sum_cc($id = null,$operations = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
    {

            $value1 = \App\limitationsType::where('cc_id',$id)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
                $query->whereDate('created_at', '<=', $to);
            })->sum($sum);
            $value2 = \App\receiptsType::where('cc_id',$id)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
                $query->whereDate('created_at', '<=', $to);
            })->sum($sum);

            return $value1 + $value2 ;
        }

}

if(!function_exists('alldepartmenttrial')) {
    function alldepartmenttrial($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value1 = \App\limitationsType::where('tree_id',$id)->whereHas('limitations',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from)->whereDate('created_at','<=',$to);
        })->sum($sum);
        $value2 = \App\receiptsType::where('tree_id',$id)->whereHas('receipts',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from)->whereDate('created_at','<=',$to);
        })->sum($sum);
        $value3 = \App\receiptsData::where('tree_id',$id)->whereHas('receipts',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from)->whereDate('created_at','<=',$to);
        })->sum($sum);
        return $value1 + $value2 + $value3;
    }
}

if(!function_exists('alldepartmenttrial2')) {
    function alldepartmenttrial2($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value1 = \App\limitationsType::where('tree_id',$id)->whereHas('limitations',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from);
        })->sum($sum);
        $value2 = \App\receiptsType::where('tree_id',$id)->whereHas('receipts',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from);
        })->sum($sum);
        $value3 = \App\receiptsData::where('tree_id',$id)->whereHas('receipts',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from);
        })->sum($sum);
        return $value1 + $value2 + $value3;
    }
}

if(!function_exists('departmentsum')) {
    function departmentsum($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value = [];
        $departments = \App\Department::findOrFail($id);

        $pros = [];
        $products = [];
        $categories = $departments->children;
        while(count($categories) > 0){
            $nextCategories = [];
            foreach ($categories as $category) {
                $products = array_merge($products, $category->children->all());
                $nextCategories = array_merge($nextCategories, $category->children->all());
            }
            $categories = $nextCategories;
        }
        $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection
        $pros = $departments->children->pluck('id');
        $plucks = $pro->pluck('id');
        $values = $pros->concat($plucks);

        $depart = \App\Department::where('type','1')->whereIn('id',$values)->pluck('id');
//        dd(\App\limitationsType::whereIn('tree_id',$depart)->whereHas('limitations')->sum('debtor'));
        $value1 = \App\limitationsType::whereIn('tree_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);
        $value2 = \App\receiptsType::whereIn('tree_id',$depart)->whereHas('receipts', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);
        $value3 = \App\receiptsData::whereIn('tree_id',$depart)->whereHas('receipts', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);

        return $value1 + $value2 + $value3;


    }
}


if(!function_exists('cc_first_blance')) {
    function cc_first_blance($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value = [];
        $departments = \App\glcc::findOrFail($id);

        $pros = [];
        $products = [];
        $categories = $departments->children;

        while(count($categories) > 0){
            $nextCategories = [];
            foreach ($categories as $category) {
                $products = array_merge($products, $category->children->all());
                $nextCategories = array_merge($nextCategories, $category->children->all());
            }
            $categories = $nextCategories;
        }
        $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection
        $pros = $departments->children->pluck('id');

        $plucks = $pro->pluck('id');

        $values = $pros->concat($plucks);

        $depart = \App\glcc::whereIn('id',$values)->pluck('id');

//        dd(\App\limitationsType::whereIn('tree_id',$depart)->whereHas('limitations')->sum('debtor'));
        $value1 = \App\limitationsType::whereIn('cc_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from);
//            $query->whereDate('created_at', '<=', $to);
        })->sum($sum);
        $value2 = \App\receiptsType::whereIn('cc_id',$depart)->whereHas('receipts', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from);
//            $query->whereDate('created_at', '<=', $to);
        })->sum($sum);



        return $value1 + $value2 ;


    }
}
if(!function_exists('cc_first_blance_individual')) {
    function cc_first_blance_individual($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value1 = \App\limitationsType::where('cc_id',$id)->whereHas('limitations',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from);

        })->sum($sum);
        $value2 = \App\receiptsType::where('cc_id',$id)->whereHas('receipts',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from);

        })->sum($sum);

        return $value1 + $value2 ;
    }
}


if(!function_exists('cc_first_blance_move')) {
    function cc_first_blance_move($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value = [];
        $departments = \App\glcc::findOrFail($id);

        $pros = [];
        $products = [];
        $categories = $departments->children;

        while(count($categories) > 0){
            $nextCategories = [];
            foreach ($categories as $category) {
                $products = array_merge($products, $category->children->all());
                $nextCategories = array_merge($nextCategories, $category->children->all());
            }
            $categories = $nextCategories;
        }
        $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection
        $pros = $departments->children->pluck('id');

        $plucks = $pro->pluck('id');

        $values = $pros->concat($plucks);

        $depart = \App\glcc::whereIn('id',$values)->pluck('id');

        $value1 = \App\limitationsType::where('cc_id','!=',null)->whereIn('cc_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from);
//            $query->whereDate('created_at', '<=', $to);
        })->sum($sum);
        $value2 = \App\receiptsType::where('cc_id','!=',null)->whereIn('cc_id',$depart)->whereHas('receipts',function ($q)use($to,$sign,$from){

            $q->whereDate('created_at',$sign,$from);

        })->sum($sum);
//        dd($value2);
//        dd(\App\limitationsType::whereIn('tree_id',$depart)->whereHas('limitations')->sum('debtor'));

        return $value1 + $value2 ;


    }
}

if(!function_exists('cc_first_blance_individual_move')) {
    function cc_first_blance_individual_move($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value1 = \App\limitationsType::where('cc_id',$id)->where('cc_id','!=',null)->whereHas('limitations',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from);

        })->sum($sum);
        $value2 = \App\receiptsType::where('cc_id',$id)->whereHas('receipts',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from);

        })->sum($sum);

        return $value1 + $value2 ;
    }
}

if(!function_exists('move_cc')) {
    function move_cc($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value = [];
        $departments = \App\glcc::findOrFail($id);

        $pros = [];
        $products = [];
        $categories = $departments->children;
        while(count($categories) > 0){
            $nextCategories = [];
            foreach ($categories as $category) {
                $products = array_merge($products, $category->children->all());
                $nextCategories = array_merge($nextCategories, $category->children->all());
            }
            $categories = $nextCategories;
        }
        $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection
        $pros = $departments->children->pluck('id');
        $plucks = $pro->pluck('id');
        $values = $pros->concat($plucks);

        $depart = \App\glcc::whereIn('id',$values)->pluck('id');
//        dd(\App\limitationsType::whereIn('tree_id',$depart)->whereHas('limitations')->sum('debtor'));
        $value1 = \App\limitationsType::whereIn('cc_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);
        $value2 = \App\receiptsType::whereIn('cc_id',$depart)->whereHas('receipts', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
        })->sum($sum);


        return $value1 + $value2;


    }
}
if(!function_exists('move_cc_individual')) {
    function move_cc_individual($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value1 = \App\limitationsType::where('cc_id',$id)->whereHas('limitations',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from)->whereDate('created_at','<=',$to);
        })->sum($sum);
        $value2 = \App\receiptsType::where('cc_id',$id)->whereHas('receipts',function ($query) use ($from,$to,$sign){
            $query->whereDate('created_at',$sign,$from)->whereDate('created_at','<=',$to);
        })->sum($sum);

        return $value1 + $value2 ;
    }
}
if(!function_exists('departmentsum2')) {
    function departmentsum2($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value = [];
        $departments = \App\Department::findOrFail($id);

        $pros = [];
        $products = [];
        $categories = $departments->children;

        while(count($categories) > 0){
            $nextCategories = [];
            foreach ($categories as $category) {
                $products = array_merge($products, $category->children->all());
                $nextCategories = array_merge($nextCategories, $category->children->all());
            }
            $categories = $nextCategories;
        }
        $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection
        $pros = $departments->children->pluck('id');
        $plucks = $pro->pluck('id');
        $values = $pros->concat($plucks);

        $depart = \App\Department::where('type','1')->whereIn('id',$values)->pluck('id');
//        dd(\App\limitationsType::whereIn('tree_id',$depart)->whereHas('limitations')->sum('debtor'));
        $value1 = \App\limitationsType::whereIn('tree_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);
        $value2 = \App\receiptsType::whereIn('tree_id',$depart)->whereHas('receipts', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);
        $value3 = \App\receiptsData::whereIn('tree_id',$depart)->whereHas('receipts', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);

        return $value1 + $value2 + $value3;


    }
}

if(!function_exists('departmentsum3')) {
    function departmentsum3($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {


        $departments = \App\Department::where('type','1')->where('id',$id)->pluck('id');





//        dd(\App\limitationsType::whereIn('tree_id',$depart)->whereHas('limitations')->sum('debtor'));
        $value1 = \App\limitationsType::whereIn('tree_id',$departments)->whereHas('limitations', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', '<=', $to);
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);

        $value2 = \App\receiptsType::whereIn('tree_id',$departments)->whereHas('receipts', function($query) use ($from,$to,$sign){
          $query->whereDate('created_at', '<=', $to);
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);

        $value3 = \App\receiptsData::whereIn('tree_id',$departments)->whereHas('receipts', function($query) use ($from,$to,$sign){
            $query->whereDate('created_at', '<=', $to);
            $query->whereDate('created_at', $sign, $from);
        })->sum($sum);

        return $value1 + $value2 + $value3 ;


    }
}
if(!function_exists('sumccall')) {
    function sumccall($id = null,$from = null,$to = null,$sum = null,$sign = null)
    {
        $value1 = \App\pjitmmsfl::where('cc_id',$id)->where('month', $sign, date('n', strtotime($from)))->where('month', '<=', date('n', strtotime($to)))->where('year', '=', date('Y', strtotime($from)))->where('year', '=', date('Y', strtotime($to)))->where('type','2')->sum($sum);
        return $value1;
    }
}
if(!function_exists('alldepartment')) {
    function alldepartment($id = null,$sum = null)
    {

        $value1 = \App\limitationsType::where('tree_id',$id)->whereHas('limitations')->sum($sum);

        $value2 = \App\receiptsType::where('tree_id',$id)->whereHas('receipts')->sum($sum);

        $value3 = \App\receiptsData::where('tree_id',$id)->whereHas('receipts')->sum($sum);

        return $value1 + $value2 + $value3;
    }
}



if(!function_exists('sumdepartment')) {
    function sumdepartment($id = null,$operations = null)
    {
        if ($operations != null){
            $value1 = \App\limitationsType::where('id',$id)->get();
            $value2 = \App\receiptsType::where('id',$id)->get();
        }else{
            $value1 = \App\limitationsType::where('id',$id)->get();
            $value2 = \App\receiptsType::where('id',$id)->get();
        }
        return $value1 + $value2;
    }
    if (!function_exists('firstdatelaccount')){
        function firstdatelaccount($from = null,$relation = null,$operations = null) {
            $limitations = \App\limitations::whereNotIn('limitationsType_id',[12])->whereDate('created_at','<',$from)->pluck('id')->toArray();
            return \Illuminate\Support\Facades\DB::table('limitations_type')->whereIn('limitations_id',$limitations)->where('relation_id',$relation)->where('operation_id',$operations);
        }
    }
    if (!function_exists('firstdateraccount')){
        function firstdateraccount($from = null,$relation = null,$operations = null) {
            $receipts = \App\receipts::whereDate('created_at','<',$from)->pluck('id')->toArray();
            return \App\receiptsType::whereIn('receipts_id',$receipts)->where('relation_id',$relation)->where('operation_id',$operations);
        }
    }


    if(!function_exists('totaldepartment')) {
        function totaldepartment($id = null,$sum = null,$sign = null)
        {
            $value = [];

            $departments = \App\Department::findOrFail($id);

            $pros = [];
            $products = [];
            $categories = $departments->children;

            while(count($categories) > 0){
                $nextCategories = [];
                foreach ($categories as $category) {
                    $products = array_merge($products, $category->children->all());
                    $nextCategories = array_merge($nextCategories, $category->children->all());
                }
                $categories = $nextCategories;
            }
            $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection


            $pros = $departments->children->pluck('id');




            $value1 = \App\Department::where('type','1')->whereIn('id',$pros)->sum($sum);


            return $value1 ;


        }
    }
    if(!function_exists('first_dept')) {
        function first_dept($id = null,$from= null,$to= null,$sum = null,$sign = null)
        {
            $value = [];

            $departments = \App\Department::findOrFail($id);

            $pros = [];
            $products = [];
            $categories = $departments->children;

            while(count($categories) > 0){
                $nextCategories = [];
                foreach ($categories as $category) {
                    $products = array_merge($products, $category->children->all());
                    $nextCategories = array_merge($nextCategories, $category->children->all());
                }
                $categories = $nextCategories;
            }
            $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection


            $pros = $departments->children->pluck('id');




            $value1 = \App\Department::where('type','1')->whereIn('id',$pros)->sum($sum);



            return $value1 ;


        }
    }

    if(!function_exists('cc_publicbalance_first_public')) {
        function cc_publicbalance_first_public($id = null,$from = null,$to = null,$sum = null,$sign = null,$sign2 = null)
        {
            $value = [];
            $departments = \App\glcc::findOrFail($id);
            $pros = [];
            $products = [];
            $categories = $departments->children;
            while(count($categories) > 0){
                $nextCategories = [];
                foreach ($categories as $category) {
                    $products = array_merge($products, $category->children->all());
                    $nextCategories = array_merge($nextCategories, $category->children->all());
                }
                $categories = $nextCategories;
            }
            $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection
            $pros = $departments->children->pluck('id');
            $plucks = $pro->pluck('id');
            $values = $pros->concat($plucks);

            $depart = \App\glcc::whereIn('id',$values)->pluck('id');
            $value1 = \App\limitationsType::whereIn('cc_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            $value2 = \App\receiptsType::whereIn('cc_id',$depart)->whereHas('receipts' , function($query) use ($from,$to,$sign,$sign2){
                $query->whereDate('created_at', $sign, $from);
            })->sum($sum);
            return $value1 + $value2;
        }
    }
    if(!function_exists('cc_publicbalance_first_individual')) {
        function cc_publicbalance_first_individual($id = null,$from = null,$to = null,$sum = null,$sign = null)
        {
            $value1 = \App\limitationsType::where('cc_id',$id)->whereHas('limitations',function ($query) use ($from,$to,$sign){
                $query->whereDate('created_at',$sign,$from);
            })->sum($sum);
            $value2 = \App\receiptsType::where('cc_id',$id)->whereHas('receipts',function ($query) use ($from,$to,$sign){
                $query->whereDate('created_at',$sign,$from);
            })->sum($sum);

            return $value1 + $value2;
        }
    }

    if(!function_exists('cc_publicbalance_move_public')) {
        function cc_publicbalance_move_public($id = null,$from = null,$to = null,$sum = null,$sign = null)
        {
            $value = [];
            $departments = \App\glcc::findOrFail($id);

            $pros = [];
            $products = [];
            $categories = $departments->children;
            while(count($categories) > 0){
                $nextCategories = [];
                foreach ($categories as $category) {
                    $products = array_merge($products, $category->children->all());
                    $nextCategories = array_merge($nextCategories, $category->children->all());
                }
                $categories = $nextCategories;
            }
            $pro = new Illuminate\Database\Eloquent\Collection($products); //Illuminate\Database\Eloquent\Collection
            $pros = $departments->children->pluck('id');
            $plucks = $pro->pluck('id');
            $values = $pros->concat($plucks);

            $depart = \App\Department::where('type','1')->whereIn('id',$values)->pluck('id');
//        dd(\App\limitationsType::whereIn('tree_id',$depart)->whereHas('limitations')->sum('debtor'));
            $value1 = \App\limitationsType::whereIn('cc_id',$depart)->whereHas('limitations', function($query) use ($from,$to,$sign){
                $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
            })->sum($sum);
            $value2 = \App\receiptsType::whereIn('cc_id',$depart)->whereHas('receipts', function($query) use ($from,$to,$sign){
                $query->whereDate('created_at', $sign, $from)->whereDate('created_at', '<=', $to);
            })->sum($sum);


            return $value1 + $value2 ;


        }
    }

    if(!function_exists('cc_publicbalance_move_individual')) {
        function cc_publicbalance_move_individual($id = null,$from = null,$to = null,$sum = null,$sign = null)
        {
            $value1 = \App\limitationsType::where('tree_id',$id)->whereHas('limitations',function ($query) use ($from,$to,$sign){
                $query->whereDate('created_at',$sign,$from)->whereDate('created_at','<=',$to);
            })->sum($sum);
            $value2 = \App\receiptsType::where('tree_id',$id)->whereHas('receipts',function ($query) use ($from,$to,$sign){
                $query->whereDate('created_at',$sign,$from)->whereDate('created_at','<=',$to);
            })->sum($sum);

            return $value1 + $value2 ;
        }
    }


    if (!function_exists('active_menu')){
        function active_menu($link = null) {
    //        users:admin/i
            if ($link == Request::path()){
                return ['active-back'];
            }else{
                return [''];
            }
    //        if (preg_match('/'.$link.'/i',Request::segment(2))){
    //            return ['menu-open','display:block','active'];
    //        }else{
    //            return ['','', ''];
    //        }
        }
    }


}
