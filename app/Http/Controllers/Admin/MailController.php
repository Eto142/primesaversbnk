<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class MailController extends Controller
{
    public function compose(?string $userId = null)
    {
        $user = $userId === null ? null : User::findOrFail($userId);

        return view('admin.mail.compose', compact('user'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['nullable', 'integer', 'exists:users,id', 'required_without:email'],
            'email' => ['nullable', 'email', 'required_without:user_id'],
            'cc' => ['nullable', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'attachments' => ['sometimes', 'array'],
            'attachments.*' => ['file', 'max:5120'],
        ]);

        $recipient = isset($validated['user_id'])
            ? User::findOrFail($validated['user_id'])->email
            : $validated['email'];
        $attachments = $request->file('attachments', []);
        $firstAttachment = $attachments[0] ?? null;
        $attachmentMime = $firstAttachment?->getMimeType();

        try {
            $mailData = [
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'attachment_name' => $firstAttachment?->getClientOriginalName(),
                'attachment_mime' => $attachmentMime,
                'attachment_data' => $firstAttachment !== null && str_starts_with((string) $attachmentMime, 'image/')
                    ? $firstAttachment->get()
                    : null,
            ];

            $pendingMail = Mail::to($recipient);

            if (! empty($validated['cc'])) {
                $pendingMail->cc($validated['cc']);
            }

            $pendingMail->send(new UserNotification($mailData, $attachments));
        } catch (Throwable $exception) {
            Log::error('Admin mail send failed: '.$exception->getMessage());

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'The email could not be sent. Please try again.',
                ], 500);
            }

            return back()->withInput()->with('error', 'The email could not be sent. Please try again.');
        }

        $successMessage = 'Email successfully sent to '.$recipient;

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return back()->with('status', $successMessage);
    }

    public function history()
    {
        return view('admin.mail.history');
    }
}