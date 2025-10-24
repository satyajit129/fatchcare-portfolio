<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Faq;
use App\Models\Featured;
use App\Models\Setting;
use App\Models\Silder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AdminController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('landing', compact('faqs'));
    }
    public function tc()
    {
        return view('tc');
    }
    public function privacy()
    {
        return view('privacy');
    }
    // Login Functions
    public function adminLogin()
    {
        return view('backend.pages.login');
    }
    public function adminLoginRequest(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            // Find user by email
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                $request->session()->put('admin_id', $user->id);
                $request->session()->put('admin_name', $user->name);

                return redirect()->route('adminDashboard')->with('success', 'Login successful!');
            }

            return back()
                ->withErrors(['email' => 'Invalid credentials provided.'])
                ->onlyInput('email')
                ->with('error', 'Invalid credentials provided.');
        } catch (Throwable $e) {
            return back()
                ->withErrors(['email' => 'Something went wrong. Please try again later.'])
                ->onlyInput('email')
                ->with('error', $e->getMessage());
        }
    }
    // Login Functions End



    public function adminDashboard()
    {
        return view('backend.pages.dashboard');
    }
    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('adminLogin');
    }
    public function adminSettings()
    {
        $setting = Setting::first();
        return view('backend.pages.settings', compact('setting'));
    }
    public function storeWebsiteSettings(Request $request)
    {
        try {
            $setting = Setting::first();
            $setting->website_name = $request->website_name;
            $setting->website_email = $request->website_email;
            $setting->website_contact = $request->website_contact;
            $setting->website_copy_right_text = $request->website_copy_right_text;
            $setting->website_address = $request->website_address;
            $setting->hero_text_one = $request->hero_text_one;
            $setting->hero_text_two = $request->hero_text_two;

            $website_logo = $request->website_logo;
            $website_favicon = $request->website_favicon;

            if (isset($request->website_logo)) {
                $imageName = time() . '_website_logo.png';
                if ($website_logo->move('images/website', $imageName)) {
                    $setting->website_logo = $imageName;
                }
            }
            if (isset($request->website_favicon)) {
                $imageName = time() . '_website_favicon.png';
                if ($website_favicon->move('images/website', $imageName)) {
                    $setting->website_favicon = $imageName;
                }
            }
            $setting->save();
            return redirect()->back()->with('success', 'Updated Successfully!');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    // FAQ Management Functions
    public function adminFAQ()
    {
        $faqs = Faq::all();
        return view('backend.pages.faq', compact('faqs'));
    }
    public function adminFAQCreateOrEdit($id = null)
    {
        $faq = $id ? Faq::find($id) : null;
        return view('backend.pages.faq_create_or_edit', compact('faq'));
    }

    // Save FAQ
    public function adminFAQSave(Request $request, $id = null)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq = $id ? Faq::find($id) : new Faq();

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->route('adminFAQ')->with('success', 'FAQ saved successfully.');
    }

    // Delete FAQ
    public function adminFAQDelete($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('adminFAQ')->with('success', 'FAQ deleted successfully.');
    }
    // FAQ Management Functions End



    public function contactSubmit(Request $request)
    {
        try {
            $request->validate([
                'full_name'   => 'required|string',
                'clinic_name' => 'required|string',
                'email'       => 'required|email',
                'message'     => 'required|string',
            ]);

            Contact::create($request->only(['full_name', 'clinic_name', 'email', 'message']));

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your request has been submitted.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }



    // contact form function for admin
    public function adminContacts()
    {
        $contacts = Contact::latest()->get(); // Fetch all submissions
        return view('backend.pages.contacts', compact('contacts'));
    }
    public function adminContactDelete($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('adminContacts')->with('success', 'Contact deleted successfully!');
    }
    // contact form function for admin end


    // Silder Management Functions
    public function adminSilder()
    {
        $silders = Silder::all();
        return view('backend.pages.silder', compact('silders'));
    }
    public function adminSilderCreateOrEdit($id = null)
    {
        $silder = $id ? Silder::find($id) : null;
        return view('backend.pages.silder_create_or_edit', compact('silder'));
    }
    public function adminSilderSave(Request $request, $id = null)
    {
        try {
            $request->validate([
                'image' => $id ? 'nullable|image|mimes:jpg,png,jpeg,webp' : 'required|image|mimes:jpg,png,jpeg,webp',
            ]);

            $silder = $id ? Silder::findOrFail($id) : new Silder();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_silder.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/website'), $imageName);

                // Delete old image if exists
                if ($id && $silder->image && file_exists(public_path('images/website/' . $silder->image))) {
                    unlink(public_path('images/website/' . $silder->image));
                }

                $silder->image = $imageName;
            }

            $silder->save();

            return redirect()->route('adminSilder')->with('success', 'Silder saved successfully.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function adminSilderDelete($id)
    {
        $silder = Silder::findOrFail($id);
        $silder->delete();
        // unlink image file if exists
        $imagePath = public_path('images/website/' . $silder->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        return redirect()->route('adminSilder')->with('success', 'Silder deleted successfully.');
    }

    // Silder Management Functions End


    // Featured Management Functions
    public function adminFeatured()
    {
        $featureds = Featured::all();
        return view('backend.pages.featured', compact('featureds'));
    }
    public function adminFeaturedCreateOrEdit($id = null)
    {
        $featured = $id ? Featured::find($id) : null;
        return view('backend.pages.featured_create_or_edit', compact('featured'));
    }
    public function adminFeaturedSave(Request $request, $id = null)
    {
        // dd($request->all());
        try {
            $request->validate([
                'icon' => $id ? 'nullable|mimes:svg,png,jpg,jpeg,webp' : 'required|mimes:svg,png,jpg,jpeg,webp',
                'image' => $id ? 'nullable|image|mimes:jpg,png,jpeg,webp' : 'required|image|mimes:jpg,png,jpeg,webp',
                'title' => 'required|string',
                'description' => 'required|string',
            ]);

            $featured = $id ? Featured::findOrFail($id) : new Featured();
            if ($request->has('image')) {
               $image = $request->image;
               $imageName = time() . '_featured.' . $image->getClientOriginalExtension();
               $image->move(public_path('images/website'), $imageName);
               $featured->image = $imageName;
            }
            if ($request->has('icon')) {
                $icon = $request->icon;
                $iconName = time() . '_featured_icon.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('images/website'), $iconName);
                $featured->icon = $iconName;
            }
            $featured->title = $request->title;
            $featured->description = $request->description;

            $featured->save();

            return redirect()->route('adminFeatured')->with('success', 'Featured saved successfully.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
