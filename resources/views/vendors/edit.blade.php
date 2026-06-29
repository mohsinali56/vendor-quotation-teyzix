<x-app-layout>
    <x-slot name="title">Edit Vendor </x-slot>

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
        .btn-update {
            margin-top: 1rem;
            background-color: #2563eb;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
        }
        .btn-update:hover {
            background-color: #1d4ed8;
        }
        .btn-cancel {
            margin-top: 1rem;
            margin-left: 0.5rem;
            color: #6b7280;
            text-decoration: none;
        }
        .btn-cancel:hover {
            text-decoration: underline;
        }
    </style>

    <x-slot name="header">
        <h2 class="form-title">Edit Vendor</h2>
    </x-slot>

    <div class="page-container">
        <div class="form-wrapper">
            <form method="POST" action="{{ route('vendors.update', $vendor) }}">
                @csrf
                @method('PUT')
                
                <div class="space-y-4">
                    <div class="form-group">
                        <label class="form-label">Vendor Name</label>
                        <input name="vendor_name" class="form-input" value="{{ old('vendor_name', $vendor->vendor_name) }}">
                        @error('vendor_name')<p class="error-text">{{ $message }}</p>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Company Name</label>
                        <input name="company_name" class="form-input" value="{{ old('company_name', $vendor->company_name) }}">
                        @error('company_name')<p class="error-text">{{ $message }}</p>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-input" value="{{ old('email', $vendor->email) }}">
                        @error('email')<p class="error-text">{{ $message }}</p>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Contact Number</label>
                        <input name="contact_number" class="form-input" value="{{ old('contact_number', $vendor->contact_number) }}">
                        @error('contact_number')<p class="error-text">{{ $message }}</p>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Business Address</label>
                        <textarea name="business_address" class="form-textarea">{{ old('business_address', $vendor->business_address) }}</textarea>
                        @error('business_address')<p class="error-text">{{ $message }}</p>@enderror
                    </div>
                </div>

                <button class="btn-update">Update</button>
                <a href="{{ route('vendors.index') }}" class="btn-cancel">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>