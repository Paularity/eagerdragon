<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Bouncer::allows('view-audit-logs')) {
            abort(403);
        }

        $auditLogs = DB::table('audits')
            ->leftJoin('users', 'users.id', '=', 'audits.user_id')
            ->select([
                'users.id as user_id', 'users.firstname', 'users.lastname',
                'audits.id as audit_id', 'audits.ip_address', 'audits.url',
                'audits.event', 'audits.auditable_type', 'audits.created_at',
                'audits.auditable_id', 'audits.user_id',
            ])
            ->orderBy('created_at', 'desc')->paginate(10);

        return view('audit-log.index', compact('auditLogs'));
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        if (!Bouncer::allows('view-audit-logs')) {
            abort(403);
        }

        $auditLog = DB::table('audits')
            ->leftJoin('users', 'users.id', '=', 'audits.user_id')
            ->select([
                'users.id as user_id', 'users.firstname', 'users.lastname',
                'audits.id as audit_id', 'audits.auditable_type', 'audits.event',
                'audits.created_at', 'audits.auditable_id', 'audits.user_id',
                'audits.url', 'audits.ip_address', 'audits.user_agent',
                'audits.new_values', 'audits.old_values',
            ])
            ->where('audits.id', $id)->first();

        if(!$auditLog) {
            abort(404);
        }

        if ($auditLog->user_id) {
            $auditLog->role = User::find($auditLog->user_id)
                ->roles()->get(['title'])[0]->title;
        } else {
            $auditLog->role = '--';
        }

        $auditLog->new_values = json_decode($auditLog->new_values, true);
        $auditLog->old_values = json_decode($auditLog->old_values, true);

        unset($auditLog->old_values['audited_at']);
        unset($auditLog->new_values['audited_at']);

        return view('audit-log.show', compact('auditLog'));
    }
}