<!--================ Start Course Details Area =================-->
<section class="course_details_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image">
                    <img class="img-fluid" src="{{ $courseData['image'] ?? 'img/courses/course-details.jpg' }}" alt="{{ $courseData['title'] ?? 'Course Image' }}">
                </div>
                <div class="content_wrapper">
                    <h4 class="title">Objectives</h4>
                    <div class="content">
                        {!! $courseData['objectives'] ?? 'No objectives provided.' !!}
                    </div>

                    <h4 class="title">Eligibility</h4>
                    <div class="content">
                        {!! $courseData['eligibility'] ?? 'No eligibility criteria provided.' !!}
                    </div>

                    <h4 class="title">Course Outline</h4>
                    <div class="content">
                        <ul class="course_list">
                            @foreach($courseData['outline'] ?? [] as $lesson)
                                <li class="justify-content-between d-flex">
                                    <p>{{ $lesson['title'] ?? 'Lesson Title' }}</p>
                                    <a class="primary-btn text-uppercase" href="{{ $lesson['link'] ?? '#' }}">View Details</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 right-contents">
                <ul>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Trainer's Name</p>
                            <span class="or">{{ $instructor['name'] ?? 'Not specified' }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Course Fee</p>
                            <span>${{ number_format($courseData['fee'] ?? 0) }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Available Seats</p>
                            <span>{{ $courseData['available_seats'] ?? 0 }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Schedule</p>
                            <span>{{ $courseData['schedule'] ?? 'Not scheduled' }}</span>
                        </a>
                    </li>
                </ul>
                <a href="#" class="primary-btn2 text-uppercase enroll rounded-0 text-white">Enroll the course</a>

                <h4 class="title">Reviews</h4>
                <div class="content">
                    <div class="review-top row pt-40">
                        <div class="col-lg-12">
                            <h6 class="mb-15">Provide Your Rating</h6>
                            @foreach($courseData['rating_categories'] ?? [] as $category)
                                <div class="d-flex flex-row reviews justify-content-between">
                                    <span>{{ $category['name'] ?? 'Category' }}</span>
                                    <div class="star">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="ti-star {{ $i <= ($category['rating'] ?? 0) ? 'checked' : '' }}"></i>
                                        @endfor
                                    </div>
                                    <span>{{ $category['label'] ?? 'Outstanding' }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="feedeback">
                        <h6>Your Feedback</h6>
                        <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                        <div class="mt-10 text-right">
                            <a href="#" class="primary-btn2 text-right rounded-0 text-white">Submit</a>
                        </div>
                    </div>
                    <div class="comments-area mb-30">
                        @foreach($reviews as $review)
                            <div class="comment-list">
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ $review['avatar'] ?? 'img/blog/c1.jpg' }}" alt="{{ $review['name'] ?? 'User' }}">
                                        </div>
                                        <div class="desc">
                                            <h5>
                                                <a href="#">{{ $review['name'] ?? 'Anonymous' }}</a>
                                                <div class="star">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <span class="ti-star {{ $i <= ($review['rating'] ?? 0) ? 'checked' : '' }}"></span>
                                                    @endfor
                                                </div>
                                            </h5>
                                            <p class="comment">
                                                {{ $review['comment'] ?? 'No comment provided.' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Course Details Area =================-->