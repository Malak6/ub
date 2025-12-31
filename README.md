📌 Automation of Cooperation Between Al‑Birr Charity & UNICEF
A Graduation Project – Digital Health Automation System
📝 Overview
This project automates the collaboration between Al‑Birr Syrian Charity and UNICEF to combat malnutrition in Daraa, Syria.
It replaces slow, paper‑based workflows with a fully digital health platform that enables doctors, nutritionists, pharmacists, and beneficiaries to manage health services efficiently and accurately.

🎯 Main Goals
Digitize health center operations (patient records, appointments, medicine tracking).

Enhance service quality by reducing errors and improving access to information.

Strengthen cooperation between Al‑Birr and UNICEF through shared workflows and automated reports.

Empower beneficiaries (mothers, children, guardians) with a mobile app to track health status.

Promote awareness by sending educational and health‑related messages.

👥 System Users
The platform supports multiple user roles, each with dedicated tools:

Patients / Beneficiaries: View medical records, visits, medications, and appointments.

Guardians: Track their children’s health and treatment progress.

Doctors: Add examination results, write prescriptions, and review patient history.

Nutritionists: Conduct nutrition assessments, enroll patients in OTP/TSFP programs, follow up visits, and send advice.

Pharmacists: Manage medicine stock, requests, and disposal.

Receptionists: Create/update patient accounts and manage daily appointments.

Health Education Staff: Record awareness sessions and send health messages.

Statisticians / Admins: Manage employees, contracts, and generate daily/monthly/yearly reports.

🏗️ System Design
The system is built using scalable and maintainable software architecture:

Layered Architecture: Clear separation of views, routers, middleware, repositories, and models.

Repository Pattern: Organized and maintainable database access.

AOP (Aspect‑Oriented Programming): Centralized logging and cross‑cutting concerns.

Façade Pattern: Simplified interfaces for complex operations.

🛠️ Technologies
Backend: PHP Laravel

Mobile Applications: Flutter (Dart)

Web Dashboards: React.js

Database: SQL

Design & Modeling: Figma, Draw.io, Lucidchart

Deployment: Hostinger (backend), Netlify (web)

⚠️ Challenges Solved
Managing 9 user roles with different permissions.

Handling complex medical data with frequent updates.

Ensuring data privacy and accurate documentation.

Supporting multiple visit types for children and women.

Generating advanced Excel reports from large datasets.

🧪 Testing
The system was validated using:

Black‑box testing: Verifying features from the user perspective.

White‑box testing: Ensuring internal logic and workflows function correctly.

🚀 Future Improvements
Enable pharmacists to request supplies from supervisors.

Add emergency communication tools for staff.

Automate inpatient care programs in hospitals.

Provide remote nutrition consultations.

Enhance employee management (leave requests, approvals, etc.).

🔍 Detailed System Features
Below is a unified and enhanced description of the system’s core features:

1. 🗂️ Patient Records Management
Easy creation and updating of patient records.

Automatic insertion of visit dates and specialist IDs.

Real‑time access to patient information for faster decision‑making.

2. 💊 Medication Dispensing Requests
Create medication requests linked to specific visits.

Specify drugs and quantities to streamline pharmacy operations.

Improve tracking and reduce medication errors.

3. 📤 Report Exporting (Excel)
Export customized reports in Excel format.

Generate administrative, statistical, or analytical reports based on selected criteria.

4. ⚡ Performance Optimization
Optimized SQL queries for faster data retrieval.

Indexed patient records to improve system performance with large datasets.

5. 🖥️ User‑Friendly Interface
Intuitive UI designed with modern usability principles.

Reduces training time and improves user experience across all roles.

6. 🛡️ Error Handling
Robust mechanisms for handling connectivity issues and missing records.

Ensures system stability and uninterrupted workflow.

7. 🧱 Repository Design Pattern
Separates business logic from data access logic.

Enhances maintainability, scalability, and code organization.

