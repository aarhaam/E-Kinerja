@extends('layouts.application')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Data Bawahan</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item">
                                    <i class="bx bx-user"></i>
                                </li>
                                <li class="breadcrumb-item active">Data Bawahan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
            {{--                <div class="row">--}}
            {{--                    <div class="col-12">--}}
            {{--                        <p>--}}
            {{--                            Read full documnetation--}}
            {{--                            <a href="https://datatables.net/" target="_blank">here</a>--}}
            {{--                        </p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Bawahan</h4>
                                </div>
                                <div class="card-body card-dashboard">
                                    <p class="card-text">
                                        Data Bawahan
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table" id="table-subordinate">
                                            <thead>
                                            <tr>
                                                <th>No Karyawan</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Jabatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>No Karyawan</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Jabatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!--section modal-->
    <div class="modal fade text-left" id="modalPerformance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title white" id="myModalLabel160">Performa Karyawan</h5>
                    <button type="button" id="closeModalPerformance" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table" id="table-performance">
                        <thead>
                        <tr>
                            <th>No </th>
                            <th>Deskripsi Aktivitas</th>
                            <th>Indikator</th>
                            <th>Tanggal</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No </th>
                            <th>Deskripsi Aktivitas</th>
                            <th>Indikator</th>
                            <th>Tanggal</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modalRate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title white" id="myModalLabel160">Penilaian Kinerja Berdasarkan Tanggal</h5>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical" method="POST" id="formRate">
                        <input type="hidden" name="_method" value="POST" id="method">
                        <input type="hidden" name="employee_id" id="employee_id">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">Tanggal</label>
                                        <div class="position-relative has-icon-left">
                                            <input name="date" id="date" type="date" class="form-control">
                                            <div class="form-control-position">
                                                <i class="bx bx-calendar-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-icon">Nilai</label>
                                        <div class="position-relative has-icon-left">
                                            <select class="form-control" name="grade" id="grade">
                                                <option value="1">Sangat Kurang 😞 ️</option>
                                                <option value="2">Kurang 🙁 ️</option>
                                                <option value="3">Cukup 🙂 ️</option>
                                                <option value="4">Baik 🤓 ️</option>
                                                <option value="5">Sangat Baik 😍 ️</option>
                                            </select>
                                            <div class="form-control-position">
                                                <i class="bx bx-rename"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light-secondary mr-1" id="close-button">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('js/subordinate-performance-employee.js') }}"></script>
@endpush
