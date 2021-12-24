@extends('layouts.application')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Karyawan</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item">
                                    <i class="bx bx-user"></i>
                                </li>
                                <li class="breadcrumb-item active">Karyawan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <p>
                            Read full documnetation
                            <a href="https://datatables.net/" target="_blank">here</a>
                        </p>
                    </div>
                </div>
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Karyawan</h4>
                                </div>
                                <div class="card-body card-dashboard">
                                    <p class="card-text">
                                        Data Karyawan
                                    </p>
                                    <button id="addEmployee" class="btn btn-primary">Tambah Karyawan</button>
                                    <div class="table-responsive">
                                        <table class="table" id="table-employee">
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
                                            <tr>
                                                <td>6471</td>
                                                <td>Mahardika</td>
                                                <td>Muhammad Kharisma M</td>
                                                <td>Jabatan</td>
                                                <td>Aksi</td>
                                            </tr>
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
    <div class="modal fade text-left" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">Karyawan</h5>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical" method="POST" id="formEmployee">
                        <input type="hidden" name="_method" value="POST" id="method">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">No Karyawan</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="employee_id" class="form-control" name="employee_id" placeholder="No Karyawan">
                                            <div class="form-control-position">
                                                <i class="bx bx-id-card"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-icon">Nama</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Nama">
                                            <div class="form-control-position">
                                                <i class="bx bx-rename"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-icon">Email</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                                            <div class="form-control-position">
                                                <i class="bx bx-mail-send"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password-icon">Password</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                                            <div class="form-control-position">
                                                <i class="bx bx-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password-icon">Jabatan</label>
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="occupation" class="form-control" name="occupation" placeholder="Jabatan">
                                            <div class="form-control-position">
                                                <i class="bx bx-briefcase"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <input type="checkbox" class="checkbox-input" id="checkbox4">
                                            <label for="checkbox4">Remember me</label>
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
    <script type="text/javascript" src="{{ asset('js/employee-admin.js') }}"></script>
{{--    <script src="{{ url('admin/app-assets/js/scripts/datatables/datatable.js') }}"></script>--}}
@endpush
