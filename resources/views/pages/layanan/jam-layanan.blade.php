<x-layout.main pageTitle="Jam Layanan">
    <section class="page-title centred">
        @if (!empty($globalSettingPage->banner))
            <div class="bg-layer" style="background-image: url({{ asset('storage/' . $globalSettingPage->banner) }});"></div>
        @else
            <div class="bg-layer" style="background-image: url(/assets/images/background/page-title-5.jpg);"></div>
        @endif
        <div class="pattern-layer" style="background-image: url(/assets/images/shape/shape-53.png);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>Jam Layanan</h2>
                <ul class="bread-crumb">
                    <li>Informasi jam operasional layanan kami</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="schedule-section pt_120 pb_180 centred">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="table-outer">
                        <table class="pricing-table">
                            <thead>
                                <tr>
                                    <th class="table-header">Hari</th>
                                    <th class="table-header">Jam Operasional</th>
                                    <th class="table-header">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($serviceHours as $index => $serviceHour)
                                    <tr class="wow fadeInUp animated" data-wow-delay="{{ $index * 200 }}ms" data-wow-duration="1500ms">
                                        <td class="table-item">
                                            <h5>
                                                {{ ucfirst($serviceHour->day) }}
                                                @if($serviceHour->end_day && $serviceHour->end_day !== $serviceHour->day)
                                                    - {{ ucfirst($serviceHour->end_day) }}
                                                @endif
                                            </h5>
                                        </td>
                                        <td class="table-item">
                                            @if($serviceHour->is_closed)
                                                <h5 class="closed">Tutup</h5>
                                            @else
                                                <h5 class="time">{{ \Carbon\Carbon::createFromFormat('H:i:s', $serviceHour->open_time)->format('H:i') }}</h5>
                                                <span class="info">sampai</span>
                                                <h5 class="time">{{ \Carbon\Carbon::createFromFormat('H:i:s', $serviceHour->close_time)->format('H:i') }}</h5>
                                            @endif
                                        </td>
                                        <td class="table-item">
                                            @if($serviceHour->is_closed)
                                                <div class="btn theme-btn-two">Tutup</div>
                                            @else
                                                <div class="btn theme-btn">Buka</div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="table-item text-center">
                                            <div class="empty-content">
                                                <figure class="image">
                                                    <img src="/assets/images/icons/icon-1.png" alt="">
                                                </figure>
                                                <h5>Belum ada jadwal layanan</h5>
                                                <span class="info">Jadwal layanan akan segera tersedia</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout.main>

<style>
.schedule-section {
    position: relative;
    background: #f7f7f7;
}

.table-outer {
    overflow-x: auto;
    background: #fff;
    border-radius: 30px;
    box-shadow: 0 15px 50px rgba(8, 13, 62, .15);
    padding: 0;
}

.pricing-table {
    position: relative;
    width: 100%;
    margin-bottom: 0;
    border-spacing: 0;
    border-collapse: separate;
}

.pricing-table thead {
    background: linear-gradient(90deg, #4154f1 0%, #2c5aa0 100%);
}

.pricing-table .table-header {
    position: relative;
    padding: 30px 25px;
    font-size: 18px;
    font-weight: 600;
    color: #fff;
    text-align: center;
    border: none;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.pricing-table .table-header:first-child {
    border-radius: 30px 0 0 0;
}

.pricing-table .table-header:last-child {
    border-radius: 0 30px 0 0;
}

.pricing-table tbody tr {
    border-bottom: 1px solid #e8e8e8;
    transition: all 0.3s ease;
}

.pricing-table tbody tr:hover {
    background-color: #f8f9ff;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.pricing-table tbody tr:last-child {
    border-bottom: none;
}

.pricing-table tbody tr:last-child .table-item:first-child {
    border-radius: 0 0 0 30px;
}

.pricing-table tbody tr:last-child .table-item:last-child {
    border-radius: 0 0 30px 0;
}

.pricing-table .table-item {
    position: relative;
    padding: 35px 25px;
    text-align: center;
    vertical-align: middle;
    border: none;
    background: #fff;
}

.pricing-table .table-item h5 {
    position: relative;
    font-size: 18px;
    font-weight: 600;
    color: #252525;
    margin-bottom: 5px;
    line-height: 1.2;
}

.pricing-table .table-item h5.time {
    color: #4154f1;
    font-size: 20px;
    margin-bottom: 2px;
}

.pricing-table .table-item h5.closed {
    color: #ff6b6b;
    font-style: italic;
}

.pricing-table .table-item .info {
    position: relative;
    font-size: 14px;
    color: #777;
    display: block;
    line-height: 1.4;
}

.pricing-table .table-item .btn {
    position: relative;
    display: inline-block;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 25px;
    padding: 12px 25px;
    text-decoration: none;
    cursor: default;
    transition: all 0.3s ease;
}

.pricing-table .table-item .theme-btn {
    background: linear-gradient(90deg, #4caf50 0%, #45a049 100%);
    color: #fff;
    border: 2px solid #4caf50;
}

.pricing-table .table-item .theme-btn-two {
    background: transparent;
    color: #ff6b6b;
    border: 2px solid #ff6b6b;
}

.empty-content {
    padding: 50px 20px;
    text-align: center;
}

.empty-content .image {
    margin-bottom: 30px;
}

.empty-content .image img {
    max-width: 80px;
    opacity: 0.5;
}

.empty-content h5 {
    color: #777;
    margin-bottom: 10px !important;
}

.empty-content .info {
    color: #999 !important;
}

@media (max-width: 991px) {
    .pricing-table .table-header,
    .pricing-table .table-item {
        padding: 25px 15px;
    }
    
    .pricing-table .table-header {
        font-size: 16px;
    }
    
    .pricing-table .table-item h5 {
        font-size: 16px;
    }
    
    .pricing-table .table-item h5.time {
        font-size: 18px;
    }
}

@media (max-width: 767px) {
    .table-outer {
        border-radius: 20px;
        margin: 0 -15px;
    }
    
    .pricing-table .table-header:first-child {
        border-radius: 20px 0 0 0;
    }
    
    .pricing-table .table-header:last-child {
        border-radius: 0 20px 0 0;
    }
    
    .pricing-table tbody tr:last-child .table-item:first-child {
        border-radius: 0 0 0 20px;
    }
    
    .pricing-table tbody tr:last-child .table-item:last-child {
        border-radius: 0 0 20px 0;
    }
    
    .pricing-table .table-header,
    .pricing-table .table-item {
        padding: 20px 10px;
    }
    
    .pricing-table .table-header {
        font-size: 14px;
    }
    
    .pricing-table .table-item h5 {
        font-size: 14px;
    }
    
    .pricing-table .table-item h5.time {
        font-size: 16px;
    }
    
    .pricing-table .table-item .info {
        font-size: 12px;
    }
    
    .pricing-table .table-item .btn {
        font-size: 12px;
        padding: 10px 20px;
    }
}
</style>