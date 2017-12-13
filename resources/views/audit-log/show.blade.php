@extends('layouts.dashboard')

@section('content')
    <div class="title-block">
        <h1 class="title"> Audit Log Details </h1>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <div class="card card-block">

                    <div class="col-md-6">
                        <p>
                            <strong>Action Taken By:</strong>
                            {{ $auditLog->firstname ?: '--' }}
                            {{ $auditLog->lastname ?: '--'}}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>Role:</strong>
                            {{ $auditLog->role }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>Action Taken:</strong>
                            {{ ucfirst($auditLog->event) }}
                            {{ class_basename($auditLog->auditable_type) }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>URL:</strong>
                            {{ $auditLog->url }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>IP Adress:</strong>
                            {{ $auditLog->ip_address }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>User Agent:</strong>
                            {{ $auditLog->user_agent }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>
                                {{ class_basename($auditLog->auditable_type) }} ID:
                            </strong>
                            {{ $auditLog->auditable_id  }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>Date:</strong>
                            {{ date_format(date_create($auditLog->created_at), "F j, Y, g:i a") }}
                        </p>
                    </div>
                </div>
            </div>
            @if ($auditLog->old_values && $auditLog->old_values != '[]')
                <div class="col-md-6">
                    <div class="card card-block sameheight-item">
                        <div class="card-title-block">
                            <h3 class="title"> Old Values </h3>
                        </div>
                        @include('audit-log.partials.old-audit-values')
                    </div>
                </div>
            @endif
            @if ($auditLog->new_values && $auditLog->new_values != '[]')
                <div class="col-md-6">
                    <div class="card card-block sameheight-item">
                        <div class="card-title-block">
                            <h3 class="title"> New Values </h3>
                        </div>
                        @include('audit-log.partials.new-audit-values')
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
