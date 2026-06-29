<x-app-layout>
    <style>
        .vq-page {
            background: #f4f3ef;
            min-height: calc(100vh - 62px);
            padding: 2rem 1.5rem;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
        .vq-container {
            max-width: 700px;
            margin: 0 auto;
        }
        .vq-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 14px;
            padding: 1.5rem;
        }
        .vq-page-title {
            font-size: 20px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 1.25rem;
        }
        .vq-form-group {
            margin-bottom: 1rem;
        }
        .vq-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #3a3a38;
            margin-bottom: 6px;
        }
        .vq-input, .vq-textarea {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #d0cfc9;
            border-radius: 8px;
            font-size: 13.5px;
            font-family: inherit;
            background: #fff;
            transition: border-color 0.15s;
        }
        .vq-input:focus, .vq-textarea:focus {
            outline: none;
            border-color: #6366f1;
        }
        .vq-textarea {
            min-height: 100px;
            resize: vertical;
        }
        .vq-error {
            font-size: 12px;
            color: #e24b4a;
            margin-top: 4px;
        }
        .vq-info-box {
            background: #f4f3ef;
            border: 1px solid #e5e4df;
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 1.25rem;
            font-size: 13px;
        }
        .vq-info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
        }
        .vq-info-row:last-child { margin-bottom: 0; }
        .vq-info-label { color: #9a9994; }
        .vq-info-value { color: #1a1a2e; font-weight: 600; }
        
        .vq-btn-row {
            display: flex;
            gap: 8px;
            margin-top: 1.5rem;
        }
        .vq-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 18px;
            background: #1a1a2e;
            color: #ffffff;
            font-size: 13.5px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.15s;
        }
        .vq-btn:hover { background: #0f3460; }
        .vq-btn-secondary {
            background: #f4f3ef;
            color: #1a1a2e;
            border: 1px solid #e5e4df;
        }
        .vq-btn-secondary:hover { background: #eceae4; }
    </style>

    <div class="vq-page">
        <div class="vq-container">
            <div class="vq-card">
                <div class="vq-page-title">Submit Quotation: {{ $quotation->title }}</div>

                {{-- Request Info --}}
                <div class="vq-info-box">
                    <div class="vq-info-row">
                        <span class="vq-info-label">Budget:</span>
                        <span class="vq-info-value">Rs {{ number_format($quotation->budget) }}</span>
                    </div>
                    @if($quotation->deadline)
                    <div class="vq-info-row">
                        <span class="vq-info-label">Deadline:</span>
                        <span class="vq-info-value">{{ \Carbon\Carbon::parse($quotation->deadline)->format('d M Y') }}</span>
                    </div>
                    @endif
                    <div class="vq-info-row">
                        <span class="vq-info-label">Description:</span>
                        <span class="vq-info-value">{{ $quotation->description }}</span>
                    </div>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ route('vendor.quotation-requests.update', $quotation->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="vq-form-group">
                        <label for="amount" class="vq-label">Your Amount (PKR) *</label>
                        <input type="number" 
                               id="amount" 
                               name="amount" 
                               class="vq-input"
                               value="{{ old('amount', $vendorPivot->amount) }}"
                               placeholder="Enter your quote amount"
                               min="0" 
                               step="0.01" 
                               required>
                        @error('amount')
                            <div class="vq-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="vq-form-group">
                        <label for="notes" class="vq-label">Notes / Message</label>
                        <textarea id="notes" 
                                  name="notes" 
                                  class="vq-textarea"
                                  placeholder="Add any notes for the admin...">{{ old('notes', $vendorPivot->notes) }}</textarea>
                        @error('notes')
                            <div class="vq-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="vq-btn-row">
                        <a href="{{ route('vendor.quotation-requests.index') }}" class="vq-btn vq-btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="vq-btn">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="22" y1="2" x2="11" y2="13"/>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                            </svg>
                            Submit Quote
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>