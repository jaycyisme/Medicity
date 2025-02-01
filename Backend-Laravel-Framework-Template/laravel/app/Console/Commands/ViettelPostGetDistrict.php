<?php

namespace App\Console\Commands;

use App\Models\ViettelPostDistrict;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ViettelPostGetDistrict extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'viettelpost:getdistrict';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lấy thông tin quận từ Viettel Post';

    public function ConvertTheUpperCase($string)
    {
        $textExplode = explode(" ", $string);
        $newText = "";

        foreach ($textExplode as $key => $value) {
            if(count($textExplode) == $key + 1)
            {
                $newText = $newText . mb_ucfirst(mb_strtolower($value, "UTF-8"), "UTF-8");
            }
            else
            {
                $newText = $newText . mb_ucfirst(mb_strtolower($value, "UTF-8"), "UTF-8") . ' ';
            }
        }

        return $newText;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://partner.viettelpost.vn/v2/categories/listDistrict?provinceId=-1');
        
        $data = json_decode((string) $response->getBody(), true);
        $countMessage = 0;

        foreach($data['data'] as $info) {
            $checkCity = ViettelPostDistrict::where('district_id', '=', $info['DISTRICT_ID'])->first();

            if (!isset($checkCity)) {
                $newCity = new ViettelPostDistrict();
                $newCity->district_id = $info['DISTRICT_ID'];
                $newCity->district_value = $info['DISTRICT_VALUE'];
                $newCity->district_name = $this->ConvertTheUpperCase($info['DISTRICT_NAME']);
                $newCity->province_id = $info['PROVINCE_ID'];
                $newCity->save();
            } else {
                $newCity = ViettelPostDistrict::find($checkCity->id);
                $newCity->district_id = $info['DISTRICT_ID'];
                $newCity->district_value = $info['DISTRICT_VALUE'];
                $newCity->district_name = $this->ConvertTheUpperCase($info['DISTRICT_NAME']);
                $newCity->province_id = $info['PROVINCE_ID'];
                $newCity->save();
            }

            $countMessage = $countMessage + 1;
        }

        Log::info('Cập nhật thông tin quận từ ViettelPost lúc: '. date('d/m/Y H:i:s') .' - Tổng: '. $countMessage .' thông báo.');
    }
}
