<div>
    <section class="section">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <h3 class=" card-title">Create Lead List </h2>
                        {{-- required alert --}}

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

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">SELECT STATE</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="state_id" wire:model="state_id"
                                        wire:change="loadDistricts">
                                        <option value="">SELECT STATE</option>
                                        @if (count($states) > 0)
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ strtoupper($state->state) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">SELECT DISTRICT</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="district_id">
                                        <option value="">SELECT DISTRICT</option>
                                        @if ($districts)
                                            @foreach ($districts as $distrcit)
                                                <option value="{{ $distrcit->id }}">{{ $distrcit->district }}</option>
                                            @endforeach
                                        @endif
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
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Create Lead</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </section>
</div>
