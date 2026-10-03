<?php

namespace App\Console\Commands;

use App\Models\ViettelPostCity;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ViettelPostGetCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'viettelpost:getcity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lấy danh sách thành phố từ ViettelPost';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://partner.viettelpost.vn/v2/categories/listProvinceById?provinceId=-1');
        
        $data = json_decode((string) $response->getBody(), true);
        $countMessage = 0;

        foreach($data['data'] as $info) {
            $checkCity = ViettelPostCity::where('province_id', '=', $info['PROVINCE_ID'])->first();

            if (!isset($checkCity)) {
                $newCity = new ViettelPostCity();
                $newCity->province_id = $info['PROVINCE_ID'];
                $newCity->province_code = $info['PROVINCE_CODE'];
                $newCity->province_name = $info['PROVINCE_NAME'];
                $newCity->save();
            } else {
                $newCity = ViettelPostCity::find($checkCity->id);
                $newCity->province_id = $info['PROVINCE_ID'];
                $newCity->province_code = $info['PROVINCE_CODE'];
                $newCity->province_name = $info['PROVINCE_NAME'];
                $newCity->save();
            }

            $countMessage = $countMessage + 1;
        }

        Log::info('Cập nhật thông tin thành phố từ ViettelPost lúc: '. date('d/m/Y H:i:s') .' - Tổng: '. $countMessage .' thông báo.');
    }
}
