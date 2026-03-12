<?php


/**
 * @param null $title
 * @param null $message
 * @return \Illuminate\Foundation\Application|mixed
 * For the flash messages.
 */
function custom_flash($title = null, $message = null) {
    // Set variable $flash to fetch the Flash Class
    // in Flash.php
    $flash = app('App\Http\Flash');

    // If 0 parameters are passed in ($title, $message)
    // then just return the flash instance.
    if (func_num_args() == 0) {
        return $flash;
    }

    // Just return a regular flash->info message
    return $flash->info($title, $message);
}

/**
 * For highlighting of words that matched the keywords.
 *
 * @param null $text
 * @param null $words
 *
 * @return \Illuminate\Foundation\Application|mixed
 */
function highlight_word($text = null, $words = null)
{
    return preg_replace("/\w*?" . preg_quote($text) . "\w*/i", "<b><i>$0</i></b>", $words);
}

/**
 * For highlighting of keywords only.
 *
 * @param null $text
 * @param null $words
 *
 * @return \Illuminate\Foundation\Application|mixed
 */
function highlight_keyword($text = null, $words = null)
{
    $replace = '<b><i>' . $text . '</i></b>';
    $words = str_ireplace($text, $replace, $words);
    return $words;
}

/**
 * @param null string $url
 *
 * @return \Illuminate\Foundation\Application|mixed
 * Add http to url
 */
function add_http($url = null)
{
    if ($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
    }
    return $url;
}

//Global Functions
function CleanUrl($string) {
    $string = strtolower($string);
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    $string = preg_replace("/[\s-]+/", " ", $string);
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}

/**
 * Enhanced section helper function with page context support
 */
function section($parameters, $page = null) : \App\Repositories\Renderable {
    $repository = new \App\Repositories\SectionRepository();
    return $repository->render($parameters, $page);
}

/**
 * Get section data as array
 */
function sectionData($sectionName, $page = null) {
    $section = section($sectionName, $page);
    return $section->asArray();
}

/**
 * Get first item from section data
 */
function sectionFirst($sectionName, $page = null) {
    $section = section($sectionName, $page);
    $data = $section->asArray();
    return is_array($data) && !empty($data) ? $data[0] : null;
}

/**
 * Get section image with proper attachment model
 */
function sectionImage($sectionName, $fieldName, $page = null) {
    $data = sectionFirst($sectionName, $page);
    if ($data && isset($data[$fieldName])) {
        return \App\Models\Attachment::find($data[$fieldName]);
    }
    return null;
}

/**
 * Get multiple images from section
 */
function sectionImages($sectionName, $fieldName, $page = null) {
    $data = sectionData($sectionName, $page);
    $images = [];
    
    if (is_array($data)) {
        foreach ($data as $item) {
            if (isset($item[$fieldName])) {
                $attachment = \App\Models\Attachment::find($item[$fieldName]);
                if ($attachment) {
                    $images[] = $attachment;
                }
            }
        }
    }
    
    return collect($images);
}

/**
 * Get section content with processing
 */
function sectionContent($sectionName, $fieldName, $page = null) {
    $data = sectionFirst($sectionName, $page);
    return $data[$fieldName] ?? '';
}

/**
 * Check if section exists and has data
 */
function hasSection($sectionName, $page = null) {
    $section = section($sectionName, $page);
    return $section->isNotEmpty();
}

/**
 * Get section with template information
 */
function sectionWithTemplate($sectionName, $page = null) {
    $repository = new \App\Repositories\SectionRepository();
    
    if ($page && is_numeric($page)) {
        return $repository->getSectionByName($sectionName, $page);
    } elseif ($page && method_exists($page, 'id')) {
        return $repository->getSectionByName($sectionName, $page->id);
    }
    
    return null;
}

/**
 * Render section with template
 */
function renderSectionTemplate($section, $data = null) {
    if (!$section || !$section->template) {
        return '';
    }
    
    $html = '';
    $sectionData = $data ?: $section->data;
    
    if ($section->isRepeater && $sectionData) {
        foreach ($sectionData as $item) {
            $html .= renderSectionItem($section, $item);
        }
    } else {
        $html .= renderSectionItem($section, $section->value);
    }
    
    return $html;
}

/**
 * Render individual section item
 */
