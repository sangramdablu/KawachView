<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationRequest;
use App\Jobs\SendConsultationAdminMailJob;
use App\Jobs\SendConsultationClientMailJob;


class ConsultationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|min:2|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|max:20',
            'role' => 'nullable|max:100',
            'requirements' => 'nullable|array',
            'goals' => 'nullable|max:3000',
        ]);

        $consultation = ConsultationRequest::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'role' => $validated['role'] ?? null,
            'requirements' => isset($validated['requirements'])
                ? implode(', ', $validated['requirements'])
                : null,
            'goals' => $validated['goals'] ?? null,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        SendConsultationAdminMailJob::dispatch($consultation);
        SendConsultationClientMailJob::dispatch($consultation);

        return response()->json([
            'success'=>true,
            'message'=>'Consultation booked successfully.'
        ]);
    }
}
