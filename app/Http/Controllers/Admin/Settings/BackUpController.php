<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
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


private function databaseExists($databaseName)
{
    try {
        // Use a raw SQL query to check if the database exists
        $result = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$databaseName]);

        return count($result) > 0;
    } catch (\Exception $e) {
        return false;
    }
}

public function changeDatabaseName(Request $request)
{
    // Validate user input
    $request->validate([
        'new_database_name' => 'required|string',
    ]);

    $newDatabaseName = $request->input('new_database_name');

    // Check if the new database name exists
    if (!$this->databaseExists($newDatabaseName)) {
        return back()->with('error', 'The specified database does not exist.');
    }

    // Get the content of the .env file
    $envFilePath = base_path('.env');
    $envContent = File::get($envFilePath);

    // Replace the old database name with the new one in the .env file
    $newEnvContent = Str::replaceFirst('DB_DATABASE=' . env('DB_DATABASE'), 'DB_DATABASE=' . $newDatabaseName, $envContent);

    // Write the updated content back to the .env file
    File::put($envFilePath, $newEnvContent);

    try {
        // Attempt to reconnect to the database with the new name
        DB::reconnect();

        // Redirect with a success message
        return back()->with('success', 'Database name has been changed.');
    } catch (\Exception $e) {
        // Handle the exception, e.g., display an error message
        return back()->with('error', 'Error changing database name: ' . $e->getMessage());
    }
}

    public function restoreDatabase() {
        return view('admin.database.restore');
    }

}
