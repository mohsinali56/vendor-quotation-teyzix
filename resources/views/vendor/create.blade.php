<x-app-layout>
    <x-slot name="title">Submit Quotation</x-slot>

    <style>
        .page-container {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .form-wrapper {
            max-width: 42rem;
            margin: 0 auto;
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .form-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .request-info {
            background-color: #f3f4f6;
            padding: 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1.5rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-label {
            display: block;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.25rem;
        }
        .form-input, .form-textarea {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }
        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37,99,235,0.2);
        }
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        .error-text {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .btn-save {
            margin-top: 1rem;
            background-color: #2563eb;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
        }
        .btn-save:hover {
            background-color: #1d4ed8;
        }
    </style>

    <x-slot name="header">
        <h2 class="form-title">Submit Quotation</h2>
    </x-slot>

    <div class="page-container">
        <div class="form-wrapper">
            <div class="request-info">
                <strong>Request:</strong> {{ $request->title }}<br>
                <strong>Description:</strong> {{ $request->description }}
            </div>

            <form method="POST" action="{{ route('vendor.quote.store', $request->id) }}">
                @csrf
                <div class="space-y-4">
                    <div class="form-group">
                        <label class="form-label">Amount *</label>
                        <input name="amount" type="number" step="0.01" min="0" class="form-input" value="{{ old('amount') }}" required>
                        @error('amount')<p class="error-text">{{ $message }}</p>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-textarea">{{ old('notes') }}</textarea>
                        @error('notes')<p class="error-text">{{ $message }}</p>@enderror
                    </div>
                </div>

                <button class="btn-save">Submit Quotation</button>
            </form>
        </div>
    </div>
</x-app-layout>