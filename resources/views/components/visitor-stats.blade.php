<div class="visitor-stats-component">
    @if($showTitle)
        <div class="stats-title">
            <h3>Statistik Pengunjung</h3>
        </div>
    @endif
    
    <div class="stats-content layout-{{ $layout }}">
        @if($layout === 'cards')
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="stats-info">
                            <h4>{{ number_format($stats['total_visits']) }}</h4>
                            <p>Total Kunjungan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="stats-info">
                            <h4>{{ number_format($stats['today_visits']) }}</h4>
                            <p>Hari Ini</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-calendar-week"></i>
                        </div>
                        <div class="stats-info">
                            <h4>{{ number_format($stats['week_visits']) }}</h4>
                            <p>Minggu Ini</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="stats-info">
                            <h4>{{ number_format($stats['month_visits']) }}</h4>
                            <p>Bulan Ini</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <ul class="stats-list">
                <li>
                    <i class="fas fa-eye"></i>
                    <span class="stats-label">Total Kunjungan:</span>
                    <span class="stats-value">{{ number_format($stats['total_visits']) }}</span>
                </li>
                <li>
                    <i class="fas fa-calendar-day"></i>
                    <span class="stats-label">Hari Ini:</span>
                    <span class="stats-value">{{ number_format($stats['today_visits']) }}</span>
                </li>
                <li>
                    <i class="fas fa-calendar-week"></i>
                    <span class="stats-label">Minggu Ini:</span>
                    <span class="stats-value">{{ number_format($stats['week_visits']) }}</span>
                </li>
                <li>
                    <i class="fas fa-calendar-alt"></i>
                    <span class="stats-label">Bulan Ini:</span>
                    <span class="stats-value">{{ number_format($stats['month_visits']) }}</span>
                </li>
            </ul>
        @endif
    </div>
</div>

<style>
.visitor-stats-component .stats-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.visitor-stats-component .stats-list li {
    display: flex;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.visitor-stats-component .stats-list li:last-child {
    border-bottom: none;
}

.visitor-stats-component .stats-list li i {
    width: 20px;
    margin-right: 10px;
    color: #ffd700;
}

.visitor-stats-component .stats-list .stats-label {
    flex: 1;
    margin-right: 10px;
}

.visitor-stats-component .stats-list .stats-value {
    font-weight: bold;
}

.visitor-stats-component .layout-cards .stats-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    margin-bottom: 15px;
}

.visitor-stats-component .layout-cards .stats-card .stats-icon i {
    font-size: 2em;
    color: #ffd700;
    margin-bottom: 10px;
}

.visitor-stats-component .layout-cards .stats-card h4 {
    font-size: 1.5em;
    font-weight: bold;
    margin-bottom: 5px;
}

.visitor-stats-component .layout-cards .stats-card p {
    font-size: 0.9em;
    margin: 0;
}
</style>