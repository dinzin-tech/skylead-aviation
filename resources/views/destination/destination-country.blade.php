@extends('layouts.app')

@section('title', $countryData['country_title'] ?? 'Flight Training Destination')

@section('content')
    @include('destination.sections.destination_hero')
    @include('destination.sections.country_overview')
    @include('destination.sections.training_guide')   
    @include('destination.sections.advantages')
    @include('destination.sections.gallery')
    @include('destination.sections.flying-schools-tabs')


@push('scripts')
    <script>
    // Initialize Bootstrap tabs properly
    document.addEventListener('DOMContentLoaded', function() {
        // Get all tab buttons
        const tabButtons = document.querySelectorAll('#schoolTabs .nav-link');
        
        // Add click event listeners to each tab button
        tabButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all tabs and panes
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.setAttribute('aria-selected', 'false');
                });
                
                const allPanes = document.querySelectorAll('.tab-pane');
                allPanes.forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Add active class to clicked tab
                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
                
                // Show corresponding pane
                const targetPane = document.querySelector(this.getAttribute('data-bs-target'));
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                }
            });
        });
        
        // Alternative method using Bootstrap's built-in functionality
        if (typeof bootstrap !== 'undefined') {
            var triggerTabList = [].slice.call(document.querySelectorAll('#schoolTabs button[data-bs-toggle="tab"]'));
            triggerTabList.forEach(function (triggerEl) {
                var tabTrigger = new bootstrap.Tab(triggerEl);
                triggerEl.addEventListener('click', function (event) {
                    event.preventDefault();
                    tabTrigger.show();
                });
            });
        }
    });
</script>
@endpush





  



