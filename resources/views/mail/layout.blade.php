<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
</head>
<body style="margin:0;padding:24px;background:#f3f4f6;font-family:Arial,Helvetica,sans-serif;color:#111827">
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="width:100%;max-width:600px;background:#ffffff;border:1px solid #e5e7eb;border-radius:16px;overflow:hidden">
                    <tr>
                        <td style="padding:28px 32px;background:#24152d;color:#ffffff">
                            <div style="margin-bottom:14px;font-size:12px;font-weight:bold;letter-spacing:1px;text-transform:uppercase;color:#a5b4fc">
                                @yield('badge')
                            </div>
                            <h1 style="margin:0;font-size:24px;line-height:1.3;color:#ffffff">@yield('header_title')</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px">
                            @yield('body')
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:18px 32px;border-top:1px solid #e5e7eb;color:#6b7280;font-size:12px;line-height:1.6">
                            swift savers Bank Corporation
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
