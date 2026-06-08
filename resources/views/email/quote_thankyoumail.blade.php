<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting KawachTech</title>
</head>
<body style="margin: 0; padding: 0; background-color: #0B0F19; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; width: 100% !important;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #0B0F19; table-layout: fixed;">
        <tr>
            <td align="center" style="padding: 40px 16px;">
                
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #111827; border: 1px solid #1F2937; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);">
                    
                    <tr>
                        <td height="4" style="background: linear-gradient(90deg, #3B82F6 0%, #10B981 100%); line-height: 4px; font-size: 1px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="padding: 32px 40px 24px 40px; border-bottom: 1px solid #1F2937;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        <span style="font-size: 22px; font-weight: 800; color: #FFFFFF; letter-spacing: -0.5px;">
                                            KAWACH<span style="color: #3B82F6;">TECH</span>
                                        </span>
                                    </td>
                                    <td align="right">
                                        <table border="0" cellpadding="0" cellspacing="0" style="background-color: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); border-radius: 16px;">
                                            <tr>
                                                <td style="padding: 4px 12px; font-size: 11px; font-weight: 600; color: #10B981; text-transform: uppercase; letter-spacing: 0.5px;">
                                                    ● System Active
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px 40px 32px 40px;">
                            <h1 style="margin: 0 0 16px 0; font-size: 24px; font-weight: 700; color: #FFFFFF; letter-spacing: -0.5px;">
                                Hello {{ $quote->full_name }},
                            </h1>
                            <p style="margin: 0 0 24px 0; font-size: 15px; line-height: 24px; color: #9CA3AF;">
                                Thank you for reaching out to KawachTech. We have successfully captured your product requirements. Our software engineering team is currently assessing your parameters, and we will get back to you with a tactical breakdown within 24 hours.
                            </p>

                            <h2 style="margin: 32px 0 16px 0; font-size: 14px; font-weight: 600; color: #3B82F6; text-transform: uppercase; letter-spacing: 1px;">
                                Captured Requirements Matrix
                            </h2>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #171E2E; border: 1px solid #1F2937; border-radius: 8px;">
                                @if(!empty($quote->company))
                                <tr>
                                    <td width="35%" style="padding: 14px 16px; font-size: 13px; font-weight: 600; color: #6B7280; border-bottom: 1px solid #1F2937; text-transform: uppercase; letter-spacing: 0.5px;">Company</td>
                                    <td style="padding: 14px 16px; font-size: 14px; color: #E5E7EB; border-bottom: 1px solid #1F2937;">{{ $quote->company }}</td>
                                </tr>
                                @endif
                                
                                @if(!empty($quote->services))
                                <tr>
                                    <td width="35%" style="padding: 14px 16px; font-size: 13px; font-weight: 600; color: #6B7280; border-bottom: 1px solid #1F2937; text-transform: uppercase; letter-spacing: 0.5px;">Services Requested</td>
                                    <td style="padding: 14px 16px; font-size: 14px; color: #E5E7EB; border-bottom: 1px solid #1F2937; font-weight: 500;">
                                        <span style="color: #10B981;">{{ $quote->services }}</span>
                                    </td>
                                </tr>
                                @endif

                                @if(!empty($quote->budget))
                                <tr>
                                    <td width="35%" style="padding: 14px 16px; font-size: 13px; font-weight: 600; color: #6B7280; border-bottom: 1px solid #1F2937; text-transform: uppercase; letter-spacing: 0.5px;">Estimated Budget</td>
                                    <td style="padding: 14px 16px; font-size: 14px; color: #E5E7EB; border-bottom: 1px solid #1F2937;">{{ $quote->budget }}</td>
                                </tr>
                                @endif

                                <tr>
                                    <td width="35%" style="padding: 14px 16px; font-size: 13px; font-weight: 600; color: #6B7280; vertical-align: top; text-transform: uppercase; letter-spacing: 0.5px;">Project Scope</td>
                                    <td style="padding: 14px 16px; font-size: 14px; color: #9CA3AF; line-height: 20px; font-style: italic;">
                                        "{{ Str::limit($quote->description, 250) }}"
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 32px 0 0 0; font-size: 14px; line-height: 22px; color: #9CA3AF;">
                                If you need to append any supplementary documentation or technical specifications to your architectural scope, simply reply directly to this email transmission.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 0 40px 40px 40px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="font-size: 14px; color: #E5E7EB; line-height: 20px;">
                                        Best regards,<br>
                                        <strong style="color: #FFFFFF; font-weight: 600;">The KawachTech Engineering Team</strong><br>
                                        <a href="https://www.kawachtech.com" style="color: #3B82F6; text-decoration: none; font-size: 13px;">www.kawachtech.com</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 24px 40px; background-color: #0E131F; border-top: 1px solid #1F2937; text-align: center;">
                            <p style="margin: 0; font-size: 12px; color: #4B5563; line-height: 18px;">
                                © {{ date('Y') }} Kawach Technology. All engineering properties secured.<br>
                                Delivering scalable, premium digital frameworks worldwide.
                            </p>
                        </td>
                    </tr>

                </table>
                
            </td>
        </tr>
    </table>

</body>
</html>