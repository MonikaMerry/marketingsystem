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
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="phone_number"
                                            value="{{ old('phone_number') }}">
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" ></textarea>
                    </div>
                  </div>
                 --}}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Districts</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="district">
                                            <option selected>Open this select menu</option>
                                            <option>Salem</option>
                                            <option>Erode</option>
                                            <option>Coimbatore</option>
                                            <option>Chennai</option>
                                            <option>Ootty</option>
                                            <option>Bangalore</option>
                                            <option>Madurai</option>
                                            <option>Namakkal</option>
                                            <option>Dindigul</option>
                                            <option>Hosur</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Languages</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="language">
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
                                    <label class="col-sm-2 col-form-label">Submit Button</label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit Lead</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

            {{-- </div> --}}
        </section>





    </main><!-- End #main -->


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
