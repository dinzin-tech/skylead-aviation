<!--================ Start FAQ Area =================-->
<section class="faq_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main_title text-center">
                    <h2 class="mb-3">{{ $faqData['title'] ?? 'Frequently Asked Questions' }}</h2>
                    <p class="mb-5">
                        {{ $faqData['description'] ?? 'Find answers to common questions about pilot training and aviation careers' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- FAQ Categories Filter -->
        @if(isset($faqData['categories']) && count($faqData['categories']) > 0)
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="faq_categories text-center">
                    <div class="categories_filter">
                        @foreach($faqData['categories'] as $key => $category)
                            <button class="category_btn {{ $loop->first ? 'active' : '' }}" data-category="{{ $key }}">
                                {{ $category }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- FAQ Items -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="faq_content" id="faqAccordion">
                    @if(isset($faqData['faqs']) && count($faqData['faqs']) > 0)
                        @foreach($faqData['faqs'] as $index => $faq)
                            <div class="faq_item mb-3" data-category="{{ $faq['category'] ?? 'All' }}">
                                <div class="faq_question" id="faqHeading{{ $index }}">
                                    <button class="faq_btn collapsed" type="button" data-toggle="collapse" 
                                            data-target="#faqCollapse{{ $index }}" aria-expanded="false" 
                                            aria-controls="faqCollapse{{ $index }}">
                                        <span class="question_text">{{ $faq['question'] }}</span>
                                        <span class="faq_icon">
                                            <i class="ti-plus"></i>
                                            <i class="ti-minus"></i>
                                        </span>
                                    </button>
                                    @if(isset($faq['category']))
                                    <span class="faq_category_badge">{{ $faq['category'] }}</span>
                                    @endif
                                </div>
                                <div id="faqCollapse{{ $index }}" class="collapse" 
                                     aria-labelledby="faqHeading{{ $index }}" data-parent="#faqAccordion">
                                    <div class="faq_answer">
                                        <p class="mb-0">{{ $faq['answer'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">No FAQs available at the moment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        @if(isset($faqData['cta']))
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="faq_cta text-center p-5 bg-primary text-white rounded">
                    <h4 class="mb-3">{{ $faqData['cta']['title'] }}</h4>
                    <p class="mb-4">{{ $faqData['cta']['description'] }}</p>
                    <a href="{{ $faqData['cta']['link'] }}" class="primary-btn light-btn">
                        {{ $faqData['cta']['button_text'] }}
                        <i class="ti-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!--================ End FAQ Area =================-->