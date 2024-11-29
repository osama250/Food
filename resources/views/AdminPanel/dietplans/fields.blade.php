@isset($dietplan)
    @method('PUT')
    <input type="hidden" value="{{ $dietplan->id }}" name="id">
@endisset
@csrf
<div class="card-body border-top p-9">
    <ul class="nav nav-light-success nav-pills" id="myTab" role="tablist">

        @foreach (LaravelLocalization::getSupportedLocales() as $name => $value)
            <li class="nav-item" data-bs-toggle="tab">
                <a class="nav-link {{ LaravelLocalization::getCurrentLocale() == $name ? 'active' : '' }}"
                    id="{{ $name }}-tab" data-bs-toggle="tab" href="#{{ $name }}" role="tab"
                    aria-controls="{{ $name }}"
                    aria-selected="{{ LaravelLocalization::getCurrentLocale() == $name ? 'true' : 'false' }}">{{ $value['native'] }}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content mt-5" id="myTabContent">
        @foreach (LaravelLocalization::getSupportedLocales() as $name => $value)
        <div class="tab-pane fade {{ LaravelLocalization::getCurrentLocale() == $name ? 'show active' : '' }} "
            id="{{ $name }}" role="tabpanel" aria-labelledby="{{ $name }}-tab">
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.name') }}</label>
                <div class="col-lg-8">
                    <input type="text" name="{{ $name }}[name]"
                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                        value="{{ old($name . '.name', isset($dietplan) ? $dietplan->getTranslation($name)->name : '') }}"
                        placeholder="{{ __('lang.name') }}">
                </div>
            </div>
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.description') }}</label>
                <div class="col-lg-8">
                    <textarea name="{{ $name }}[description]"
                        class="summernote form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                        placeholder="{{ __('lang.description') }}">{{ old($name . '.description', isset($dietplan) ? $dietplan->getTranslation($name)->description : '') }}</textarea>
                    @if ($errors->has("{$name}.description"))
                        <div class="fv-plugins-message-container invalid-feedback">
                            {{ $errors->first("{$name}.description") }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.disease') }}</label>
            <div class="col-lg-8">
                <select name="disease" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                    <option value="none" {{ old('disease', isset($dietplan) ? $dietplan->disease : '') == 'none' ? 'selected' : '' }}>{{ __('None') }}</option>
                    <option value="diabetes" {{ old('disease', isset($dietplan) ? $dietplan->disease : '') == 'diabetes' ? 'selected' : '' }}>{{ __('Diabetes') }}</option>
                    <option value="hypertension" {{ old('disease', isset($dietplan) ? $dietplan->disease : '') == 'hypertension' ? 'selected' : '' }}>{{ __('Hypertension') }}</option>
                    <option value="heart_disease" {{ old('disease', isset($dietplan) ? $dietplan->disease : '') == 'heart_disease' ? 'selected' : '' }}>{{ __('Heart Disease') }}</option>
                    <option value="asthma" {{ old('disease', isset($dietplan) ? $dietplan->disease : '') == 'asthma' ? 'selected' : '' }}>{{ __('Asthma') }}</option>
                    <option value="cancer" {{ old('disease', isset($dietplan) ? $dietplan->disease : '') == 'cancer' ? 'selected' : '' }}>{{ __('Cancer') }}</option>
                </select>
                @if ($errors->has('disease'))
                    <div class="fv-plugins-message-container invalid-feedback">
                        {{ $errors->first('disease') }}
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
