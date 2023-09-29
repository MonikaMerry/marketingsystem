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
            <h1>Histroy List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/lead-list') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Histroy Lists</h5>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ url('/lead-list') }}">
                                    <button type="button" class="btn btn-secondary me-md-3">Go Back</button>
                                </a>
                            </div>

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

                            {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ url('/create-page') }}">
                                    <button type="button" class="btn btn-secondary me-md-3">History</button>
                                </a>
                            </div> --}}

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">S.No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">District</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Last Contact Time</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($histroy_data as $key => $item)
                                        <tr>
                                            <td scope="row">{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->mobile_number }}</td>
                                            <td>{{ $item->district }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{$item->last_contact_time}}</td>
                                            {{-- <td>
                                                <a href="{{ url('comment-page') }}/{{ $item->id }}"
                                                    class="btn btn-primary">
                                                    <i class="bi bi-chat-dots-fill"></i>
                                                </a>
                                                <a href="{{ url('edit-lead') }}/{{ $item->id }}"
                                                    class="btn btn-warning">Edit
                                                </a>
                                                <a href="{{ url('delete-lead') }}/{{ $item->id }}"
                                                    class="btn btn-danger">Delete
                                                </a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

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
