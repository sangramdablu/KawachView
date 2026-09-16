<?php

/*
|--------------------------------------------------------------------------
| Solutions — problem-first landing pages
|--------------------------------------------------------------------------
| Parallel to config/industries.php and config/hire_developers.php, but
| organized by business problem instead of industry or role — for search
| intent like "how do I automate X" or "replace Excel with software",
| which sits earlier in the funnel than someone already searching a
| named service like "custom software development".
|
| Each case_study slug must be a real, published case study — verify
| before adding a new solution.
*/

return [

    'business-process-automation' => [
        'title' => 'Business Process Automation',
        'icon' => 'fas fa-gears',
        'meta_title' => 'Business Process Automation Software | Kawach Technology',
        'meta_description' => 'Kawach Technology builds custom automation software that replaces manual triage, approvals and status checks with a system that runs the process for you.',
        'focus_keyword' => 'business process automation',
        'problem_intro' => "If a process in your business still depends on someone manually reviewing every item in a queue, chasing approvals over email, or fielding \"what's the status of this\" phone calls, that's not a staffing problem — it's a process that was never given software built for it.",
        'signs' => [
            'A staff member manually reviews and assigns every incoming request, ticket or claim before real work can start.',
            'Status updates require someone to call in or send an email, because there\'s no self-service way to check.',
            'Decisions that follow clear rules (approve, flag, escalate) are still made case-by-case instead of automatically.',
            'The same information gets re-entered into more than one system by hand.',
            'Catching a problem (fraud, an error, a bottleneck) depends on someone happening to notice, not on the system flagging it.',
        ],
        'solution_features' => [
            ['title' => 'Automated Intake & Triage', 'desc' => 'New requests get categorized and routed automatically based on rules that match how your team actually prioritizes work — no more manual sorting before anyone can start.'],
            ['title' => 'Rule-Based Approvals', 'desc' => 'Straightforward decisions get made automatically against criteria you define; only genuinely ambiguous cases reach a person.'],
            ['title' => 'Self-Service Status Tracking', 'desc' => 'The people waiting on a process can check status themselves, which is often the single biggest reduction in inbound calls and emails.'],
            ['title' => 'Systematic Flagging', 'desc' => 'Pattern-based flagging catches the outliers worth a human look, instead of relying on someone noticing by chance.'],
            ['title' => 'One System of Record', 'desc' => 'Information entered once flows everywhere it needs to, instead of being retyped into a second or third system.'],
        ],
        'case_study' => 'lakeshore-mutual-insurance-claims-automation-case-study',
        'related_services' => ['ai-machine-learning-development', 'custom-software-development', 'enterprise-software-development'],
    ],

    'customer-portal-development' => [
        'title' => 'Customer Portal Development',
        'icon' => 'fas fa-user-group',
        'meta_title' => 'Customer Portal Development | Kawach Technology',
        'meta_description' => 'Kawach Technology builds custom customer and client portals so the people you serve can check status, records and payments themselves, without calling your office.',
        'focus_keyword' => 'customer portal development',
        'problem_intro' => "Every phone call that starts with \"can you just check on...\" is a question your customers would rather answer themselves, if you gave them a way to. A customer portal is exactly that — self-service access to the information they'd otherwise have to call and ask for.",
        'signs' => [
            'Customers or clients call or email just to check status, a balance, or a record that already exists in one of your systems.',
            'Front-desk or support staff spend real time each day answering the same handful of lookup questions.',
            'There\'s no way for a customer to update their own information without a staff member doing it for them.',
            'Documents, invoices or records get sent one-off by email instead of living somewhere the customer can access anytime.',
            'You\'ve outgrown a generic client-login add-on and need the portal to reflect your specific data and workflow.',
        ],
        'solution_features' => [
            ['title' => 'Self-Service Account Access', 'desc' => 'Customers log in to see their own records, status and history — without a phone call to your team.'],
            ['title' => 'Document & Record Access', 'desc' => 'Invoices, reports, forms and records available on demand instead of sent one-off by email.'],
            ['title' => 'Status & Progress Tracking', 'desc' => 'Whatever your customers currently call to ask about — an application, a case, an order — shown in real time.'],
            ['title' => 'Secure Payments & Forms', 'desc' => 'Payments, updates and submissions handled directly in the portal, with the validation and security a public-facing tool needs.'],
            ['title' => 'Role-Based Access', 'desc' => 'Each portal user sees only what\'s theirs — built in from the data model, not bolted on with a permissions plugin.'],
        ],
        'case_study' => 'bright-horizons-school-group-erp-case-study',
        'related_services' => ['web-application-development', 'crm-development', 'custom-software-development'],
    ],

    'excel-to-custom-software' => [
        'title' => 'Replacing Excel With Custom Software',
        'icon' => 'fas fa-table-cells',
        'meta_title' => 'Replace Excel With Custom Software | Kawach Technology',
        'meta_description' => 'Signs your business has outgrown spreadsheets, and how Kawach Technology replaces scattered Excel files with one connected system built around your actual workflow.',
        'focus_keyword' => 'replace excel with custom software',
        'problem_intro' => "Excel is genuinely excellent at what it was built for — and a real liability once it becomes the system a business actually runs on. The tell isn't that you use spreadsheets; it's when reconciling them has become someone's real, recurring job.",
        'signs' => [
            'Getting one answer (total revenue, current stock, this month\'s hours) means combining numbers from several different spreadsheets by hand.',
            'More than one person edits the same file, and version conflicts or overwritten work happen regularly.',
            'A single person has become the one who "knows how the spreadsheet works," which is a real business risk if they\'re out or leave.',
            'The spreadsheet has grown macros, hidden tabs and manual workarounds that make it fragile and slow.',
            'Reporting takes hours of manual reconciliation instead of being available on demand.',
        ],
        'solution_features' => [
            ['title' => 'One Source of Truth', 'desc' => 'Data lives in one connected system instead of being copied between files, so the numbers agree without manual reconciliation.'],
            ['title' => 'Real-Time Reporting', 'desc' => 'Answers that used to take an afternoon of cross-referencing spreadsheets are available on demand.'],
            ['title' => 'Multi-User Without Conflicts', 'desc' => 'Built for concurrent use from the start — no more overwritten edits or "who has the latest version" confusion.'],
            ['title' => 'Built-In Validation', 'desc' => 'Rules and required fields prevent the data-entry errors that spreadsheets have no way to catch.'],
            ['title' => 'No Single Point of Failure', 'desc' => 'The system doesn\'t depend on one person understanding an increasingly complex file to keep working.'],
        ],
        'case_study' => 'sterling-cross-legal-partners-case-management-case-study',
        'related_services' => ['custom-software-development', 'enterprise-software-development', 'crm-development'],
    ],

];
