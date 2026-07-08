<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Consultation Request</title>
</head>
<body style="font-family: Arial, sans-serif; color:#333; line-height:1.7;">

    <h2>📅 New Consultation Request Received</h2>

    <p>
        <strong>{{ $consultation->full_name }}</strong>
        has booked a free consultation.
    </p>

    <hr>

    <h3>Customer Details</h3>

    <table cellpadding="6">
        <tr>
            <td><strong>Full Name:</strong></td>
            <td>{{ $consultation->full_name }}</td>
        </tr>

        <tr>
            <td><strong>Email:</strong></td>
            <td>
                <a href="mailto:{{ $consultation->email }}">
                    {{ $consultation->email }}
                </a>
            </td>
        </tr>

        <tr>
            <td><strong>Phone:</strong></td>
            <td>{{ $consultation->phone ?: '—' }}</td>
        </tr>

        <tr>
            <td><strong>Role:</strong></td>
            <td>{{ $consultation->role ?: '—' }}</td>
        </tr>
    </table>

    <hr>

    <h3>Requirements</h3>

    @if($consultation->requirements)
        <ul>
            @foreach(explode(', ', $consultation->requirements) as $item)
                <li>{{ trim($item) }}</li>
            @endforeach
        </ul>
    @else
        <p>No requirements selected.</p>
    @endif

    <hr>

    <h3>Goals</h3>

    <p>
        {{ $consultation->goals ?: 'No goals provided.' }}
    </p>

    <hr>

    <h3>Meta Information</h3>

    <table cellpadding="6">
        <tr>
            <td><strong>Consultation ID:</strong></td>
            <td>#{{ $consultation->id }}</td>
        </tr>

        <tr>
            <td><strong>Submitted:</strong></td>
            <td>{{ $consultation->created_at }}</td>
        </tr>

        <tr>
            <td><strong>IP Address:</strong></td>
            <td>{{ $consultation->ip_address }}</td>
        </tr>
    </table>

    <hr>

    <p>
        <a href="{{ config('app.url') }}/admin/consultations/{{ $consultation->id }}">
            View in Admin Panel
        </a>
    </p>

    <p>
        <a href="mailto:{{ $consultation->email }}?subject=Re:%20Your%20Consultation%20Request">
            Reply to Client
        </a>
    </p>

    <br>

    <p>
        Regards,<br>
        <strong>{{ config('app.name') }}</strong>
    </p>

</body>
</html>