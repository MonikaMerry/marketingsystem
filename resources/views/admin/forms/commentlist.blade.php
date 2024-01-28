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
            <h1>Comment's List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('lead-list') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Create Comment</h5>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif
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
                            {{-- create comment --}}

                            <!-- General Form Elements -->
                            <form action="{{ url('create-comment') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Select Status :</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="status">
                                            <option value="">select status</option>
                                            <option value="activated">activated</option>
                                            <option value="invalid_number">invalid_number</option>
                                            <option value="not_intrested">not_intrested</option>
                                            <option value="intrested">intrested</option>
                                            <option value="contacted">contacted</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Comment :</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="comment"></textarea>
                                    </div>
                                </div>


                                <input type="hidden" value="{{ $lead_id }}" name="lead_id">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        {{-- <a href="{{ url('/') }}"> --}}
                                        <button type="submit" class="btn btn-success me-md-3">Add comment</button>
                                        {{-- </a> --}}
                                        <a href="{{ url('go-back') }}" class="btn btn-secondary me-md-3">
                                            go back
                                        </a>
                                    </div>

                                </div>

                            </form><!-- End General Form Elements -->
                            <div style="overflow-x:auto;">
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <th scope="col">S.No</th>
                                        <th scope="col">comment</th>
                                        <th scope="col">Commented by</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comment_list as $key => $items)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $items->comment }}</td>
                                                <td>{{ $items->userNames->name }}</td>

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
