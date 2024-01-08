<div>
    <div class="col-lg">

        <div class="card">
            <div class="card-body">

                <h3 class=" card-title">Edit Lead List </h2>

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

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- General Form Elements -->
                    <form action="{{ url('update-lead') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $edit_lead->id }}">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input wire:model="name" type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="phone_number"
                                    wire:model="mobile_number">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">States</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="state_id" wire:model="state_id"
                                    wire:change="loadDistricts()">
                                    <option value="">SELECT STATE</option>
                                    @if ($states)
                                        @foreach ($states as $item)
                                            <option value="{{ $item->id }}">{{ $item->state }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Districts</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="district_id"
                                    wire:model="district_id">
                                    <option value="">SELECT DISTRICT</option>
                                    @if ($districts)
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->district }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Languages</label>
                            <div class="col-sm-10">
                                <select wire:model="language" class="form-select" aria-label="Default select example"
                                    name="language">
                                    <option value="">SELECT LANGUANGE</option>
                                    <option value="tamil"
                                        @if ($edit_lead->language == 'tamil') @selected(true) @endif>Tamil
                                    </option>
                                    <option value="english"
                                        @if ($edit_lead->language == 'english') @selected(true) @endif>English
                                    </option>
                                    <option value="malayalam"
                                        @if ($edit_lead->language == 'malayalam') @selected(true) @endif>Malayalam
                                    </option>
                                    <option value="hindi"
                                        @if ($edit_lead->language == 'hindi') @selected(true) @endif>Hindi
                                    </option>
                                    <option value="telungu"
                                        @if ($edit_lead->language == 'telungu') @selected(true) @endif>Telungu
                                    </option>
                                    <option value="kanadam"
                                        @if ($edit_lead->language == 'kanadam') @selected(true) @endif>kanadam
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Submit Button</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">update Lead</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

            </div>
        </div>

    </div>
</div>
