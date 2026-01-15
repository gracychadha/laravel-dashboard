@extends("admin.layout.admin-master")
@section("title", "About Section (Know Us Better) | Diagnoedge")

@section("content")
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">About Section – Know Us Better</li>
            </ol>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    timer: 4000,
                    timerProgressBar: true
                });
            </script>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">About Section – "Know Us Better"</h4>
                {{-- <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active" id="statusSwitch"
                           value="1" {{ old('is_active', $section->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold text-{{ $section->is_active ? 'success' : 'danger' }}"
                           for="statusSwitch">
                        {{ $section->is_active ? 'Active' : 'Inactive' }}
                    </label>
                </div> --}}
            </div>

            <div class="card-body">
                <form action="{{ route('about-section-two.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#text">Text Content</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#images">Images & Icons</a>
                        </li>
                    </ul>

                    <div class="tab-content p-4 border border-top-0 rounded-bottom">

                        <!-- Text Content Tab -->
                        <div class="tab-pane fade show active" id="text">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                           placeholder="e.g. Know Us Better"
                                           value="{{ old('sub_title', $section->sub_title) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Main Title</label>
                                    <input type="text" name="main_title" class="form-control"
                                           placeholder="e.g. Delivering Precision Diagnostics With Compassion"
                                           value="{{ old('main_title', $section->main_title) }}" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Main Description <span class="text-danger">*</span></label>
                                    <textarea name="description_1" class="form-control summernote" required>
                                        {{ old('description_1', $section->description_1) }}
                                    </textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Additional Description (Optional)</label>
                                    <textarea name="description_2" class="form-control summernote">
                                        {{ old('description_2', $section->description_2) }}
                                    </textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Founded Year</label>
                                    <input type="text" name="founded_year" class="form-control"
                                           placeholder="e.g. 1990"
                                           value="{{ old('founded_year', $section->founded_year) }}" required>
                                </div>
                            </div>
                        </div>

                        <!-- Images Tab -->
                        <div class="tab-pane fade" id="images">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Top Image (Main Photo)</label>
                                    <input type="file" name="image_top" class="form-control" accept="image/*">
                                    @if($section->image_top)
                                        <div class="mt-2">
                                            <img src="{{ Storage::url($section->image_top) }}" class="img-thumbnail" width="250" alt="Top Image">
                                            <small class="text-muted d-block">Current image</small>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Bottom Image (Small Photo)</label>
                                    <input type="file" name="image_bottom" class="form-control" accept="image/*">
                                    @if($section->image_bottom)
                                        <div class="mt-2">
                                            <img src="{{ Storage::url($section->image_bottom) }}" class="img-thumbnail" width="200" alt="Bottom Image">
                                            <small class="text-muted d-block">Current image</small>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Founded Year Icon</label>
                                    <input type="file" name="founded_image" class="form-control" accept="image/*,.svg">
                                    @if($section->founded_image)
                                        <div class="mt-2 text-center">
                                            <img src="{{ Storage::url($section->founded_image) }}" width="80" alt="Founded Icon">
                                            <small class="text-muted d-block">Current icon</small>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Background Shape 1</label>
                                    <input type="file" name="shape_1" class="form-control" accept="image/*">
                                    @if($section->shape_1)
                                        <div class="mt-2">
                                            <img src="{{ Storage::url($section->shape_1) }}" width="120" alt="Shape 1">
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Background Shape 2</label>
                                    <input type="file" name="shape_2" class="form-control" accept="image/*">
                                    @if($section->shape_2)
                                        <div class="mt-2">
                                            <img src="{{ Storage::url($section->shape_2) }}" width="120" alt="Shape 2">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-success btn-lg px-6">
                            <i class="fas fa-save me-2"></i> Save All Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize Summernote with placeholder
        $('.summernote').summernote({
            height: 220,
            placeholder: 'Write your content here...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ],
            callbacks: {
                onInit: function() {
                    // Fix placeholder not showing when value exists
                    if ($(this).summernote('code').trim() === '') {
                        $(this).summernote('code', '');
                    }
                }
            }
        });

        // Ensure checkbox sends correct value
        $('#statusSwitch').on('change', function() {
            $(this).val(this.checked ? 1 : 0);
        }).trigger('change');
    });
</script>
@endpush