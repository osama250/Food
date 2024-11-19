@isset($meal)
    @method('PUT')
    <input type="hidden" value="{{ $meal->id }}" name="id">
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
            <div class="tab-pane fade {{ LaravelLocalization::getCurrentLocale() == $name ? 'show active' : '' }}"
                id="{{ $name }}" role="tabpanel" aria-labelledby="{{ $name }}-tab">
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.name') }}</label>
                    <div class="col-lg-8">
                        <input type="text" name="{{ $name }}[name]"
                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                            value="{{ old($name . '.name', isset($meal) ? $meal->getTranslation($name)->name : '') }}"
                            placeholder="{{ __('lang.name') }}">
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.description') }}</label>
                    <div class="col-lg-8">
                        <textarea name="{{ $name }}[description]"
                            class="summernote form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                            placeholder="{{ __('lang.description') }}">{{ old($name . '.description', isset($meal) ? $meal->getTranslation($name)->description : '') }}</textarea>
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
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.price') }}</label>
            <div class="col-lg-8">
                <input type="number" name="price" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                    value="{{ old('price', isset($meal) ? $meal->price : '') }}" placeholder="{{ __('lang.price') }}">
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('lang.category') }}</label>
            <div class="col-lg-8">
                <select name="category_id" id="category_id" class="form-control form-control-lg form-control-solid">
                    <option value="">{{ __('lang.select_category') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($meal) && $meal->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('lang.salad') }}</label>
            <div class="col-lg-8">
                <select name="salad_id" id="salad_id" class="form-control form-control-lg form-control-solid">
                    <option value="">{{ __('lang.select_salad') }}</option>
                    @foreach ($salads as $salad)
                        <option value="{{ $salad->id }}" {{ isset($meal) && $meal->salad_id == $salad->id ? 'selected' : '' }}>{{ $salad->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('lang.rice') }}</label>
            <div class="col-lg-8">
                <select name="rice_id" id="rice_id" class="form-control form-control-lg form-control-solid">
                    <option value="">{{ __('lang.select_rice') }}</option>
                    @foreach ($rices as $rice)
                        <option value="{{ $rice->id }}" {{ isset($meal) && $meal->rice_id == $rice->id ? 'selected' : '' }}>{{ $rice->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('lang.drink') }}</label>
            <div class="col-lg-8">
                <select name="drink_id" id="drink_id" class="form-control form-control-lg form-control-solid">
                    <option value="">{{ __('lang.select_drink') }}</option>
                    @foreach ($drinks as $drink)
                        <option value="{{ $drink->id }}" {{ isset($meal) && $meal->drink_id == $drink->id ? 'selected' : '' }}>{{ $drink->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('lang.bread') }}</label>
            <div class="col-lg-8">
                <select name="bread_id" id="bread_id" class="form-control form-control-lg form-control-solid">
                    <option value="">{{ __('lang.select_bread') }}</option>
                    @foreach ($breads as $bread)
                        <option value="{{ $bread->id }}" {{ isset($meal) && $meal->bread_id == $bread->id ? 'selected' : '' }}>{{ $bread->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @foreach(['diabetes', 'hypertension', 'heart_disease', 'asthma', 'cancer'] as $condition)
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('lang.' . $condition) }}</label>
                <div class="col-lg-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $condition }}" value="1" {{ isset($meal) && $meal->$condition ? 'checked' : '' }} onclick="this.checked = true">
                        <label class="form-check-label">{{ __('lang.yes') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $condition }}" value="0" {{ isset($meal) && !$meal->$condition ? 'checked' : '' }} onclick="this.checked = true">
                        <label class="form-check-label">{{ __('lang.no') }}</label>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">
                {{ __('lang.photo') }}
            </label>
            <div class="col-lg-8">
                <div class="image-input image-input-empty image-input-outline image-input-placeholder"
                    data-kt-image-input="true">
                    <div class="image-input-wrapper w-125px h-125px"
                        @isset($meal->image)
                        style='background-image:url({{ $meal->image }})'@endisset>
                    </div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
                        data-bs-original-title="Change avatar" data-kt-initialized="1">
                        <i class="ki-duotone ki-pencil fs-7">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="file" name="image" accept=".png, .jpg, .jpeg">
                        <input type="hidden" name="avatar_remove">
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
                        data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                        <i class="ki-duotone ki-cross fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
                        data-bs-original-title="Remove avatar" data-kt-initialized="1">
                        <i class="ki-duotone ki-cross fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                </div>
                <div class="form-text">{{ __('lang.allowedsettingtypes') }}</div>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>
        </div>
    </div>
</div>
