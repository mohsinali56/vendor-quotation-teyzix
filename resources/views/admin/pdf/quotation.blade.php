<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quotation #{{ $quotationRequest->id }}</title>
    <style> 
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; } 
        h1 { font-size: 20px; margin-bottom: 5px; } 
        h2 { font-size: 16px; margin-top: 20px; border-bottom: 1px solid #eee; padding-bottom: 5px; } 
        table { width: 100%; border-collapse: collapse; margin-top: 10px; } 
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; } 
        th { background-color: #f2f2f2; font-weight: bold; } 
        .meta { margin-bottom: 15px; } 
        .meta p { margin: 2px 0; } 
        .lowest-box { background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 8px; border-radius: 6px; display: inline-block; margin-top: 10px; font-weight: bold; }
        .row-lowest { background: #f0fdf4; }
    </style>
</head>
<body>

    <h1>Quotation Request: {{ $quotationRequest->title }}</h1>
    
    <div class="meta">
        <p><b>Admin Budget:</b> {{ $quotationRequest->budget ? 'PKR ' . number_format($quotationRequest->budget) : 'N/A' }}</p>
        <p><b>Deadline:</b> {{ \Carbon\Carbon::parse($quotationRequest->deadline)->format('d M, Y') }}</p>
        <p><b>Total Vendors:</b> {{ $quotationRequest->vendors->count() }}</p>
    </div>

    @if($lowestAmount)
        <div class="lowest-box">
            Lowest Quoted Amount: PKR {{ number_format($lowestAmount) }}
        </div>
    @endif

    <h2>Vendor Comparison</h2>
    <table>
        <thead>
            <tr>
                <th>Vendor Name</th>
                <th>Quoted Amount</th> {{-- YAHAN amount aayega --}}
                <th>Submission Date</th> {{-- YAHAN submission_date aayega --}}
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotationRequest->vendors as $vendor)
            @php $isLowest = $vendor->pivot->amount && $vendor->pivot->amount == $lowestAmount; @endphp
            <tr class="{{ $isLowest ? 'row-lowest' : '' }}">
                <td>
                    {{ $vendor->name }}
                    @if($isLowest) <b> [Lowest]</b> @endif
                </td>
                <td>
                    {{ $vendor->pivot->amount ? 'PKR ' . number_format($vendor->pivot->amount) : 'Not Submitted' }} {{-- YAHAN --}}
                </td>
                <td>
                    {{ $vendor->pivot->submission_date ? \Carbon\Carbon::parse($vendor->pivot->submission_date)->format('d M, Y') : 'N/A' }} {{-- YAHAN --}}
                </td>
                <td>{{ ucfirst($vendor->pivot->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>