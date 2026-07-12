# Running the queue worker as a Windows Service

Contact form (and quote/consultation) emails are sent via queued jobs
(`QUEUE_CONNECTION=database`). Nothing sends until something runs
`php artisan queue:work` continuously. On Windows Server, the reliable way to
do that is to wrap it as a service with **NSSM** (Non-Sucking Service
Manager), so it starts on boot and restarts itself if it ever stops.

## 1. Install NSSM

Download from https://nssm.cc/download and extract `nssm.exe` (pick the
`win64` binary) somewhere permanent, e.g. `C:\nssm\nssm.exe`.

## 2. Register the service

Open an elevated PowerShell/cmd prompt:

```powershell
C:\nssm\nssm.exe install KawachQueueWorker
```

This opens the NSSM GUI. Configure:

- **Path**: `C:\Windows\System32\WindowsPowerShell\v1.0\powershell.exe`
- **Startup directory**: the project root, e.g. `C:\inetpub\kawach\Kawawch_view`
- **Arguments**:
  `-NoProfile -ExecutionPolicy Bypass -File "C:\inetpub\kawach\Kawawch_view\deploy\windows\run-queue-worker.ps1"`

On the **Details** tab, set a display name like "Kawach Queue Worker".

On the **I/O** tab you can optionally point stdout/stderr to a file, though
`run-queue-worker.ps1` already logs to `storage\logs\queue-worker.log`.

Click **Install service**.

## 3. Start it

```powershell
nssm start KawachQueueWorker
```

Confirm it's running:

```powershell
nssm status KawachQueueWorker
Get-Content C:\inetpub\kawach\Kawawch_view\storage\logs\queue-worker.log -Tail 20
```

The service is now set to start automatically on every reboot, and
`run-queue-worker.ps1` relaunches `queue:work` automatically if it ever exits
(crash, `--max-time` cycling, etc.) — no manual restarts needed.

## 4. Managing the service

```powershell
nssm restart KawachQueueWorker   # after a deploy, to pick up new code
nssm stop KawachQueueWorker
nssm remove KawachQueueWorker confirm   # uninstall
```

**Always restart the service after deploying new code** — running workers
keep old PHP code loaded in memory until restarted (`--max-time=3600` limits
how stale this can get in between, but a deploy-time restart is still
recommended).

## Failed jobs

If a job fails after 3 attempts, it lands in the `failed_jobs` table. Check
it periodically:

```powershell
php artisan queue:failed
php artisan queue:retry all
```
