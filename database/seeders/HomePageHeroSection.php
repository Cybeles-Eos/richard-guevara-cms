<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Section;
use App\Models\SectionTemplate;
use App\Models\FieldType;
use Illuminate\Support\Facades\DB;

class HomePageHeroSection extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Seeding Home Page Hero Section...');

        DB::beginTransaction();

        try {
            // Step 1: Create or get the Home Hero Section Template
            $template = SectionTemplate::firstOrCreate(
                ['slug' => 'home-hero-section'],
                [
                    'name' => 'Home Hero Section',
                    'description' => 'A comprehensive hero section for Home page with rotating quotes and banner images.',
                    'icon' => 'fa fa-list',
                    'category' => 'Hero',
                    'is_active' => true
                ]
            );

            $this->command->info('  ✓ Home Hero Section template created/found (ID: ' . $template->id . ')');

            // Step 2: Define and create template fields
            $fields = [
                [
                    'name' => 'Headline',
                    'alias' => 'headline',
                    'type' => 'text',
                    'placeholder' => 'e.g., Designing Websites That',
                    'help_text' => 'Main hero headline first line',
                    'is_required' => true
                ],
                [
                    'name' => 'Description',
                    'alias' => 'description',
                    'type' => 'textarea',
                    'placeholder' => 'e.g., I build high-converting websites that help businesses stand out online.',
                    'help_text' => 'Short supporting paragraph under the headline',
                    'is_required' => true
                ],
                [
                    'name' => 'Primary CTA Button Label',
                    'alias' => 'primary_cta_label',
                    'type' => 'text',
                    'placeholder' => 'e.g., Book Free Consultation',
                    'help_text' => 'Text displayed on the primary CTA button',
                    'is_required' => true
                ],
                [
                    'name' => 'Primary CTA Button Link',
                    'alias' => 'primary_cta_link',
                    'type' => 'text',
                    'placeholder' => 'Enter URL',
                    'help_text' => 'Link URL for the primary CTA button',
                    'is_required' => true
                ],
                [
                    'name' => 'Secondary CTA Button Label',
                    'alias' => 'secondary_cta_label',
                    'type' => 'text',
                    'placeholder' => 'e.g., Request A Quote',
                    'help_text' => 'Text displayed on the secondary CTA button',
                    'is_required' => false
                ],
                [
                    'name' => 'Secondary CTA Button Link',
                    'alias' => 'secondary_cta_link',
                    'type' => 'text',
                    'placeholder' => 'Enter URL',
                    'help_text' => 'Link URL for the secondary CTA button',
                    'is_required' => false
                ],
                [
                    'name' => 'Hero Background Image',
                    'alias' => 'hero_background_image',
                    'type' => 'image',
                    'placeholder' => '',
                    'help_text' => 'Background image for the hero section',
                    'is_required' => false
                ],

                // Quotes 1 to 6
                [
                    'name' => 'Quote 1',
                    'alias' => 'quote_1',
                    'type' => 'text',
                    'placeholder' => 'Trusted by 50+ Companies Worldwide',
                    'help_text' => 'First rotating quote',
                    'is_required' => false
                ],
                [
                    'name' => 'Quote 2',
                    'alias' => 'quote_2',
                    'type' => 'text',
                    'placeholder' => 'Building Scalable Websites for Modern Brands',
                    'help_text' => 'Second rotating quote',
                    'is_required' => false
                ],
                [
                    'name' => 'Quote 3',
                    'alias' => 'quote_3',
                    'type' => 'text',
                    'placeholder' => 'Crafting High-Performance Web Experiences',
                    'help_text' => 'Third rotating quote',
                    'is_required' => false
                ],
                [
                    'name' => 'Quote 4',
                    'alias' => 'quote_4',
                    'type' => 'text',
                    'placeholder' => 'Helping Businesses Grow Through Web Tech',
                    'help_text' => 'Fourth rotating quote',
                    'is_required' => false
                ],
                [
                    'name' => 'Quote 5',
                    'alias' => 'quote_5',
                    'type' => 'text',
                    'placeholder' => 'Delivering Clean Code and Smart Solutions',
                    'help_text' => 'Fifth rotating quote',
                    'is_required' => false
                ],
                [
                    'name' => 'Quote 6',
                    'alias' => 'quote_6',
                    'type' => 'text',
                    'placeholder' => 'Custom Web Development for Ambitious Teams',
                    'help_text' => 'Sixth rotating quote',
                    'is_required' => false
                ],

                // Quote Images 1 to 4
                [
                    'name' => 'Quote Image 1',
                    'alias' => 'quote_image_1',
                    'type' => 'image',
                    'placeholder' => '',
                    'help_text' => 'First rotating banner image',
                    'is_required' => false
                ],
                [
                    'name' => 'Quote Image 2',
                    'alias' => 'quote_image_2',
                    'type' => 'image',
                    'placeholder' => '',
                    'help_text' => 'Second rotating banner image',
                    'is_required' => false
                ],
                [
                    'name' => 'Quote Image 3',
                    'alias' => 'quote_image_3',
                    'type' => 'image',
                    'placeholder' => '',
                    'help_text' => 'Third rotating banner image',
                    'is_required' => false
                ],
                [
                    'name' => 'Quote Image 4',
                    'alias' => 'quote_image_4',
                    'type' => 'image',
                    'placeholder' => '',
                    'help_text' => 'Fourth rotating banner image',
                    'is_required' => false
                ],
            ];

            foreach ($fields as $index => $fieldConfig) {
                $fieldType = FieldType::where('component', $fieldConfig['type'])->first();

                if ($fieldType) {
                    $template->fields()->firstOrCreate(
                        ['alias' => $fieldConfig['alias']],
                        [
                            'section_template_id' => $template->id,
                            'field_type_id' => $fieldType->id,
                            'name' => $fieldConfig['name'],
                            'label' => $fieldConfig['name'],
                            'placeholder' => $fieldConfig['placeholder'],
                            'help_text' => $fieldConfig['help_text'],
                            'is_required' => $fieldConfig['is_required'],
                            'validation_rules' => [],
                            'settings' => [],
                            'sort_order' => $index + 1
                        ]
                    );

                    $this->command->line('    - Field: ' . $fieldConfig['name'] . ' (' . $fieldConfig['type'] . ')');
                } else {
                    $this->command->warn('    ! Field type not found: ' . $fieldConfig['type']);
                }
            }

            $this->command->info('  ✓ Template fields created');

            // Step 3: Create the Section instance from the template
            $section = Section::firstOrCreate(
                [
                    'name' => 'Home Hero Section',
                    'section_template_id' => $template->id
                ],
                [
                    'alias' => 'home-hero-section',
                    'type' => 'repeater',
                    'value' => json_encode([
                        'headline' => 'Designing Websites That <span>Command Attention</span>',
                        'description' => 'Skip the waiting room. Get seen through mobile, online, or phone for urgent medical needs, common symptoms, and prescription refills without leaving home.',
                        'primary_cta_label' => 'Book Free Consultation',
                        'primary_cta_link' => '/contact-us',
                        'secondary_cta_label' => 'Request A Quote',
                        'secondary_cta_link' => '/contact-us',
                        'hero_background_image' => null,

                        'quote_1' => 'Trusted by 50+ Companies Worldwide',
                        'quote_2' => 'Building Scalable Websites for Modern Brands',
                        'quote_3' => 'Crafting High-Performance Web Experiences',
                        'quote_4' => 'Helping Businesses Grow Through Web Tech',
                        'quote_5' => 'Delivering Clean Code and Smart Solutions',
                        'quote_6' => 'Custom Web Development for Ambitious Teams',

                        'quote_image_1' => '',
                        'quote_image_2' => '',
                        'quote_image_3' => '',
                        'quote_image_4' => '',
                    ]),
                    'settings' => [],
                    'is_active' => true
                ]
            );

            $this->command->info('  ✓ Section instance created (ID: ' . $section->id . ')');

            // Step 4: Attach the section to the Home page
            $homePage = Page::where('slug', '/')
                ->orWhere('id', 1)
                ->first();

            if ($homePage) {
                $exists = DB::table('page_section_order')
                    ->where('page_id', $homePage->id)
                    ->where('section_id', $section->id)
                    ->exists();

                if (!$exists) {
                    $homePage->sections()->attach($section->id, [
                        'sort_order' => 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);

                    $this->command->info('  ✓ Section attached to Home page as first section (sort_order: 1)');
                } else {
                    $this->command->info('  ℹ Section already attached to Home page');
                }
            } else {
                $this->command->warn('  ! Home page not found');
            }

            DB::commit();

            $this->command->info('✓ Home Page Hero Section seeding completed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->error('✗ Error seeding Home Page Hero Section: ' . $e->getMessage());
            throw $e;
        }
    }
}