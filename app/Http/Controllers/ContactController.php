<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(private readonly ContactService $contactService)
    {
    }

    /**
     * Show the contact page.
     */
    public function index(): View
    {
        return view('pages.contact');
    }

    /**
     * Handle the contact form submission.
     *
     * The route should have both:
     *   - throttle:5,1    (5 requests per minute per IP — set in routes/web.php)
     *   - verified CSRF   (automatic via web middleware) 
     *
     * @return RedirectResponse|JsonResponse
     */
    public function store(StoreContactRequest $request): RedirectResponse|JsonResponse
    {
        $contact = $this->contactService->store($request->validated(), $request);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent. We\'ll be in touch within 24 hours.',
            ], 201);
        }

        return redirect()
            ->route('contact')
            ->with('success', 'Your message has been sent. We\'ll be in touch within 24 hours.');
    }
}