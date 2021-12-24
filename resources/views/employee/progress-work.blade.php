@extends('layouts.application')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- page user profile start -->
                <section class="page-user-profile">
                    <div class="row">
                        <div class="col-12">
                            <!-- user profile heading section start -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-sm-3 text-center mb-1 mb-sm-0">
                                                    <img src="{{ url('admin/app-assets/images/portrait/small/avatar-s-11.jpg') }}" class="rounded" alt="group image" height="120" width="120" />
                                                </div>
                                                <div class="col-12 col-sm-9">
                                                    <div class="row">
                                                        <div class="col-12 text-center text-sm-left">
                                                            <h6 class="media-heading mb-0">{{ Auth::user()->name }}<i class="cursor-pointer bx bxs-star text-warning ml-50 align-middle"></i></h6>
                                                            <small class="text-muted align-top">{{ Auth::user()->occupation }}</small>
                                                        </div>
                                                        <div class="col-12 text-center text-sm-left">
                                                            <div class="mb-1">
                                                                <span class="mr-1">Email : {{ Auth::user()->email }}</span>
                                                                <span class="mr-1">Status : {{ Auth::user()->status }}</span>
                                                            </div>
                                                            <div>
                                                                <ul class="nav justify-content-center">
                                                                    <li class="nav-item mb-0">
                                                                        <a class="nav-link d-flex px-1" id="activity-tab" data-toggle="tab" href="#activity" aria-controls="activity" role="tab" aria-selected="false"><i class="bx bx-trending-up"></i><span class="d-none d-md-block"> Aktivitas</span></a>
                                                                    </li>
                                                                    <li class="nav-item mb-0">
                                                                        <a class="nav-link d-flex px-1" id="friends-tab" data-toggle="tab" href="#friends" aria-controls="friends" role="tab" aria-selected="false"><i class="bx bx-book-content"></i><span class="d-none d-md-block"> Indikator</span></a>
                                                                    </li>
{{--                                                                    <li class="nav-item mb-0 mr-0">--}}
{{--                                                                        <a class="nav-link d-flex px-1" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false"><i class="bx bx-user"></i><span class="d-none d-md-block">Profil</span></a>--}}
{{--                                                                    </li>--}}
                                                                </ul>
                                                            </div>
                                                            <button class="btn btn-sm d-none d-sm-block float-right btn-light-primary">
                                                                <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                                                            </button>
                                                            <button class="btn btn-sm d-block d-sm-none btn-block text-center btn-light-primary">
                                                                <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i><span>Edit</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- user profile heading section ends -->

                            <!-- user profile content section start -->
                            <div class="row">
                                <!-- user profile nav tabs content start -->
                                <div class="col-lg-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="activity" aria-labelledby="activity-tab" role="tabpanel">
                                            <!-- user profile nav tabs activity start -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5>Aktivitas</h5>
                                                    <button class="btn btn-primary" id="addActivity">Tambah Aktivitas</button>
                                                    <!-- timeline start -->
                                                    <table class="table" id="table-progress">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Indikator</th>
                                                            <th>Deskripsi Aktivitas</th>
                                                            <th>Tanggal Aktivitas</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Indikator</th>
                                                            <th>Deskripsi Aktivitas</th>
                                                            <th>Tanggal Aktivitas</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                    <!-- timeline ends -->
                                                </div>
                                            </div>
                                            <!-- user profile nav tabs activity start -->
                                        </div>
                                        <div class="tab-pane" id="friends" aria-labelledby="friends-tab" role="tabpanel">
                                            <!-- user profile nav tabs friends start -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5>Indikator kerja</h5>
                                                    <table class="table" id="table-indicator">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Indikator</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Indikator</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- user profile nav tabs friends ends -->
                                        </div>
                                        <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                                            <!-- user profile nav tabs profile start -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-3 text-center mb-1 mb-sm-0">
                                                                    <img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" class="rounded" alt="group image" height="120" width="120" />
                                                                </div>
                                                                <div class="col-12 col-sm-9">
                                                                    <div class="row">
                                                                        <div class="col-12 text-center text-sm-left">
                                                                            <h6 class="media-heading mb-0">valintini_007<i class="cursor-pointer bx bxs-star text-warning ml-50 align-middle"></i></h6>
                                                                            <small class="text-muted align-top">Martina Ash</small>
                                                                        </div>
                                                                        <div class="col-12 text-center text-sm-left">
                                                                            <div class="mb-1">
                                                                                <span class="mr-1">122 <small>Posts</small></span>
                                                                                <span class="mr-1">4.7k <small>Followers</small></span>
                                                                                <span class="mr-1">652 <small>Following</small></span>
                                                                            </div>
                                                                            <p>Algolia helps businesses across industries quickly create relevant😎, scalable😀, and
                                                                                lightning😍
                                                                                fast search and discovery experiences.</p>
                                                                            <div>
                                                                                <div class="badge badge-light-primary badge-round mr-1 mb-1" data-toggle="tooltip" data-placement="bottom" title="with 7% growth @valintini_007 is on top 5k"><i class="cursor-pointer bx bx-check-shield"></i>
                                                                                </div>
                                                                                <div class="badge badge-light-warning badge-round mr-1 mb-1" data-toggle="tooltip" data-placement="bottom" title="last 55% growth @valintini_007 is on weedday"><i class="cursor-pointer bx bx-badge-check"></i>
                                                                                </div>
                                                                                <div class="badge badge-light-success badge-round mb-1" data-toggle="tooltip" data-placement="bottom" title="got premium profile here"><i class="cursor-pointer bx bx-award"></i>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-sm d-none d-sm-block float-right btn-light-primary">
                                                                                <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                                                                            </button>
                                                                            <button class="btn btn-sm d-block d-sm-none btn-block text-center btn-light-primary">
                                                                                <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i><span>Edit</span></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Basic details</h5>
                                                    <ul class="list-unstyled">
                                                        <li><i class="cursor-pointer bx bx-map mb-1 mr-50"></i>California</li>
                                                        <li><i class="cursor-pointer bx bx-phone-call mb-1 mr-50"></i>(+56) 454 45654 </li>
                                                        <li><i class="cursor-pointer bx bx-time mb-1 mr-50"></i>July 10</li>
                                                        <li><i class="cursor-pointer bx bx-envelope mb-1 mr-50"></i>Jonnybravo@gmail.com</li>
                                                    </ul>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-12">
                                                            <h6><small class="text-muted">Cell Phone</small></h6>
                                                            <p>(+46) 456 54432</p>
                                                        </div>
                                                        <div class="col-sm-6 col-12">
                                                            <h6><small class="text-muted">Family Phone</small></h6>
                                                            <p>(+46) 454 22432</p>
                                                        </div>
                                                        <div class="col-sm-6 col-12">
                                                            <h6><small class="text-muted">Reporter</small></h6>
                                                            <p>John Doe</p>
                                                        </div>
                                                        <div class="col-sm-6 col-12">
                                                            <h6><small class="text-muted">Manager</small></h6>
                                                            <p>Richie Rich</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <h6><small class="text-muted">Bio</small></h6>
                                                            <p>Built-in customizer enables users to change their admin panel look & feel based on their
                                                                preferences Beautifully crafted, clean & modern designed admin theme with 3 different demos &
                                                                light - dark versions.</p>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-sm d-none d-sm-block float-right btn-light-primary mb-2">
                                                        <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                                                    </button>
                                                    <button class="btn btn-sm d-block d-sm-none btn-block text-center btn-light-primary">
                                                        <i class="cursor-pointer bx bx-edit font-small-3 mr-25"></i><span>Edit</span></button>
                                                </div>
                                            </div>
                                            <!-- user profile nav tabs profile ends -->
                                        </div>
                                    </div>
                                </div>
                                <!-- user profile nav tabs content ends -->
                                <!-- user profile right side content start -->
                                <!-- user profile right side content ends -->
                            </div>
                            <!-- user profile content section start -->
                        </div>
                    </div>
                </section>
                <!-- page user profile ends -->
            </div>
        </div>
    </div>

{{--  Modal Input  --}}
    <div class="modal fade text-left" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">Aktivitas</h5>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical" method="POST" id="formProgressWork" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="employee_id" id="employee_id" value="{{ Auth::user()->employee_id }}">
                        <input type="hidden" name="_method" value="POST" id="method">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">Nama Indikator</label>
                                        <div class="position-relative has-icon-left">
                                            <select class="form-control" id="indicator_id" name="indicator_id">
                                                @foreach($data as $indicator)
                                                    <option value="{{ $indicator->id }}">{{ $indicator->name_indicator }}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-control-position">
                                                <i class="bx bx-id-card"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">Deskripsi Aktivitas</label>
                                        <div class="position-relative has-icon-left">
                                            <textarea class="form-control" name="description" id="description" rows="10" cols="30" placeholder="Input Deskripsi Aktivitas"></textarea>
                                            <div class="form-control-position">
                                                <i class="bx bx-message-square-dots"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">Tanggal Aktivitas</label>
                                        <div class="position-relative has-icon-left">
                                            <input class="form-control" type="date" id="date" name="date">
                                            <div class="form-control-position">
                                                <i class="bx bx-message-square-dots"></i>
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
    <script src="{{ asset('js/progresswork-employee.js') }}"></script>
@endpush
