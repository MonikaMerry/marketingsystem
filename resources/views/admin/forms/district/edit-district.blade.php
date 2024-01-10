<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    @include('admin.layouts.link')

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
            <h1>State List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('state') }}">State</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- General Form Elements -->
        <section class="section">
            {{-- <div class="row"> --}}
            <div class="col-lg">

                <div class="card">
                    <div class="card-body">

                        <h3 class=" card-title">Edit State </h2>

                            {{-- required alert --}}
                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endif

                            {{-- alert message --}}


                            <!-- General Form Elements -->

                            <form action="{{ url('district') }}/{{ $edit_district->id }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">District</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="district"
                                            value="{{ $edit_district->district }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Select State</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example"
                                            name="state_name">

                                            @foreach ($state_list as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ $state->id == $edit_district->state_id ? 'Selected' : '' }}>
                                                    {{ $state->state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update District</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

            {{-- </div> --}}
        </section>





    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- script  --}}
    @include('admin.layouts.script')
    {{-- script ends.. --}}

</body>

</html>
