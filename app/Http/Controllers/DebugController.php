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
        try {
            \DB::connection()->getPdo();
            return response([
                'status' => 'success',
                'message' => 'Database connection OK',
                'env' => env('APP_ENV'),
                'db_host' => env('DB_HOST'),
                'db_database' => env('DB_DATABASE'),
                'db_username' => env('DB_USERNAME'),
                'railway_private_domain' => env('RAILWAY_PRIVATE_DOMAIN'),
                'database_url' => env('DATABASE_URL'),
            ], 200);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => $e->getMessage(),
                'db_host' => env('DB_HOST'),
                'db_database' => env('DB_DATABASE'),
                'railway_private_domain' => env('RAILWAY_PRIVATE_DOMAIN'),
                'database_url' => env('DATABASE_URL'),
            ], 500);
        }
    }

    /**
     * Manually execute ConveniosSeeder and return results.
     * 
     * Usage: GET /debug/seed-convenios
     */
    public function seedConvenios(): Response
    {
        try {
            // Execute the seeder
            \Artisan::call('db:seed', ['--class' => 'ConveniosSeeder', '--force' => true]);
            
            $output = \Artisan::output();
            $count = Convenio::count();

            return response([
                'status' => 'success',
                'message' => 'ConveniosSeeder executed',
                'total_convenios_after_seed' => $count,
                'artisan_output' => $output,
                'convenios' => Convenio::all(),
            ], 200);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'message' => $e->getMessage(),
                'trace' => $e->getTrace(),
            ], 500);
        }
    }
}
