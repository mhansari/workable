<?php namespace Modules\Seeker\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Input;
use Session;
use App\Resume;
use Auth;
use PDF;
use Image;
class ResumeController extends Controller {
	


	public function viewresume($country,$id)
	{

		 $resume_id = $id;
		$sections = \App\ResumeSections::where('active', 1)->get();
		$profile = \App\ResumeSeekerProfile::with(['awards'=>function($query){$query->orderBy('award_date');},'affilitions','publications','references','education','experiance','projects','languages','skills'])->where('resume_id', $resume_id)->first();
		return view('view-resume')->with('resume_id',$resume_id)->with('country',$country)->with('sections',$sections)->with('profile',$profile);
	}

	public function dashboard($country)
	{
		return view('seeker::dashboard')->with('country',$country);
	}
	public function myresumes($country)
	{
		
		return view('seeker::myresumes')->with('country',$country);
	}
	public function create($country)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		return view('seeker::create_resume')->with('country',$country)->with('obj',$obj)->with('sections', $sections);
	}

	public function uploadresume($country)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		return view('seeker::upload_resume')->with('obj',$obj)->with('sections', $sections)->with('country',$country);
	}

	public function saveresume(Request $request,$country)
	{

		if(Input::file())
        {
        	$resume = new Resume();
        	$destinationPath = 'uploads'; 
			$extension = Input::file('cv')->getClientOriginalExtension(); 
			$fileName = rand(11111,99999).'.'.$extension; 
			Input::file('cv')->move($destinationPath, $fileName); 
			$resume->user_id = Auth::user()->id;
			$resume->title = Input::get('title');
			$resume->resume = $destinationPath.'/'.$fileName;
			$resume->active = true;
			$resume->save();
			Session::flash('success', 'Upload successfully'); 
			return Redirect::to($country .'/seekers/manage/upload-resume');
           
		}
	}

	public function deleteAcademics(Request $request,$country,$resumeid,$id)
	{
		$academic = \App\ResumeAcademics::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $academic->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/manage/resume-academics/'.$resumeid);
	}
	public function updateAcademics(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$degrees = \App\DegreeLevels::where('active', 1)->lists('name','id');
		$academic = \App\ResumeAcademics::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($academic ==null)
		{
			$academic = new \App\ResumeAcademics;
			$academic->completion_date = date("Y-m-d");
		}

		return view('seeker::update-academics', compact('countries','states', 'cities','degrees'))->with('obj',$obj)->with('sections', $sections)->with('country',$country)->with('academic', $academic)->with('id',$id)->with('resumeid',$resumeid);
	}
