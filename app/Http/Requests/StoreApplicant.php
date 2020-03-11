<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

                'name_ar' => 'required',
                'name_en' => 'sometimes',
                'job_id' => 'required',
                'job_spec_id' => 'required',
                'job_desc' => 'sometimes',


                'religion' => 'sometimes',
                'gender' => 'sometimes',
                'social_status' => 'sometimes',

                'experience' => 'required',
                'birth_date' => 'sometimes',
                'address' => 'sometimes',
                'city_id' => 'sometimes',
                'degree' => 'required',
                'college' => 'sometimes',
                'university' => 'sometimes',
                'grade' => 'sometimes',
                'lang' => 'sometimes',
                'lang_read' => 'sometimes',
                'lang_write' => 'sometimes',
                'lang_understand' => 'sometimes',
                'email' => 'sometimes',

                'phone_1' => 'sometimes',
                'phone_2' => 'sometimes',
                'phone_3' => 'sometimes',
                'phone_4' => 'sometimes',
                'job_applied' => 'sometimes',
                'salary_expected' => 'sometimes',
                'passport_num' => 'sometimes',
                'passport_job' => 'sometimes',
                'passport_expired_date' => 'sometimes',
                'work_abroad_status' => 'sometimes',
                'license_num' => 'sometimes',
                'license_type' => 'sometimes',
                'license_expired_date' => 'sometimes',
                'ministerial_application_date' => 'sometimes',
                'ministerial_application_num' => 'sometimes',
                'child_num'=>'sometimes',
                'partner_name'=>'sometimes',
                'partner_job'=>'sometimes',
                'training_courses'=>'sometimes',
                'birth_id'=>'sometimes',
                'passport_nation'=>'sometimes',
                'work_place'=>'sometimes',
                'return_date'=>'sometimes',
                'state_id'=>'sometimes',
                'graduation_date'=>'sometimes',
                'nation_id'=>'sometimes',


        ];
    }


    public function messages()
    {
        return [
            'name_ar.required' => 'الاسم مطلوب ',
            'job_id.required'  => 'الوظيفة مطلوبة',
            'job_spec_id.required'  => 'التخصص مطلوب',
            'experience.required'  => ' اختيار  الخبرة مطلوبة ',
            'degree.required'  => ' اختيار  الدرجة العلمية  مطلوبة ',

        ];
    }
}
