<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Http\UploadedFile;

class UserNotification extends Mailable
{
    /**
     * @param array<string, mixed> $data
     * @param array<int, UploadedFile> $attachments
     */
    public function __construct(
        private readonly array $data,
        private readonly array $uploadedAttachments = [],
    ) {
    }

    public function build(): static
    {
        $this->subject($this->data['subject'])
            ->view('mail.user-email', ['data' => $this->data]);

        $firstAttachment = $this->uploadedAttachments[0] ?? null;
        $inlineImage = $firstAttachment !== null
            && str_starts_with((string) $firstAttachment->getMimeType(), 'image/');

        foreach ($this->uploadedAttachments as $index => $attachment) {
            if ($index === 0 && $inlineImage) {
                continue;
            }

            $this->attach($attachment->getRealPath(), [
                'as' => $attachment->getClientOriginalName(),
                'mime' => $attachment->getMimeType() ?? 'application/octet-stream',
            ]);
        }

        return $this;
    }
}
