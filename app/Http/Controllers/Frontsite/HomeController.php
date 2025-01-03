<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\MembershipRequest;
use App\Http\Requests\ServiceRequest;
use App\Mail\MembershipEmail;
use App\Mail\ServiceEmail;
use App\Models\Membership;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.frontsite.home.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sendEmail(Request $request)
    {
        $type = $request->input('type');

        if ($type === 'membership') {
            // Memvalidasi menggunakan MembershipRequest
            $this->validateRecaptcha($request);

            // Mengambil data yang sudah tervalidasi
            $data = app(MembershipRequest::class)->validated();

            // Upload CV
            $cv_path = 'assets/file-membership';
            if (!Storage::disk('public')->exists($cv_path)) {
                Storage::disk('public')->makeDirectory($cv_path);
            }

            if (isset($data['cv'])) {
                $data['cv'] = $request->file('cv')->store($cv_path, 'public');
            } else {
                $data['cv'] = "";
            }

            // Simpan data membership
            Membership::create($data);

            // Kirim email
            Mail::to('info@iesta.org')->send(new MembershipEmail($data));

            alert()->success('Success Message', 'Thank you for registering! Your email has been successfully sent.');
            return back();
        } else if ($type === 'service') {
            // Memvalidasi menggunakan ServiceRequest
            $this->validateRecaptcha($request);

            // Mengambil data yang sudah tervalidasi
            $data = app(ServiceRequest::class)->validated();

            // Kirim email
            Mail::to('info@iesta.org')->send(new ServiceEmail($data));

            alert()->success('Success Message', 'Thank you for your message! Your email has been successfully sent.');
            return back();
        }
    }

    private function validateRecaptcha($request)
    {
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('NOCAPTCHA_SECRET'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ],
        ]);

        $body = json_decode((string) $response->getBody());

        if (!$body->success || $body->score < 0.5) {
            return back()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed, please try again.']);
        }
    }
}
