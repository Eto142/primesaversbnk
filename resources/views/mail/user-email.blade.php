@extends('mail.layout')

@section('title')
    {{ $data['subject'] }} — swift savers Bank Corporation
@endsection

@section('badge', 'Account Notification')

@section('header_title')
    {{ $data['subject'] }}
@endsection

@section('body')
    <p style="margin:0 0 20px;color:#374151;font-size:15px;line-height:1.7">{{ $data['message'] }}</p>

    @if (!empty($data['attachment_name']) && !empty($data['attachment_mime']) && !empty($data['attachment_data']) && str_starts_with($data['attachment_mime'], 'image/'))
        <table cellpadding="0" cellspacing="0" border="0" align="center" style="margin:8px auto 0">
            <tr>
                <td align="center" style="background:#f9fafb;border:1px solid #e5e7eb;border-radius:12px;padding:16px 16px 12px">
                    <img
                        src="{{ $message->embedData($data['attachment_data'], $data['attachment_name'], $data['attachment_mime']) }}"
                        width="260"
                        style="display:block;width:260px;max-width:260px;height:auto;border-radius:8px;border:0;outline:none;margin:0 auto"
                        alt="{{ $data['attachment_name'] }}"
                    >
                    <div style="margin-top:10px;color:#6b7280;font-size:12px;text-align:center">
                        {{ $data['attachment_name'] }}
                    </div>
                </td>
            </tr>
        </table>
    @elseif (!empty($data['attachment_name']))
        <p style="margin:0;color:#374151;font-size:13px">
            Attached: <strong>{{ $data['attachment_name'] }}</strong>
        </p>
    @endif
@endsection