function renderSectionItem($section, $data) {
    if (!$section->template) return '';
    
    $html = '<div class="section-item">';
    
    foreach ($section->template->fields as $field) {
        $value = is_object($data) ? ($data->data[$field->alias] ?? null) : ($data[$field->alias] ?? null);
        
        switch ($field->fieldType->component) {
            case 'image':
                if ($value) {
                    $attachment = \App\Models\Attachment::find($value);
                    if ($attachment) {
                        $html .= $attachment->toImgTag(['class' => 'section-image']);
                    }
                }
                break;
            case 'rich-text':
                $html .= '<div class="rich-text-content">' . $value . '</div>';
                break;
            default:
                $html .= '<div class="field-content">' . htmlspecialchars($value ?: '') . '</div>';
        }
    }
    
    $html .= '</div>';
    return $html;
}

/**
 * Legacy support - keep existing functions
 */
function getAttachment($id){
    $image = \App\Models\Attachment::find($id);
    return $image;
}

function addSection($name, $type, $pages, $value = '') {
    if (empty($value) && $type === \App\Models\Section::FORM)
        $value = '{"options": {}, "fields": [], "data": []}';

    $section = \App\Models\Section::create(compact('name', 'type', 'value'));
    $section->pages()->sync($pages);

    return $section;
}

/**
 * Modern section creation with template support
 */
function createSectionFromTemplate($templateId, $name, $alias = null, $pages = []) {
    $template = \App\Models\SectionTemplate::find($templateId);
    if (!$template) {
        throw new \InvalidArgumentException("Section template not found: {$templateId}");
    }
    
    $section = \App\Models\Section::create([
        'name' => $name,
        'alias' => $alias ?: \Illuminate\Support\Str::slug($name),
        'section_template_id' => $templateId,
        'type' => 'repeater',
        'value' => '{}',
        'is_active' => true
    ]);
    
    if (!empty($pages)) {
        foreach ($pages as $pageId) {
            $section->pages()->attach($pageId, [
                'sort_order' => 0,
                'is_active' => true
            ]);
        }
    }
    
    return $section;
}

/**
 * Clear section cache
 */
function clearSectionCache($pageId = null) {
    $repository = new \App\Repositories\SectionRepository();
    
    if ($pageId) {
        $repository->clearPageCache($pageId);
    } else {
        $repository->clearAllCache();
    }
}


/**
 * Get section data for a specific page, optionally filtered by section alias
 * Returns processed array data ready for views
 * 
 * @param int $pageId The page ID
 * @param string|null $sectionAlias Optional section alias to filter
 * @return array Processed section data
 */
function getPageSectionData($pageId, $sectionAlias = null) {
    $repository = new \App\Repositories\SectionRepository();
    
    // Single section request
    if ($sectionAlias) {
        $section = $repository->getSectionByName($sectionAlias, $pageId);
        if (!$section) return [];
        return processSectionToArray($section);
    }
    
    // All sections for page
    $sections = $repository->getPageSections($pageId);
    $result = [];
    
    foreach ($sections as $section) {
        $result[$section->alias] = processSectionToArray($section);
    }
    
    return $result;
}

/**
 * Process a section model into an array with decoded data
 * Handles repeater sections and image field conversions
 * 
 * @param \App\Models\Section|null $section The section model
 * @return array Processed section data
 */
function processSectionToArray($section) {
    if (!$section) return [];
    
    // Handle repeater sections with data
    if ($section->isRepeater && $section->data->isNotEmpty()) {
        $items = [];
        foreach ($section->data as $dataItem) {
            $processed = [];
            foreach ($dataItem->data as $key => $value) {
                // Check if field is an image type
                if ($section->template && isImageField($section->template, $key) && $value) {
                    $processed[$key] = \App\Models\Attachment::find($value);
                } else {
                    $processed[$key] = $value;
                }
            }
            $items[] = $processed;
        }
        return $items;
    }
    
    // Handle non-repeater sections (template-based sections)
    if ($section->value) {
        $decoded = is_string($section->value) ? json_decode($section->value, true) : $section->value;
        
        // Process image fields for non-repeater sections too
        if ($decoded && is_array($decoded) && $section->template) {
            $processed = [];
            foreach ($decoded as $key => $value) {
                // Check if field is an image type
                if (isImageField($section->template, $key) && $value) {
                    $processed[$key] = \App\Models\Attachment::find($value);
                } else {
                    $processed[$key] = $value;
                }
            }
            return $processed;
        }
        
        return $decoded ?: [];
    }
    
    return [];
}


/**
 * Check if a field in a section template is an image type
 * 
 * @param \App\Models\SectionTemplate|null $template The section template
 * @param string $fieldAlias The field alias to check
 * @return bool True if field is an image type
 */
function isImageField($template, $fieldAlias) {
    if (!$template || !$template->fields) return false;
    
    foreach ($template->fields as $field) {
        if ($field->alias === $fieldAlias && $field->fieldType && $field->fieldType->component === 'image') {
            return true;
        }
    }
    return false;
}