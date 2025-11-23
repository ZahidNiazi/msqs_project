<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // change namespace if your Category model lives elsewhere
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ["name" => "CSS", "title" => "The CSS (Central Superior Services) Exam", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => "https://example.com/images/comp.jpeg"],
            ["name" => "PMS", "title" => "PMS (Provincial Management Service) Exam", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => "https://example.com/images/comp.jpeg"],
            ["name" => "General Knowledge", "title" => "General Knowledge", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Pakistan Studies/Affairs", "title" => "Pakistan Studies/Affairs", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Current Affairs", "title" => "Current Affairs", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Islamic Studies/Islamiat", "title" => "Islamic Studies/Islamiat", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "General English", "title" => "General English", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "General Science/Everyday Science", "title" => "General Science/Everyday Science", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Mathematics/General Ability", "title" => "Mathematics/General Ability", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Computer Science/IT", "title" => "Computer Science/IT", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Reasoning / Intelligence Questions (IQ)", "title" => "Reasoning / Intelligence Questions (IQ)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Urdu (General)", "title" => "Urdu (General)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "FPSC", "title" => "FPSC (Federal Public Service Commission)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "PPSC", "title" => "PPSC (Punjab Public Service Commission)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "SPSC", "title" => "SPSC (Sindh Public Service Commission)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "KPPSC", "title" => "KPPSC (Khyber Pakhtunkhwa Public Service Commission)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "BPSC", "title" => "BPSC (Balochistan Public Service Commission)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "AJKPSC", "title" => "AJKPSC (Azad Jammu and Kashmir Public Service Commission)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "GBPSC", "title" => "GBPSC (Gilgit-Baltistan Public Service Commission)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "HEC", "title" => "HEC (Higher Education Commission)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Future_Testing main category", "title" => "Future_Testing main category", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "NTS", "title" => "NTS (National Testing Service)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "ETEA", "title" => "ETEA (Educational Testing and Evaluation Agency)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "OTS", "title" => "OTS (Open Testing Service)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "PTS", "title" => "PTS (Pakistan Testing Service)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "CTSP", "title" => "CTSP (Career Testing Services Pakistan):", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "ATS", "title" => "ATS (Allied Testing Service)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "ETC", "title" => "ETC (Education Testing Council)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "QTS", "title" => "QUEST Testing Service (QTS)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Biology", "title" => "Biology", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Botany", "title" => "Botany", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Chemistry", "title" => "Chemistry", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Commerce", "title" => "Commerce", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Computer Science", "title" => "Computer Science", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Economics", "title" => "Economics", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Education/Pedagogy", "title" => "Education/Pedagogy", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "English", "title" => "English", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Geography", "title" => "Geography", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Health & Physical Education", "title" => "Health & Physical Education", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "History", "title" => "History", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "History-cum-Civics", "title" => "History-cum-Civics", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Islamic Studies (Islamiyat)", "title" => "Islamic Studies (Islamiyat)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Mathematics", "title" => "Mathematics", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Pakistan Studies", "title" => "Pakistan Studies", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Pashto", "title" => "Pashto", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Political Science", "title" => "Political Science", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Physics", "title" => "Physics", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Statistics", "title" => "Statistics", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Urdu", "title" => "Urdu", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Zoology", "title" => "Zoology", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "MDCAT", "title" => "National Medical and Dental College Admission Test (MDCAT)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "MDCAT - Punjab", "title" => "Punjab Medical and Dental College Admission Test (MDCAT)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "KP-ETEA MDCAT", "title" => "ETEA Medical and Dental College Admission Test (KP-ETEA MDCAT)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "MDCAT - Sindh", "title" => "Sindh Medical and Dental College Admission Test (MDCAT)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "MDCAT - Balochistan", "title" => "Balochistan MDCAT Icon Balochistan Medical and Dental College Admission Test (MDCAT)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "USAT-M", "title" => "Undergraduate Studies Admission Test (Medical) (USAT-M)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "AKU Entry Test", "title" => "Aga Khan University Entry Test (AKU Entry Test)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "NUMS MDCAT", "title" => "NUMS Medical and Dental College Admission Test (NUMS MDCAT)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "NTS NAT-IM (Pre-Medical)", "title" => "NTS NAT-IM (Pre-Medical)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "KMU CAT", "title" => "Khyber Medical University (KMU - CAT)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null],
            ["name" => "Armed Forces Nursing Service (AFNS)", "title" => "Armed Forces Nursing Service (AFNS)", "description" => "MCQs and preparation resources for competitive exams, covering important concepts, past papers, and detailed explanations.", "image" => null]
            // NOTE: if you have more items beyond this list paste them here following same pattern
        ];

        foreach ($categories as $item) {
            $name = $item['name'] ?? null;
            if (!$name) {
                continue;
            }

            $payload = [
                'title'       => $item['title'] ?? $name,
                'description' => $item['description'] ?? null,
                'image'       => $item['image'] ?? null,
                // Uncomment or add fields if your categories table uses them:
                // 'slug' => Str::slug($name),
                // 'status' => 1,
            ];

            Category::updateOrCreate(
                ['name' => $name],
                $payload
            );
        }
    }
}
