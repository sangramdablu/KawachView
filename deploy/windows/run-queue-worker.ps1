# Supervises `php artisan queue:work` on Windows: restarts it if it exits or
# crashes, and lets it cycle every hour (--max-time) so a worker never runs
# forever and slowly leak memory. Meant to be launched by NSSM (see
# deploy/windows/README.md) so it survives reboots and service restarts.

$ErrorActionPreference = "Stop"

# Resolve the Laravel project root (this script lives in deploy/windows/).
$ProjectRoot = Split-Path -Parent (Split-Path -Parent $PSScriptRoot)
Set-Location $ProjectRoot

$PhpExe   = "php"
$LogDir   = Join-Path $ProjectRoot "storage\logs"
$LogFile  = Join-Path $LogDir "queue-worker.log"

if (-not (Test-Path $LogDir)) {
    New-Item -ItemType Directory -Path $LogDir -Force | Out-Null
}

function Write-Log($message) {
    $timestamp = Get-Date -Format "yyyy-MM-dd HH:mm:ss"
    Add-Content -Path $LogFile -Value "[$timestamp] $message"
}

Write-Log "Queue worker supervisor started."

while ($true) {
    Write-Log "Starting queue:work..."

    & $PhpExe artisan queue:work database `
        --queue=emails `
        --tries=3 `
        --backoff=60,120,300 `
        --sleep=3 `
        --max-time=3600 `
        *>> $LogFile

    $exitCode = $LASTEXITCODE
    Write-Log "queue:work exited with code $exitCode. Restarting in 5 seconds..."
    Start-Sleep -Seconds 5
}
