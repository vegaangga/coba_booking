<div>
    <div class="form-group row">
        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

        <div class="col-md-6">
            <select wire:model="selectedPelabuhan1" class="form-control">
                <option value="" selected>Pilih Pelabuhan Asal</option>
                @foreach($pelabuhans1 as $pelabuhan1)
                    <option value="{{ $pelabuhan1->kode_pelabuhan}}">{{ $pelabuhan1->nama_pelabuhan }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if (!is_null($selectedPelabuhan1))
        <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

            <div class="col-md-6">
                <select wire:model="selectedPelabuhan2" class="form-control">
                    <option value="" selected>Choose state</option>
                    @foreach($pelabuhans2 as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    @if (!is_null($selectedPelabuhan2))
        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

            <div class="col-md-6">
                <select wire:model="selectedJadwal" class="form-control" name="city_id">
                    <option value="" selected>Choose city</option>
                    @foreach($jadwal as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>