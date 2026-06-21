<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consultation Request Received</title>
</head>
<body style="font-family: Arial, sans-serif; color:#333; line-height:1.7;">

    <h2>Hello {{ $consultation->full_name }},</h2>

    <p>
        Thank you for booking a free consultation with
        <strong>{{ config('app.name') }}</strong>.
    </p>

    <p>
        We've received your request and our team will review your requirements.
        A member of our team will contact you shortly with available time slots.
    </p>
    <hr>
    <h3>Your Submission Summary</h3>

    <table cellpadding="6">

        @if($consultation->role)
        <tr>
            <td><strong>Your Role:</strong></td>
            <td>{{ $consultation->role }}</td>
        </tr>
        @endif

        <tr>
            <td><strong>Consultation ID:</strong></td>
            <td>#{{ $consultation->id }}</td>
        </tr>

    </table>

    <h3>Requirements</h3>

    @if($consultation->requirements)
        <ul>
            @foreach(explode(', ', $consultation->requirements) as $item)
                <li>{{ trim($item) }}</li>
            @endforeach
        </ul>
    @endif

    @if($consultation->goals)
        <h3>Your Goals</h3>
        <p>
            {{ $consultation->goals }}
        </p>
    @endif

    <hr>

    <h3>What Happens Next?</h3>

    <ol>
        <li>Our team reviews your requirements.</li>
        <li>We prepare recommendations.</li>
        <li>We contact you within a few hours.</li>
        <li>We schedule a free discovery call.</li>
    </ol>

    <hr>

    <p>
        Meanwhile, you can explore:
    </p>

    <ul>
        <li>
            <a href="{{ config('app.url') }}/services">
                Services
            </a>
        </li>

        <li>
            <a href="{{ config('app.url') }}/case-studies">
                Case Studies
            </a>
        </li>

        <li>
            <a href="{{ config('app.url') }}/blog">
                Blog
            </a>
        </li>

        <li>
            <a href="{{ config('app.url') }}/about">
                About Us
            </a>
        </li>
    </ul>

    <br>

    <p>
        Best regards,<br>
        <strong>{{ config('app.name') }}</strong><br>

        Email:
        <a href="mailto:{{ config('app.support_email') }}">
            {{ config('app.support_email') }}
        </a>
        <br>

        Phone: {{ config('app.mobile') }}
    </p>

</body>
</html>