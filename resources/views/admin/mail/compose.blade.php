@include('admin.header')

<div class="main-content p-3 p-md-4" id="mainContent">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h2 class="fw-bold text-dark mb-1">Send Mail</h2>
            <p class="text-muted small mb-0">Send an account notification to a customer.</p>
        </div>
    </div>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <p class="fw-semibold mb-1">Please correct the following:</p>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Compose email</h5>

            <form action="{{ route('admin.send.email.post') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <label for="email" class="col-sm-3 col-form-label">Email*</label>
                    <div class="col-sm-9">
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="{{ old('email', $user?->email ?? '') }}"
                            required
                        >
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="cc" class="col-sm-3 col-form-label">CC</label>
                    <div class="col-sm-9">
                        <input
                            type="email"
                            class="form-control"
                            id="cc"
                            name="cc"
                            value="{{ old('cc') }}"
                            autocomplete="email"
                        >
                        <div class="form-text">Optional carbon-copy recipient.</div>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="subject" class="col-sm-3 col-form-label">Subject*</label>
                    <div class="col-sm-9">
                        <input
                            type="text"
                            class="form-control"
                            id="subject"
                            name="subject"
                            value="{{ old('subject') }}"
                            maxlength="255"
                            required
                        >
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="message" class="col-sm-3 col-form-label">Message*</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="message" name="message" rows="6" required>{{ old('message') }}</textarea>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="attachments" class="col-sm-3 col-form-label">Attachments</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" id="attachments" name="attachments[]" multiple>
                        <div class="form-text">Optional. Each attachment must be 5 MB or smaller.</div>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-9">
                        <button class="btn btn-primary" type="submit">Send Mail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.footer')
