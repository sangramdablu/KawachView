<?php

namespace App\Http\Controllers;

use App\Models\VisitorPageview;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class VisitorTrackController extends Controller
{
    /**
     * Dwell-time beacon — sent via navigator.sendBeacon() on visibility
     * change / page hide, and periodically while a tab stays open. Each
     * call reports the cumulative seconds spent on that pageview, so only
     * the delta since the last call is added to the visitor's running
     * total (repeated beacons for the same pageview must not double-count).
     */
    public function ping(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'pageview_id' => ['required', 'integer'],
            'seconds'     => ['required', 'integer', 'min:0', 'max:14400'],
        ]);

        $pageview = VisitorPageview::find($validated['pageview_id']);

        if ($pageview) {
            $previous = $pageview->time_spent_seconds ?? 0;
            $seconds = $validated['seconds'];

            if ($seconds > $previous) {
                $pageview->update(['time_spent_seconds' => $seconds]);
                $pageview->visitor()->increment('total_time_seconds', $seconds - $previous);
            }
        }

        return response()->json(['ok' => true]);
    }
}
