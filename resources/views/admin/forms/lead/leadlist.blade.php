<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('admin.layouts.link')
    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    @include('admin.layouts.header')
    <!-- End Header -->

    {{-- sidebar --}}
    @include('admin.layouts.sidebar')
    {{-- sidebar ends... --}}

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Leads List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Lead's Lists</h5>

                            {{-- delete lead --}}
                            @if (Session::has('danger'))
                                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                    {{ Session::get('danger') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            {{-- updated lead --}}

                            @if (Session::has('info'))
                                <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
                                    {{ Session::get('info') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            {{-- created lead --}}

                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                    {{ Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ url('/create-page') }}">
                                    <button type="button" class="btn btn-success me-md-3">Create lead</button>
                                </a>
                                <a href="{{ url('/histroy-page') }}">
                                    <button type="button" class="btn btn-secondary me-md-3">History</button>
                                </a>
                                <a href="{{ url('/import-page') }}">
                                    <button type="button" class="btn btn-info me-md-3">Import</button>
                                </a>
                                <a href="{{ url('/duplicate-page') }}">
                                    <button type="button" class="btn btn-warning me-md-3">Duplicate Romove</button>
                                </a>
                            </div>

                            <!-- Table with stripped rows -->
                            <div style="overflow-x:auto;">
                                <table class="table datatable">

                                    <thead>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">State</th>
                                            <th scope="col">District</th>
                                            <th scope="col">Language</th>
                                            <th scope="col">Status</th>
                                            <th scope="col-md-6">Last Contact Time</th>
                                            <th scope="col-6">Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_data as $key => $item)
                                            <tr>
                                                <td scope="row">{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->mobile_number }}</td>
                                                <td>{{ $item->stateData->state }}</td>
                                                <td>{{ $item->districtData->district }}</td>
                                                <td>{{ $item->language }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ Carbon\Carbon::parse($item->last_contact_time)->diffForHumans() }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('comment-page') }}/{{ $item->id }}"
                                                        class="btn btn-primary mb-1">
                                                        <i class="bi bi-chat-dots-fill"></i>
                                                    </a>
                                                    <a href="{{ url('edit-lead') }}/{{ $item->id }}"
                                                        class="btn btn-warning mb-1">Edit
                                                    </a>
                                                    <a href="{{ url('delete-lead') }}/{{ $item->id }}"
                                                        class="btn btn-danger mb-1">Del
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>




    </main><!-- End #main -->


    <br><br>

    <!-- ======= Footer ======= -->
    @include('admin.layouts.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- script  --}}
    @include('admin.layouts.script')
    {{-- script ends.. --}}

</body>

</html>