8. 👥 Multi‑User Support
Supports simultaneous access by multiple users.

Enables efficient collaboration across departments.

9. ⚙️ Real‑Time Data Access
Provides up‑to‑date patient information instantly.

Helps healthcare professionals make informed decisions quickly.

10. 🔐 Security Features
User authentication and role‑based access control.

Data protection measures to secure sensitive patient information.

📘 Comprehensive Overview of System Features
A more detailed, expanded breakdown of the system’s capabilities:

1. Patient Record Management
Data Entry: Capture personal details, medical history, and contact information.

Record Updates: Keep patient data accurate and up‑to‑date.

Search Functionality: Search by name, ID, date of birth, and more.

2. Medication Dispensing Requests
Linked to Visits: Ensure prescriptions are tied to specific visits.

Inventory Management: Alerts for low stock and medication tracking.

Dosage & Instructions: Add dosage details and special notes.

3. Report Exporting
Customizable Reports: Filter by date, visit type, medication, etc.

Data Visualization: Charts and graphs for better insights.

Scheduled Reporting: Automate recurring reports.

4. Performance Optimization
Database Indexing: Faster queries on large datasets.

Caching: Reduce load times for frequently accessed data.

Load Balancing: Maintain performance during peak usage.

5. User‑Friendly Interface
Intuitive Navigation: Clear menus and workflows.

Responsive Design: Works on tablets, desktops, and mobile devices.

Help & Support: Built‑in guidance for users.

6. Error Handling Mechanisms
Real‑Time Alerts: Immediate notifications for issues.

Logging & Tracking: Full logs for debugging and auditing.

User Feedback: Report issues directly through the system.

7. Repository Design Pattern
Separation of Concerns: Cleaner, more maintainable code.

Unit Testing: Easier testing of system components.

Scalability: Add new features without major refactoring.

8. Multi‑User Support
Role‑Based Access Control: Permissions for each role.

Concurrent Access: Smooth performance with many users.

Audit Trails: Track user actions for compliance.

9. Real‑Time Data Access
Instant Updates: Always‑current patient data.

System Integration: Connect with labs, billing, and more.

Mobile Access: Access data anywhere, anytime.

10. Security Features
Data Encryption: Protect data in transit and at rest.

User Authentication: Secure login and optional MFA.

Regulatory Compliance: Designed to meet healthcare standards.

🧩 Use Case Features of the Patient Record Management System
1. 👤 User Account Management
Create and manage user accounts for different roles (e.g., admin, nurse, doctor).

Assign permissions based on user roles to control access to various system functionalities.

2. 📝 Patient Registration
Input and store patient personal information, medical history, and contact details.

Generate unique patient IDs for easy identification and tracking.

3. 📅 Appointment Scheduling
Allow users to schedule, reschedule, or cancel patient appointments.

Send notifications and reminders to patients regarding their appointments.

4. 🏥 Visit Documentation
Record details of patient visits, including symptoms, diagnoses, and treatment plans.

Link visit records to specific patient profiles for easy retrieval.

5. 💊 Medication Management
Create and manage medication prescriptions linked to patient visits.

Track medication inventory levels and alert users when restocking is needed.

6. 📊 Report Generation
Generate customizable reports based on various criteria (e.g., patient demographics, visit types).

Export reports in multiple formats (e.g., Excel, PDF) for analysis and sharing.

7. 🔍 Data Retrieval
Search for patient records using filters such as name, ID, or date of birth.

Access real-time updates on patient information and visit history.

8. ⚠️ Error Handling
Provide alerts for any errors encountered during data entry or processing.

Log errors for troubleshooting and maintain a history of user actions.

9. 📜 User Activity Tracking
Maintain an audit trail of user actions within the system for accountability.

Monitor access and modifications to patient records for compliance purposes.

10. 🔗 Integration with External Systems
Interface with other healthcare systems (e.g., lab results, billing) to provide a comprehensive view of patient care.

Facilitate data exchange to enhance the continuity of care.


