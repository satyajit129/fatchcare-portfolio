<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Faq;
use App\Models\Setting;
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
        // Load settings from DB (example: from a settings table)
        $setting = Setting::first();
        return view('backend.pages.settings', compact('setting'));
    }

    public function adminFAQ()
    {
        $faqs = Faq::all();
        return view('backend.pages.faq', compact('faqs'));
    }
    // Show create/edit form
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
    public function contactSubmit(Request $request)
    {
        try {
            $request->validate([
                'full_name'   => 'required|string|max:255',
                'clinic_name' => 'required|string|max:255',
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
}
