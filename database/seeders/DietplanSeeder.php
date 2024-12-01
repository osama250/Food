<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DietplanSeeder extends Seeder
{
    public function run()
    {
        $dietplans = [
            [
                'disease' => 'diabetes',
                'translations' => [
                    'en' => [
                        'name'          => 'Diabetes Diet Plan',
                        'description'   => 'A diet plan designed specifically for people with diabetes,
                                                focusing on low sugar and balanced nutrition.'
                    ],
                    'ar' => [
                        'name'          => 'خطة النظام الغذائي لمرضى السكري',
                        'description'   => 'خطة غذائية مصممة خصيصًا للأشخاص المصابين
                                             بالسكري، مع التركيز على تقليل السكر والتغذية المتوازنة.'
                    ]
                ]
            ],
            [
                'disease' => 'hypertension',
                'translations' => [
                    'en' => [
                        'name'          => 'Hypertension Diet Plan',
                        'description'   => 'A diet plan designed to help manage high blood pressure by
                                            reducing sodium intake and promoting heart-healthy foods.'
                    ],
                    'ar' => [
                        'name'          => 'خطة النظام الغذائي لارتفاع ضغط الدم',
                        'description'   => 'خطة غذائية مصممة للمساعدة في إدارة ارتفاع ضغط الدم
                                                 عن طريق تقليل تناول الصوديوم وتعزيز الأطعمة الصحية للقلب.'
                    ]
                ]
            ],
            [
                'disease' => 'heart_disease',
                'translations' => [
                    'en' => [
                        'name'          => 'Heart Disease Diet Plan',
                        'description'   => 'A diet plan focused on improving heart health by promoting
                                                foods low in saturated fats and cholesterol.'
                    ],
                    'ar' => [
                        'name'           => 'خطة النظام الغذائي لأمراض القلب',
                        'description'    => 'خطة غذائية تركز على تحسين صحة القلب من
                                            خلال تعزيز الأطعمة المنخفضة في الدهون المشبعة والكوليسترول.'
                    ]
                ]
            ],
            [
                'disease' => 'asthma',
                'translations' => [
                    'en' => [
                        'name'          => 'Asthma Diet Plan',
                        'description'   => 'A diet plan that focuses on reducing inflammation
                                            and promoting foods that support lung health for asthma patients.'
                    ],
                    'ar' => [
                        'name'          => 'خطة النظام الغذائي لمرضى الربو',
                        'description'   => 'خطة غذائية تركز على تقليل الالتهابات وتعزيز
                                                 الأطعمة التي تدعم صحة الرئتين لمرضى الربو.'
                    ]
                ]
            ],
            [
                'disease' => 'cancer',
                'translations' => [
                    'en' => [
                        'name'          => 'Cancer Diet Plan',
                        'description'   => 'A diet plan tailored for cancer patients,
                                            focusing on foods that boost the immune system and
                                                    improve overall health during treatment.'
                    ],
                    'ar' => [
                        'name'          => 'خطة النظام الغذائي لمرضى السرطان',
                        'description'   => 'خطة غذائية مصممة لمرضى السرطان، تركز على الأطعمة
                                             التي تعزز جهاز المناعة وتحسن الصحة العامة أثناء العلاج.'
                    ]
                ]
            ]
        ];


        foreach ($dietplans as $dietplan) {
            $dietplanId = DB::table('dietplans')->insertGetId([
                'disease'    => $dietplan['disease'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($dietplan['translations'] as $locale => $translation) {
                DB::table('dietplan_translations')->insert([
                    'dietplan_id' => $dietplanId,
                    'locale'      => $locale,
                    'name'        => $translation['name'],
                    'description' => $translation['description'],
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }
    }
}
