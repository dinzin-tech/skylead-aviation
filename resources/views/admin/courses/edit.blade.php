@extends('admin.layout.app')

@section('title', 'Edit Course')
@section('header', 'Edit Course: ' . $course->title)

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Course Title *</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $course->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug *</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $course->slug) }}" required>
                        <small class="text-muted">URL-friendly version of the title</small>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Course Type *</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="regular_course" {{ $course->type === 'regular_course' ? 'selected' : '' }}>Regular Course</option>
                            <option value="cadet_program" {{ $course->type === 'cadet_program' ? 'selected' : '' }}>Cadet Program</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="hero_description" class="form-label">Hero Description *</label>
                        <textarea class="form-control" id="hero_description" name="hero_description" rows="4" required>{{ old('hero_description', $course->hero_description) }}</textarea>
                    </div>

                    <!-- Cadet Program Fields - Always Visible -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="program_tag" class="form-label">Program Tag</label>
                                <input type="text" class="form-control" id="program_tag" name="program_tag" value="{{ old('program_tag', $course->program_tag) }}" placeholder="e.g., Air Asia, Singapore Airlines">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="program_level" class="form-label">Program Level</label>
                                <select class="form-control" id="program_level" name="program_level">
                                    <option value="">Select Level</option>
                                    <option value="beginner" {{ old('program_level', $course->program_level) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="intermediate" {{ old('program_level', $course->program_level) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="advanced" {{ old('program_level', $course->program_level) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                    <option value="professional" {{ old('program_level', $course->program_level) == 'professional' ? 'selected' : '' }}>Professional</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="hero_description_1" class="form-label">Hero Description 1</label>
                        <textarea class="form-control" id="hero_description_1" name="hero_description_1" rows="4">{{ old('hero_description_1', $course->hero_description_1) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="hero_description_2" class="form-label">Hero Description 2</label>
                        <textarea class="form-control" id="hero_description_2" name="hero_description_2" rows="4">{{ old('hero_description_2', $course->hero_description_2) }}</textarea>
                        <small class="text-muted">This will be shown when user clicks "View Details"</small>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $course->duration) }}" placeholder="e.g., 6 months, 1 year">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="number" class="form-control" id="rating" name="rating" value="{{ old('rating', $course->rating) }}" min="0" max="5" step="0.1" placeholder="0.0 - 5.0">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="number_of_students" class="form-label">Number of Students</label>
                                <input type="number" class="form-control" id="number_of_students" name="number_of_students" value="{{ old('number_of_students', $course->number_of_students) }}" min="0">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="video_url" class="form-label">Video URL</label>
                        <input type="url" class="form-control" id="video_url" name="video_url" value="{{ old('video_url', $course->video_url) }}">
                    </div>

                    <!-- Hero Image Upload -->
                    <div class="mb-3">
                        <label for="hero_image" class="form-label">Hero Image</label>
                        <input type="file" class="form-control" id="hero_image" name="hero_image" accept="image/*">
                        @if($course->hero_image)
                            <div class="mt-2">
                                <img src="{{ asset($course->hero_image) }}" alt="Current hero image" style="max-width: 200px; max-height: 150px;" class="img-thumbnail">
                                <small class="d-block text-muted">Current image</small>
                            </div>
                        @endif
                        <small class="text-muted">Recommended size: 800x600px. Formats: JPG, PNG, WEBP</small>
                    </div>

                    <!-- Benefits Section -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Benefits</h6>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addBenefit()">
                                <i class="bi bi-plus"></i> Add Benefit
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="benefits-container">
                                @php
                                    $benefits = old('benefits', $course->benefits ?? []);
                                    $benefitIndex = 0;
                                @endphp
                                @if(!empty($benefits))
                                    @foreach($benefits as $benefit)
                                        <div class="benefit-item mb-3 p-3 border rounded">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="benefits[{{ $benefitIndex }}][title]" value="{{ $benefit['title'] ?? '' }}" placeholder="Guaranteed Job Placement">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" class="form-control" name="benefits[{{ $benefitIndex }}][description]" value="{{ $benefit['description'] ?? '' }}" placeholder="Description here">
                                                </div>
                                                <div class="col-md-1 d-flex align-items-end">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeBenefit(this)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @php $benefitIndex++; @endphp
                                    @endforeach
                                @else
                                    <div class="benefit-item mb-3 p-3 border rounded">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="benefits[0][title]" placeholder="Guaranteed Job Placement">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Description</label>
                                                <input type="text" class="form-control" name="benefits[0][description]" placeholder="Description here">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-sm btn-danger" onclick="removeBenefit(this)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Requirements Section -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Requirements</h6>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addRequirement()">
                                <i class="bi bi-plus"></i> Add Requirement
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="requirements-container">
                                @php
                                    $requirements = old('requirements', $course->requirements ?? []);
                                    $requirementIndex = 0;
                                @endphp
                                @if(!empty($requirements))
                                    @foreach($requirements as $requirement)
                                        <div class="requirement-item mb-3 p-3 border rounded">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">Icon</label>
                                                    <select class="form-control" name="requirements[{{ $requirementIndex }}][icon]">
                                                        <option value="ti-user" {{ ($requirement['icon'] ?? '') == 'ti-user' ? 'selected' : '' }}>User</option>
                                                        <option value="ti-file" {{ ($requirement['icon'] ?? '') == 'ti-file' ? 'selected' : '' }}>File</option>
                                                        <option value="ti-book" {{ ($requirement['icon'] ?? '') == 'ti-book' ? 'selected' : '' }}>Book</option>
                                                        <option value="ti-heart" {{ ($requirement['icon'] ?? '') == 'ti-heart' ? 'selected' : '' }}>Heart</option>
                                                        <option value="ti-ruler-pencil" {{ ($requirement['icon'] ?? '') == 'ti-ruler-pencil' ? 'selected' : '' }}>Ruler Pencil</option>
                                                        <option value="ti-world" {{ ($requirement['icon'] ?? '') == 'ti-world' ? 'selected' : '' }}>World</option>
                                                        <option value="ti-home" {{ ($requirement['icon'] ?? '') == 'ti-home' ? 'selected' : '' }}>Home</option>
                                                        <option value="ti-location-pin" {{ ($requirement['icon'] ?? '') == 'ti-location-pin' ? 'selected' : '' }}>Location</option>
                                                        <option value="ti-check-box" {{ ($requirement['icon'] ?? '') == 'ti-check-box' ? 'selected' : '' }}>Check Box</option>
                                                        <option value="ti-flag" {{ ($requirement['icon'] ?? '') == 'ti-flag' ? 'selected' : '' }}>Flag</option>
                                                        <option value="ti-star" {{ ($requirement['icon'] ?? '') == 'ti-star' ? 'selected' : '' }}>Star</option>
                                                        <option value="ti-cup" {{ ($requirement['icon'] ?? '') == 'ti-cup' ? 'selected' : '' }}>Cup</option>
                                                        <option value="ti-medall" {{ ($requirement['icon'] ?? '') == 'ti-medall' ? 'selected' : '' }}>Medal</option>
                                                        <option value="ti-shield" {{ ($requirement['icon'] ?? '') == 'ti-shield' ? 'selected' : '' }}>Shield</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Title *</label>
                                                    <input type="text" class="form-control" name="requirements[{{ $requirementIndex }}][title]" value="{{ $requirement['title'] ?? '' }}" placeholder="Age Requirement" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Description *</label>
                                                    <input type="text" class="form-control" name="requirements[{{ $requirementIndex }}][description]" value="{{ $requirement['description'] ?? '' }}" placeholder="Description here" required>
                                                </div>
                                                <div class="col-md-1 d-flex align-items-end">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeRequirement(this)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @php $requirementIndex++; @endphp
                                    @endforeach
                                @else
                                    <div class="requirement-item mb-3 p-3 border rounded">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Icon</label>
                                                <select class="form-control" name="requirements[0][icon]">
                                                    <option value="ti-user">User</option>
                                                    <option value="ti-file">File</option>
                                                    <option value="ti-book">Book</option>
                                                    <option value="ti-heart">Heart</option>
                                                    <option value="ti-ruler-pencil">Ruler Pencil</option>
                                                    <option value="ti-world">World</option>
                                                    <option value="ti-home">Home</option>
                                                    <option value="ti-location-pin">Location</option>
                                                    <option value="ti-check-box">Check Box</option>
                                                    <option value="ti-flag">Flag</option>
                                                    <option value="ti-star">Star</option>
                                                    <option value="ti-cup">Cup</option>
                                                    <option value="ti-medall">Medal</option>
                                                    <option value="ti-shield">Shield</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Title *</label>
                                                <input type="text" class="form-control" name="requirements[0][title]" placeholder="Age Requirement" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Description *</label>
                                                <input type="text" class="form-control" name="requirements[0][description]" placeholder="Description here" required>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-sm btn-danger" onclick="removeRequirement(this)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Selection Process Section -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Selection Process</h6>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addSelectionProcess()">
                                <i class="bi bi-plus"></i> Add Step
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="selection-process-container">
                                @php
                                    $selectionProcess = old('selection_process', $course->selection_process ?? []);
                                    $processIndex = 0;
                                @endphp
                                @if(!empty($selectionProcess))
                                    @foreach($selectionProcess as $process)
                                        <div class="process-item mb-3 p-3 border rounded">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">Icon</label>
                                                    <select class="form-control" name="selection_process[{{ $processIndex }}][icon]">
                                                        <option value="ti-file" {{ ($process['icon'] ?? '') == 'ti-file' ? 'selected' : '' }}>File</option>
                                                        <option value="ti-user" {{ ($process['icon'] ?? '') == 'ti-user' ? 'selected' : '' }}>User</option>
                                                        <option value="ti-pencil-alt" {{ ($process['icon'] ?? '') == 'ti-pencil-alt' ? 'selected' : '' }}>Pencil</option>
                                                        <option value="ti-comments" {{ ($process['icon'] ?? '') == 'ti-comments' ? 'selected' : '' }}>Comments</option>
                                                        <option value="ti-heart" {{ ($process['icon'] ?? '') == 'ti-heart' ? 'selected' : '' }}>Heart</option>
                                                        <option value="ti-check-box" {{ ($process['icon'] ?? '') == 'ti-check-box' ? 'selected' : '' }}>Check Box</option>
                                                        <option value="ti-flag" {{ ($process['icon'] ?? '') == 'ti-flag' ? 'selected' : '' }}>Flag</option>
                                                        <option value="ti-star" {{ ($process['icon'] ?? '') == 'ti-star' ? 'selected' : '' }}>Star</option>
                                                        <option value="ti-medall" {{ ($process['icon'] ?? '') == 'ti-medall' ? 'selected' : '' }}>Medal</option>
                                                        <option value="ti-shield" {{ ($process['icon'] ?? '') == 'ti-shield' ? 'selected' : '' }}>Shield</option>
                                                        <option value="ti-clipboard" {{ ($process['icon'] ?? '') == 'ti-clipboard' ? 'selected' : '' }}>Clipboard</option>
                                                        <option value="ti-calendar" {{ ($process['icon'] ?? '') == 'ti-calendar' ? 'selected' : '' }}>Calendar</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Title *</label>
                                                    <input type="text" class="form-control" name="selection_process[{{ $processIndex }}][title]" value="{{ $process['title'] ?? '' }}" placeholder="Online Application" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Description *</label>
                                                    <input type="text" class="form-control" name="selection_process[{{ $processIndex }}][description]" value="{{ $process['description'] ?? '' }}" placeholder="Description here" required>
                                                </div>
                                                <div class="col-md-1 d-flex align-items-end">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeSelectionProcess(this)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @php $processIndex++; @endphp
                                    @endforeach
                                @else
                                    <div class="process-item mb-3 p-3 border rounded">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Icon</label>
                                                <select class="form-control" name="selection_process[0][icon]">
                                                    <option value="ti-file">File</option>
                                                    <option value="ti-user">User</option>
                                                    <option value="ti-pencil-alt">Pencil</option>
                                                    <option value="ti-comments">Comments</option>
                                                    <option value="ti-heart">Heart</option>
                                                    <option value="ti-check-box">Check Box</option>
                                                    <option value="ti-flag">Flag</option>
                                                    <option value="ti-star">Star</option>
                                                    <option value="ti-medall">Medal</option>
                                                    <option value="ti-shield">Shield</option>
                                                    <option value="ti-clipboard">Clipboard</option>
                                                    <option value="ti-calendar">Calendar</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Title *</label>
                                                <input type="text" class="form-control" name="selection_process[0][title]" placeholder="Online Application" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Description *</label>
                                                <input type="text" class="form-control" name="selection_process[0][description]" placeholder="Description here" required>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-sm btn-danger" onclick="removeSelectionProcess(this)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Training Stages Section -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Training Stages</h6>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addTrainingStage()">
                                <i class="bi bi-plus"></i> Add Stage
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="training-stages-container">
                                @php
                                    $trainingStages = old('training_stages', $course->training_stages ?? []);
                                    $stageIndex = 0;
                                @endphp
                                @if(!empty($trainingStages))
                                    @foreach($trainingStages as $stage)
                                        <div class="stage-item mb-3 p-3 border rounded">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="form-label">Stage Number *</label>
                                                    <input type="number" class="form-control" name="training_stages[{{ $stageIndex }}][stageNumber]" value="{{ $stage['stageNumber'] ?? ($stageIndex + 1) }}" min="1" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Title *</label>
                                                    <input type="text" class="form-control" name="training_stages[{{ $stageIndex }}][title]" value="{{ $stage['title'] ?? '' }}" placeholder="Ground School" required>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label">Description *</label>
                                                    <input type="text" class="form-control" name="training_stages[{{ $stageIndex }}][description]" value="{{ $stage['description'] ?? '' }}" placeholder="Description here" required>
                                                </div>
                                                <div class="col-md-1 d-flex align-items-end">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeTrainingStage(this)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @php $stageIndex++; @endphp
                                    @endforeach
                                @else
                                    <div class="stage-item mb-3 p-3 border rounded">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="form-label">Stage Number *</label>
                                                <input type="number" class="form-control" name="training_stages[0][stageNumber]" value="1" min="1" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Title *</label>
                                                <input type="text" class="form-control" name="training_stages[0][title]" placeholder="Ground School" required>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label">Description *</label>
                                                <input type="text" class="form-control" name="training_stages[0][description]" placeholder="Description here" required>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-sm btn-danger" onclick="removeTrainingStage(this)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Course Outline Section -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Course Outline</h6>
                            <button type="button" class="btn btn-sm btn-primary" onclick="addCourseOutline()">
                                <i class="bi bi-plus"></i> Add Lesson
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="course-outline-container">
                                @php
                                    $outline = old('outline', $course->outline ?? []);
                                    $outlineIndex = 0;
                                @endphp
                                @if(!empty($outline))
                                    @foreach($outline as $lesson)
                                        <div class="outline-item mb-3 p-3 border rounded">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label class="form-label">Lesson Title *</label>
                                                    <input type="text" class="form-control" name="outline[{{ $outlineIndex }}][title]" value="{{ $lesson['title'] ?? '' }}" placeholder="Introduction Lesson" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Link</label>
                                                    <input type="text" class="form-control" name="outline[{{ $outlineIndex }}][link]" value="{{ $lesson['link'] ?? '#' }}" placeholder="#">
                                                </div>
                                                <div class="col-md-1 d-flex align-items-end">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeCourseOutline(this)">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @php $outlineIndex++; @endphp
                                    @endforeach
                                @else
                                    <div class="outline-item mb-3 p-3 border rounded">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label class="form-label">Lesson Title *</label>
                                                <input type="text" class="form-control" name="outline[0][title]" placeholder="Introduction Lesson" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Link</label>
                                                <input type="text" class="form-control" name="outline[0][link]" placeholder="#" value="#">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-sm btn-danger" onclick="removeCourseOutline(this)">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Course Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="fee" class="form-label">Course Fee ($)</label>
                                <input type="number" class="form-control" id="fee" name="fee" value="{{ old('fee', $course->fee) }}" step="0.01">
                            </div>

                            <div class="mb-3">
                                <label for="available_seats" class="form-label">Available Seats</label>
                                <input type="number" class="form-control" id="available_seats" name="available_seats" value="{{ old('available_seats', $course->available_seats) }}">
                            </div>

                            <div class="mb-3">
                                <label for="schedule" class="form-label">Schedule</label>
                                <input type="text" class="form-control" id="schedule" name="schedule" value="{{ old('schedule', $course->schedule) }}" placeholder="2.00 pm to 4.00 pm">
                            </div>

                            <div class="mb-3">
                                <label for="objectives" class="form-label">Objectives</label>
                                <textarea class="form-control" id="objectives" name="objectives" rows="4">{{ old('objectives', $course->objectives) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="eligibility" class="form-label">Eligibility</label>
                                <textarea class="form-control" id="eligibility" name="eligibility" rows="4">{{ old('eligibility', $course->eligibility) }}</textarea>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="published" name="published" value="1" {{ $course->published ? 'checked' : '' }}>
                                <label class="form-check-label" for="published">Published</label>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="mb-0">Course Information</h6>
                        </div>
                        <div class="card-body">
                            <p><strong>Created:</strong> {{ $course->created_at->format('M d, Y') }}</p>
                            <p><strong>Last Updated:</strong> {{ $course->updated_at->format('M d, Y') }}</p>
                            <p><strong>Slug:</strong> {{ $course->slug }}</p>
                            <p><strong>Type:</strong> {{ $course->type === 'cadet_program' ? 'Cadet Program' : 'Regular Course' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Course</button>
                <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let requirementCount = {{ !empty(old('requirements', $course->requirements)) ? count(old('requirements', $course->requirements)) : 1 }};
    let processCount = {{ !empty(old('selection_process', $course->selection_process)) ? count(old('selection_process', $course->selection_process)) : 1 }};
    let stageCount = {{ !empty(old('training_stages', $course->training_stages)) ? count(old('training_stages', $course->training_stages)) : 1 }};
    let outlineCount = {{ !empty(old('outline', $course->outline)) ? count(old('outline', $course->outline)) : 1 }};
    let benefitCount = {{ !empty(old('benefits', $course->benefits)) ? count(old('benefits', $course->benefits)) : 1 }};

    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const title = this.value;
        const slug = title.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '') // Remove invalid chars
            .replace(/\s+/g, '-')        // Replace spaces with -
            .replace(/-+/g, '-')         // Replace multiple - with single -
            .trim();
        
        document.getElementById('slug').value = slug;
    });

    // Benefits Functions
    function addBenefit() {
        const container = document.getElementById('benefits-container');
        const newItem = document.createElement('div');
        newItem.className = 'benefit-item mb-3 p-3 border rounded';
        newItem.innerHTML = `
            <div class="row">
                <div class="col-md-5">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="benefits[${benefitCount}][title]" placeholder="Guaranteed Job Placement">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="benefits[${benefitCount}][description]" placeholder="Description here">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeBenefit(this)">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(newItem);
        benefitCount++;
    }

    function removeBenefit(button) {
        if (document.querySelectorAll('.benefit-item').length > 1) {
            button.closest('.benefit-item').remove();
        } else {
            alert('At least one benefit is required.');
        }
    }

    // Requirements Functions
    function addRequirement() {
        const container = document.getElementById('requirements-container');
        const newItem = document.createElement('div');
        newItem.className = 'requirement-item mb-3 p-3 border rounded';
        newItem.innerHTML = `
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label">Icon</label>
                    <select class="form-control" name="requirements[${requirementCount}][icon]">
                        <option value="ti-user">User</option>
                        <option value="ti-file">File</option>
                        <option value="ti-book">Book</option>
                        <option value="ti-heart">Heart</option>
                        <option value="ti-ruler-pencil">Ruler Pencil</option>
                        <option value="ti-world">World</option>
                        <option value="ti-home">Home</option>
                        <option value="ti-location-pin">Location</option>
                        <option value="ti-check-box">Check Box</option>
                        <option value="ti-flag">Flag</option>
                        <option value="ti-star">Star</option>
                        <option value="ti-cup">Cup</option>
                        <option value="ti-medall">Medal</option>
                        <option value="ti-shield">Shield</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Title *</label>
                    <input type="text" class="form-control" name="requirements[${requirementCount}][title]" placeholder="Age Requirement" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Description *</label>
                    <input type="text" class="form-control" name="requirements[${requirementCount}][description]" placeholder="Description here" required>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeRequirement(this)">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(newItem);
        requirementCount++;
    }

    function removeRequirement(button) {
        if (document.querySelectorAll('.requirement-item').length > 1) {
            button.closest('.requirement-item').remove();
        } else {
            alert('At least one requirement is required.');
        }
    }

    // Selection Process Functions
    function addSelectionProcess() {
        const container = document.getElementById('selection-process-container');
        const newItem = document.createElement('div');
        newItem.className = 'process-item mb-3 p-3 border rounded';
        newItem.innerHTML = `
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label">Icon</label>
                    <select class="form-control" name="selection_process[${processCount}][icon]">
                        <option value="ti-file">File</option>
                        <option value="ti-user">User</option>
                        <option value="ti-pencil-alt">Pencil</option>
                        <option value="ti-comments">Comments</option>
                        <option value="ti-heart">Heart</option>
                        <option value="ti-check-box">Check Box</option>
                        <option value="ti-flag">Flag</option>
                        <option value="ti-star">Star</option>
                        <option value="ti-medall">Medal</option>
                        <option value="ti-shield">Shield</option>
                        <option value="ti-clipboard">Clipboard</option>
                        <option value="ti-calendar">Calendar</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Title *</label>
                    <input type="text" class="form-control" name="selection_process[${processCount}][title]" placeholder="Online Application" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Description *</label>
                    <input type="text" class="form-control" name="selection_process[${processCount}][description]" placeholder="Description here" required>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeSelectionProcess(this)">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(newItem);
        processCount++;
    }

    function removeSelectionProcess(button) {
        if (document.querySelectorAll('.process-item').length > 1) {
            button.closest('.process-item').remove();
        } else {
            alert('At least one selection process step is required.');
        }
    }

    // Training Stages Functions
    function addTrainingStage() {
        const container = document.getElementById('training-stages-container');
        const newItem = document.createElement('div');
        newItem.className = 'stage-item mb-3 p-3 border rounded';
        newItem.innerHTML = `
            <div class="row">
                <div class="col-md-2">
                    <label class="form-label">Stage Number *</label>
                    <input type="number" class="form-control" name="training_stages[${stageCount}][stageNumber]" value="${stageCount + 1}" min="1" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Title *</label>
                    <input type="text" class="form-control" name="training_stages[${stageCount}][title]" placeholder="Ground School" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Description *</label>
                    <input type="text" class="form-control" name="training_stages[${stageCount}][description]" placeholder="Description here" required>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeTrainingStage(this)">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(newItem);
        stageCount++;
    }

    function removeTrainingStage(button) {
        if (document.querySelectorAll('.stage-item').length > 1) {
            button.closest('.stage-item').remove();
        } else {
            alert('At least one training stage is required.');
        }
    }

    // Course Outline Functions
    function addCourseOutline() {
        const container = document.getElementById('course-outline-container');
        const newItem = document.createElement('div');
        newItem.className = 'outline-item mb-3 p-3 border rounded';
        newItem.innerHTML = `
            <div class="row">
                <div class="col-md-8">
                    <label class="form-label">Lesson Title *</label>
                    <input type="text" class="form-control" name="outline[${outlineCount}][title]" placeholder="Introduction Lesson" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Link</label>
                    <input type="text" class="form-control" name="outline[${outlineCount}][link]" placeholder="#" value="#">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeCourseOutline(this)">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(newItem);
        outlineCount++;
    }

    function removeCourseOutline(button) {
        if (document.querySelectorAll('.outline-item').length > 1) {
            button.closest('.outline-item').remove();
        } else {
            alert('At least one course outline item is required.');
        }
    }
</script>

<style>
    .requirement-item, .process-item, .stage-item, .outline-item, .benefit-item {
        background: #f8f9fa;
        transition: all 0.3s ease;
    }
    
    .requirement-item:hover, .process-item:hover, .stage-item:hover, .outline-item:hover, .benefit-item:hover {
        background: #e9ecef;
    }
    
    .card-header {
        background: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
    }
</style>
@endpush