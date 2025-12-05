<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DgcaSyllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DgcaSyllabusController extends Controller
{
    public function index()
    {
        $syllabus = DgcaSyllabus::ordered()->paginate(10);
        return view('admin.dgca-syllabus.index', compact('syllabus'));
    }

    public function create()
    {
        return view('admin.dgca-syllabus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:dgca_syllabus',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
            'benefit' => 'required|string|max:500',
            'detail' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
            'topic_titles.*' => 'nullable|string|max:255',
            'topic_descriptions.*' => 'nullable|string',
            'topic_durations.*' => 'nullable|string|max:100',
            'topic_is_active.*' => 'boolean'
        ]);

        // Process topics
        $validated['topics'] = $this->processTopics($request);

        // dd( $validated);

        DgcaSyllabus::create($validated);

        return redirect()->route('admin.dgca-syllabus.index')
            ->with('success', 'DGCA subject created successfully.');
    }

    public function edit(string $dgcaSyllabus)
    {
        $dgcaSyllabus = DgcaSyllabus::where('slug', $dgcaSyllabus)->firstOrFail();
        // $dgcaSyllabus->load('topics');
        // dd( $dgcaSyllabus);
        return view('admin.dgca-syllabus.edit', compact('dgcaSyllabus'));
    }

    public function update(Request $request, DgcaSyllabus $dgcaSyllabus)
    {
        $validated = $request->validate([
            'subject_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:dgca_syllabus,slug,' . $dgcaSyllabus->id,
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
            'benefit' => 'required|string|max:500',
            'detail' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
            'topic_titles.*' => 'nullable|string|max:255',
            'topic_descriptions.*' => 'nullable|string',
            'topic_durations.*' => 'nullable|string|max:100',
            'topic_is_active.*' => 'boolean'
        ]);

        // Process topics
        $validated['topics'] = $this->processTopics($request, $dgcaSyllabus->topics);

        $dgcaSyllabus->update($validated);

        return redirect()->route('admin.dgca-syllabus.index')
            ->with('success', 'DGCA subject updated successfully.');
    }

    public function destroy(DgcaSyllabus $dgcaSyllabus)
    {
        $dgcaSyllabus->delete();

        return redirect()->route('admin.dgca-syllabus.index')
            ->with('success', 'DGCA subject deleted successfully.');
    }

    /**
     * Process topics data
     */
    private function processTopics(Request $request, $existing = [])
    {
        $topics = [];
        
        $titles = $request->input('topic_titles', []);
        $descriptions = $request->input('topic_descriptions', []);
        $durations = $request->input('topic_durations', []);
        $isActive = $request->input('topic_is_active', []);
        
        foreach ($titles as $index => $title) {
            if (!empty(trim($title))) {
                // Handle checkbox status - check if this index exists in isActive array
                $topicIsActive = false;
                if (isset($isActive[$index])) {
                    $topicIsActive = $isActive[$index] === '1' || $isActive[$index] === 1 || $isActive[$index] === true;
                }
                
                $topics[] = [
                    'title' => trim($title),
                    'description' => trim($descriptions[$index] ?? ''),
                    'duration' => trim($durations[$index] ?? ''),
                    'is_active' => $topicIsActive,
                    'sort_order' => $index
                ];
            }
        }
        
        // Always return an array, never null
        return empty($topics) ? ($existing ?: []) : $topics;
    }

    /**
     * Update topic status
     */
    public function updateTopicStatus(Request $request, DgcaSyllabus $dgcaSyllabus)
    {
        $request->validate([
            'topic_index' => 'required|integer',
            'is_active' => 'required|boolean'
        ]);

        $topics = $dgcaSyllabus->topics;
        $topicIndex = $request->topic_index;

        if (isset($topics[$topicIndex])) {
            $topics[$topicIndex]['is_active'] = $request->is_active;
            $dgcaSyllabus->update(['topics' => $topics]);

            return response()->json(['success' => true, 'message' => 'Topic status updated.']);
        }

        return response()->json(['success' => false, 'message' => 'Topic not found.'], 404);
    }
}