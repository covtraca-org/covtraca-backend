<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'id' => 1,
                'title' => 'How do you feel physically?',
                'state_name' => 'currentHealth',
                'i18n' => 'currentHealth',
                'type' => 'select',
                'options' => '[
                    {"i18n": "healthy", "label": "As healthy as normal", "value": true},
                    {"i18n": "unhealthy", "label": "Not quite well", "value": false}
                ]',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 2,
                'title' => 'Describe symptoms you are experiencing right now',
                'state_name' => 'symptoms',
                'i18n' => 'symptomsQuestion',
                'type' => 'checkbox',
                'options' => '[
                    {"id": 1, "i18n": "highTemperature", "title": "Do you a high temperature?"},
                    {"id": 2, "i18n": "coughing", "title": "Do you have a newly developed dry cough?"},
                    {"id": 3, "i18n": "soreThroat", "title": "Do you have a sore throat?"},
                    {"id": 4, "i18n": "shortOfBreath", "title": "Are you short of breath?"},
                    {"id": 5, "i18n": "muscleOrJointPain", "title": "Do you have muscle or joint pain?"},
                    {"id": 6, "i18n": "lostSmellOrTaste", "title": "Have you lost your sense of smell or taste?"},
                    {"id": 7, "i18n": "hasFatigue", "title": "Do you feel tired or exhausted?"},
                    {"id": 8, "i18n": "runnyNose", "title": "Do you have a runny nose?"}
                ]',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                ],
            [
                'id' => 3,
                'title' => 'Have you had a test for COVID-19?',                
                'state_name' => 'isTested',
                'i18n' => 'isTested',
                'type' => 'select',
                'options' => '[
                    {"i18n": "yes", "label": "Yes", "value": true},
                    {"i18n": "no", "label": "No", "value": false}
                ]',                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 4,
                'title' => 'Did you test positive for COVID-19?',
                'state_name' => 'isPositive',
                'i18n' => 'isPositive',
                'type' => 'select',
                'options' => '[
                    {"i18n": "yes", "label": "Yes", "value": true},
                    {"i18n": "no", "label": "No", "value": false}
                ]',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
