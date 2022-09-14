@extends('layouts.no-sidebar')

@section('css')
<style>
    .icon-card {
        color: #3a57e8;
    }
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
            <div class="card">
                <div class="card-body d-flex align-items-center" style="height: 120px;">
                    <div class="me-3">
                        <svg class="icon-card" width="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                            <path opacity="0.4" d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z" fill="currentColor"></path>                                
                            <path d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z" fill="currentColor"></path>                                
                            <path d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z" fill="currentColor"></path>                                
                            <path d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z" fill="currentColor"></path>                                
                        </svg>                                                        
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">AK-1</h5>
                        <h4 class="mb-0 fw-bold text-muted">10.000</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
            <div class="card">
                <div class="card-body d-flex align-items-center" style="height: 120px;">
                    <div class="me-3">
                        <svg class="icon-card" width="52" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                            <path opacity="0.4" d="M16.6203 22H7.3797C4.68923 22 2.5 19.8311 2.5 17.1646V11.8354C2.5 9.16894 4.68923 7 7.3797 7H16.6203C19.3108 7 21.5 9.16894 21.5 11.8354V17.1646C21.5 19.8311 19.3108 22 16.6203 22Z" fill="currentColor"></path>                                
                            <path d="M15.7551 10C15.344 10 15.0103 9.67634 15.0103 9.27754V6.35689C15.0103 4.75111 13.6635 3.44491 12.0089 3.44491C11.2472 3.44491 10.4477 3.7416 9.87861 4.28778C9.30854 4.83588 8.99272 5.56508 8.98974 6.34341V9.27754C8.98974 9.67634 8.65604 10 8.24487 10C7.8337 10 7.5 9.67634 7.5 9.27754V6.35689C7.50497 5.17303 7.97771 4.08067 8.82984 3.26285C9.68098 2.44311 10.7814 2.03179 12.0119 2C14.4849 2 16.5 3.95449 16.5 6.35689V9.27754C16.5 9.67634 16.1663 10 15.7551 10Z" fill="currentColor"></path>                                
                        </svg>                             
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Rekom Passport</h5>
                        <h4 class="mb-0 fw-bold text-muted">1.100</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
            <div class="card">
                <div class="card-body d-flex align-items-center" style="height: 120px;">
                    <div class="me-3">
                        <svg class="icon-card" width="52" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                            <path opacity="0.4" d="M16.6203 22H7.3797C4.68923 22 2.5 19.8311 2.5 17.1646V11.8354C2.5 9.16894 4.68923 7 7.3797 7H16.6203C19.3108 7 21.5 9.16894 21.5 11.8354V17.1646C21.5 19.8311 19.3108 22 16.6203 22Z" fill="currentColor"></path>                                <path d="M15.7551 10C15.344 10 15.0103 9.67634 15.0103 9.27754V6.35689C15.0103 4.75111 13.6635 3.44491 12.0089 3.44491C11.2472 3.44491 10.4477 3.7416 9.87861 4.28778C9.30854 4.83588 8.99272 5.56508 8.98974 6.34341V9.27754C8.98974 9.67634 8.65604 10 8.24487 10C7.8337 10 7.5 9.67634 7.5 9.27754V6.35689C7.50497 5.17303 7.97771 4.08067 8.82984 3.26285C9.68098 2.44311 10.7814 2.03179 12.0119 2C14.4849 2 16.5 3.95449 16.5 6.35689V9.27754C16.5 9.67634 16.1663 10 15.7551 10Z" fill="currentColor"></path>                                
                        </svg>                             
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Pelatihan</h5>
                        <h4 class="mb-0 fw-bold text-muted">90</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
            <div class="card">
                <div class="card-body d-flex align-items-center" style="height: 120px;">
                    <div class="me-3">
                        <svg class="icon-card" width="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                            <path opacity="0.4" d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z" fill="currentColor"></path>                                
                            <path d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z" fill="currentColor"></path>                                
                            <path d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z" fill="currentColor"></path>                                
                            <path d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z" fill="currentColor"></path>                                
                        </svg>                                                        
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">LPK</h5>
                        <h4 class="mb-0 fw-bold text-muted">900</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
            <div class="card">
                <div class="card-body d-flex align-items-center" style="height: 120px;">
                    <div class="me-3">
                        <svg class="icon-card" width="52" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                            <path opacity="0.4" d="M16.6203 22H7.3797C4.68923 22 2.5 19.8311 2.5 17.1646V11.8354C2.5 9.16894 4.68923 7 7.3797 7H16.6203C19.3108 7 21.5 9.16894 21.5 11.8354V17.1646C21.5 19.8311 19.3108 22 16.6203 22Z" fill="currentColor"></path>                                
                            <path d="M15.7551 10C15.344 10 15.0103 9.67634 15.0103 9.27754V6.35689C15.0103 4.75111 13.6635 3.44491 12.0089 3.44491C11.2472 3.44491 10.4477 3.7416 9.87861 4.28778C9.30854 4.83588 8.99272 5.56508 8.98974 6.34341V9.27754C8.98974 9.67634 8.65604 10 8.24487 10C7.8337 10 7.5 9.67634 7.5 9.27754V6.35689C7.50497 5.17303 7.97771 4.08067 8.82984 3.26285C9.68098 2.44311 10.7814 2.03179 12.0119 2C14.4849 2 16.5 3.95449 16.5 6.35689V9.27754C16.5 9.67634 16.1663 10 15.7551 10Z" fill="currentColor"></path>                                
                        </svg>                             
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Pencatatan Perusahaan</h5>
                        <h4 class="mb-0 fw-bold text-muted">290</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xs-12">
            <div class="card">
                <div class="card-body d-flex align-items-center" style="height: 120px;">
                    <div class="me-3">
                        <svg class="icon-card" width="52" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                            <path opacity="0.4" d="M16.6203 22H7.3797C4.68923 22 2.5 19.8311 2.5 17.1646V11.8354C2.5 9.16894 4.68923 7 7.3797 7H16.6203C19.3108 7 21.5 9.16894 21.5 11.8354V17.1646C21.5 19.8311 19.3108 22 16.6203 22Z" fill="currentColor"></path>                                <path d="M15.7551 10C15.344 10 15.0103 9.67634 15.0103 9.27754V6.35689C15.0103 4.75111 13.6635 3.44491 12.0089 3.44491C11.2472 3.44491 10.4477 3.7416 9.87861 4.28778C9.30854 4.83588 8.99272 5.56508 8.98974 6.34341V9.27754C8.98974 9.67634 8.65604 10 8.24487 10C7.8337 10 7.5 9.67634 7.5 9.27754V6.35689C7.50497 5.17303 7.97771 4.08067 8.82984 3.26285C9.68098 2.44311 10.7814 2.03179 12.0119 2C14.4849 2 16.5 3.95449 16.5 6.35689V9.27754C16.5 9.67634 16.1663 10 15.7551 10Z" fill="currentColor"></path>                                
                        </svg>                             
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Perselisihan Hubungan Industrial</h5>
                        <h4 class="mb-0 fw-bold text-muted">100</h4>
                        <p class="mb-0 text-muted">Mengikuti Survey</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end w-100 mb-5">
                        <div class="me-4 px-3 py-2 rounded" style="width: 205px; background-color: #d8ddfa;">
                            <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Bulan Ini :</h5>
                            <h4 class="mb-0 fw-bold text-muted">12.480</h4>
                        </div>
                        <div class="px-3 py-2 rounded" style="width: 205px; background-color: #d8ddfa;">
                            <h5 class="mb-0 fw-bold mb-1" style="font-size: 18px;">Bulan Sebelumnya :</h5>
                            <h4 class="mb-0 fw-bold text-muted">18.820</h4>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="fw-bold text-muted">16.590</h4>
                            <div class="text-muted">Total Mengikuti Survey</div>
                        </div>
                        <div class="text-muted">
                            13 September 2022
                        </div>
                    </div>
                    
                    <div id="chart">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    var options = {
        series: [
            {
                name: 'AK1',
                data: [10000, 9000, 9900, 20000, 14000, 10090, 8000]
            }, 
            {
                name: 'Rekom Passport',
                data: [1100, 3200, 4500, 3020, 3400, 5200, 4100]
            },
            {
                name: 'Pelatihan',
                data: [9000, 2200, 2500, 2200, 3600, 4200, 9000]
            },
            {
                name: 'LPK',
                data: [9000, 3200, 3500, 3200, 4600, 5200, 20000]
            },
            {
                name: 'Pencatatan Perusahaan',
                data: [29000, 5200, 5500, 6200, 5600, 1200, 1000]
            },
            {
                name: 'Perselisihan Data Industrial',
                data: [10000, 1200, 2500, 1200, 2300, 2700, 3099]
            }
        ],
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
                show: false
            }
        },
        stroke: {
            curve: 'smooth',
            width: 1.5
        },
        xaxis: {
            show: false,
            categories: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul"]
        },
        tooltip: {
            x: {
            format: 'dd/MM/yy HH:mm'
            },
        },
        colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#888'],
        fill: {
            colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#888'],
            gradient: {
                opacityFrom: 0.6,
                opacityTo: 0.1
            }
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            position: 'top',
            fontSize: '16px',
            itemMargin: {
                vertical: 10,
                horizontal: 10
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
});
</script>
@endsection