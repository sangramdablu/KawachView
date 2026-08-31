<?php

/*
|--------------------------------------------------------------------------
| Careers — open job listings
|--------------------------------------------------------------------------
| Single source of truth for the /careers page. Not admin-managed — add
| a new entry here when a role opens, following the same shape.
*/

return [

    'nodejs-developer' => [
        'title'            => 'Node.js Developer',
        'department'       => 'Engineering',
        'location'         => 'Remote / New Delhi, India',
        'type'             => 'Full-time',
        'experience_level' => '2-5 years',
        'summary'          => 'We\'re looking for a Node.js developer to help design and build high-throughput APIs and backend services for our client projects, working alongside our full-stack and DevOps teams.',
        'responsibilities' => [
            'Design, build, and maintain scalable REST and GraphQL APIs using Node.js.',
            'Work with Express/NestJS, PostgreSQL/MongoDB, and Redis to build reliable backend services.',
            'Collaborate with frontend and DevOps engineers to ship features end-to-end.',
            'Write clean, tested, well-documented code and participate in code reviews.',
            'Diagnose and fix performance bottlenecks in production systems.',
        ],
        'requirements' => [
            '2+ years of professional experience building backend services with Node.js.',
            'Strong understanding of asynchronous programming, REST API design, and SQL/NoSQL databases.',
            'Experience with Git, CI/CD pipelines, and containerized deployments (Docker).',
            'Comfortable working in an Agile team with 2-week sprints.',
            'Good written communication — this is a remote-friendly role.',
        ],
        'nice_to_have' => [
            'Experience with TypeScript, NestJS, or GraphQL.',
            'Exposure to AWS or other cloud infrastructure.',
            'Prior experience in an agency/consultancy setting with multiple concurrent client projects.',
        ],
    ],

];
