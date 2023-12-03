<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
class BackUpController extends Controller
{
    public function index() {
        return view('admin.settings.backup.backup');
    }


public function backup()
{
    try {
        $databaseName = config('database.connections.mysql.database');
        $databaseUser = config('database.connections.mysql.username');
        $databasePassword = config('database.connections.mysql.password');
        $backupFileName = $databaseName .'_backup_' . date('Y_m_d_His') . '.sql';

        // Use the mysqldump command to create a backup
        $command = "mysqldump --user=$databaseUser --password=$databasePassword --host=" . config('database.connections.mysql.host') . " $databaseName > " . storage_path("app/backups/$backupFileName");
        exec($command);

        // Get the content of the SQL file
        $content = file_get_contents(storage_path("app/backups/$backupFileName"));

        // Generate a download response
        return $this->downloadBackup($backupFileName, $content);

    } catch (\Exception $e) {
        // If an error occurs during the backup process, set an error message
        return redirect()->back()->with('error', "Database failed.");
    }
}

protected function downloadBackup($filename, $content)
{
    return response()->stream(
        function () use ($content) {
            echo $content;
        },
        200,
        [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]
    );
}

    public function restore(Request $request)
    {
        // Validate user input
        $request->validate([
            'database_name' => 'required|string',
            'sql_file' => 'required',
        ]);

        $newDatabaseName = $request->input('database_name');
        $sqlFile = $request->file('sql_file');

        // Check if the new database name already exists
        $existingDatabases = DB::select("SHOW DATABASES");
        $existingDatabaseNames = array_column($existingDatabases, 'Database');

        if (in_array($newDatabaseName, $existingDatabaseNames)) {
            return redirect()->back()->with('error', "Database '$newDatabaseName' already exists.");
        }

        // Create a new database
        DB::statement("CREATE DATABASE IF NOT EXISTS $newDatabaseName");

        // Import data from the SQL file into the new database
        $importCommand = "mysql --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " $newDatabaseName < " . $sqlFile->getPathname();
        shell_exec($importCommand);

        // Redirect with a success message
        return redirect()->back()->with('success', "Database '$newDatabaseName' is created and data is imported.");
    }

}
