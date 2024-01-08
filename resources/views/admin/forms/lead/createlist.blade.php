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
            <h1>Leads List </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/lead-list') }}">Leads</a></li>
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

                        <h3 class=" card-title">Create Lead List </h2>

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
                            <form action="{{ url('create-lead') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="phone_number"
                                            value="{{ old('phone_number') }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">State</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="state" id="state">
                                            <option value="">Open this select menu</option>
                                            @foreach ($states as $item)
                                                <option value="{{ $item->id }}">{{ $item->state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">District</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="districts" id="districts">
                                            <option>Select District</option>
                                        </select>

                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Languages</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="language">
                                            <option selected>Open this select menu</option>
                                            <option>Tamil</option>
                                            <option>English</option>
                                            <option>Malayalam</option>
                                            <option>Hindi</option>
                                            <option>Telungu</option>
                                            <option>kanadam</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Create Lead</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

            {{-- </div> --}}
        </section>





    </main><!-- End #main -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#state').change(function() {
                let sid = jQuery(this).val();
               jQuery.ajax({
                     url:'/getDistrict',
                     type:'post',
                     data:'sid='+sid+'&_token={{csrf_token()}}',
                     success:function (result){
                        jQuery('#districts') .html(result)
                     }
               });
            });
        });
    </script>



    {{-- <br><br><br><br><br> --}}

    {{-- <!-- ======= Footer ======= -->
    @include('admin.layouts.footer')
    <!-- End Footer --> --}}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- script  --}}
    @include('admin.layouts.script')
    {{-- script ends.. --}}

</body>

</html>