public function resumeAcademics(Request $request,$country,$resumeid)
{
	$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
	
	$sections = \App\ResumeSections::where('active', 1)->get();
	$academic = \App\ResumeAcademics::with(['degreelevel','country','city'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
	return view('seeker::resume-academics')->with('country',$country)->with('sections', $sections)->with('academic', $academic)->with('obj',$obj)->with('resumeid',$resumeid);
}
	public function saveAcademics(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();
		$cities = array();
		$degrees = \App\DegreeLevels::where('active', 1)->lists('name','id');
		$academic = \App\ResumeAcademics::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($academic ==null)
		{
			$academic = new \App\ResumeAcademics;
		}
		$academic->user_id =Auth::user()->id;
		$academic->resume_id =$resumeid;
		$academic->degree_level_id =$request->input('degree_level');
		$academic->degree =$request->input('degree');
		$academic->completion_date = date("Y-m-d",strtotime($request->input('date_of_completion')));
		$academic->grade =$request->input('grade');
		$academic->institute =$request->input('institute');
		$academic->country_id =$request->input('CountryID');
		$academic->state_id =$request->input('StateID');
		$academic->city_id =$request->input('CityID');
		$academic->details = $request->input('details');
		$academic->active = 1;
		$academic->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-academics/'.$resumeid);
		//return view('seeker::resume-academics', compact('countries','states', 'cities','degrees'))->with('obj',$obj)->with('sections', $sections)->with('academic', $academic)->with('id',$id)->with('resumeid',$resumeid);
	}

	public function updatePersonalInfo(Request $request,$country,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$maritalstatus = \App\MaritalStatus::where('active', 1)->lists('Name', 'id');
		$industries = \App\Categories::where('active', 1)->lists('Name', 'id');
		$countries = \App\Countries::all()->lists('Name', 'id');
		$currencies = \App\Currencies::where('active', 1)->lists('name', 'id');
		$experiance = \App\ExperianceLevels::where('active', 1)->lists('name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$profile = \App\ResumeSeekerProfile::where('user_id', Auth::user()->id)->where('resume_id', $id)->first();
		if($profile ==null)
		{
			$profile = new \App\ResumeSeekerProfile;
			$profile->first_name = $user->first_name;
			$profile->last_name = $user->last_name;
			$profile->email = $user->email;
			$profile->mobile = $user->mobile_phone;
			$profile->country_id = $user->country_id;
			$profile->state_id = $user->state_id;
			$profile->city_id = $user->city_id;
			$profile->dob = $user->dob;
			$profile->gender = $user->gender;
		}

		return view('seeker::update-personal', compact('experiance','currencies','industries','maritalstatus','countries','states', 'cities'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('profile', $profile)->with('resumeid',$id);
	}

	public function savePersonalInfo(Request $request,$country,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$maritalstatus = \App\MaritalStatus::where('active', 1)->lists('Name', 'id');
		$industries = \App\Categories::where('active', 1)->lists('Name', 'id');
		$countries = \App\Countries::all()->lists('Name', 'id');
		$currencies = \App\Currencies::where('active', 1)->lists('name', 'id');
		$experiance = \App\ExperianceLevels::where('active', 1)->lists('name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$profile = \App\ResumeSeekerProfile::where('user_id', Auth::user()->id)->where('resume_id', $id)->first();
		if($profile ==null)
		{
			$profile = new \App\ResumeSeekerProfile;
		
		}
		
		$profile->resume_id = $id;
		$profile->user_id = Auth::user()->id;
		$profile->first_name = $request->input('firstname');
		$profile->last_name = $request->input('lastname');
		$profile->father_name = $request->input('fathername');
		$profile->cnic = $request->input('cnic');
		$profile->gender = $request->input('gender');
		$profile->marital_status_id = $request->input('marital_status');
		$profile->dob = date("Y-m-d",strtotime($request->input('dob')));
		$profile->email = $request->input('email');
		$profile->mobile = $request->input('mobile_number');
		$profile->phone_day = $request->input('phone_day');
		$profile->phone_night = $request->input('phone_evening');
		$profile->address = $request->input('address');
		$profile->postal_code = $request->input('postal_code');
		$profile->country_id = $request->input('CountryID');
		$profile->state_id = $request->input('StateID');
		$profile->city_id = $request->input('CityID');
		$profile->industry_id = $request->input('IndustryID');
		$profile->experiance_level_id = $request->input('ExperrianceID');
		$profile->current_salary = $request->input('current_salary');
		$profile->current_salary_currency_id = $request->input('currsalaryid');
		$profile->expected_salary = $request->input('expected_salary');
		$profile->expected_salary_currency_id = $request->input('excurrencyid');
		$profile->professional_summary = $request->input('professional_summary');
		$profile->facebook = $request->input('facebook');
		$profile->linkedin = $request->input('linkedin');
		$profile->twitter = $request->input('twitter');
		$profile->blog = $request->input('blog');
		$profile->website = $request->input('website');
		$profile->active = 1;
		if(Input::file())
        {
            $image = Input::file('logo');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('pp/' . $filename);
 			@unlink(public_path( $profile->pp ));
        
                Image::make($image->getRealPath())->resize(150, 150,function($constraint){
                	$constraint->aspectRatio();
                	//$constraint->upsize();
                })->save($path);
                
                $profile->pp = 'pp/' . $filename;
           }
		$profile->save();
		return view('seeker::update-personal', compact('experiance','currencies','industries','maritalstatus','countries','states', 'cities'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('profile', $profile)->with('resumeid',$id);
		
	//	var_dump(array_keys($request->all()));
	}


	//Experiance

	public function deleteExperiance(Request $request,$country,$resumeid,$id)
	{
		$experiance = \App\ResumeExperiances::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $experiance->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/manage/resume-experiances/'.$resumeid);
	}
	public function updateExperiance(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$experiance = \App\ResumeExperiances::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($experiance ==null)
		{
			$experiance = new \App\ResumeExperiances;
			$experiance->start_date = date("Y-m-d");
			$experiance->end_date = date("Y-m-d");
		}

		return view('seeker::update-experiance', compact('countries','states', 'cities'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('experiance', $experiance)->with('id',$id)->with('resumeid',$resumeid);
	}
	public function resumeExperiances(Request $request,$country,$resumeid)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		
		$sections = \App\ResumeSections::where('active', 1)->get();
		$experiance = \App\ResumeExperiances::with(['country','city'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
		return view('seeker::resume-experiances')->with('country',$country)->with('sections', $sections)->with('experiance', $experiance)->with('obj',$obj)->with('resumeid',$resumeid);
	}
	public function saveExperiance(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();
		$cities = array();
		$degrees = \App\DegreeLevels::where('active', 1)->lists('name','id');
		$experiance = \App\ResumeExperiances::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($experiance ==null)
		{
			$experiance = new \App\ResumeExperiances;
		}
		$experiance->user_id =Auth::user()->id;
		$experiance->resume_id =$resumeid;
		$experiance->start_date = date("Y-m-d",strtotime($request->input('start_date')));
		$experiance->end_date = date("Y-m-d",strtotime($request->input('end_date')));
		$experiance->organization =$request->input('org');
		$experiance->job_title =$request->input('job_title');
		$experiance->country_id =$request->input('CountryID');
		$experiance->state_id =$request->input('StateID');
		$experiance->city_id =$request->input('CityID');
		$experiance->details = $request->input('details');
		$experiance->active = 1;
		$experiance->current_working = $request->input('current_work');
		$experiance->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-experiances/'.$resumeid);
		//return view('seeker::resume-academics', compact('countries','states', 'cities','degrees'))->with('obj',$obj)->with('sections', $sections)->with('academic', $academic)->with('id',$id)->with('resumeid',$resumeid);
	}



	//Projects

		public function deleteProject(Request $request,$country,$resumeid,$id)
	{
		$project = \App\ResumeProjects::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $project->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country .'/seekers/manage/resume-projects/'.$resumeid);
	}
	public function updateProject(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$exp = \App\ResumeExperiances::where('user_id', Auth::user()->id)->lists('organization', 'id');

		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$projecttype = \App\ProjectType::all()->lists('name', 'id');
		$project = \App\ResumeProjects::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($project ==null)
		{
			$project = new \App\ResumeProjects;
		}
		//$project->current_working=0;;
		return view('seeker::update-project', compact('projecttype','exp'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('project', $project)->with('id',$id)->with('resumeid',$resumeid);
	}
	public function resumeProjects(Request $request,$country,$resumeid)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		
		$sections = \App\ResumeSections::where('active', 1)->get();
		$project = \App\ResumeProjects::with(['projecttype'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
		return view('seeker::resume-projects')->with('country',$country)->with('sections', $sections)->with('project', $project)->with('obj',$obj)->with('resumeid',$resumeid);
	}
	public function saveProject(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$project = \App\ResumeProjects::with(['projecttype'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($project ==null)
		{
			$project = new \App\ResumeProjects;
		}
		$project->user_id =Auth::user()->id;
		$project->resume_id =$resumeid;
		$project->start_date = date("Y-m-d",strtotime($request->input('start_date')));
		$project->end_date = date("Y-m-d",strtotime($request->input('end_date')));
		$project->position =$request->input('position');
		$project->title =$request->input('title');
		$project->project_type_id =$request->input('project_type_id');
		$project->company_id =$request->input('CompanyId');
		$project->details = $request->input('details');
		$project->active = 1;
		$project->current_working = $request->input('current_work');
		$project->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-projects/'.$resumeid);
		//return view('seeker::resume-academics', compact('countries','states', 'cities','degrees'))->with('obj',$obj)->with('sections', $sections)->with('academic', $academic)->with('id',$id)->with('resumeid',$resumeid);
	}
//Certificates

		public function deleteCertification(Request $request,$country,$resumeid,$id)
	{
		$certificate = \App\ResumeCertifications::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $certificate->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/manage/resume-certifications/'.$resumeid);
	}
	public function updateCertification(Request $request,$country, $resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$certificate = \App\ResumeCertifications::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
				$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		if($certificate ==null)
		{
			$certificate = new \App\ResumeCertifications;
		}

		return view('seeker::update-certificate',compact('countries','states','cities'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('certificate', $certificate)->with('id',$id)->with('resumeid',$resumeid);
	}
	public function ResumeCertifications(Request $request,$country,$resumeid)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		
		$sections = \App\ResumeSections::where('active', 1)->get();
		$certificate = \App\ResumeCertifications::with(['country','city'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
		return view('seeker::resume-certifications')->with('country',$country)->with('sections', $sections)->with('certifications', $certificate)->with('obj',$obj)->with('resumeid',$resumeid);
	}
	public function saveCertification(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$certificate = \App\ResumeCertifications::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($certificate ==null)
		{
			$certificate = new \App\ResumeCertifications;
		}
		$certificate->user_id =Auth::user()->id;
		$certificate->resume_id =$resumeid;
		$certificate->completion_date = date("Y-m-d",strtotime($request->input('completion_date')));
		
		$certificate->name =$request->input('name');
		$certificate->completion_date =date("Y-m-d",strtotime($request->input('completion_date')));
		$certificate->score =$request->input('score');
		$certificate->institution =$request->input('institution');
		$certificate->country_id =$request->input('CountryID');
		$certificate->state_id =$request->input('StateID');
		$certificate->city_id =$request->input('CityID');		
		$certificate->details = $request->input('details');
		$certificate->active = 1;
		
		$certificate->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-certifications/'.$resumeid);
		//return view('seeker::resume-academics', compact('countries','states', 'cities','degrees'))->with('obj',$obj)->with('sections', $sections)->with('academic', $academic)->with('id',$id)->with('resumeid',$resumeid);
	}


	//Awards

	public function deleteAward(Request $request,$country,$resumeid,$id)
	{
		$award = \App\ResumeAwards::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $award->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/manage/resume-awards/'.$resumeid);
	}
	public function updateAward(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$award = \App\ResumeAwards::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		$portfolio_award_types = \App\PortfolioAwardsType::all()->lists('name', 'id');
		if($award ==null)
		{
			$award = new \App\ResumeAwards;
		}

		return view('seeker::update-award',compact('portfolio_award_types'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('award', $award)->with('id',$id)->with('resumeid',$resumeid);
	}
	public function ResumeAwards(Request $request,$country,$resumeid)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		
		$sections = \App\ResumeSections::where('active', 1)->get();
		$award = \App\ResumeAwards::with(['portfolio_award_types'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
		return view('seeker::resume-awards')->with('country',$country)->with('sections', $sections)->with('awards', $award)->with('obj',$obj)->with('resumeid',$resumeid);
	}
	public function saveAward(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$award = \App\ResumeAwards::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($award ==null)
		{
			$award = new \App\ResumeAwards;
		}
		$award->user_id =Auth::user()->id;
		$award->resume_id =$resumeid;
		$award->award_date = date("Y-m-d",strtotime($request->input('award_date')));
		$award->title =$request->input('title');
		$award->project_award_id =$request->input('project_award_id');
		$award->details = $request->input('details');
		$award->active = 1;
		
		$award->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-awards/'.$resumeid);
		//return view('seeker::resume-academics', compact('countries','states', 'cities','degrees'))->with('obj',$obj)->with('sections', $sections)->with('award', $award)->with('id',$id)->with('resumeid',$resumeid);
	}




	//Portfolios

	public function deletePortfolio(Request $request,$country,$resumeid,$id)
	{
		$portfolio = \App\ResumePortfolios::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $portfolio->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/manage/resume-portfolios/'.$resumeid);
	}
	public function updatePortfolio(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$portfolio = \App\ResumePortfolios::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		$portfolio_award_types = \App\PortfolioAwardsType::all()->lists('name', 'id');
		if($portfolio ==null)
		{
			$portfolio = new \App\ResumePortfolios;
		}

		return view('seeker::update-portfolio',compact('portfolio_award_types'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('portfolio', $portfolio)->with('id',$id)->with('resumeid',$resumeid);
	}
	public function ResumePortfolios(Request $request,$country,$resumeid)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		
		$sections = \App\ResumeSections::where('active', 1)->get();
		$portfolio = \App\ResumePortfolios::with(['portfolio_award_types'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
		return view('seeker::resume-portfolios')->with('country',$country)->with('sections', $sections)->with('portfolios', $portfolio)->with('obj',$obj)->with('resumeid',$resumeid);
	}
	public function savePortfolio(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$portfolio = \App\ResumePortfolios::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($portfolio ==null)
		{
			$portfolio = new \App\ResumePortfolios;
		}
		$portfolio->user_id =Auth::user()->id;
		$portfolio->resume_id =$resumeid;
		$portfolio->portfolio_date = date("Y-m-d",strtotime($request->input('portfolio_date')));
		$portfolio->website =$request->input('website');	
		$portfolio->title =$request->input('title');
		$portfolio->project_award_id =$request->input('project_award_id');
		$portfolio->details = $request->input('details');
		$portfolio->active = 1;
		
		$portfolio->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-portfolios/'.$resumeid);
		//return view('seeker::resume-academics', compact('countries','states', 'cities','degrees'))->with('obj',$obj)->with('sections', $sections)->with('portfolio', $portfolio)->with('id',$id)->with('resumeid',$resumeid);
	}	

	//affiliation

	public function deleteAffiliation(Request $request,$country,$resumeid,$id)
	{
		$affiliation = \App\ResumeAffiliations::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $affiliation->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/manage/resume-affiliations/'.$resumeid);
	}
	public function updateAffiliation(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$affiliation = \App\ResumeAffiliations::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($affiliation ==null)
		{
			$affiliation = new \App\ResumeAffiliations;
		}

		return view('seeker::update-affiliation', compact('countries','states', 'cities'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('affiliation', $affiliation)->with('id',$id)->with('resumeid',$resumeid);
	}
	public function resumeAffiliations(Request $request,$country,$resumeid)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		
		$sections = \App\ResumeSections::where('active', 1)->get();
		$affiliation = \App\ResumeAffiliations::with(['country','city'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
	//	var_dump($affiliation[0]->city);
		return view('seeker::resume-affiliations')->with('country',$country)->with('sections', $sections)->with('affiliation', $affiliation)->with('obj',$obj)->with('resumeid',$resumeid);
	}
	public function saveAffiliation(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();
		$cities = array();
		$degrees = \App\DegreeLevels::where('active', 1)->lists('name','id');
		$affiliation = \App\ResumeAffiliations::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($affiliation ==null)
		{
			$affiliation = new \App\ResumeAffiliations;
		}
		$affiliation->user_id =Auth::user()->id;
		$affiliation->resume_id =$resumeid;
		$affiliation->start_date = date("Y-m-d",strtotime($request->input('start_date')));
		$affiliation->end_date = date("Y-m-d",strtotime($request->input('end_date')));
		$affiliation->organization =$request->input('org');
		$affiliation->position =$request->input('position');
		$affiliation->country_id =$request->input('CountryID');
		$affiliation->state_id =$request->input('StateID');
		$affiliation->city_id =$request->input('CityID');
		$affiliation->active = 1;
		
		$affiliation->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-affiliations/'.$resumeid);
		//return view('seeker::resume-academics', compact('countries','states', 'cities','degrees'))->with('obj',$obj)->with('sections', $sections)->with('academic', $academic)->with('id',$id)->with('resumeid',$resumeid);
	}	
public function delete($country,$resumeid)
	{
		$r = \App\Resume::find($resumeid);
		$res = $r->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/my-resumes');
	}

	//publication

	public function deletePublication(Request $request,$country,$resumeid,$id)
	{
		$publication = \App\ResumePublications::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $publication->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/manage/resume-publications/'.$resumeid);
	}
	public function updatePublication(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$publicationtypes = \App\PublicationType::where('active', 1)->lists('name', 'id');
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$publication = \App\ResumePublications::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($publication ==null)
		{
			$publication = new \App\ResumePublications;
		}

		return view('seeker::update-publication', compact('publicationtypes','countries','states', 'cities'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('publication', $publication)->with('id',$id)->with('resumeid',$resumeid);
	}
	public function resumePublications(Request $request,$country,$resumeid)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		
		$sections = \App\ResumeSections::where('active', 1)->get();
		$publication = \App\ResumePublications::with(['country','city'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
		return view('seeker::resume-publications')->with('country',$country)->with('sections', $sections)->with('publication', $publication)->with('obj',$obj)->with('resumeid',$resumeid);
	}
	public function savePublication(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();
		$cities = array();
		$degrees = \App\DegreeLevels::where('active', 1)->lists('name','id');
		$publication = \App\ResumePublications::with(['publicationtype'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($publication ==null)
		{
			$publication = new \App\ResumePublications;
		}
		$publication->user_id =Auth::user()->id;
		$publication->resume_id =$resumeid;
		$publication->publication_type_id =$request->input('publication_type');
		$publication->title =$request->input('title');
		$publication->author =$request->input('author');
		$publication->publisher =$request->input('publisher');
		$publication->publication_date = date("Y-m-d",strtotime($request->input('publication_date')));
		$publication->country_id =$request->input('CountryID');
		$publication->state_id =$request->input('StateID');
		$publication->city_id =$request->input('CityID');
		$publication->details = $request->input('details');
		$publication->active = 1;
		$publication->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-publications/'.$resumeid);
		//return view('seeker::resume-academics', compact('countries','states', 'cities','degrees'))->with('obj',$obj)->with('sections', $sections)->with('academic', $academic)->with('id',$id)->with('resumeid',$resumeid);
	}	

	//reference

	public function deleteReference(Request $request,$country,$resumeid,$id)
	{
		$reference = \App\ResumeReferences::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $reference->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/manage/resume-references/'.$resumeid);
	}
	public function updateReference(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();//States::all()->lists('Name', 'id');
		$cities = array();//Cities::all()->lists('Name', 'id');
		$referencetypes = \App\ReferenceType::where('active', 1)->lists('name', 'id');
		$reference = \App\ResumeReferences::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($reference ==null)
		{
			$reference = new \App\ResumeReferences;
		}

		return view('seeker::update-reference', compact('referencetypes','countries','states', 'cities'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('reference', $reference)->with('id',$id)->with('resumeid',$resumeid);
	}
	public function resumeReferences(Request $request,$country,$resumeid)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		
		$sections = \App\ResumeSections::where('active', 1)->get();
		$reference = \App\ResumeReferences::with(['country','city'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
		return view('seeker::resume-references')->with('country',$country)->with('sections', $sections)->with('reference', $reference)->with('obj',$obj)->with('resumeid',$resumeid);
	}
	public function saveReference(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();
		$cities = array();
		$degrees = \App\DegreeLevels::where('active', 1)->lists('name','id');
		$reference = \App\ResumeReferences::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($reference ==null)
		{
			$reference = new \App\ResumeReferences;
		}
		$reference->user_id =Auth::user()->id;
		$reference->resume_id =$resumeid;
		$reference->name =$request->input('name');
		$reference->organization =$request->input('org');
		$reference->job_title =$request->input('job_title');
		$reference->email =$request->input('email');
		$reference->phone =$request->input('phone');
		$reference->country_id =$request->input('CountryID');
		$reference->reference_type_id =$request->input('reference_type');
		$reference->state_id =$request->input('StateID');
		$reference->city_id =$request->input('CityID');
		
		$reference->active = 1;
		
		$reference->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-references/'.$resumeid);
		//return view('seeker::resume-academics', compact('countries','states', 'cities','degrees'))->with('obj',$obj)->with('sections', $sections)->with('academic', $academic)->with('id',$id)->with('resumeid',$resumeid);
	}	


		//skill

	public function deleteSkill(Request $request,$country,$resumeid,$id)
	{
		$skill = \App\ResumeSkills::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $skill->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/manage/resume-skills/'.$resumeid);
	}
	public function updateSkill(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$skilllevels = \App\SkillLevels::where('active',1)->lists('name', 'id');
	
		$skill = \App\ResumeSkills::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($skill ==null)
		{
			$skill = new \App\ResumeSkills;
		}

		return view('seeker::update-skill', compact('skilllevels'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('skill', $skill)->with('id',$id)->with('resumeid',$resumeid);
	}
	public function resumeSkills(Request $request,$country,$resumeid)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		
		$sections = \App\ResumeSections::where('active', 1)->get();
		$skill = \App\ResumeSkills::with(['skilllevel'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
		return view('seeker::resume-skills')->with('country',$country)->with('sections', $sections)->with('skill', $skill)->with('obj',$obj)->with('resumeid',$resumeid);
	}
	public function saveSkill(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();
		$cities = array();
		$degrees = \App\DegreeLevels::where('active', 1)->lists('name','id');
		$skill = \App\ResumeSkills::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($skill ==null)
		{
			$skill = new \App\ResumeSkills;
		}
		$skill->user_id =Auth::user()->id;
		$skill->resume_id =$resumeid;
		$skill->name =$request->input('name');
		$skill->skill_level_id =$request->input('skill_level');
		$skill->active = 1;
		$skill->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-skills/'.$resumeid);
	}

		//language

	public function deleteLanguage(Request $request,$country,$resumeid,$id)
	{
		$language = \App\ResumeLanguages::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id);
		$res = $language->delete();
		if($res< 1)
			Session::flash('flash_message', 'Something goes wrong, try again!');
		else
			Session::flash('flash_message', 'Successfully Deleted!');
           	return Redirect::to($country . '/seekers/manage/resume-languages/'.$resumeid);
	}
	public function updateLanguage(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$proficiencylevels= \App\ProficiencyLevels::where('active',1)->lists('name', 'id');
		$languages= \App\Languages::where('active',1)->lists('name', 'id');
		$language = \App\ResumeLanguages::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($language ==null)
		{
			$language = new \App\ResumeLanguages;
		}

		return view('seeker::update-language', compact('languages','proficiencylevels'))->with('country',$country)->with('obj',$obj)->with('sections', $sections)->with('language', $language)->with('id',$id)->with('resumeid',$resumeid);
	}
	public function resumeLanguages(Request $request,$country,$resumeid)
	{
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		
		$sections = \App\ResumeSections::where('active', 1)->get();
		$language = \App\ResumeLanguages::with(['language','proficiencylevel'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->get();
		return view('seeker::resume-languages')->with('country',$country)->with('sections', $sections)->with('language', $language)->with('obj',$obj)->with('resumeid',$resumeid);
	}
	public function saveLanguage(Request $request,$country,$resumeid,$id)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$countries = \App\Countries::all()->lists('Name', 'id');
		$states = array();
		$cities = array();
		$degrees = \App\DegreeLevels::where('active', 1)->lists('name','id');
		$language = \App\ResumeLanguages::where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->where('id', $id)->first();
		if($language ==null)
		{
			$language = new \App\ResumeLanguages;
		}
		$language->user_id =Auth::user()->id;
		$language->resume_id =$resumeid;
		$language->language_id =$request->input('language');
		$language->proficiency_level_id =$request->input('proficiency_level');
		$language->active = 1;
		$language->save();

		Session::flash('flash_message', 'Successfully updated!');
           	return Redirect::to($country . '/seekers/manage/resume-languages/'.$resumeid);
	}

	public function resumeView($country, $resumeid)
	{
		$user = \App\SiteUsers::find(Auth::user()->id);
		$obj = \App\Resume::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
		$sections = \App\ResumeSections::where('active', 1)->get();
		$profile = \App\ResumeSeekerProfile::with(['awards'=>function($query){$query->orderBy('award_date');},'affilitions','publications','references','education','experiance','projects','languages','skills'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->first();
		
		if(!isset($profile) || $profile->address=='')
		{
			Session::flash('flash_message', 'Please complete your resume.');
			return Redirect::to('seekers/manage/update-personal-information/' . $resumeid);
		}
	
		return view('seeker::view-resume')->with('country',$country)->with('sections',$sections)->with('obj',$obj)->with('profile',$profile);
	}

	public function resumePrint($country, $resumeid)
	{
		$profile = \App\ResumeSeekerProfile::with(['maritalstatus','awards','affilitions','publications','references','education','experiance','projects','languages','skills'])->where('user_id', Auth::user()->id)->where('resume_id', $resumeid)->first();
		$v= view('seeker::print-resume')->with('country',$country)->with('profile',$profile);
		$pdf = PDF::loadHTML($v)->setPaper('a4', 'portrait')->setWarnings(false);
		return $pdf->download(str_replace(' ', '_', $profile->first_name).'_'.str_replace(' ','_', $profile->last_name).'.pdf');
	}

	public function resumePrintEmployer($country, $resumeid)
	{
		$profile = \App\ResumeSeekerProfile::with(['maritalstatus','awards','affilitions','publications','references','education','experiance','projects','languages','skills'])->where('resume_id', $resumeid)->first();
		$v= view('seeker::print-resume')->with('country',$country)->with('profile',$profile);
		$pdf = PDF::loadHTML($v)->setPaper('a4', 'portrait')->setWarnings(false);
		return $pdf->download(str_replace(' ', '_', $profile->first_name).'_'.str_replace(' ','_', $profile->last_name).'.pdf');
	}
}