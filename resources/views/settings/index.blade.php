<x-app-layout>

<div class="container mt-5">

    <h3 class="fw-bold mb-4">
        Website Settings
    </h3>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow-sm p-4">

        <form action="{{ route('settings.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Site Name
                </label>

                <input type="text"
                       name="site_name"
                       class="form-control"
                       value="{{ $setting->site_name ?? '' }}">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Footer Text
                </label>

                <textarea name="footer_text"
                          class="form-control"
                          rows="3">{{ $setting->footer_text ?? '' }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    SEO Title
                </label>

                <input type="text"
                       name="seo_title"
                       class="form-control"
                       value="{{ $setting->seo_title ?? '' }}">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    SEO Description
                </label>

                <textarea name="seo_description"
                          class="form-control"
                          rows="3">{{ $setting->seo_description ?? '' }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Contact Email
                </label>

                <input type="email"
                       name="contact_email"
                       class="form-control"
                       value="{{ $setting->contact_email ?? '' }}">

            </div>

            <button class="btn btn-primary">

                Save Settings

            </button>

        </form>

    </div>

</div>

</x-app-layout>