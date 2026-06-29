<x-app-layout>
  <style>
    .vq-profile-section {
        background: #ffffff;
        border: 1px solid #e5e4df;
        border-radius: 16px;
        padding: 1.75rem 2rem;
        font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
    }
    .vq-section-heading {
        font-size: 16px;
        font-weight: 700;
        color: #1a1a2e;
        letter-spacing: -0.3px;
        margin-bottom: 1.5rem;
    }

    .vq-form-group {
        margin-bottom: 1.2rem;
    }
    .vq-label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: #555555;
        margin-bottom: 7px;
        letter-spacing: 0.2px;
        text-transform: uppercase;
    }
    .vq-input,
    .vq-textarea {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #e0dfd9;
        border-radius: 9px;
        font-size: 14px;
        color: #1a1a2e;
        background: #fafaf8;
        outline: none;
        font-family: inherit;
        transition: border-color 0.15s, background 0.15s;
    }
    .vq-input:focus,
    .vq-textarea:focus {
        border-color: #4338ca;
        background: #ffffff;
    }
    .vq-input::placeholder,
    .vq-textarea::placeholder { color: #c0bfba; }
    .vq-textarea {
        resize: vertical;
        min-height: 90px;
        line-height: 1.6;
    }

    .vq-error {
        font-size: 12px;
        color: #e24b4a;
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .vq-error svg { width: 12px; height: 12px; stroke: #e24b4a; fill: none; flex-shrink: 0; }

    .vq-verify-notice {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        background: #fffbeb;
        border: 1px solid #fde68a;
        color: #92400e;
        font-size: 13px;
        padding: 11px 14px;
        border-radius: 9px;
        margin-top: 6px;
    }
    .vq-verify-notice svg { width: 15px; height: 15px; stroke: #d97706; fill: none; flex-shrink: 0; margin-top: 1px; }
    .vq-verify-btn {
        background: none;
        border: none;
        color: #4338ca;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        padding: 0;
        text-decoration: underline;
        font-family: inherit;
    }
    .vq-verify-btn:hover { color: #3730a3; }

    .vq-divider {
        height: 1px;
        background: #f0efe9;
        margin: 1.75rem 0;
    }
    .vq-vendor-heading {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 1.25rem;
    }
    .vq-vendor-heading-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #eef2ff;
        color: #3730a3;
        border: 1px solid #c7d2fe;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 100px;
    }
    .vq-vendor-heading-badge svg { width: 11px; height: 11px; stroke: currentColor; fill: none; }

    .vq-form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .vq-form-footer {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-top: 1.75rem;
        padding-top: 1.5rem;
        border-top: 1px solid #f0efe9;
        flex-wrap: wrap;
    }
    .vq-btn-save {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 22px;
        background: #1a1a2e;
        color: #ffffff;
        font-size: 14px;
        font-weight: 600;
        border-radius: 9px;
        border: none;
        cursor: pointer;
        font-family: inherit;
        transition: background 0.15s;
        white-space: nowrap;
    }
    .vq-btn-save:hover { background: #0f3460; }
    .vq-btn-save svg { width: 14px; height: 14px; stroke: #e8c547; fill: none; }

    .vq-saved-notice {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 500;
        color: #065f46;
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        padding: 6px 14px;
        border-radius: 8px;
    }
    .vq-saved-notice svg { width: 13px; height: 13px; stroke: #10b981; fill: none; }

    @media (max-width: 640px) {
        .vq-profile-section { padding: 1.25rem 1.1rem; }
        .vq-form-row { grid-template-columns: 1fr; gap: 0; }
        .vq-btn-save { width: 100%; justify-content: center; }
        .vq-form-footer { flex-direction: column; align-items: flex-start; }
    }
</style>

<div class="vq-profile-section">
    <div class="vq-section-heading">Account Information</div>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="vq-form-group">
            <label class="vq-label" for="name">Full Name</label>
            <input
                id="name"
                name="name"
                type="text"
                class="vq-input"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Your full name"
            />
            @error('name')
                <div class="vq-error">
                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="vq-form-group">
            <label class="vq-label" for="email">Email Address</label>
            <input
                id="email"
                name="email"
                type="email"
                class="vq-input"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                placeholder="you@company.com"
            />
            @error('email')
                <div class="vq-error">
                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    {{ $message }}
                </div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="vq-verify-notice">
                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <span>
                        Your email address is unverified.
                        <button form="send-verification" class="vq-verify-btn">
                            Click here to re-send the verification email.
                        </button>
                    </span>
                </div>
            @endif
        </div>

        @if(auth()->user()->role === 'vendor')
            <div class="vq-divider"></div>

            <div class="vq-vendor-heading">
                Vendor Profile
                <span class="vq-vendor-heading-badge">
                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                        <path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/>
                    </svg>
                    Vendor Only
                </span>
            </div>

            <div class="vq-form-row">
                <div class="vq-form-group">
                    <label class="vq-label" for="vendor_name">Vendor Name</label>
                    <input
                        id="vendor_name"
                        name="vendor_name"
                        type="text"
                        class="vq-input"
                        value="{{ old('vendor_name', auth()->user()->vendor->vendor_name ?? '') }}"
                        required
                        placeholder="Your vendor name"
                    />
                    @error('vendor_name')
                        <div class="vq-error">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="vq-form-group">
                    <label class="vq-label" for="company_name">Company Name</label>
                    <input
                        id="company_name"
                        name="company_name"
                        type="text"
                        class="vq-input"
                        value="{{ old('company_name', auth()->user()->vendor->company_name ?? '') }}"
                        required
                        placeholder="Your company name"
                    />
                    @error('company_name')
                        <div class="vq-error">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="vq-form-group">
                <label class="vq-label" for="contact_number">Contact Number</label>
                <input
                    id="contact_number"
                    name="contact_number"
                    type="text"
                    class="vq-input"
                    value="{{ old('contact_number', auth()->user()->vendor->contact_number ?? '') }}"
                    required
                    placeholder="+92 300 0000000"
                />
                @error('contact_number')
                    <div class="vq-error">
                        <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="vq-form-group">
                <label class="vq-label" for="business_address">Business Address</label>
                <textarea
                    id="business_address"
                    name="business_address"
                    class="vq-textarea"
                    rows="3"
                    required
                    placeholder="Street, City, Country"
                >{{ old('business_address', auth()->user()->vendor->business_address ?? '') }}</textarea>
                @error('business_address')
                    <div class="vq-error">
                        <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endif

        <div class="vq-form-footer">
            <button type="submit" class="vq-btn-save">
                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                    <polyline points="17 21 17 13 7 13 7 21"/>
                    <polyline points="7 3 7 8 15 8"/>
                </svg>
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <div
                    class="vq-saved-notice"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >
                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Profile saved successfully!
                </div>
            @endif
        </div>

    </form>
</div>
  </x-app-layout> 