<x-app-layout>
    <style>
        .vq-page {
            background: #f4f3ef;
            min-height: calc(100vh - 62px);
            padding: 2rem 1.5rem;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
        .vq-container {
            max-width: 720px;
            margin: 0 auto;
        }

        .vq-page-header {
            margin-bottom: 1.75rem;
        }
        .vq-page-title {
            font-size: 22px;
            font-weight: 800;
            color: #1a1a2e;
            letter-spacing: -0.4px;
            margin-bottom: 3px;
        }
        .vq-page-sub {
            font-size: 13px;
            color: #9a9994;
        }

        .vq-form-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 16px;
            padding: 2rem 2rem;
        }

        .vq-form-group {
            margin-bottom: 1.25rem;
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
        .vq-label span {
            font-size: 11px;
            font-weight: 500;
            color: #b0afaa;
            text-transform: none;
            letter-spacing: 0;
            margin-left: 4px;
        }

        .vq-input,
        .vq-textarea,
        .vq-select-multi {
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
        .vq-textarea:focus,
        .vq-select-multi:focus {
            border-color: #4338ca;
            background: #ffffff;
        }
        .vq-input::placeholder,
        .vq-textarea::placeholder {
            color: #c0bfba;
        }

        .vq-textarea {
            resize: vertical;
            min-height: 110px;
            line-height: 1.6;
        }

        .vq-select-multi {
            height: 140px;
            padding: 8px 10px;
            cursor: pointer;
        }
        .vq-select-multi option {
            padding: 7px 10px;
            border-radius: 6px;
            font-size: 13.5px;
            color: #1a1a2e;
            margin-bottom: 2px;
        }
        .vq-select-multi option:checked {
            background: #1a1a2e;
            color: #ffffff;
        }

        .vq-input-hint {
            font-size: 12px;
            color: #b0afaa;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .vq-input-hint svg {
            width: 12px;
            height: 12px;
            stroke: #c0bfba;
            fill: none;
            flex-shrink: 0;
        }

        .vq-error {
            font-size: 12px;
            color: #e24b4a;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .vq-error svg {
            width: 12px;
            height: 12px;
            stroke: #e24b4a;
            fill: none;
            flex-shrink: 0;
        }

        .vq-form-row {
            display: flex;
            gap: 16px;
        }
        .vq-form-row .vq-form-group {
            flex: 1;
        }

        .vq-divider {
            height: 1px;
            background: #f0efe9;
            margin: 1.5rem 0;
        }

        .vq-vendors-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 7px;
        }
        .vq-vendors-count {
            font-size: 11.5px;
            color: #9a9994;
            background: #f4f3ef;
            padding: 2px 10px;
            border-radius: 100px;
            border: 1px solid #e5e4df;
        }

        .vq-form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 1.75rem;
            padding-top: 1.5rem;
            border-top: 1px solid #f0efe9;
            flex-wrap: wrap;
        }
        .vq-footer-note {
            font-size: 12px;
            color: #b0afaa;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .vq-footer-note svg {
            width: 13px;
            height: 13px;
            stroke: #c0bfba;
            fill: none;
            flex-shrink: 0;
        }

        .vq-btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 20px;
            background: transparent;
            color: #6b6a66;
            font-size: 14px;
            font-weight: 500;
            border-radius: 9px;
            text-decoration: none;
            border: 1px solid #e0dfd9;
            transition: border-color 0.15s, color 0.15s;
            font-family: inherit;
            cursor: pointer;
        }
        .vq-btn-cancel:hover { border-color: #1a1a2e; color: #1a1a2e; }

        .vq-btn-send {
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
        .vq-btn-send:hover { background: #0f3460; }
        .vq-btn-send svg {
            width: 14px;
            height: 14px;
            stroke: #e8c547;
            fill: none;
        }

        @media (max-width: 640px) {
            .vq-page { padding: 1.25rem 1rem; }
            .vq-form-card { padding: 1.25rem 1.1rem; }
            .vq-form-row { flex-direction: column; gap: 0; }
            .vq-page-title { font-size: 19px; }
            .vq-btn-send { width: 100%; justify-content: center; }
            .vq-btn-cancel { width: 100%; justify-content: center; }
            .vq-form-footer { flex-direction: column-reverse; }
        }
    </style>

    

    <div class="vq-page">
        <div class="vq-container">

            <div class="vq-page-header">
                <div class="vq-page-title">Create Quotation Request</div>
                <div class="vq-page-sub">Fill in the details and assign vendors to send this request</div>
            </div>

            <div class="vq-form-card">
                <form method="POST" action="{{ route('quotation-requests.store') }}">
                    @csrf

                    <div class="vq-form-group">
                        <label class="vq-label" for="title">Title</label>
                        <input
                            id="title"
                            name="title"
                            type="text"
                            class="vq-input"
                            value="{{ old('title') }}"
                            placeholder="e.g. Office Chairs Purchase"
                            required
                            autofocus
                        />
                        @error('title')
                            <div class="vq-error">
                                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="vq-form-group">
                        <label class="vq-label" for="description">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            class="vq-textarea"
                            placeholder="Describe the items or services you need quotes for..."
                            required
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <div class="vq-error">
                                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="vq-form-row">
                        <div class="vq-form-group">
                            <label class="vq-label" for="deadline">Deadline</label>
                            <input
                                id="deadline"
                                name="deadline"
                                type="date"
                                class="vq-input"
                                value="{{ old('deadline') }}"
                                required
                            />
                            @error('deadline')
                                <div class="vq-error">
                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="vq-form-group">
                            <label class="vq-label" for="budget">Budget <span>(Optional)</span></label>
                            <input
                                id="budget"
                                name="budget"
                                type="number"
                                step="0.01"
                                class="vq-input"
                                value="{{ old('budget') }}"
                                placeholder="e.g. 80000"
                            />
                            @error('budget')
                                <div class="vq-error">
                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="vq-divider"></div>

                    <div class="vq-form-group">
                        <div class="vq-vendors-header">
                            <label class="vq-label" style="margin-bottom:0;" for="vendor_ids">Select Vendors</label>
                            <span class="vq-vendors-count">{{ count($vendors) }} available</span>
                        </div>
                        <select
                            id="vendor_ids"
                            name="vendor_ids[]"
                            multiple
                            class="vq-select-multi"
                            required
                        >
                            @foreach($vendors as $vendor)
                                <option value="{{ $vendor->id }}" {{ in_array($vendor->id, old('vendor_ids', [])) ? 'selected' : '' }}>
                                    {{ $vendor->name }} — {{ $vendor->email }}
                                </option>
                            @endforeach
                        </select>
                        @error('vendor_ids')
                            <div class="vq-error">
                                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="vq-input-hint">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            Hold Ctrl (Windows) or Cmd (Mac) to select multiple vendors
                        </div>
                    </div>

                    <div class="vq-form-footer">
                        <div class="vq-footer-note">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                            Request will be sent to all selected vendors
                        </div>
                        <div style="display:flex;gap:10px;flex-wrap:wrap;">
                            <a href="{{ route('quotation-requests.index') }}" class="vq-btn-cancel">
                                Cancel
                            </a>
                            <button type="submit" class="vq-btn-send">
                                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="22" y1="2" x2="11" y2="13"/>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                                </svg>
                                Send Request
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

</x-app-layout>