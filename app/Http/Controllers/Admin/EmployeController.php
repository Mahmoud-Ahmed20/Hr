<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EmployeesExport;
use App\Exports\StaffsExport;
use App\Http\Controllers\Controller;
use App\Models\EmployeRelativesEmployed;
use App\Models\EmployeContact;
use App\Models\EmployeLanguage;
use App\Models\EmployeDependents;
use App\Models\EmployeId;
use App\Models\EmployePassport;
use App\Models\EmployeSkill;
use App\Models\EmployeNotRelativesEmployed;
use App\Models\EmployeTriningCourses;
use App\Models\EmployeCompanyPrevious;
use App\Models\EmployeEducation;
use App\Models\EmployeDrivingLicence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Employe;
use DB;
use Hash;
use Illuminate\Validation\Rule;
use App\Http\Requests\Admin\EmployeRequests\EmployeStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EmployeController  extends Controller
{

    protected $model;

    public function __construct(Employe $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        try{
            $employees = $this->model->notArchive()->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
            $inputs=$request->all();
  return view('admin.employees.index', compact('employees','inputs'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(EmployeStoreRequest $request)
    {

        try{
            // validation
            // db transaction
            DB::beginTransaction();
            // hash password
            $request->merge(['password' => bcrypt($request->password)]);
            //create employe
            $employe = new $this->model();
            $employe->G_O_S_I_O_available = $request->G_O_S_I_O_available;
            $employe->other_data = $request->other_data;
            $employe->get_to_know_the_job = $request->get_to_know_the_job;
            $employe->reason_judicial_ruling = $request->reason_judicial_ruling;
            $employe->judicial_ruling = $request->judicial_ruling;
            $employe->minimum_salary_required = $request->minimum_salary_required;
            $employe->position_applied_of = $request->position_applied_of;
            $employe->employed_now = $request->employed_now;
            $employe->start_working = $request->start_working;
            $employe->employed_by_this_company = $request->employed_by_this_company;
            $employe->first_name = $request->first_name;
            $employe->family_name = $request->family_name;
            $employe->grandfather_name = $request->grandfather_name;
            $employe->father_name = $request->father_name;
            $employe->father_name = $request->father_name;
            $employe->marital_status = $request->marital_status;
            $employe->dependents = $request->dependents;
            $employe->religion = $request->religion;
            $employe->nationality = $request->nationality;
            $employe->place_of_birth = $request->place_of_birth;
            $employe->birth = $request->birth;
            $employe->city = implode(',',$request->city);
            //save image
            if (!$request->hasFile('photo') == null) {
                $file = uploadIamge( $request->file('photo'), 'employees'); // function on helper file to upload file
                $employe->photo = $file;
            }
            $employe->save();

            $employee_id=new EmployeId();
            $employee_id->employe_id=$employe->id;
            $employee_id->date_of_issue=$request-> date_of_issue;
            $employee_id->place_of_issue=$request-> place_of_issue;
            $employee_id->card_id=$request-> card_id;
            $employee_id->save();


//            $employee_passport=new EmployePassport();
//            $employee_passport->employe_id=$employe-> id;
//            $employee_passport->date_of_issue=$request-> date_of_issue;
//            $employee_passport->place_of_issue=$request-> place_of_issue;
//            $employee_passport->passport=$request-> passport;
//            $employee_passport->save();




            $employee_licence=new EmployeDrivingLicence();
            $employee_licence->employe_id=$employe->id;
            $employee_licence->number=$request-> licence_number;
            $employee_licence->expiry_date=$request-> licence_expiry_date;
            $employee_licence->blood_group=$request-> licence_blood_group;
            $employee_licence->category=$request-> licence_category;
            $employee_licence->date_of_issue=$request-> licence_date_of_issue;
            $employee_licence->place_of_issue=$request-> licence_place_of_issue;
            $employee_licence->save();


            $employee_relatives_employed=new EmployeRelativesEmployed();
            $employee_relatives_employed->employe_id=$employe->id;
            $employee_relatives_employed->name=$request-> employees_relatives_employed_name;
            $employee_relatives_employed->save();



            $employee_skills_employed=new EmployeSkill();
            $employee_skills_employed->employe_id=$employe->id;
            $employee_skills_employed->skills=$request-> employee_skills;
            $employee_skills_employed->save();



            $employee_dependents_count=0;
            if (isset($request->dependents_name) ) {
                foreach ($request->dependents_name as $name) {


                    $employee_dependents = new EmployeDependents();
                    $employee_dependents->employe_id = $employe->id;
                    $employee_dependents->name = $name;
                    $employee_dependents->age = $request->dependents_age[$employee_dependents_count];
                    $employee_dependents->relation = $request->dependents_relation[$employee_dependents_count];
                    $employee_dependents->address = $request->dependents_address;
                    $employee_dependents->save();
                    $employee_dependents_count++;
                }
            }



            $employees_not_relatives_count=0;
            if (isset($request->employees_not_relatives_name) ) {
                foreach ($request->employees_not_relatives_name as $name) {
                    $employees_not_relatives = new EmployeNotRelativesEmployed();
                    $employees_not_relatives->employe_id = $employe->id;
                    $employees_not_relatives->name = $name;
                    $employees_not_relatives->address = $request->employees_not_relatives_address[$employees_not_relatives_count];
                    $employees_not_relatives->telephone = $request->employees_not_relatives_telephone[$employees_not_relatives_count];
                    $employees_not_relatives->company = $request->employees_not_relatives_company[$employees_not_relatives_count];
                    $employees_not_relatives->position = $request->employees_not_relatives_position[$employees_not_relatives_count];
                    $employees_not_relatives->save();
                    $employees_not_relatives_count++;
                }
            }


            $employee_education_count=0;
            if (isset($request->education_stage_id) ) {
                foreach ($request->education_stage_id as $stage_id) {


                    $employee_education = new EmployeEducation();
                    $employee_education->employe_id = $employe->id;
                    $employee_education->stage_id = $stage_id;
                    $employee_education->place_name = $request->education_place_name[$employee_education_count];
                    $employee_education->city = $request->education_city[$employee_education_count];
                    $employee_education->from = $request->education_from[$employee_education_count];
                    $employee_education->to = $request->education_to[$employee_education_count];
                    $employee_education->specialize = $request->education_specialize[$employee_education_count];
                    $employee_education->grade = $request->education_grade[$employee_education_count];
                    $employee_education->save();
                    $employee_education_count++;
                }
            }



            $employee_course_count=0;
            if (isset($request->course_name) ) {
                foreach ($request->course_name as $name) {


                    $employee_course = new EmployeTriningCourses();
                    $employee_course->employe_id = $employe->id;
                    $employee_course->name = $name;
                    $employee_course->from = $request->course_from[$employee_course_count];
                    $employee_course->to = $request->course_to[$employee_course_count];
                    $employee_course->specialize = $request->course_specialize[$employee_course_count];
                    $employee_course->name_of_institute = $request->course_name_of_institute[$employee_course_count];
                    $employee_course->city = $request->course_city[$employee_course_count];
                    $employee_course->save();
//                   dd($employee_course);
                    $employee_course_count++;
                }
            }
//            dd($request->course_name);



//            dd($request->all());

            $employee_language_count=0;
            if (isset($request->language_name) ) {
                foreach ($request->language_name as $name) {


                    $employee_language = new EmployeLanguage();
                    $employee_language->employe_id = $employe->id;
                    $employee_language->name = $name;
                    $employee_language->speaking_ex = $request->language_speaking_ex[$employee_language_count];
                    $employee_language->reading_ex = $request->language_reading_ex[$employee_language_count];
                    $employee_language->writing_ex = $request->language_writing_ex[$employee_language_count];
//                    $employee_language->shorthand_speed = $request->language_shorthand_speed[$employee_language_count];
                    $employee_language->typing_speed = $request->language_typing_speed[$employee_language_count];
                    $employee_language->other_skills = $request->language_other_skills[$employee_language_count];
                    $employee_language->speaking_f = $request->language_speaking_f[$employee_language_count];
                    $employee_language->speaking_g = $request->language_speaking_g[$employee_language_count];
                    $employee_language->reading_f = $request->language_reading_f[$employee_language_count];
                    $employee_language->reading_g = $request->language_reading_g[$employee_language_count];
                    $employee_language->writing_f = $request->language_writing_f[$employee_language_count];
                    $employee_language->writing_g = $request->language_writing_g[$employee_language_count];
                    $employee_language->save();
//                   dd($request->language_speaking_f);
                    $employee_language_count++;
                }
            }
//            dd($request->language_name);

            $previous_company_count=0;
            if (isset($request->company_from) ) {
                foreach ($request->company_from as $from) {
                    $previous_company = new EmployeCompanyPrevious();
                    $previous_company->employe_id = $employe->id;
                    $previous_company->from = $from;
                    $previous_company->to = $request->company_to[$previous_company_count];
                    $previous_company->salary = $request->company_salary[$previous_company_count];
                    $previous_company->address = $request->company_address[$previous_company_count];
                    $previous_company->job_title = $request->company_job_title[$previous_company_count];
                    $previous_company->description = $request->company_description[$previous_company_count];
                    $previous_company->allowance = $request->company_allowance[$previous_company_count];
                    $previous_company->reason_for_quit = $request->company_reason_for_quit[$previous_company_count];
                    $previous_company->telephone = $request->company_telephone[$previous_company_count];
                    $previous_company->name_of_org = $request->company_name_of_org[$previous_company_count];
                    $previous_company->save();
                    $previous_company_count++;
                }
            }
            $employee_contact=new EmployeContact();
            $employee_contact->employe_id=$employe-> id;
            $employee_contact->mobile=$request-> mobile;
            $employee_contact->email=$request-> email;
            $employee_contact->post=$request-> post;
            $employee_contact->work_phone=$request-> work_phone;
            $employee_contact->home_phone=$request-> home_phone;
            $employee_contact->present_adderss=$request-> present_adderss;
            $employee_contact->save();



            DB::commit();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }


    public function update(EmployeStoreRequest $request,$id)
    {
        try{
            $employe =  $this->model->findOrFail($id);


            $employe->G_O_S_I_O_available = $request->G_O_S_I_O_available;
            $employe->other_data = $request->other_data;
            $employe->get_to_know_the_job = $request->get_to_know_the_job;
            $employe->reason_judicial_ruling = $request->reason_judicial_ruling;
            $employe->judicial_ruling = $request->judicial_ruling;
            $employe->minimum_salary_required = $request->minimum_salary_required;
            $employe->position_applied_of = $request->position_applied_of;
            $employe->employed_now = $request->employed_now;
            $employe->start_working = $request->start_working;
            $employe->employed_by_this_company = $request->employed_by_this_company;
            $employe->first_name = $request->first_name;
            $employe->family_name = $request->family_name;
            $employe->grandfather_name = $request->grandfather_name;
            $employe->father_name = $request->father_name;
            $employe->father_name = $request->father_name;
            $employe->marital_status = $request->marital_status;
            $employe->dependents = $request->dependents;
            $employe->religion = $request->religion;
            $employe->nationality = $request->nationality;
            $employe->place_of_birth = $request->place_of_birth;
            $employe->birth = $request->birth;
            $employe->city = implode(',',$request->city);
            //save image
            if (!$request->hasFile('photo') == null) {
                $file = uploadIamge( $request->file('photo'), 'employees'); // function on helper file to upload file
                $employe->photo = $file;
            }

            $employe->save();



            EmployeId::where('employe_id',$id)->delete();


            $employee_id=new EmployeId();
            $employee_id->employe_id=$employe->id;
            $employee_id->date_of_issue=$request-> date_of_issue;
            $employee_id->place_of_issue=$request-> place_of_issue;
            $employee_id->card_id=$request-> card_id;
            $employee_id->save();


//            EmployePassport::where('employe_id',$id)->delete();

//            $employee_passport=new EmployePassport();
//            $employee_passport->employe_id=$employe-> id;
//            $employee_passport->date_of_issue=$request-> date_of_issue;
//            $employee_passport->place_of_issue=$request-> place_of_issue;
//            $employee_passport->passport=$request-> passport;
//            $employee_passport->save();


            EmployeDrivingLicence::where('employe_id',$id)->delete();


            $employee_licence=new EmployeDrivingLicence();
            $employee_licence->employe_id=$employe->id;
            $employee_licence->number=$request-> licence_number;
            $employee_licence->expiry_date=$request-> licence_expiry_date;
            $employee_licence->blood_group=$request-> licence_blood_group;
            $employee_licence->category=$request-> licence_category;
            $employee_licence->date_of_issue=$request-> licence_date_of_issue;
            $employee_licence->place_of_issue=$request-> licence_place_of_issue;
            $employee_licence->save();


            EmployeRelativesEmployed::where('employe_id',$id)->delete();

            $employee_relatives_employed=new EmployeRelativesEmployed();
            $employee_relatives_employed->employe_id=$employe->id;
            $employee_relatives_employed->name=$request-> employees_relatives_employed_name;
            $employee_relatives_employed->save();


            EmployeSkill::where('employe_id',$id)->delete();

            $employee_skills_employed=new EmployeSkill();
            $employee_skills_employed->employe_id=$employe->id;
            $employee_skills_employed->skills=$request-> employee_skills;
            $employee_skills_employed->save();


            EmployeDependents::where('employe_id',$id)->delete();

//            dd($request->dependents_address);
            $employee_dependents_count=0;
            if (isset($request->dependents_name) ) {
                foreach ($request->dependents_name as $name) {


                    $employee_dependents = new EmployeDependents();
                    $employee_dependents->employe_id = $employe->id;
                    $employee_dependents->name = $name;
                    $employee_dependents->age = $request->dependents_age[$employee_dependents_count];
                    $employee_dependents->relation = $request->dependents_relation[$employee_dependents_count];
                    $employee_dependents->address = $request->dependents_address;
                    $employee_dependents->save();
                    $employee_dependents_count++;
                }
            }

            EmployeNotRelativesEmployed::where('employe_id',$id)->delete();


            $employees_not_relatives_count=0;
            if (isset($request->employees_not_relatives_name) ) {
                foreach ($request->employees_not_relatives_name as $name) {
                    $employees_not_relatives = new EmployeNotRelativesEmployed();
                    $employees_not_relatives->employe_id = $employe->id;
                    $employees_not_relatives->name = $name;
                    $employees_not_relatives->address = $request->employees_not_relatives_address[$employees_not_relatives_count];
                    $employees_not_relatives->telephone = $request->employees_not_relatives_telephone[$employees_not_relatives_count];
                    $employees_not_relatives->company = $request->employees_not_relatives_company[$employees_not_relatives_count];
                    $employees_not_relatives->position = $request->employees_not_relatives_position[$employees_not_relatives_count];
                    $employees_not_relatives->save();
                    $employees_not_relatives_count++;
                }
            }

            EmployeEducation::where('employe_id',$id)->delete();

            $employee_education_count=0;
            if (isset($request->education_stage_id) ) {
                foreach ($request->education_stage_id as $stage_id) {


                    $employee_education = new EmployeEducation();
                    $employee_education->employe_id = $employe->id;
                    $employee_education->stage_id = $stage_id;
                    $employee_education->place_name = $request->education_place_name[$employee_education_count];
                    $employee_education->city = $request->education_city[$employee_education_count];
                    $employee_education->from = $request->education_from[$employee_education_count];
                    $employee_education->to = $request->education_to[$employee_education_count];
                    $employee_education->specialize = $request->education_specialize[$employee_education_count];
                    $employee_education->grade = $request->education_grade[$employee_education_count];
                    $employee_education->save();
                    $employee_education_count++;
                }
            }


            EmployeTriningCourses::where('employe_id',$id)->delete();

            $employee_course_count=0;
            if (isset($request->course_name) ) {
                foreach ($request->course_name as $name) {


                    $employee_course = new EmployeTriningCourses();
                    $employee_course->employe_id = $employe->id;
                    $employee_course->name = $name;
                    $employee_course->from = $request->course_from[$employee_course_count];
                    $employee_course->to = $request->course_to[$employee_course_count];
                    $employee_course->specialize = $request->course_specialize[$employee_course_count];
                    $employee_course->name_of_institute = $request->course_name_of_institute[$employee_course_count];
                    $employee_course->city = $request->course_city[$employee_course_count];
                    $employee_course->save();
//                   dd($employee_course);
                    $employee_course_count++;
                }
            }
//            dd($request->course_name);



//            dd($request->all());
            EmployeLanguage::where('employe_id',$id)->delete();

            $employee_language_count=0;
            if (isset($request->language_name) ) {
                foreach ($request->language_name as $name) {


                    $employee_language = new EmployeLanguage();
                    $employee_language->employe_id = $employe->id;
                    $employee_language->name = $name;
                    $employee_language->speaking_ex = $request->language_speaking_ex[$employee_language_count];
                    $employee_language->reading_ex = $request->language_reading_ex[$employee_language_count];
                    $employee_language->writing_ex = $request->language_writing_ex[$employee_language_count];
//                    $employee_language->shorthand_speed = $request->language_shorthand_speed[$employee_language_count];
                    $employee_language->typing_speed = $request->language_typing_speed[$employee_language_count];
                    $employee_language->other_skills = $request->language_other_skills[$employee_language_count];
                    $employee_language->speaking_f = $request->language_speaking_f[$employee_language_count];
                    $employee_language->speaking_g = $request->language_speaking_g[$employee_language_count];
                    $employee_language->reading_f = $request->language_reading_f[$employee_language_count];
                    $employee_language->reading_g = $request->language_reading_g[$employee_language_count];
                    $employee_language->writing_f = $request->language_writing_f[$employee_language_count];
                    $employee_language->writing_g = $request->language_writing_g[$employee_language_count];
                    $employee_language->save();
//                   dd($request->language_speaking_f);
                    $employee_language_count++;
                }
            }
//            dd($request->language_name);

            EmployeCompanyPrevious::where('employe_id',$id)->delete();

            $previous_company_count=0;
            if (isset($request->company_from) ) {
                foreach ($request->company_from as $from) {
                    $previous_company = new EmployeCompanyPrevious();
                    $previous_company->employe_id = $employe->id;
                    $previous_company->from = $from;
                    $previous_company->to = $request->company_to[$previous_company_count];
                    $previous_company->salary = $request->company_salary[$previous_company_count];
                    $previous_company->address = $request->company_address[$previous_company_count];
                    $previous_company->job_title = $request->company_job_title[$previous_company_count];
                    $previous_company->description = $request->company_description[$previous_company_count];
                    $previous_company->allowance = $request->company_allowance[$previous_company_count];
                    $previous_company->reason_for_quit = $request->company_reason_for_quit[$previous_company_count];
                    $previous_company->telephone = $request->company_telephone[$previous_company_count];
                    $previous_company->name_of_org = $request->company_name_of_org[$previous_company_count];
                    $previous_company->save();
                    $previous_company_count++;
                }
            }

            EmployeContact::where('employe_id',$id)->delete();
            $employee_contact=new EmployeContact();
            $employee_contact->employe_id=$employe-> id;
            $employee_contact->mobile=$request-> mobile;
            $employee_contact->email=$request-> email;
            $employee_contact->post=$request-> post;
            $employee_contact->work_phone=$request-> work_phone;
            $employee_contact->home_phone=$request-> home_phone;
            $employee_contact->present_adderss=$request-> present_adderss;
            $employee_contact->save();




            DB::commit();
            flash()->success("The Updated Has Been Done");
            return back();
        }catch(\Exception $adm){
            DB::rollback();
            return $adm;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $employee = $this->model->findOrFail($id)->load(['skill','relatives_employed','not_relatives_employed','languages','trining_courses','educations','driving','company_privious','card','contact','people_dependents']);
//            dd($employee);
            return view('admin.employees.edit', compact('employee'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {
        try{
            $employe = $this->model->findOrFail($id);
            $employe->archive = 1;
            $employe->save();


//            EmployeLanguage::where('employe_id',$id)->delete();
//            EmployeId::where('employe_id',$id)->delete();
//            EmployeCompanyPrevious::where('employe_id',$id)->delete();
//            EmployeContact::where('employe_id',$id)->delete();
//            EmployePassport::where('employe_id',$id)->delete();
//            EmployeDrivingLicence::where('employe_id',$id)->delete();
//            EmployeRelativesEmployed::where('employe_id',$id)->delete();
//            EmployeSkill::where('employe_id',$id)->delete();
//            EmployeDependents::where('employe_id',$id)->delete();
//            EmployeNotRelativesEmployed::where('employe_id',$id)->delete();
//            EmployeTriningCourses::where('employe_id',$id)->delete();
//            EmployeEducation::where('employe_id',$id)->delete();

            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }
    public function deletedependents(Request $request)
    {

        $id = $request->get('id');
        try{
             EmployeDependents::where('id',$id)->delete();

            return 'deleted';
        }catch(\Exception $ex){
            return 'error';
        }
    }
    public function deletecompany_previous(Request $request)
    {

        $id = $request->get('id');
        try{
             EmployeCompanyPrevious::where('id',$id)->delete();
            return 'deleted';
        }catch(\Exception $ex){
            return 'error';
        }
    }
    public function deletecourse(Request $request)
    {

        $id = $request->get('id');
        try{
            EmployeTriningCourses::where('id',$id)->delete();
            return 'deleted';
        }catch(\Exception $ex){
            return 'error';
        }
    }
    public function deletelang(Request $request)
    {

        $id = $request->get('id');
        try{
            EmployeLanguage::where('id',$id)->delete();
            return 'deleted';
        }catch(\Exception $ex){
            return 'error';
        }
    }
    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $employees = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $employees = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($employees && count($employees) > 0){
                foreach($employees as $employee ){
                    $employee->urlRouteDelete = route('admin/employees/delete', $employee->id);
                    $employee->urlRoutePrint = route('admin/employees/print', $employee->id);
                    $data[] = $employee;
                }
            }
            return $data;
        }catch(Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }


    public function print($id)
    {
        try{
            $employee = $this->model->findOrFail($id);
            return view('admin.employees.print', compact('employee'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function exportExcel(Request $request)
    {
        try{
            $inputs = $request->all();
            return Excel::download(new EmployeesExport($inputs), 'employees_requests.xlsx');
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function pdf()
    {
        try{
            $employees = $this->model->notArchive()->orderBy('id')->get();
            return view('admin.employees.pdf', compact('employees'));
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportPDF(Request $request)
    {
        try{
            $inputs = $request->all();
            $employees = $this->model->notArchive()->orderBy('id')->get();
            $pdf = PDF::loadView('admin.employees.pdf', compact(['employees', 'inputs']));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('employees_requests.pdf');
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
}
