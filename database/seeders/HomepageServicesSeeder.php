<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Adds Kawach Technology's core service catalogue (Custom Software, Web, Mobile,
 * UI/UX, Cloud/DevOps, AI/ML, Dedicated Teams, QA) as published `service` pages.
 * Idempotent — safe to re-run; matches existing rows by slug via updateOrCreate.
 */
class HomepageServicesSeeder extends Seeder
{
    public function run(): void
    {
        $authorId = 1;

        $services = [
            [
                'sort_order' => 1,
                'title' => 'Custom Software Development',
                'slug' => 'custom-software-development',
                'focus_keyword' => 'custom software development',
                'meta_title' => 'Custom Software Development Services | Kawach Technology',
                'meta_description' => 'Kawach Technology designs and builds custom software solutions tailored to your workflows — scalable, secure, and engineered for long-term business growth.',
                'short_description' => 'We design and build custom software solutions tailored to your exact business workflows — from enterprise platforms to internal tools — engineered for scalability, security, and long-term growth.',
                'content' => '<p>Off-the-shelf software rarely fits every workflow. Our custom software development team partners with you from discovery through deployment to build applications that match how your business actually operates, not the other way around.</p><p>Every engagement starts with requirement mapping and system architecture planning, followed by agile development sprints so you see working software early and often. The result is a scalable, secure custom software solution built on modern engineering practices and designed to grow with your business.</p>',
                'features' => [
                    ['title' => 'Requirement & Discovery Workshops', 'description' => 'In-depth workshops to map business goals, user workflows, and technical constraints before a single line of code is written.'],
                    ['title' => 'Scalable Architecture Design', 'description' => 'Systems designed to handle growth in users, data, and features without costly rewrites down the line.'],
                    ['title' => 'Agile Development Sprints', 'description' => '2-week sprint cycles with working demos, so you can track progress and adjust priorities in real time.'],
                    ['title' => 'Third-Party System Integration', 'description' => 'Seamless integration with your existing CRMs, ERPs, payment gateways, and internal tools.'],
                    ['title' => 'Post-Launch Support', 'description' => 'Ongoing maintenance, monitoring, and feature updates after your software goes live.'],
                ],
                'technologies' => 'PHP, Laravel, Node.js, Python, React, PostgreSQL, MySQL, AWS',
            ],
            [
                'sort_order' => 2,
                'title' => 'Web Application Development',
                'slug' => 'web-application-development',
                'focus_keyword' => 'web application development',
                'meta_title' => 'Web Application Development Services | Kawach Technology',
                'meta_description' => 'From responsive websites to complex SaaS platforms, Kawach Technology builds fast, secure, SEO-friendly web applications using modern frameworks that scale.',
                'short_description' => 'From responsive marketing sites to complex SaaS platforms, our web development team builds fast, secure, and SEO-friendly web applications using modern frameworks that scale with your business.',
                'content' => '<p>Your website or web app is often the first interaction a customer has with your brand. We build web applications that load fast, rank well, and hold up under real-world traffic — whether that\'s a marketing site, a customer portal, or a full multi-tenant SaaS product.</p><p>Our web application development process combines clean architecture, responsive design, and performance optimization from day one, so you launch with a platform that\'s ready to scale rather than one you\'ll need to rebuild in a year.</p>',
                'features' => [
                    ['title' => 'Responsive & Accessible UI', 'description' => 'Interfaces that work smoothly across desktop, tablet, and mobile, built to WCAG accessibility standards.'],
                    ['title' => 'Search Engine Optimization Ready', 'description' => 'Semantic markup, fast load times, and technical SEO foundations built into every page.'],
                    ['title' => 'Secure Authentication & Data Handling', 'description' => 'Industry-standard authentication, role-based access, and encrypted data handling.'],
                    ['title' => 'Progressive Web App Support', 'description' => 'Offline-ready, installable web apps that feel native on any device.'],
                    ['title' => 'Performance Optimization', 'description' => 'Caching, lazy loading, and query optimization to keep your app fast as it grows.'],
                ],
                'technologies' => 'React, Vue.js, Laravel, Node.js, Next.js, Tailwind CSS',
            ],
            [
                'sort_order' => 3,
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'focus_keyword' => 'mobile app development',
                'meta_title' => 'Mobile App Development Services | Kawach Technology',
                'meta_description' => 'Kawach Technology builds native and cross-platform iOS & Android apps with smooth performance, intuitive design, and measurable user engagement.',
                'short_description' => 'We build native and cross-platform mobile apps for iOS and Android that deliver smooth performance, intuitive design, and measurable engagement for startups and enterprises alike.',
                'content' => '<p>A great mobile app needs to feel instant, look native, and work reliably across devices. Our mobile app development team builds both native and cross-platform apps, choosing the right approach based on your budget, timeline, and performance needs.</p><p>From the first wireframe to App Store and Play Store submission, we handle UI design, backend integration, push notifications, and post-launch updates — so your app keeps performing after it ships.</p>',
                'features' => [
                    ['title' => 'Cross-Platform Development', 'description' => 'Single codebase apps built with Flutter or React Native that run natively on both iOS and Android.'],
                    ['title' => 'Native iOS & Android Apps', 'description' => 'Fully native applications when performance or platform-specific features demand it.'],
                    ['title' => 'App Store & Play Store Deployment', 'description' => 'End-to-end handling of store listings, compliance review, and release management.'],
                    ['title' => 'Push Notifications & Offline Support', 'description' => 'Engagement features that keep users connected, even without an active connection.'],
                    ['title' => 'Ongoing App Maintenance', 'description' => 'OS updates, bug fixes, and feature releases to keep your app compatible and competitive.'],
                ],
                'technologies' => 'Flutter, React Native, Swift, Kotlin, Firebase',
            ],
            [
                'sort_order' => 4,
                'title' => 'UI/UX Design Services',
                'slug' => 'ui-ux-design-services',
                'focus_keyword' => 'ui ux design services',
                'meta_title' => 'UI/UX Design Services | Kawach Technology',
                'meta_description' => 'Kawach Technology crafts user-centered UI/UX design backed by research, wireframing, and usability testing to turn complex workflows into intuitive products.',
                'short_description' => 'Our design team crafts user-centered interfaces backed by research, wireframing, and usability testing — turning complex workflows into intuitive, conversion-focused digital experiences.',
                'content' => '<p>Good design is invisible — it just works. Our UI/UX design process starts with understanding your users, not with pixels, so every screen we design solves a real problem instead of just looking polished.</p><p>We deliver wireframes, interactive prototypes, and complete design systems that your development team can build from directly, keeping your product visually consistent as it scales across new features and platforms.</p>',
                'features' => [
                    ['title' => 'User Research & Persona Mapping', 'description' => 'Research-driven insights into who your users are and what they actually need from your product.'],
                    ['title' => 'Wireframing & Interactive Prototyping', 'description' => 'Clickable prototypes that let you test the experience before development begins.'],
                    ['title' => 'Design Systems & UI Kits', 'description' => 'Reusable component libraries that keep your product visually consistent as it grows.'],
                    ['title' => 'Usability Testing', 'description' => 'Real-user testing sessions to catch friction points before launch.'],
                    ['title' => 'Conversion-Focused Design', 'description' => 'Layouts and flows optimized to guide users toward the actions that matter to your business.'],
                ],
                'technologies' => 'Figma, Adobe XD, Sketch',
            ],
            [
                'sort_order' => 5,
                'title' => 'Cloud & DevOps Solutions',
                'slug' => 'cloud-devops-solutions',
                'focus_keyword' => 'cloud devops solutions',
                'meta_title' => 'Cloud & DevOps Solutions | Kawach Technology',
                'meta_description' => 'Migrate, automate, and scale on the cloud with Kawach Technology — secure infrastructure, CI/CD pipelines, and 24/7 monitoring that reduce downtime and costs.',
                'short_description' => 'We help businesses migrate, automate, and scale on the cloud with secure infrastructure, CI/CD pipelines, and 24/7 monitoring — reducing downtime and deployment friction.',
                'content' => '<p>Manual deployments and unmonitored servers don\'t scale. Our cloud and DevOps engineers set up automated pipelines and resilient infrastructure so your team can ship confidently, without late-night firefighting.</p><p>Whether you\'re migrating to the cloud for the first time or optimizing an existing AWS, Azure, or GCP setup, we focus on security, cost efficiency, and uptime — backed by continuous monitoring and infrastructure as code.</p>',
                'features' => [
                    ['title' => 'Cloud Migration', 'description' => 'Safe, staged migration to AWS, Azure, or Google Cloud with minimal downtime.'],
                    ['title' => 'CI/CD Pipeline Setup', 'description' => 'Automated build, test, and deployment pipelines that ship code faster and safer.'],
                    ['title' => 'Infrastructure as Code', 'description' => 'Version-controlled infrastructure that\'s repeatable, auditable, and easy to scale.'],
                    ['title' => '24/7 Application Monitoring', 'description' => 'Real-time alerting and monitoring to catch issues before they impact users.'],
                    ['title' => 'Security Hardening & Cost Optimization', 'description' => 'Infrastructure audits that tighten security and cut unnecessary cloud spend.'],
                ],
                'technologies' => 'AWS, Azure, Docker, Kubernetes, Terraform, GitHub Actions',
            ],
            [
                'sort_order' => 6,
                'title' => 'AI & Machine Learning Development',
                'slug' => 'ai-machine-learning-development',
                'focus_keyword' => 'ai machine learning development',
                'meta_title' => 'AI & Machine Learning Development | Kawach Technology',
                'meta_description' => 'Kawach Technology builds practical AI and machine learning solutions — predictive analytics, NLP, and LLM-powered features that drive measurable business ROI.',
                'short_description' => 'We build practical AI and machine learning solutions — from predictive analytics to intelligent automation and LLM-powered features — that solve real business problems and drive measurable ROI.',
                'content' => '<p>AI is most valuable when it solves a specific business problem, not when it\'s bolted on for the sake of it. Our machine learning engineers start with your data and your goals, then build models and AI features that fit directly into your existing product.</p><p>From predictive analytics to custom chatbots and retrieval-augmented LLM integrations, we handle the full lifecycle — data preparation, model development, and production deployment — so AI in your product actually delivers results.</p>',
                'features' => [
                    ['title' => 'Predictive Analytics & Data Modeling', 'description' => 'Models that turn your historical data into forward-looking business insights.'],
                    ['title' => 'Natural Language Processing', 'description' => 'Text classification, sentiment analysis, and language understanding built into your product.'],
                    ['title' => 'AI Chatbots & Virtual Assistants', 'description' => 'Conversational AI that handles support, lead qualification, and internal workflows.'],
                    ['title' => 'Computer Vision Solutions', 'description' => 'Image and video analysis for quality control, recognition, and automation use cases.'],
                    ['title' => 'Custom LLM & RAG Integrations', 'description' => 'Retrieval-augmented generation pipelines that ground AI responses in your own data.'],
                ],
                'technologies' => 'Python, TensorFlow, PyTorch, OpenAI API, LangChain',
            ],
            [
                'sort_order' => 7,
                'title' => 'Dedicated Development Teams',
                'slug' => 'dedicated-development-teams',
                'focus_keyword' => 'dedicated development team',
                'meta_title' => 'Hire Dedicated Development Teams | Kawach Technology',
                'meta_description' => 'Scale your engineering capacity fast with dedicated developers, QA engineers, and PMs from Kawach Technology who integrate directly into your workflow.',
                'short_description' => 'Scale your engineering capacity fast — hire dedicated developers, QA engineers, and project managers from Kawach Technology who integrate directly into your existing workflow and time zone.',
                'content' => '<p>Hiring in-house takes months; scaling your roadmap can\'t always wait. Our dedicated development teams give you senior engineers, QA specialists, and project managers who plug directly into your existing tools, standups, and sprint cycles.</p><p>You get the flexibility of an extended in-house team — full control over priorities and code — without the overhead of recruiting, payroll, and benefits administration.</p>',
                'features' => [
                    ['title' => 'Flexible Hiring Models', 'description' => 'Full-time, part-time, or hourly engagement models built around your budget and timeline.'],
                    ['title' => 'Pre-Vetted Senior Developers', 'description' => 'Engineers screened for technical depth and real-world project experience.'],
                    ['title' => 'Seamless Team Integration', 'description' => 'Developers who join your existing Slack, Jira, and Git workflows from day one.'],
                    ['title' => 'Transparent Time Tracking & Reporting', 'description' => 'Full visibility into hours, progress, and deliverables at every stage.'],
                    ['title' => 'No Long-Term Lock-In', 'description' => 'Scale your team up or down as your roadmap changes, without rigid contracts.'],
                ],
                'technologies' => 'React, Node.js, Laravel, Python, Flutter, DevOps',
            ],
            [
                'sort_order' => 8,
                'title' => 'Quality Assurance & Software Testing',
                'slug' => 'quality-assurance-software-testing',
                'focus_keyword' => 'quality assurance software testing',
                'meta_title' => 'QA & Software Testing Services | Kawach Technology',
                'meta_description' => 'Kawach Technology QA engineers combine manual and automated testing to catch bugs early — covering functional, performance, and security testing.',
                'short_description' => 'Our QA engineers combine manual and automated testing to catch bugs before your users do — covering functional, performance, security, and regression testing across web and mobile platforms.',
                'content' => '<p>Shipping fast shouldn\'t mean shipping broken. Our quality assurance team builds testing directly into your development cycle, combining manual exploratory testing with automated test suites so regressions get caught before release, not after.</p><p>We test across browsers, devices, and load conditions, and run dedicated security testing passes to catch vulnerabilities early — giving you confidence in every release.</p>',
                'features' => [
                    ['title' => 'Manual & Automated Testing', 'description' => 'A blend of exploratory manual testing and automated suites for fast, reliable coverage.'],
                    ['title' => 'Performance & Load Testing', 'description' => 'Stress-testing your application under real-world traffic before it becomes a problem in production.'],
                    ['title' => 'Security Testing', 'description' => 'Vulnerability and penetration testing to catch security gaps before attackers do.'],
                    ['title' => 'Cross-Browser & Device Testing', 'description' => 'Verified consistent behavior across browsers, screen sizes, and operating systems.'],
                    ['title' => 'Continuous Regression Testing', 'description' => 'Automated regression suites that run on every release to protect existing functionality.'],
                ],
                'technologies' => 'Selenium, Cypress, JMeter, Postman, JUnit',
            ],
        ];

        DB::transaction(function () use ($services, $authorId) {
            foreach ($services as $data) {
                $page = Page::updateOrCreate(
                    ['slug' => $data['slug']],
                    [
                        'page_type' => 'service',
                        'title' => $data['title'],
                        'status' => 'published',
                        'visibility' => 'public',
                        'is_featured' => false,
                        'sort_order' => $data['sort_order'],
                        'category_id' => null,
                        'author_id' => $authorId,
                        'published_at' => now(),
                        'focus_keyword' => $data['focus_keyword'],
                        'meta_title' => $data['meta_title'],
                        'meta_description' => $data['meta_description'],
                        'robots' => 'index, follow',
                        'schema_type' => 'WebPage',
                        'twitter_card' => 'summary_large_image',
                        'sitemap_priority' => 0.9,
                        'sitemap_changefreq' => 'daily',
                    ]
                );

                PageService::updateOrCreate(
                    ['page_id' => $page->id],
                    [
                        'short_description' => $data['short_description'],
                        'content' => $data['content'],
                        'features' => $data['features'],
                        'technologies' => $data['technologies'],
                    ]
                );
            }
        });

        $this->command?->info('Seeded ' . count($services) . ' services.');
    }
}
