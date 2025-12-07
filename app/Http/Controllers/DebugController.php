<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use Illuminate\Http\Response;

class DebugController extends Controller
{
    /**
     * Test database connection and fetch convenios.
     * 
     * Usage: GET /debug/convenios?token=YOUR_SECRET_TOKEN
     */
    public function convenios(): Response
    {
        // Security: validate token
        $token = request('token');
        $expectedToken = env('DEBUG_TOKEN', 'test123');
        
        if ($token !== $expectedToken) {
            return response('Unauthorized', 401);
        }

        try {
            // Test DB connection
            $count = Convenio::count();
            $convenios = Convenio::all();

            return response([
                'status' => 'success',
                'db_connection' => 'OK',
                'total_convenios' => $count,
                'data' => $convenios,
            ], 200);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => $e->getMessage(),
                'trace' => $e->getTrace(),
            ], 500);
        }
    }

    /**
     * Test general DB health.
     */
    public function health(): Response
    {
        $token = request('token');
        $expectedToken = env('DEBUG_TOKEN', 'test123');
        
        if ($token !== $expectedToken) {
            return response('Unauthorized', 401);
        }

        try {
            \DB::connection()->getPdo();
            return response([
                'status' => 'success',
                'message' => 'Database connection OK',
                'env' => env('APP_ENV'),
            ], 200);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
