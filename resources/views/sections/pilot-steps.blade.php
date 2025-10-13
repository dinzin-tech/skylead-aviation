<!--================ Start Pilot Steps Area =================-->
<section class="pilot_steps_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $pilotStepsData['title'] ?? 'Steps to Become a Pilot' }}</h2>
                    <p class="mb-5">
                        {{ $pilotStepsData['description'] ?? 'Follow this comprehensive roadmap to achieve your dream of becoming a commercial pilot' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Timeline for Desktop -->
                <div class="steps_timeline d-none d-lg-block">
                    @if(isset($pilotStepsData['steps']))
                        @foreach(array_chunk($pilotStepsData['steps'], 2) as $chunk)
                            <div class="timeline_row">
                                @foreach($chunk as $index => $step)
                                    @if($loop->first)
                                        <div class="timeline_item left_item">
                                            <div class="step_card">
                                                <div class="step_header">
                                                    <span class="step_number">{{ $step['step_number'] }}</span>
                                                    <div class="step_icon">
                                                        <i class="{{ $step['icon'] }}"></i>
                                                    </div>
                                                </div>
                                                <div class="step_content">
                                                    <h5 class="mb-3">{{ $step['title'] }}</h5>
                                                    <p class="mb-3">{{ $step['description'] }}</p>
                                                    <div class="step_duration">
                                                        <i class="ti-time mr-2"></i>
                                                        <span>{{ $step['duration'] }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="timeline_item right_item">
                                            <div class="step_card">
                                                <div class="step_header">
                                                    <span class="step_number">{{ $step['step_number'] }}</span>
                                                    <div class="step_icon">
                                                        <i class="{{ $step['icon'] }}"></i>
                                                    </div>
                                                </div>
                                                <div class="step_content">
                                                    <h5 class="mb-3">{{ $step['title'] }}</h5>
                                                    <p class="mb-3">{{ $step['description'] }}</p>
                                                    <div class="step_duration">
                                                        <i class="ti-time mr-2"></i>
                                                        <span>{{ $step['duration'] }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Mobile View -->
                <div class="steps_mobile d-lg-none">
                    @if(isset($pilotStepsData['steps']))
                        @foreach($pilotStepsData['steps'] as $step)
                            <div class="mobile_step_item">
                                <div class="step_card">
                                    <div class="step_header">
                                        <span class="step_number">{{ $step['step_number'] }}</span>
                                        <div class="step_icon">
                                            <i class="{{ $step['icon'] }}"></i>
                                        </div>
                                    </div>
                                    <div class="step_content">
                                        <h5 class="mb-3">{{ $step['title'] }}</h5>
                                        <p class="mb-3">{{ $step['description'] }}</p>
                                        <div class="step_duration">
                                            <i class="ti-time mr-2"></i>
                                            <span>{{ $step['duration'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <div class="step_connector">
                                        <i class="ti-arrow-down"></i>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- Timeline Note -->
        @if(isset($pilotStepsData['timeline_note']))
        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <div class="timeline_note p-3 bg-light rounded">
                    <p class="mb-0 text-muted">
                        <i class="ti-info-alt mr-2"></i>
                        {{ $pilotStepsData['timeline_note'] }}
                    </p>
                </div>
            </div>
        </div>
        @endif

        <!-- Call to Action -->
        @if(isset($pilotStepsData['cta']))
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <div class="steps_cta">
                    <h4 class="mb-3">{{ $pilotStepsData['cta']['text'] }}</h4>
                    <a href="{{ $pilotStepsData['cta']['link'] }}" class="primary-btn">
                        {{ $pilotStepsData['cta']['button_text'] }}
                        <i class="ti-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!--================ End Pilot Steps Area =================-->