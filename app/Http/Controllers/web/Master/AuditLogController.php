<?php

namespace App\Http\Controllers\web\Master;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function books()
    {
        $auditLogs = AuditLog::whereIn('model_type', ['App\Models\BookChild', 'App\Models\BookParent'])
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('master.audit.books', compact('auditLogs'));
    }

    public function borrows()
    {
        $auditLogs = AuditLog::where('model_type', 'App\Models\Borrow')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('master.audit.borrows', compact('auditLogs'));
    }

    public function returns()
    {
        $auditLogs = AuditLog::where('model_type', 'App\Models\ReturnTransaction')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('master.audit.returns', compact('auditLogs'));
    }
}
