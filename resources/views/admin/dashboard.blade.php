<x-app-layout>
   

    <style>
        .dashboard-container { max-width: 1200px; margin: 0 auto; padding: 24px; }
        .dashboard-title { font-size: 28px; font-weight: 700; margin-bottom: 24px; color: #1f2937; }
        
        .stats-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 24px; 
            margin-bottom: 32px; 
        }
        
        .stat-card { 
            padding: 24px; 
            border-radius: 12px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
            color: #fff; 
        }
        .stat-card h3 { 
            font-size: 12px; 
            text-transform: uppercase; 
            letter-spacing: 0.5px; 
            margin: 0 0 8px 0; 
            opacity: 0.9; 
        }
        .stat-card p { 
            font-size: 32px; 
            font-weight: 700; 
            margin: 0; 
        }
        
        .card-blue { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .card-green { background: linear-gradient(135deg, #10b981, #059669); }
        .card-yellow { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .card-purple { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
        
        .activities-card { 
            background: #fff; 
            padding: 24px; 
            border-radius: 12px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
        }
        .activities-title { 
            font-size: 20px; 
            font-weight: 700; 
            margin: 0 0 16px 0; 
            color: #1f2937; 
        }
        
        .activities-table { width: 100%; border-collapse: collapse; }
        .activities-table th { 
            text-align: left; 
            padding: 12px 8px; 
            border-bottom: 2px solid #e5e7eb; 
            font-weight: 600; 
            color: #374151; 
        }
        .activities-table td { 
            padding: 12px 8px; 
            border-bottom: 1px solid #f3f4f6; 
            color: #4b5563; 
        }
        .activities-table tr:hover td { background: #f9fafb; }
        .no-data { text-align: center; padding: 24px; color: #9ca3af; }
    </style>

    <div class="dashboard-container">
        <h1 class="dashboard-title">Admin Dashboard</h1>

        <!-- 4 Cards -->
        <div class="stats-grid">
            <div class="stat-card card-blue">
                <h3>Total Vendors</h3>
                <p>{{ $totalVendors }}</p>
            </div>

            <div class="stat-card card-green">
                <h3>Active Quotations</h3>
                <p>{{ $activeQuotations }}</p>
            </div>

            <div class="stat-card card-yellow">
                <h3>Pending</h3>
                <p>{{ $pendingQuotations }}</p>
            </div>

            <div class="stat-card card-purple">
                <h3>Approved</h3>
                <p>{{ $approvedQuotations }}</p>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="activities-card">
            <h2 class="activities-title">Recent Activities</h2>
            <table class="activities-table">
                <thead>
                    <tr>
                        <th>Vendor</th>
                        <th>Quotation</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentActivities as $activity)
                    <tr>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->title }}</td>
                        <td>{{ $activity->submitted_at }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="no-data">No recent activities</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>