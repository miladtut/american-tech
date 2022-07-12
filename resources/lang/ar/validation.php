
<?php
return [

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| such as the size rules. Feel free to tweak each of these messages.
|
*/

'message' => 'البيانات المدخلة غير صالحة',
'student_name' => 'يجب على :attribute أن يكون اسما من ثلاث خانات',
'accepted' => 'يجب قبول :attribute',
'active_url' => ':attribute لا يُمثّل رابطًا صحيحًا',
'after' => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
'after_or_equal' => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
'alpha' => 'يجب أن لا يحتوي :attribute سوى على حروف',
'alpha_dash' => 'يجب أن لا يحتوي :attribute على حروف، أرقام ومطّات.',
'alpha_num' => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
'array' => 'يجب أن يكون :attribute ًمصفوفة',
'before' => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
'before_or_equal' => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
'between' => [
    'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
    'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
    'string' => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
    'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
],
'boolean' => 'يجب أن تكون قيمة :attribute إما true أو false ',
'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attribute',
'date' => ':attribute ليس تاريخًا صحيحًا',
'date_format' => 'لا يتوافق :attribute مع الشكل :format.',
'different' => 'يجب أن يكونان :attribute و :other مُختلفان',
'digits' => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام',
'digits_between' => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام ',
'dimensions' => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
'email' => 'يجب أن يكون :attribute صحيح البُنية',
'exists' => ':attribute غير موجود',
'file' => 'الـ :attribute يجب أن يكون من ملفا.',
'filled' => ':attribute إجباري',
'image' => 'يجب أن يكون :attribute صورةً',
'in' => ':attribute المدخل غير مدعوم',
'in_array' => ':attribute غير موجود في :other.',
'integer' => 'يجب أن يكون :attribute عددًا صحيحًا',
'ip' => 'يجب أن يكون :attribute عنوان IP ذا بُنية صحيحة',
'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 ذا بنية صحيحة.',
'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 ذا بنية صحيحة.',
'json' => 'يجب أن يكون :attribute نصا من نوع JSON.',
'max' => [
    'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر لـ :max.',
    'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
    'string' => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
    'array' => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
],
'mimes' => 'يجب أن يكون ملفًا من نوع : :values.',
'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values.',
'min' => [
    'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر لـ :min.',
    'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
    'string' => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا',
    'array' => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر',
],
'not_in' => ':attribute لاغٍ',
'numeric' => 'يجب على :attribute أن يكون رقمًا',
'present' => 'يجب تقديم :attribute',
'regex' => 'صيغة :attribute .غير صحيحة',
'required' => ':attribute مطلوب.',
'required_if' => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
'required_unless' => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
'required_with' => ':attribute مطلوب لانك ادخلت :values.',
'required_with_all' => ':attribute إذا توفّر :values.',
'required_without' => ':attribute إذا لم يتوفّر :values.',
'required_without_all' => ':attribute إذا لم يتوفّر :values.',
'same' => 'يجب أن يتطابق :attribute مع :other',
'size' => [
    'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size',
    'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
    'string' => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالظبط',
    'array' => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالظبط',
],
'string' => 'يجب أن يكون :attribute نصآ.',
'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
'unique' => 'قيمة :attribute مُستخدمة من قبل',
'uploaded' => 'فشل في تحميل الـ :attribute',
'url' => 'صيغة الرابط :attribute غير صحيحة',

/*
|--------------------------------------------------------------------------
| Custom Validation Language Lines
|--------------------------------------------------------------------------
|
| Here you may specify custom validation messages for attributes using the
| convention "attribute.rule" to name the lines. This makes it quick to
| specify a specific custom language line for a given attribute rule.
|
*/


'custom' => [
    'mobile' => [
        'unique' => 'رقم الموبايل مسجل بالفعل',
    ],
    'attribute-name' => [
        'rule-name' => 'custom-message',
    ],
],

/*
|--------------------------------------------------------------------------
| Custom Validation Attributes
|--------------------------------------------------------------------------
|
| The following language lines are used to swap attribute place-holders
| with something more reader friendly such as E-Mail Address instead
| of "email". This simply helps us make messages a little cleaner.
|
*/
    'attributes' => [
       //offer price
       'name'=>'الاسم',
       'phone'=>'الهاتف',
       'email'=>'البريد الالكترونى',
       'project_desc'=>'وصف المشروع',
       'project_type'=>'نوع المشروع',
       'client_type'=>'نوع العميل',
       'biddingOptions'=>'خيارات عرض السعر',
       'connect'=>'كيف وصلت لنا',
       'when_start'=>' متى تريد البدء',

       //team
       'bod'=>'التاريخ',
       'place'=>'مكان الاقامة',
       'education'=>'المؤهل العلمي',
       'job_desc'=>'الوصف الوظيفي',
       'link_work'=>'رابط الاعمال',
       'job_desc'=>'الوصف الوظيفي',
       'experince'=>'عدد سنوات الخبرة',
       'salary_limit'=>'الحد الادنى للراتب',
       'type_job'=>'نظام العمل المناسب',
       'cv'=>'السيرة الذاتية',

       //
       'attachments'=>'المرفقات',
       'consultation_type'=>'نوع الاستشارة',
       'consultation_details'=>'تفاصيل الاستشارة',
       'time'=>'الوقت',
       

       //blog
       'title_ar'=>'العنوان',
       'title_en'=>'العنوان بالانجليزية',
       'description_ar'=>'الوصف',
       'description_en'=>'الوصف بالانجليزية',
       'tags_ar'=>'الكلمات الدلالية',
       'tags_en'=>'الكلمات الدلالية بالانجليزية',
       'department_id'=>'القسم',
       'filename'=>'الصور',

       //
       'name_en'=>'الاسم بالانجليزية',
       'name_ar'=>'الاسم',
       'specialization_ar'=>'التخصص ',
       'specialization_en'=>'التخصص بالانجلزية',
       'file'=>'المرفق',
       'number'=>'الرقم',
       'title'=>'العنوان',
       'subtitle'=>'العنوان الفرعي',
       'subtitle_en'=>'العنوان الفرعي بالانجليزية',
       'date'=>'التاريخ',
       'desciption'=>'الوصف',
       'desciption_en'=>'الوصف بالانجليزية',
       'text_business_ar'=>'وصف اعمالنا',
       'text_business_en'=>'وصف اعمالنا بالانجلزية',
       'text_services_ar'=>'وصف خدماتنا',
       'text_services_en'=>'وصف خدماتنا بالانجليزية',
       'link'=>'الرابط',
       'service_id'=>'الخدمة',
       'file_main'  => 'الصورة الاساسية',
       'file_thumbnail'  => 'الصورة المصغرة',
       'meta_title'=>'عنوان الموقع',
       'meta_title_en'=>'عنوان الموقع بالانجليزية',
       'meta_desc'=>'وصف الموقع',
       'meta_desc_en'=>'وصف الموقع بالانجليزية',
       'key_words'=>'الكلمات الدلالية',
       'tags'=>'الكلمات الدلالية',
       'copyright'=>'نص حقوق الملكية',
       'copyright_en'=>'نص حقوق الملكية بالانجليزية',
       'hourwork'=>'ساعات العمل',
       'hourwork_en'=>'ساعات العمل بالانلجيزية',

      'alt'=>'alt بالعربي',
      'alt_file_thumbnail'=>'alt للصورة المصغرة بالعربي',
     'alt_en'=>'alt بالانجليزية',
      'alt_file_thumbnail_en'=>'alt للصورة المصغرة بالانجليزية',
   
    ],

];
