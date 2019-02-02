@php
    $data = [
        'Pre-Solo' => [
            'First Flight' => [
                ['title' => 'First Flight in glider', 'points' => 100],
            ],
            'Upper Air Exercises' => [
                ['title' => 'Primary Effects of ailerons and elevator', 'points' => 50],
                ['title' => 'Secondary Effects of ailerons and elevator', 'points' => 50],
                ['title' => 'Lookout (straight glide / turning)', 'points' => 50],
                ['title' => 'Turning using all three controls together', 'points' => 50],
                ['title' => 'Trimming and speed control', 'points' => 50],
            ],
            'Launch Exercises' => [
                ['title' => 'Pre-takeoff Checks', 'points' => 50],
                ['title' => 'Winch Launch', 'points' => 100],
                ['title' => 'Winch Failures (High / Med / Low / Power Fade)', 'points' => 100],
                ['title' => 'Winch Launch Signals', 'points' => 50],
                ['title' => 'Aerotow Launch', 'points' => 100],
                ['title' => 'Aerotow Signals', 'points' => 50],
            ],
            'Unusual flight conditions' => [
                ['title' => 'Confidence stall', 'points' => 50],
                ['title' => 'Stall warnings and symptoms (straight glide, normal loading)', 'points' => 100],
                ['title' => 'Accelerated stalls (in turns, high-speed stalls)', 'points' => 50],
                ['title' => 'Spin recognition and recovery', 'points' => 100],
                ['title' => 'Spiral dive recognition and recovery', 'points' => 50],
                ['title' => 'Stall/spin avoidance during failed winch launch', 'points' => 50],
                ['title' => 'Basic aerobatics (loop, chandelle)', 'points' => 50],
                ['title' => 'Reduced & Negative \'G\'', 'points' => 50],
            ],
            'Approach and Landing' => [
                ['title' => 'Circuit Planning', 'points' => 50],
                ['title' => 'Air Brake / Elevator Co-ordination', 'points' => 50],
                ['title' => 'Approach Control', 'points' => 50],
                ['title' => 'Landing', 'points' => 100],
                ['title' => 'Side Slipping', 'points' => 100],
            ],
            'Soaring Exercises' => [
                ['title' => 'Thermal Soaring', 'points' => 50],
                ['title' => 'Ridge Soaring', 'points' => 50],
                ['title' => 'Wave Soaring', 'points' => 50],
            ],
        ],
        'Solo' => [
            ['title' => 'First Solo', 'points' => 500],
            ['title' => 'First Solo (New Launch Type)', 'points' => 200],
        ],
        'Post-Solo' => [
            'Conversions' => [
                ['title' => 'Aircraft Conversion (Minor)', 'points' => 50],
                ['title' => 'Aircraft Conversion (Major - eg first retractable wheel, first glass, first single seater)', 'points' => 100],
            ],
            'Bronze Badge' => [
                ['title' => 'Bronze Flying Test', 'points' => 150],
                ['title' => 'Bronze Field Landings', 'points' => 150],
                ['title' => 'Bronze Ground Exam', 'points' => 150],
                ['title' => 'Bronze Log Book Requirement', 'points' => 50],
                ['title' => 'Bronze Badge Completion', 'points' => 25],
            ],
            'Cross Country Endorsement' => [
                ['title' => 'Cross Country 1 hr Soaring Flight', 'points' => 150],
                ['title' => 'Cross Country 2 hr Soaring Flight', 'points' => 175],
                ['title' => 'Cross Country Field Selection/Landings', 'points' => 150],
                ['title' => 'Cross Country Navigation', 'points' => 150],
                ['title' => 'Cross Country Endorsement Completion', 'points' => 25],
                ['title' => 'First Cross Country Flight', 'points' => 200],
            ],
            'Silver Badge' => [
                ['title' => 'Silver Height Gain (1,000m / 3,281ft)', 'points' => 250],
                ['title' => 'Silver Distance (50km, with \'1% rule\')', 'points' => 250],
                ['title' => 'Silver / Gold Duration (5 hrs)', 'points' => 250],
                ['title' => 'Silver Badge Completion', 'points' => 25],
            ],
            'Basic Instructor' => [
                ['title' => 'BI Course', 'points' => 500],
                ['title' => '100km Diploma Part I', 'points' => 250],
                ['title' => '100km Diploma Part II', 'points' => 275],
            ],
            'Gold Badge' => [
                ['title' => 'Gold Height Gain (3,000m / 9,843ft)', 'points' => 350],
                ['title' => 'Gold Distance (300km)', 'points' => 350],
                ['title' => 'Gold Badge Completion', 'points' => 25],
            ],
            'Diamond Badge' => [
                ['title' => 'Diamond Height Gain (5,000m / 16,405ft)', 'points' => 400],
                ['title' => 'Diamond Goal (300km)', 'points' => 400],
                ['title' => 'Diamond Distance (500km)', 'points' => 400],
                ['title' => 'Diamond Badge Completion', 'points' => 25],
            ],
            'Aerobatics Badges' => [
                ['title' => 'Standard Aerobatics Badge', 'points' => 200],
				['title' => 'Sport Aerobatics Badge', 'points' => 250],
				['title' => 'Intermediate Aerobatics Badge', 'points' => 300],
				['title' => 'Unlimited Aerobatics Badge', 'points' => 300],
            ],
        ]
    ];
@endphp


<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="progression_label">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#progression" aria-expanded="false" aria-controls="progression">
            <span class="glyphicon glyphicon-education" aria-hidden="true"></span> Progression
        </a>
    </div>
    <div id="progression" class="panel-collapse collapse" role="tabpanel" aria-labelledby="progression_label">
        <div class="panel-body text-justify">
            <p>Scores for progression are calculated using a simple points-based system. This includes both pre-solo milestones and post-solo badges and certificates. Unchanged from last year, the values for each achievement are listed below.</p>
            <p>These can be claimed at the end of the flying day and will need be validated by an organizer before points are awarded.</p>
            <ul id="progression">
                @include('partials._categories', compact('data'))
            </ul>
        </div>
    </div>
</div>
