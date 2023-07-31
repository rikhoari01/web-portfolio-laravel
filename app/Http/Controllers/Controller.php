<?php

namespace App\Http\Controllers;

use App\Models\Works;
use App\Models\Content;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $greeting = Content::where('title', 'greeting')->first();
        $name = Content::where('title', 'name')->first();
        $jobdesc = Content::where('title', 'jobdesc')->first();
        $linkedin = Content::where('title', 'linkedin')->first();
        $github = Content::where('title', 'github')->first();
        $youtube = Content::where('title', 'youtube')->first();
        $selfdesc = Content::where('title', 'selfdesc')->first();
        $wa_number = Content::where('title', 'wa_number')->first();
        $telegram = Content::where('title', 'telegram')->first();
        $messenger = Content::where('title', 'messenger')->first();
        $facebook = Content::where('title', 'facebook')->first();
        $instagram = Content::where('title', 'instagram')->first();
        $twitter = Content::where('title', 'twitter')->first();
        $cv = Content::where('title', 'cv')->first();
        $photo = Content::where('title', 'photo')->first();
        $about_img = Content::where('title', 'about_img')->first();
        $frontend = Skills::where('skill_category', 'Frontend')->get();
        $backend = Skills::where('skill_category', 'Backend')->get();
        $tools = Skills::where('skill_category', 'Tools')->get();
        $others = Skills::where('skill_category', 'Other')->get();
        $works = Works::all();
        $worksCount = Works::count();

        return view('index', [
            'greeting' => $greeting,
            'name' => $name,
            'jobdesc' => $jobdesc,
            'linkedin' => $linkedin,
            'github' => $github,
            'youtube' => $youtube,
            'selfdesc' => $selfdesc,
            'wa_number' => $wa_number,
            'telegram' => $telegram,
            'messenger' => $messenger,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'cv' => $cv,
            'photo' => $photo,
            'about_img' => $about_img,
            'frontend' => $frontend,
            'backend' => $backend,
            'tools' => $tools,
            'others' => $others,
            'works' => $works,
            'worksCount' => $worksCount,
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function edit()
    {
        $greeting = Content::where('title', 'greeting')->first();
        $name = Content::where('title', 'name')->first();
        $jobdesc = Content::where('title', 'jobdesc')->first();
        $linkedin = Content::where('title', 'linkedin')->first();
        $github = Content::where('title', 'github')->first();
        $youtube = Content::where('title', 'youtube')->first();
        $selfdesc = Content::where('title', 'selfdesc')->first();
        $wa_number = Content::where('title', 'wa_number')->first();
        $telegram = Content::where('title', 'telegram')->first();
        $messenger = Content::where('title', 'messenger')->first();
        $facebook = Content::where('title', 'facebook')->first();
        $instagram = Content::where('title', 'instagram')->first();
        $twitter = Content::where('title', 'twitter')->first();
        $cv = Content::where('title', 'cv')->first();
        $photo = Content::where('title', 'photo')->first();
        $about_img = Content::where('title', 'about_img')->first();
        $skills = Skills::all();
        $works = Works::all();

        return view('edit', [
            'greeting' => $greeting,
            'name' => $name,
            'jobdesc' => $jobdesc,
            'linkedin' => $linkedin,
            'github' => $github,
            'youtube' => $youtube,
            'selfdesc' => $selfdesc,
            'wa_number' => $wa_number,
            'telegram' => $telegram,
            'messenger' => $messenger,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'cv' => $cv,
            'photo' => $photo,
            'about_img' => $about_img,
            'skills' => $skills,
            'works' => $works,
        ]);
    }

    public function signin(Request $request): RedirectResponse
    {
        $validateUser = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($validateUser)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/edit');
        }

        return back()->with('loginErr', 'Your Email or Password is Wrong!');
    }

    public function signout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function updateUser(Request $request, User $user)
    {
        $validateUser = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $editUser = [
            'email' => $validateUser['email'],
            'password' => Hash::make($validateUser['password']),
        ];

        $user::where('id', Auth::user()->id)->update($editUser);
        Alert::success('Success', 'Login data has been successfully changed');

        return redirect('/edit');
    }

    public function updateHome(Request $request, Content $content)
    {
        $content::where('id', 1)->update(['content' => $request->greeting]);
        $content::where('id', 2)->update(['content' => $request->name]);
        $content::where('id', 3)->update(['content' => $request->jobdesc]);
        $content::where('id', 4)->update(['content' => $request->linkedin]);
        $content::where('id', 5)->update(['content' => $request->github]);
        $content::where('id', 6)->update(['content' => $request->youtube]);

        Alert::success('Success', 'Data has been successfully changed');

        return redirect('/edit');
    }

    public function updateAbout(Request $request, Content $content)
    {
        $content::where('id', 7)->update(['content' => $request->selfdesc]);

        Alert::success('Success', 'Data has been successfully changed');

        return redirect('/edit');
    }

    public function updateContact(Request $request, Content $content)
    {
        $content::where('id', 8)->update(['content' => $request->wa_number]);
        $content::where('id', 9)->update(['content' => $request->telegram]);
        $content::where('id', 10)->update(['content' => $request->messenger]);

        Alert::success('Success', 'Data has been successfully changed');

        return redirect('/edit');
    }

    public function updateFooter(Request $request, Content $content)
    {
        $content::where('id', 11)->update(['content' => $request->facebook]);
        $content::where('id', 12)->update(['content' => $request->instagram]);
        $content::where('id', 13)->update(['content' => $request->twitter]);

        Alert::success('Success', 'Data has been successfully changed');

        return redirect('/edit');
    }

    public function homeFile(Request $request, Content $file)
    {
        if ($request->cv) {
            // if ($request->old_cv) {
            //     Storage::delete($request->old_cv);
            // }
            $file::where('id', 14)->update(['content' => $request->url_cv]);
        }
        if ($request->photo) {
            // if ($request->old_photo) {
            //     Storage::delete($request->old_photo);
            // }
            $file::where('id', 15)->update(['content' => $request->url_photo]);
        }

        Alert::success('Success', 'Data has been successfully changed');

        return redirect('/edit');
    }

    public function aboutFile(Request $request, Content $file)
    {
        if ($request->about_img) {
            // if ($request->old_about_img) {
            //     Storage::delete($request->old_about_img);
            // }
            $file::where('id', 16)->update(['content' => $request->url_about_img]);
        }
        Alert::success('Success', 'Data has been successfully changed');

        return redirect('/edit');
    }

    public function addSkills(Request $request, Skills $skills)
    {
        $newSkill = [
            'skill_name' => $request->skill_name,
            'skill_level' => $request->skill_level,
            'skill_category' => $request->skill_category,
        ];

        $skills::create($newSkill);
        Alert::success('Success', 'New skill added successfully');

        return redirect('/edit');
    }

    public function updateSkills(Request $request, Skills $skills)
    {
        $editSkill = [
            'skill_name' => $request->skill_name,
            'skill_level' => $request->skill_level,
            'skill_category' => $request->skill_category,
        ];

        $skills::where('id', $request->id)->update($editSkill);
        Alert::success('Success', 'Skill data successfully changed');

        return redirect('/edit');
    }

    public function destroySkills(Request $request, Skills $skills)
    {
        $skills::destroy($request->id);
        Alert::success('Success', 'Skill data deleted successfully');

        return redirect('/edit');
    }

    public function indexSkills(Skills $skills, $id)
    {
        $findSkills = $skills::find($id);

        return response()->json([
            'data' => $findSkills
        ]);
    }

    public function addWorks(Request $request, Works $works)
    {
        if ($request->work_img) {
            // $image = $request->file('work_img')->store('Image/Works');

            $newWork = [
                'work_title' => $request->work_title,
                'work_tech' => $request->work_tech,
                'work_desc' => $request->work_desc,
                'work_link' => $request->work_link,
                'work_category' => $request->work_category,
                'work_img' => $request->url_work_img,
            ];

            $works::create($newWork);
            Alert::success('Success', 'New work added successfully');

            return redirect('/edit');
        }

        Alert::warning('Warning', 'Please insert an image!');

        return redirect('/edit');
    }

    public function updateWorks(Request $request, Works $works)
    {
        $editWork = [
            'work_title' => $request->work_title,
            'work_tech' => $request->work_tech,
            'work_desc' => $request->work_desc,
            'work_link' => $request->work_link,
            'work_category' => $request->work_category,
            'work_img' => $request->url_work_img,
        ];

        // if ($request->work_img) {
        //     if ($request->old_work_img) {
        //         Storage::delete($request->old_work_img);
        //     }
        //     $editWork['work_img'] = $request->file('work_img')->store('Image/Works');
        // }

        $works::where('id', $request->id)->update($editWork);
        Alert::success('Success', 'Work data successfully changed');

        return redirect('/edit');
    }

    public function destroyWorks(Request $request, Works $works)
    {
        $works::destroy($request->id);
        // Storage::delete($request->work_img);
        Alert::success('Success', 'Work data deleted successfully');

        return redirect('/edit');
    }

    public function indexWorks(Works $works, $id)
    {
        $findWorks = $works::find($id);

        return response()->json([
            'data' => $findWorks
        ]);
    }
}
