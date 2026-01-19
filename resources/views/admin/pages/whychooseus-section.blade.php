@extends("admin.layout.admin-master")

@section("title", "Why Choose Us Section | Continuity Care")

@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Why Choose Us Section</li>
                </ol>
            </div>

            @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session("success") }}',
                        timer: 4000,
                        timerProgressBar: true,
                    });
                </script>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Why Choose Us Section</h4>

                            <!-- FIXED: Added name="is_active" -->
                            {{-- <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="statusSwitch" {{
                                    old('is_active', $section->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold" for="statusSwitch">
                                    {{ $section->is_active ? 'Active' : 'Inactive' }}
                                </label>
                            </div> --}}
                        </div>

                        <div class="card-body">
                            <form action="{{ route('whychooseus.section.update', $section) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <ul class="nav nav-tabs mb-4" id="contentTabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                            href="#text-content">Text Content</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#big-card">Main
                                            Card</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                            href="#feature-cards">Feature Cards</a></li>
                                </ul>

                                <div class="tab-content border border-top-0 rounded-bottom p-4 ">
                                    <!-- Text Content -->
                                    <div class="tab-pane fade show active" id="text-content">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Sub Title *</label>
                                                <input type="text" name="sub_title" class="form-control"
                                                    value="{{ old('sub_title', $section->sub_title) }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Main Title *</label>
                                                <input type="text" name="main_title" class="form-control"
                                                    value="{{ old('main_title', $section->main_title) }}" required>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-bold">Main Description *</label>
                                                <textarea name="description_1"
                                                    class="form-control summernote">{{ old('description_1', $section->description_1) }}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-bold">Additional Description</label>
                                                <textarea name="description_2"
                                                    class="form-control summernote">{{ old('description_2', $section->description_2) }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Big Card -->
                                    <div class="tab-pane fade" id="big-card">
                                        <div class="row align-items-center g-4">
                                            <div class="col-md-3 text-center">
                                                <div class="preview-box border rounded-3 p-4 bg-white">
                                                    <img src="{{ $section->big_card_image ? Storage::url($section->big_card_image) : asset('images/default-award.png') }}"
                                                        class="rounded-circle shadow-sm"
                                                        style="width:120px;height:120px;object-fit:cover;">
                                                </div>
                                                <small class="text-muted d-block mt-2">Current Icon</small>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row g-3">
                                                    <div class="col-md-4">
                                                        <label class="form-label fw-bold">Number *</label>
                                                        <input type="text" name="big_card_value" class="form-control"
                                                            value="{{ old('big_card_value', $section->big_card_value) }}"
                                                            required>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label class="form-label fw-bold">Text *</label>
                                                        <input type="text" name="big_card_description" class="form-control"
                                                            value="{{ old('big_card_description', $section->big_card_description) }}"
                                                            required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label fw-bold">Upload New Icon</label>
                                                        <input type="file" name="big_card_image" class="form-control"
                                                            accept="image/*">
                                                        <small class="text-muted">Recommended: 120×120px PNG/SVG</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Feature Cards -->
                                    <div class="tab-pane fade" id="feature-cards">
                                        <div class="row g-4">
                                            @for($i = 1; $i <= 4; $i++)
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="card h-100 shadow-sm border-0">
                                                        <div class="card-body text-center">
                                                            <img src="{{ $section->{"small_card_{$i}_image"} ? Storage::url($section->{"small_card_{$i}_image"}) : asset('images/default-icon.png') }}"
                                                                class="rounded-circle mb-3 shadow-sm"
                                                                style="width:80px;height:80px;object-fit:cover;">
                                                            <input type="text" name="small_card_{{ $i }}_title"
                                                                class="form-control mb-3"
                                                                value="{{ old("small_card_{$i}_title", $section->{"small_card_{$i}_title"}) }}"
                                                                placeholder="Card Title" required>
                                                            <input type="file" name="small_card_{{ $i }}_image"
                                                                class="form-control" accept="image/*">
                                                            <small class="text-muted">80×80px recommended</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-success btn-lg px-6">
                                        Save All Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.summernote').summernote({
                    height: 200

                });

                // Ensure checkbox sends correct value
                $('#statusSwitch').on('change', function () {
                    $(this).val(this.checked ? 1 : 0);
                }).trigger('change');
            });
        </script>
    @endpush
@endsection