<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\MailController;
use App\Mail\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AdminMailTest extends TestCase
{
    public function test_mail_can_be_sent_to_an_email_address_with_a_cc_recipient(): void
    {
        Mail::fake();

        $request = Request::create('/admin/mail/send-email', 'POST', [
            'email' => 'customer@example.test',
            'cc' => 'copy@example.test',
            'subject' => 'Account update',
            'message' => 'Your account is ready.',
        ], [], [], [
            'HTTP_ACCEPT' => 'application/json',
        ]);

        $response = (new MailController())->send($request);

        $this->assertSame(200, $response->getStatusCode());
        Mail::assertSent(UserNotification::class, function (UserNotification $mail): bool {
            return $mail->hasTo('customer@example.test')
                && $mail->hasCc('copy@example.test');
        });
    }

    public function test_user_notification_renders_the_composed_message(): void
    {
        $mail = new UserNotification([
            'subject' => 'Account update',
            'message' => 'Your account is ready.',
        ]);

        $this->assertStringContainsString('Your account is ready.', $mail->render());
    }
}
