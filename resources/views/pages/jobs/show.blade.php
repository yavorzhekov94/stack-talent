<x-layout>
    @if (session('status'))
        <x-alert type="success">
            {{ session('status') }}
        </x-alert>
    @endif
    <x-page-sections.breadcrumbs />
    <div class="container py-4">

        {{-- Header --}}
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-3">
            <div class="me-3">
                <h1 class="h3 mb-1">{{ $job->title }}</h1>
                <div class="text-muted small job-meta">
                    <span class="me-2">
                        <i class="bi bi-building"></i>
                        {{ $job->user->employerProfile->company_name ?? $job->user->name }}
                    </span>
                    @if($job->category)
                        <span class="me-2">
                            <i class="bi bi-folder2"></i> {{ $job->category->name }}
                        </span>
                    @endif
                    <span class="me-2">
                        <i class="bi bi-geo-alt"></i>
                        {{ $job->is_remote ? 'Remote' : ($job->location ?: '—') }}
                    </span>
                    <span class="me-2">
                        <i class="bi bi-briefcase"></i>
                        {{ ucfirst(str_replace('_', ' ', $job->type)) }}
                    </span>
                    @if($job->published_at)
                        <span class="me-2">
                            <i class="bi bi-clock"></i>
                            Published: {{ $job->published_at->format('d.m.Y') }}
                        </span>
                    @endif
                    @if($job->expires_at)
                        <span class="me-2 {{ now()->gt($job->expires_at) ? 'text-danger' : '' }}">
                            <i class="bi bi-hourglass-split"></i>
                            Expires: {{ $job->expires_at->format('d.m.Y') }}
                        </span>
                    @endif
                </div>
            </div>

            {{-- Actions (policy-driven) --}}
            <div class="mt-3 mt-md-0 d-flex gap-2">
                @can('update', $job)
                    <a href="{{ route('jobs.edit', $job) }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                @endcan

                @can('delete', $job)
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Delete this job?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                @endcan
            </div>
        </div>

        {{-- Salary & tags --}}
        <div class="d-flex flex-wrap align-items-center gap-2 mb-4">
            @php
                $hasSalary = filled($job->salary_min) || filled($job->salary_max);
            @endphp

            @if($hasSalary)
                <span class="badge rounded-pill text-bg-success">
                    @if(filled($job->salary_min) && filled($job->salary_max))
                        {{ number_format($job->salary_min) }} – {{ number_format($job->salary_max) }} лв.
                    @elseif(filled($job->salary_min))
                        от {{ number_format($job->salary_min) }} лв.
                    @else
                        до {{ number_format($job->salary_max) }} лв.
                    @endif
                </span>
            @endif
{{--            @php dd($job->tags) @endphp--}}
            @foreach($job->tags as $tag)
                <a href="{{ route('jobs.index', ['tags' => $tag->slug]) }}"
                   class="badge rounded-pill text-bg-light text-decoration-none">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>

        {{-- Content --}}
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="h5 mb-3">Job Description</h2>
                        <div class="prose">
                            {!! nl2br(e($job->description)) !!}
                        </div>

                        @if($job->requirements)
                            <hr>
                            <h3 class="h6">Requirements</h3>
                            <div class="prose">
                                {!! nl2br(e($job->requirements)) !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                {{-- Apply / Contact box --}}
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h2 class="h6 mb-3">Apply</h2>

                        @can('apply', $job)
                            <x-forms.form method="POST" >
                                <button class="btn btn-primary w-100">
                                    <i class="bi bi-send"></i> Apply for this job
                                </button>
                            </x-forms.form>
                        @else
                            <div class="alert alert-secondary mb-0 small">
                                You can’t apply for this position.
                            </div>
                        @endcan
                    </div>
                </div>

                {{-- Company box --}}
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="h6 mb-2">Company</h2>
                        <div class="fw-semibold mb-1">
                            {{ $job->user->employerProfile->company_name ?? $job->user->name }}
                        </div>
                        @if($job->user->employerProfile?->website)
                            <a href="{{ $job->user->employerProfile->website }}"
                               class="small text-decoration-none" target="_blank" rel="noopener">
                                {{ $job->user->employerProfile->website }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
