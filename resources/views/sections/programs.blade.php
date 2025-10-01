<section id="programs-section" tabindex="-1" class="Oqnisf comp-lche34ka wixui-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Programs</h2>
            <div class="horizontal-line"></div>
        </div>
        
        <div class="programs-grid">
            <div class="program-card">
                <img src="{{ asset('assets/images/pilot-program.jpg') }}" alt="Commercial Pilot License">
                <h3>COMMERCIAL PILOT LICENSE (CPL)</h3>
                <a href="{{ route('programs.cpl') }}" class="program-link">Learn More</a>
            </div>
            
            <div class="program-card">
                <img src="{{ asset('assets/images/cabin-crew.jpg') }}" alt="International Cabin Crew">
                <h3>INTERNATIONAL CABIN CREW PROGRAM</h3>
                {{-- <a href="{{ route('programs.cabin-crew') }}" class="program-link">Learn More</a> --}}
            </div>
            
            <!-- Add other program cards similarly -->
        </div>
    </div>
</section>