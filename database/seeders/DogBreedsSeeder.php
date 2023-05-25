<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DogBreed;

class DogBreedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $breeds = [
            ['dog_breed' => 'トイプードル'],
            ['dog_breed' => 'チワワ'],
            ['dog_breed' => 'ミニチュアダックスフンド'],
            ['dog_breed' => 'ポメラニアン'],
            ['dog_breed' => 'ミニチュア・シュナウザー'],
            ['dog_breed' => 'フレンチ・ブルドッグ'],
            ['dog_breed' => 'マルチーズ'],
            ['dog_breed' => 'ヨークシャー・テリア'],
            ['dog_breed' => '柴犬'],
            ['dog_breed' => 'シー・ズー'],
            ['dog_breed' => 'ゴールデン・レトリーバー'],
            ['dog_breed' => 'パグ'],
            ['dog_breed' => 'ラブラドール・レトリーバー'],
            ['dog_breed' => 'ウェルシュ・コーギー・ペンブローク'],
            ['dog_breed' => 'パピヨン'],
            ['dog_breed' => 'ビション・フリーゼ'],
            ['dog_breed' => 'ジャック・ラッセル・テリア'],
            ['dog_breed' => 'ボーダー・コリー'],
            ['dog_breed' => 'ペキニーズ'],
            ['dog_breed' => 'イタリアン・グレーハウンド'],
            ['dog_breed' => 'ミニチュア・ピンシャー'],
            ['dog_breed' => 'キャバリア・キング・チャールズ・スパニエル'],
            ['dog_breed' => 'シェットランド・シープドッグ'],
            ['dog_breed' => 'ビーグル'],
            ['dog_breed' => 'ボストン・テリア'],
            ['dog_breed' => 'アメリカン・コッカー・スパニエル'],
            ['dog_breed' => 'シベリアン・ハスキー'],
            ['dog_breed' => '日本スピッツ'],
            ['dog_breed' => 'バーニーズ・マウンテン・ドッグ'],
            ['dog_breed' => 'ブルドッグ'],
            ['dog_breed' => 'ジャーマン・シェパード・ドッグ'],
            ['dog_breed' => 'ウエスト・ハイランド・ホワイト・テリア'],
            ['dog_breed' => '秋田犬'],
            ['dog_breed' => 'ウィペット'],
            ['dog_breed' => 'イングリッシュ・コッカー・スパニエル'],
            ['dog_breed' => 'ミックス犬'],
            
        ];

        foreach ($breeds as $breed) {
            DogBreed::create($breed);
        }
    }
}
