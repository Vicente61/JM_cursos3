<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Certificate;
use App\Models\CertificateTemplate;
use App\Models\Enrollment;
use App\Models\File;
use App\Models\Module;
use App\Models\Partner;
use App\Models\Payment;
use App\Models\Speaker;
use App\Models\StateEnrollment;
use App\Models\StatePayment;
use App\Models\Training;
use App\Models\TypePayment;
use App\Models\TypeRole;
use App\Models\TypeTraining;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Type Roles
        TypeRole::create([
            'name' => 'Administrator',
            'alias' => 'admin'
        ]);

        TypeRole::create([
            'name' => 'User',
            'alias' => 'user'
        ]);

        // Type Trainings
        TypeTraining::create([
            'name' => 'Online Course',
            'alias' => 'online'
        ]);

        TypeTraining::create([
            'name' => 'In-Person Workshop',
            'alias' => 'in-person'
        ]);

        // State Enrollments
        StateEnrollment::create([
            'name' => 'Pending',
            'alias' => 'pending'
        ]);

        StateEnrollment::create([
            'name' => 'Confirmed',
            'alias' => 'confirmed'
        ]);

        // Type Payments
        TypePayment::create([
            'name' => 'Invoice',
            'alias' => 'invoice'
        ]);

        TypePayment::create([
            'name' => 'MBWAY',
            'alias' => 'mbway'
        ]);

        // State Payments
        StatePayment::create([
            'name' => 'Pending',
            'alias' => 'pending'
        ]);

        StatePayment::create([
            'name' => 'Paid',
            'alias' => 'paid'
        ]);

        // Files
        File::create([
            'file_path' => 'storage/files/2026/03/speaker1.jpg',
            'original_file_name' => 'speaker1.jpg',
            'hash' => hash('sha256', 'speaker1.jpg' . time()),
            'mime_type' => 'image/jpeg',
            'size' => 125000
        ]);

        File::create([
            'file_path' => 'storage/files/2026/03/banner1.jpg',
            'original_file_name' => 'banner1.jpg',
            'hash' => hash('sha256', 'banner1.jpg' . time() + 1),
            'mime_type' => 'image/jpeg',
            'size' => 250000
        ]);

        // Users
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '+351912345678',
            'role_id' => 1,
            'password' => 'password'
        ]);

        User::create([
            'name' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'phone' => '+351923456789',
            'role_id' => 2,
            'password' => 'password'
        ]);

        // Trainings
        Training::create([
            'title' => 'Laravel Advanced Programming',
            'description' => 'Deep dive into Laravel framework with advanced topics',
            'training_type_id' => 1,
            'presentation_date_time' => now()->addDays(30),
            'min_enrollments' => 5,
            'max_enrollments' => 30
        ]);

        Training::create([
            'title' => 'Modern Web Development with Vue.js',
            'description' => 'Learn modern frontend development with Vue 3',
            'training_type_id' => 2,
            'presentation_date_time' => now()->addDays(45),
            'min_enrollments' => 10,
            'max_enrollments' => 25
        ]);

        // Speakers
        Speaker::create([
            'photo_file_id' => 1,
            'name' => 'Dr. Maria Santos',
            'title' => 'Senior Software Architect',
            'bio' => 'With over 15 years of experience in web development'
        ]);

        Speaker::create([
            'photo_file_id' => null,
            'name' => 'Eng. Pedro Costa',
            'title' => 'Frontend Specialist',
            'bio' => 'Expert in modern JavaScript frameworks'
        ]);

        // Modules
        Module::create([
            'name' => 'Introduction to Laravel Ecosystem',
            'date_time' => now()->addDays(30)->setTime(9, 0),
            'sort_order' => 1,
            'topics' => 'Installation, Configuration, Routing, Controllers'
        ]);

        Module::create([
            'name' => 'Advanced Eloquent ORM',
            'date_time' => now()->addDays(31)->setTime(14, 0),
            'sort_order' => 2,
            'topics' => 'Relations, Query Builder, Performance Optimization'
        ]);

        // Training-Speaker relationships
        $training1 = Training::find(1);
        $training1->speakers()->attach(1);

        $training2 = Training::find(2);
        $training2->speakers()->attach(2);

        // Module-Training relationships
        $training1->modules()->attach(1, ['sort_order' => 1]);
        $training1->modules()->attach(2, ['sort_order' => 2]);

        // Enrollments
        Enrollment::create([
            'user_id' => 2,
            'training_id' => 1,
            'enrollment_state_id' => 1,
            'is_completed' => false
        ]);

        Enrollment::create([
            'user_id' => 2,
            'training_id' => 2,
            'enrollment_state_id' => 2,
            'is_completed' => false
        ]);

        // Payments
        Payment::create([
            'user_id' => 2,
            'fiscal_name' => 'João Silva',
            'tax_number' => '123456789',
            'payment_type_id' => 1,
            'payment_state_id' => 1,
            'document_number' => 'INV-2026-001',
            'total_amount' => 299.99,
            'issue_date' => now()
        ]);

        Payment::create([
            'user_id' => 2,
            'fiscal_name' => 'João Silva',
            'tax_number' => '123456789',
            'payment_type_id' => 2,
            'payment_state_id' => 2,
            'document_number' => 'REC-2026-001',
            'total_amount' => 199.99,
            'issue_date' => now()
        ]);

        // Enrollment-Payment relationships
        $enrollment1 = Enrollment::find(1);
        $enrollment1->payments()->attach(1);

        $enrollment2 = Enrollment::find(2);
        $enrollment2->payments()->attach(2);

        // Certificate Templates
        CertificateTemplate::create([
            'bg_image_file_id' => 2,
            'start_date' => now()->startOfYear(),
            'end_date' => now()->endOfYear()
        ]);

        CertificateTemplate::create([
            'bg_image_file_id' => 2,
            'start_date' => now()->addYear()->startOfYear(),
            'end_date' => now()->addYear()->endOfYear()
        ]);

        // Certificates
        Certificate::create([
            'enrollment_id' => 1,
            'template_id' => 1,
            'file_id' => null,
            'issue_date' => now()
        ]);

        Certificate::create([
            'enrollment_id' => 2,
            'template_id' => 1,
            'file_id' => null,
            'issue_date' => now()
        ]);

        // Banners
        Banner::create([
            'image_file_id' => 2,
            'start_date' => now(),
            'end_date' => now()->addMonths(3)
        ]);

        Banner::create([
            'image_file_id' => 2,
            'start_date' => now()->addMonths(3),
            'end_date' => now()->addMonths(6)
        ]);

        // Partners
        Partner::create([
            'image_file_id' => 2,
            'is_active' => true,
            'url_link' => 'https://partner1.example.com'
        ]);

        Partner::create([
            'image_file_id' => 2,
            'is_active' => true,
            'url_link' => 'https://partner2.example.com'
        ]);
    }
}
