<?php

/*
|--------------------------------------------------------------------------
| Industries — software development by sector
|--------------------------------------------------------------------------
| Single source of truth for the /industries/{slug} pages, mirroring the
| config-driven pattern already used for hire_developers.php. Each entry's
| case_study and related_services slugs must point at pages that actually
| exist and are published — verify before adding a new industry.
*/

return [

    'healthcare-software-development' => [
        'title'    => 'Healthcare Software Development',
        'icon'     => 'fas fa-heart-pulse',
        'meta_title' => 'Healthcare Software Development Company | Kawach Technology',
        'meta_description' => 'Kawach Technology builds healthcare software — patient management, telemedicine and clinical workflow platforms — engineered around real clinical operations and data-handling requirements.',
        'focus_keyword' => 'healthcare software development',
        'intro' => 'Healthcare software has to work for clinical staff under real time pressure, handle sensitive patient data correctly, and connect to the other systems a practice or network already depends on — all without adding friction during a patient visit.',
        'challenges' => [
            ['icon' => 'fas fa-folder-open', 'title' => 'Fragmented Patient Records', 'desc' => 'Patient data often lives across multiple disconnected systems — scheduling in one tool, records in another, billing in a third — making it hard for clinical staff to get a complete picture quickly.'],
            ['icon' => 'fas fa-video', 'title' => 'Telehealth Demand Outpacing Legacy Systems', 'desc' => 'Patients now expect virtual visits, but many existing systems weren\'t built for video consultations, remote monitoring, or asynchronous care.'],
            ['icon' => 'fas fa-user-shield', 'title' => 'Data Privacy and Compliance Pressure', 'desc' => 'Every feature touching patient data carries real compliance weight, and retrofitting privacy controls onto an existing system is far harder than designing them in from the start.'],
            ['icon' => 'fas fa-hourglass-half', 'title' => 'Clinical Staff Have No Time for Clunky Software', 'desc' => 'Software that adds clicks or confusion during a patient visit gets abandoned by clinical staff, no matter how capable it is underneath.'],
        ],
        'solutions' => [
            ['icon' => 'fas fa-notes-medical', 'title' => 'Patient Management Platforms', 'desc' => 'Centralized records, scheduling and care coordination built around how your clinical team actually works.'],
            ['icon' => 'fas fa-video', 'title' => 'Telemedicine & Remote Care', 'desc' => 'Video consultations, remote monitoring and asynchronous care tools that extend your practice beyond the exam room.'],
            ['icon' => 'fas fa-robot', 'title' => 'Clinical Workflow Automation', 'desc' => 'Reduce administrative burden on clinical staff by automating intake, scheduling and documentation busywork.'],
            ['icon' => 'fas fa-right-left', 'title' => 'Interoperability & Data Exchange', 'desc' => 'Systems designed to exchange data safely with the other platforms your practice or network already depends on.'],
        ],
        'features' => ['Patient Portals', 'Appointment Scheduling & Reminders', 'E-Prescribing Integration', 'Secure Messaging', 'Clinical Documentation Tools', 'Remote Patient Monitoring', 'Billing & Insurance Claims', 'Role-Based Access Control'],
        'integrations' => ['EHR / EMR systems', 'Insurance verification and claims APIs', 'Telehealth and video infrastructure', 'Lab and diagnostic result feeds', 'Pharmacy and e-prescribing networks'],
        'compliance' => ['HIPAA-aware data handling', 'Encryption at rest and in transit', 'Role-based access controls', 'Audit logging for patient data access'],
        'related_services' => ['custom-software-development', 'ai-machine-learning-development', 'enterprise-software-development'],
        'case_study' => 'medcare-health-network-telemedicine-case-study',
    ],

    'fintech-software-development' => [
        'title'    => 'FinTech Software Development',
        'icon'     => 'fas fa-sack-dollar',
        'meta_title' => 'FinTech Software Development Company | Kawach Technology',
        'meta_description' => 'Kawach Technology builds financial services software — lending, payments and risk platforms — with the accuracy, auditability and security financial data demands.',
        'focus_keyword' => 'fintech software development',
        'intro' => 'Financial services software has to satisfy regulators, security reviewers and customers at the same time — accuracy and auditability aren\'t optional, and a single mishandled transaction or data incident carries real consequences.',
        'challenges' => [
            ['icon' => 'fas fa-scale-balanced', 'title' => 'Regulatory Complexity', 'desc' => 'Financial software has to satisfy regulators, auditors and security reviewers simultaneously, and requirements vary by market and product type.'],
            ['icon' => 'fas fa-server', 'title' => 'Legacy Core Systems', 'desc' => 'Many financial institutions run on core systems that are difficult and risky to change, slowing down every new feature.'],
            ['icon' => 'fas fa-bolt', 'title' => 'Fraud and Risk in Real Time', 'desc' => 'Fraud detection and risk scoring need to happen in milliseconds, not in a nightly batch job, without creating friction for legitimate customers.'],
            ['icon' => 'fas fa-shield-halved', 'title' => 'Trust Is the Entire Product', 'desc' => 'A single security incident or data mishandling event can be existential for a financial services company in a way it isn\'t for most other industries.'],
        ],
        'solutions' => [
            ['icon' => 'fas fa-file-invoice-dollar', 'title' => 'Lending & Underwriting Platforms', 'desc' => 'Automate document collection, credit checks and underwriting decisions without losing the audit trail regulators require.'],
            ['icon' => 'fas fa-money-bill-transfer', 'title' => 'Payments & Transaction Processing', 'desc' => 'Reliable, auditable transaction systems built to handle real financial volume without silent failures.'],
            ['icon' => 'fas fa-magnifying-glass-chart', 'title' => 'Fraud Detection & Risk Scoring', 'desc' => 'Real-time risk models that flag genuinely suspicious activity without blocking legitimate customers.'],
            ['icon' => 'fas fa-file-shield', 'title' => 'Regulatory Reporting & Audit Trails', 'desc' => 'Systems that generate the reporting and audit trails compliance teams need, without manual reconciliation.'],
        ],
        'features' => ['Automated Underwriting', 'KYC / AML Workflow', 'Real-Time Transaction Monitoring', 'Multi-Factor Authentication', 'Audit Logging', 'Reporting Dashboards', 'Document Verification', 'Role-Based Permissions'],
        'integrations' => ['Payment gateways and processors', 'KYC / AML verification providers', 'Credit bureaus', 'Core banking systems', 'Accounting and ledger software'],
        'compliance' => ['PCI-DSS-aware architecture', 'SOC 2-aligned practices', 'KYC / AML workflow support', 'Encryption and access controls'],
        'related_services' => ['enterprise-software-development', 'custom-software-development', 'ai-machine-learning-development'],
        'case_study' => 'quickfund-financial-services-lending-platform-case-study',
    ],

    'manufacturing-software-development' => [
        'title'    => 'Manufacturing Software Development',
        'icon'     => 'fas fa-industry',
        'meta_title' => 'Manufacturing Software Development Company | Kawach Technology',
        'meta_description' => 'Kawach Technology builds manufacturing software — production tracking, predictive maintenance and industrial IoT platforms — connecting the shop floor to the rest of the business.',
        'focus_keyword' => 'manufacturing software development',
        'intro' => 'Manufacturers need visibility from the shop floor to the back office — production tracking, quality control and equipment data that actually reaches the systems and people who can act on it.',
        'challenges' => [
            ['icon' => 'fas fa-plug-circle-xmark', 'title' => 'Disconnected Shop-Floor Data', 'desc' => 'Machine and sensor data often stays trapped on the factory floor, invisible to the business systems that could act on it.'],
            ['icon' => 'fas fa-triangle-exclamation', 'title' => 'Unplanned Downtime', 'desc' => 'Reactive maintenance means expensive, unplanned downtime instead of catching problems before they cause a stoppage.'],
            ['icon' => 'fas fa-microchip', 'title' => 'Legacy Industrial Systems', 'desc' => 'Many plants run on decades-old control and reporting systems that are difficult to extend or integrate with modern software.'],
            ['icon' => 'fas fa-magnifying-glass', 'title' => 'Quality Control at Scale', 'desc' => 'Manual quality checks don\'t scale as production volume grows, and inconsistency is expensive to trace back to its source.'],
        ],
        'solutions' => [
            ['icon' => 'fas fa-satellite-dish', 'title' => 'Industrial IoT & Predictive Maintenance', 'desc' => 'Connect equipment sensor data to software that flags developing problems before they cause downtime.'],
            ['icon' => 'fas fa-chart-line', 'title' => 'Production Tracking Systems', 'desc' => 'Real-time visibility into what\'s being produced, where, and at what rate, across lines and shifts.'],
            ['icon' => 'fas fa-clipboard-check', 'title' => 'Quality Control & Traceability', 'desc' => 'Systems that catch quality issues early and trace them back to a specific batch, machine or shift.'],
            ['icon' => 'fas fa-diagram-project', 'title' => 'ERP & Shop-Floor Integration', 'desc' => 'Connect shop-floor data to the ERP and business systems that need it, instead of manual data re-entry.'],
        ],
        'features' => ['Real-Time Equipment Monitoring', 'Predictive Maintenance Alerts', 'Production Dashboards', 'Quality Control Tracking', 'Inventory & Materials Tracking', 'Shift & Labor Reporting', 'SCADA / PLC Integration', 'Maintenance Scheduling'],
        'integrations' => ['SCADA and PLC systems', 'ERP platforms', 'IoT sensor networks and gateways', 'Warehouse and inventory management systems', 'Barcode / RFID scanning systems'],
        'compliance' => ['Industry safety and quality standards', 'Data integrity for audit and traceability requirements'],
        'related_services' => ['enterprise-software-development', 'software-modernization', 'custom-software-development'],
        'case_study' => 'nordholt-manufacturing-industrial-iot-case-study',
    ],

    'logistics-software-development' => [
        'title'    => 'Logistics Software Development',
        'icon'     => 'fas fa-truck-fast',
        'meta_title' => 'Logistics Software Development Company | Kawach Technology',
        'meta_description' => 'Kawach Technology builds logistics software — fleet tracking, route optimization and warehouse systems — built to handle real-time operational data.',
        'focus_keyword' => 'logistics software development',
        'intro' => 'Logistics runs on real-time data — where a vehicle is, what\'s in a warehouse, when a shipment will arrive — and software built for batch updates instead of live data quickly becomes a liability.',
        'challenges' => [
            ['icon' => 'fas fa-map-location-dot', 'title' => 'No Real-Time Visibility', 'desc' => 'Without live tracking, businesses and customers alike are left guessing where a shipment actually is.'],
            ['icon' => 'fas fa-route', 'title' => 'Route and Fleet Inefficiency', 'desc' => 'Manual route planning wastes fuel, driver time and vehicle capacity that better software could reclaim.'],
            ['icon' => 'fas fa-warehouse', 'title' => 'Disconnected Systems Across the Supply Chain', 'desc' => 'Warehouse, transportation and customer-facing systems often don\'t talk to each other, creating manual reconciliation work.'],
            ['icon' => 'fas fa-arrow-trend-up', 'title' => 'Scaling Operations Without Scaling Chaos', 'desc' => 'Growth often means more manual coordination work rather than more efficient operations, unless the software scales with it.'],
        ],
        'solutions' => [
            ['icon' => 'fas fa-location-crosshairs', 'title' => 'Real-Time Fleet & Shipment Tracking', 'desc' => 'Live visibility into vehicle location and shipment status for your team and your customers.'],
            ['icon' => 'fas fa-route', 'title' => 'Route Optimization', 'desc' => 'Plan routes around real constraints — traffic, capacity, delivery windows — instead of static, manually-drawn routes.'],
            ['icon' => 'fas fa-boxes-stacked', 'title' => 'Warehouse & Inventory Systems', 'desc' => 'Connect warehouse operations to the transportation and customer-facing systems that depend on accurate inventory data.'],
            ['icon' => 'fas fa-mobile-screen', 'title' => 'Customer-Facing Tracking Portals', 'desc' => 'Give your customers the same shipment visibility your operations team has, without a phone call.'],
        ],
        'features' => ['GPS Fleet Tracking', 'Route Planning & Optimization', 'Delivery Proof & E-Signatures', 'Warehouse Management', 'Customer Tracking Portals', 'Driver Mobile Apps', 'Automated Dispatch', 'Real-Time Alerts & Exceptions'],
        'integrations' => ['GPS / telematics providers', 'Carrier and freight APIs', 'Warehouse management systems', 'ERP and inventory platforms', 'Customer notification (SMS / email) services'],
        'compliance' => ['Data protection for customer and location data', 'Driver hours-of-service data handling considerations'],
        'related_services' => ['custom-software-development', 'mobile-app-development', 'ai-machine-learning-development'],
        'case_study' => 'swiftcargo-logistics-fleet-tracking-case-study',
    ],

    'retail-software-development' => [
        'title'    => 'Retail Software Development',
        'icon'     => 'fas fa-cart-shopping',
        'meta_title' => 'Retail Software Development Company | Kawach Technology',
        'meta_description' => 'Kawach Technology builds retail and e-commerce software — custom storefronts, inventory systems and AI-powered recommendations — for businesses that have outgrown off-the-shelf platforms.',
        'focus_keyword' => 'retail software development',
        'intro' => 'Retail and e-commerce businesses that have outgrown off-the-shelf platforms need software built for how they actually sell — across channels, through peak traffic, and personalized to real customer behavior.',
        'challenges' => [
            ['icon' => 'fas fa-shop-slash', 'title' => 'Outgrowing Off-the-Shelf E-Commerce', 'desc' => 'Generic e-commerce platforms cap out on customization exactly when a growing retailer needs to differentiate.'],
            ['icon' => 'fas fa-boxes-packing', 'title' => 'Inventory Across Channels', 'desc' => 'Keeping stock levels accurate across a website, marketplace listings and physical locations is hard without a connected system.'],
            ['icon' => 'fas fa-chart-line', 'title' => 'Traffic Spikes Around Peak Periods', 'desc' => 'Seasonal or promotional traffic spikes can be far above normal load, and systems not built for it fail exactly when revenue is highest.'],
            ['icon' => 'fas fa-user-tag', 'title' => 'Personalization Expectations', 'desc' => 'Customers increasingly expect relevant recommendations and personalized experiences, which most template-based platforms can\'t deliver well.'],
        ],
        'solutions' => [
            ['icon' => 'fas fa-store', 'title' => 'Custom Storefronts & Checkout', 'desc' => 'Storefronts built to convert for your specific catalog and customers, not a generic template.'],
            ['icon' => 'fas fa-warehouse', 'title' => 'Multi-Channel Inventory Sync', 'desc' => 'One accurate view of inventory across your website, marketplaces and physical locations.'],
            ['icon' => 'fas fa-wand-magic-sparkles', 'title' => 'AI-Powered Recommendations', 'desc' => 'Product recommendations grounded in your actual catalog and customer behavior, not a generic model.'],
            ['icon' => 'fas fa-server', 'title' => 'Scalable Infrastructure for Peak Traffic', 'desc' => 'Architecture built to handle your busiest day, not just your average one.'],
        ],
        'features' => ['Custom Storefront & Checkout', 'Multi-Channel Inventory Management', 'Product Recommendation Engines', 'Customer Accounts & Order History', 'Promotions & Discount Engines', 'Marketplace Integrations', 'Analytics Dashboards', 'Mobile Commerce'],
        'integrations' => ['Payment gateways', 'POS and in-store systems', 'Marketplace APIs', 'Shipping and fulfillment providers', 'Marketing and email platforms'],
        'compliance' => ['PCI-DSS-aware payment handling', 'Data protection for customer information'],
        'related_services' => ['custom-software-development', 'ai-machine-learning-development', 'saas-development'],
        'case_study' => 'urban-threads-apparel-ecommerce-ai-case-study',
    ],

    'education-software-development' => [
        'title'    => 'Education Software Development',
        'icon'     => 'fas fa-graduation-cap',
        'meta_title' => 'Education Software Development Company | Kawach Technology',
        'meta_description' => 'Kawach Technology builds education software — student information systems, fee management and multi-campus ERP platforms — for schools and education groups.',
        'focus_keyword' => 'education software development',
        'intro' => 'Schools and education groups managing multiple campuses or programs need administrative systems that reflect how the institution is actually structured, not a one-size-fits-all system stretched across every campus.',
        'challenges' => [
            ['icon' => 'fas fa-building-columns', 'title' => 'Managing Multiple Campuses or Programs', 'desc' => 'Running admissions, attendance and fees separately across campuses or programs multiplies manual work and inconsistency.'],
            ['icon' => 'fas fa-file-pen', 'title' => 'Manual Administrative Processes', 'desc' => 'Enrollment, attendance and fee collection often still run on spreadsheets and paper forms, consuming staff time that could go toward students.'],
            ['icon' => 'fas fa-comments', 'title' => 'Parent and Student Communication Gaps', 'desc' => 'Families expect visibility into attendance, grades and fees without having to call the front office.'],
            ['icon' => 'fas fa-plug-circle-xmark', 'title' => 'Disconnected Systems', 'desc' => 'Student information, learning management and finance systems often don\'t share data, creating duplicate data entry and inconsistency.'],
        ],
        'solutions' => [
            ['icon' => 'fas fa-id-card', 'title' => 'Student Information Systems', 'desc' => 'Centralize admissions, enrollment, attendance and records in one system built around how your institution is structured.'],
            ['icon' => 'fas fa-file-invoice-dollar', 'title' => 'Fee & Payment Management', 'desc' => 'Automate fee collection, invoicing and payment tracking across programs or campuses.'],
            ['icon' => 'fas fa-users', 'title' => 'Parent & Student Portals', 'desc' => 'Give families self-service visibility into attendance, fees and progress, reducing front-office workload.'],
            ['icon' => 'fas fa-chart-pie', 'title' => 'Multi-Campus Reporting', 'desc' => 'Reporting that rolls up across campuses or programs while still letting each location manage its own day-to-day operations.'],
        ],
        'features' => ['Admissions & Enrollment Management', 'Attendance Tracking', 'Fee Collection & Invoicing', 'Parent / Student Portals', 'Multi-Campus Reporting', 'Staff & Timetable Management', 'Communication Tools', 'Document Management'],
        'integrations' => ['Payment and fee processors', 'Learning management systems (LMS)', 'Communication tools (SMS / email)', 'Accounting software'],
        'compliance' => ['Student data privacy considerations', 'Age-appropriate data handling for minors'],
        'related_services' => ['erp-development', 'custom-software-development', 'crm-development'],
        'case_study' => 'bright-horizons-school-group-erp-case-study',
    ],

];
