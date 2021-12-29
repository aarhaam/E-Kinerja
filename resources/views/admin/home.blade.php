@extends('layouts.application')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
{{--                    <div class="row">--}}
                        <!-- Website Analytics Starts-->
{{--                        <div class="col-md-6 col-sm-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header d-flex justify-content-between align-items-center">--}}
{{--                                    <h4 class="card-title">Website Analytics</h4>--}}
{{--                                    <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>--}}
{{--                                </div>--}}
{{--                                <div class="card-body pb-1">--}}
{{--                                    <div class="d-flex justify-content-around align-items-center flex-wrap">--}}
{{--                                        <div class="user-analytics mr-2">--}}
{{--                                            <i class="bx bx-user mr-25 align-middle"></i>--}}
{{--                                            <span class="align-middle text-muted">Users</span>--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <div id="radial-success-chart"></div>--}}
{{--                                                <h3 class="mt-1 ml-50">61K</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="sessions-analytics mr-2">--}}
{{--                                            <i class="bx bx-trending-up align-middle mr-25"></i>--}}
{{--                                            <span class="align-middle text-muted">Sessions</span>--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <div id="radial-warning-chart"></div>--}}
{{--                                                <h3 class="mt-1 ml-50">92K</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="bounce-rate-analytics">--}}
{{--                                            <i class="bx bx-pie-chart-alt align-middle mr-25"></i>--}}
{{--                                            <span class="align-middle text-muted">Bounce Rate</span>--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <div id="radial-danger-chart"></div>--}}
{{--                                                <h3 class="mt-1 ml-50">72.6%</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div id="analytics-bar-chart" class="my-75"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="col-xl-3 col-md-6 col-sm-12 dashboard-referral-impression">--}}
{{--                            <div class="row">--}}
{{--                                <!-- Referral Chart Starts-->--}}
{{--                                <div class="col-xl-12 col-12">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-body text-center pb-0">--}}
{{--                                            <h2>$32,690</h2>--}}
{{--                                            <span class="text-muted">Referral 40%</span>--}}
{{--                                            <div id="success-line-chart"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- Impression Radial Chart Starts-->--}}
{{--                                <div class="col-xl-12 col-12">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-body donut-chart-wrapper">--}}
{{--                                            <div id="donut-chart" class="d-flex justify-content-center"></div>--}}
{{--                                            <ul class="list-inline d-flex justify-content-around mb-0">--}}
{{--                                                <li> <span class="bullet bullet-xs bullet-primary mr-50"></span>Social</li>--}}
{{--                                                <li> <span class="bullet bullet-xs bullet-info mr-50"></span>Email</li>--}}
{{--                                                <li> <span class="bullet bullet-xs bullet-warning mr-50"></span>Search</li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xl-3 col-md-12 col-sm-12">--}}
{{--                            <div class="row">--}}
{{--                                <!-- Conversion Chart Starts-->--}}
{{--                                <div class="col-xl-12 col-md-6 col-12">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header d-flex justify-content-between pb-xl-0 pt-xl-1">--}}
{{--                                            <div class="conversion-title">--}}
{{--                                                <h4 class="card-title">Conversion</h4>--}}
{{--                                                <p>60%--}}
{{--                                                    <i class="bx bx-trending-up text-success font-size-small align-middle mr-25"></i>--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                            <div class="conversion-rate">--}}
{{--                                                <h2>89k</h2>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body text-center">--}}
{{--                                            <div id="bar-negative-chart" class="negative-bar-chart"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xl-12 col-md-6 col-12">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body d-flex align-items-center justify-content-between">--}}
{{--                                                    <div class="d-flex align-items-center">--}}
{{--                                                        <div class="avatar bg-rgba-primary m-0 p-25 mr-75 mr-xl-2">--}}
{{--                                                            <div class="avatar-content">--}}
{{--                                                                <i class="bx bx-user text-primary font-medium-2"></i>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="total-amount">--}}
{{--                                                            <h5 class="mb-0">$38,566</h5>--}}
{{--                                                            <small class="text-muted">Conversion</small>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="primary-line-chart"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-12">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body d-flex align-items-center justify-content-between">--}}
{{--                                                    <div class="d-flex align-items-center">--}}
{{--                                                        <div class="avatar bg-rgba-warning m-0 p-25 mr-75 mr-xl-2">--}}
{{--                                                            <div class="avatar-content">--}}
{{--                                                                <i class="bx bx-dollar text-warning font-medium-2"></i>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="total-amount">--}}
{{--                                                            <h5 class="mb-0">$53,659</h5>--}}
{{--                                                            <small class="text-muted">Income</small>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="warning-line-chart"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <!-- Activity Card Starts-->--}}
{{--                        <div class="col-xl-3 col-md-6 col-12 activity-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h4 class="card-title">Activity</h4>--}}
{{--                                </div>--}}
{{--                                <div class="card-body pt-1">--}}
{{--                                    <div class="d-flex activity-content">--}}
{{--                                        <div class="avatar bg-rgba-primary m-0 mr-75">--}}
{{--                                            <div class="avatar-content">--}}
{{--                                                <i class="bx bx-bar-chart-alt-2 text-primary"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="activity-progress flex-grow-1">--}}
{{--                                            <small class="text-muted d-inline-block mb-50">Total Sales</small>--}}
{{--                                            <small class="float-right">$8,125</small>--}}
{{--                                            <div class="progress progress-bar-primary progress-sm">--}}
{{--                                                <div class="progress-bar" role="progressbar" aria-valuenow="50" style="width:50%"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex activity-content">--}}
{{--                                        <div class="avatar bg-rgba-success m-0 mr-75">--}}
{{--                                            <div class="avatar-content">--}}
{{--                                                <i class="bx bx-dollar text-success"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="activity-progress flex-grow-1">--}}
{{--                                            <small class="text-muted d-inline-block mb-50">Income Amount</small>--}}
{{--                                            <small class="float-right">$18,963</small>--}}
{{--                                            <div class="progress progress-bar-success progress-sm">--}}
{{--                                                <div class="progress-bar" role="progressbar" aria-valuenow="80" style="width:80%"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex activity-content">--}}
{{--                                        <div class="avatar bg-rgba-warning m-0 mr-75">--}}
{{--                                            <div class="avatar-content">--}}
{{--                                                <i class="bx bx-stats text-warning"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="activity-progress flex-grow-1">--}}
{{--                                            <small class="text-muted d-inline-block mb-50">Total Budget</small>--}}
{{--                                            <small class="float-right">$14,150</small>--}}
{{--                                            <div class="progress progress-bar-warning progress-sm">--}}
{{--                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" style="width:60%"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex mb-75">--}}
{{--                                        <div class="avatar bg-rgba-danger m-0 mr-75">--}}
{{--                                            <div class="avatar-content">--}}
{{--                                                <i class="bx bx-check text-danger"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="activity-progress flex-grow-1">--}}
{{--                                            <small class="text-muted d-inline-block mb-50">Completed Tasks</small>--}}
{{--                                            <small class="float-right">106</small>--}}
{{--                                            <div class="progress progress-bar-danger progress-sm">--}}
{{--                                                <div class="progress-bar" role="progressbar" aria-valuenow="30" style="width:30%"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Profit Report Card Starts-->--}}
{{--                        <div class="col-xl-3 col-md-6 col-12 profit-report-card">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12 col-sm-6">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header d-flex justify-content-between align-items-center">--}}
{{--                                            <h4 class="card-title">Profit Report</h4>--}}
{{--                                            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body d-flex justify-content-around">--}}
{{--                                            <div class="d-inline-flex mr-xl-2">--}}
{{--                                                <div id="profit-primary-chart"></div>--}}
{{--                                                <div class="profit-content ml-50 mt-50">--}}
{{--                                                    <h5 class="mb-0">$12k</h5>--}}
{{--                                                    <small class="text-muted">2020</small>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="d-inline-flex">--}}
{{--                                                <div id="profit-info-chart"></div>--}}
{{--                                                <div class="profit-content ml-50 mt-50">--}}
{{--                                                    <h5 class="mb-0">$64k</h5>--}}
{{--                                                    <small class="text-muted">2019</small>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12 col-sm-6">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header">--}}
{{--                                            <h4 class="card-title">Registrations</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body">--}}
{{--                                            <div class="d-flex align-items-end justify-content-around">--}}
{{--                                                <div class="registration-content mr-xl-1">--}}
{{--                                                    <h4 class="mb-0">56.3k</h4>--}}
{{--                                                    <i class="bx bx-trending-up success align-middle"></i>--}}
{{--                                                    <span class="text-success">12.8%</span>--}}
{{--                                                </div>--}}
{{--                                                <div id="registration-chart"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- Sales Chart Starts-->
{{--                        <div class="col-xl-3 col-md-6 col-12 sales-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header d-flex justify-content-between align-items-center">--}}
{{--                                    <div class="card-title-content">--}}
{{--                                        <h4 class="card-title">Sales</h4>--}}
{{--                                        <small class="text-muted">Calculated in last 7 days</small>--}}
{{--                                    </div>--}}
{{--                                    <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div id="sales-chart" class="mb-2"></div>--}}
{{--                                    <div class="d-flex justify-content-between my-1">--}}
{{--                                        <div class="sales-info d-flex align-items-center">--}}
{{--                                            <i class='bx bx-up-arrow-circle text-primary font-medium-5 mr-50'></i>--}}
{{--                                            <div class="sales-info-content">--}}
{{--                                                <h6 class="mb-0">Best Selling</h6>--}}
{{--                                                <small class="text-muted">Sunday</small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <h6 class="mb-0">28.6k</h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex justify-content-between mt-2">--}}
{{--                                        <div class="sales-info d-flex align-items-center">--}}
{{--                                            <i class='bx bx-down-arrow-circle icon-light font-medium-5 mr-50'></i>--}}
{{--                                            <div class="sales-info-content">--}}
{{--                                                <h6 class="mb-0">Lowest Selling</h6>--}}
{{--                                                <small class="text-muted">Thursday</small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <h6 class="mb-0">986k</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- Growth Chart Starts-->
{{--                        <div class="col-xl-3 col-md-6 col-12 growth-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body text-center">--}}
{{--                                    <div class="dropdown">--}}
{{--                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButtonSec" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                            2020--}}
{{--                                        </button>--}}
{{--                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">--}}
{{--                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>--}}
{{--                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>--}}
{{--                                            <a class="dropdown-item" href="javascript:void(0);">2018</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div id="growth-Chart"></div>--}}
{{--                                    <h6 class="mt-2"> 62% Growth in 2020</h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row">
                        <!-- Task Card Starts -->
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Data Kinerja Karyawan</h4>
                                        </div>
                                        <div class="card-body card-dashboard">
                                            <p class="card-text">
                                                Data Kinerja Karyawan
                                            </p>
                                            <div class="table-responsive">
                                                <table class="table" id="table-activity">
                                                    <thead>
                                                    <tr>
                                                        <th>No Karyawan</th>
                                                        <th>Nama</th>
                                                        <th>Indikator</th>
                                                        <th>Deskripsi Pekerjaan</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>No Karyawan</th>
                                                        <th>Nama</th>
                                                        <th>Indikator</th>
                                                        <th>Deskripsi Pekerjaan</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Daily Financials Card Starts -->
                        <div class="col-xl-3 col-md-6 col-12 sales-card">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="card-title-content">
                                        <h4 class="card-title">Performa</h4>
                                        <small class="text-muted">Dalam 7 Hari terakhir</small>
                                    </div>
                                    <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                </div>
                                <div class="card-body">
                                    <div id="sales-chart" class="mb-2"></div>
                                    <div class="d-flex justify-content-between my-1">
                                        <div class="sales-info d-flex align-items-center">
                                            <i class='bx bx-up-arrow-circle text-primary font-medium-5 mr-50'></i>
                                            <div class="sales-info-content">
                                                <h6 class="mb-0">Best Performa</h6>
                                                <small class="text-muted">Senin</small>
                                            </div>
                                        </div>
                                        <h6 class="mb-0">79%</h6>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="sales-info d-flex align-items-center">
                                            <i class='bx bx-down-arrow-circle text-danger icon-light font-medium-5 mr-50'></i>
                                            <div class="sales-info-content">
                                                <h6 class="mb-0">Lowest performa</h6>
                                                <small class="text-muted">Kamis</small>
                                            </div>
                                        </div>
                                        <h6 class="mb-0">21%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Growth Chart Starts-->
                        <div class="col-xl-3 col-md-6 col-12 growth-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButtonSec" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            2020
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">
                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2018</a>
                                        </div>
                                    </div>
                                    <div id="growth-Chart"></div>
                                    <h6 class="mt-2"> 62% Growth in 2020</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('js/dashboard-admin.js') }}"></script>
@endpush
