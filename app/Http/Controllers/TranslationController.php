<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Facades\Log;

class TranslationController extends Controller
{
    /**
     * translation
     *
     * @param  Request  $request
     */
    public function translation(Request $request)
    {
        // バリデーション
        $request->validate([
            'sentence' => 'required',
        ]);

        // 翻訳を行う文章
        $sentence = $request->input('sentence');

        try {
            // 翻訳処理
            // DeepLのAPIを呼ぶ
            $response = Http::post(
                // 無料版URL
                'https://api-free.deepl.com/v2/translate',
                // POSTパラメータ
                [
                    'auth_key' => env('DEEPL_AUTH_KEY'),
                    'target_lang' => 'EN-US',
                    'text' => $sentence,
                ]
            );

            // 翻訳結果
            $translated_text = $response->json('translations')[0]['text'];

            return view('translation', compact('sentence', 'translated_text'));

        } catch (Exception $e) {
            // APIエラー時の処理
            Log::error($e->getMessage());
            return redirect('error');
        }
    }
}


    /**
     * translation
     *
     * @param  Request  $request
     */
