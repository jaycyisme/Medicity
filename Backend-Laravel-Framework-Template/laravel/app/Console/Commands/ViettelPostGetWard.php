<?php

namespace App\Console\Commands;

use App\Models\ViettelPostWard;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ViettelPostGetWard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'viettelpost:getward';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lấy thông tin phường từ Viettel Post';

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
        $response = Http::get('https://partner.viettelpost.vn/v2/categories/listWards?districtId=-1');
        
        $data = json_decode((string) $response->getBody(), true);
        $countMessage = 0;

        foreach($data['data'] as $info) {
            $checkCity = ViettelPostWard::where('wards_id', '=', $info['WARDS_ID'])->first();

            if (!isset($checkCity)) {
                $newCity = new ViettelPostWard();
                $newCity->wards_id = $info['WARDS_ID'];
                $newCity->wards_name = $this->ConvertTheUpperCase($info['WARDS_NAME']);
                $newCity->district_id = $info['DISTRICT_ID'];
                $newCity->save();
            } else {
                $newCity = ViettelPostWard::find($checkCity->id);
                $newCity->wards_id = $info['WARDS_ID'];
                $newCity->wards_name = $this->ConvertTheUpperCase($info['WARDS_NAME']);
                $newCity->district_id = $info['DISTRICT_ID'];
                $newCity->save();
            }

            $countMessage = $countMessage + 1;
        }

        Log::info('Cập nhật thông tin phường từ ViettelPost lúc: '. date('d/m/Y H:i:s') .' - Tổng: '. $countMessage .' thông báo.');
    }
}
