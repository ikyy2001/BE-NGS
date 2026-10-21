<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobVacancyResource;
use App\Models\JobApplication;
use App\Models\JobVacancy;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobVacancyController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of active job vacancies.
     */
    public function index(Request $request): JsonResponse
    {
        $query = JobVacancy::query()
            ->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('deadline')
                    ->orWhereDate('deadline', '>=', now()->toDateString());
            });

        if ($request->filled('department')) {
            $query->where('department', $request->query('department'));
        }

        if ($request->filled('job_type')) {
            $query->where('job_type', $request->query('job_type'));
        }

        $jobs = $query
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return $this->successResponse(JobVacancyResource::collection($jobs));
    }

    /**
     * Display the specified job vacancy.
     */
    public function show(string $slug): JsonResponse
    {
        $job = JobVacancy::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('deadline')
                    ->orWhereDate('deadline', '>=', now()->toDateString());
            })
            ->first();

        if (! $job) {
            return $this->errorResponse('Lowongan pekerjaan tidak ditemukan.', null, 404);
        }

        return $this->successResponse(new JobVacancyResource($job));
    }

    /**
     * Handle submission of a job application.
     */
    public function apply(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'job_vacancy_id' => 'nullable|exists:job_vacancies,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'portfolio_url' => 'nullable|url|max:500',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
            'cover_letter' => 'nullable|string|max:3000',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), $validator->errors(), 422);
        }

        $jobId = $request->input('job_vacancy_id');
        if ($jobId) {
            $vacancy = JobVacancy::where('id', $jobId)
                ->where('is_active', true)
                ->where(function ($q) {
                    $q->whereNull('deadline')
                        ->orWhereDate('deadline', '>=', now()->toDateString());
                })
                ->first();

            if (! $vacancy) {
                return $this->errorResponse('Lowongan pekerjaan sudah ditutup atau tidak aktif.', null, 422);
            }
        }

        $resumePath = null;
        if ($request->hasFile('resume')) {
            // Store resume in private 'local' disk instead of public
            $resumePath = $request->file('resume')->store('resumes', 'local');
        }

        $application = JobApplication::create([
            'job_vacancy_id' => $jobId,
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'portfolio_url' => $request->input('portfolio_url'),
            'resume_path' => $resumePath,
            'cover_letter' => $request->input('cover_letter'),
            'status' => 'pending',
        ]);

        return $this->successResponse([
            'id' => $application->id,
            'message' => 'Lamaran Anda berhasil dikirim! Tim recruitment kami akan meninjau profil Anda.',
        ], 'Application submitted successfully', 201);
    }
}
