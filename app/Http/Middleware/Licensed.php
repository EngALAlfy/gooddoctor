<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Carbon\Carbon;
use Closure;
use COM;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;

class Licensed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $license = Setting::find('license');
        $end_license_date = Setting::find('end_license_date');
        $start_license_date = Setting::find('start_license_date');
        $date_db = Setting::find("install_date");

        if (!$start_license_date) {
            return redirect()->route('license')->with(['error' => "no_start_license_date"]);
        }
        if (!$end_license_date) {
            return redirect()->route('license')->with(['error' => "no_end_license_date"]);
        }
        if (!$date_db) {
            return redirect()->route('license')->with(['error' => "no_date_db"]);
        }

        if (!$license) {
            return redirect()->route('license')->with(['error' => "no_license"]);
        }

        try {
            $hard_info = Crypt::decrypt($license->value);
        } catch (DecryptException $e) {
            return redirect()->route('license')->with(['error' => "decrypt_license_error"]);
        };


        $date_now = Carbon::today()->startOfDay();

        // try to ensure the date
        // get date from database (seed when install)
        // if failed -> error no license ( maybe user try to remove it)
        // if date now < database date (make no sense - maybe user try to change the date) -> error no license


        try {
            $date_db = Crypt::decrypt($date_db->value);
            $end_license_date = Crypt::decrypt($end_license_date->value);
            $start_license_date = Crypt::decrypt($start_license_date->value);
        } catch (DecryptException $e) {
            // decrype error -> error no license (maybe user change value)
            return redirect()->route('license')->with(['error' => "no_decrype_date_db"]);
        }

        $date_db = Carbon::parse($date_db)->startOfDay();

        // if date now < database date (make no sense - maybe user try to change the date) -> error no license
        if ($date_now->isBefore($date_db)) {
            return redirect()->route('license')->with(['error' => "today_before_date_db"]);
        }

        if ($date_now->isBefore($start_license_date)) {
            return redirect()->route('license')->with(['error' => "today_before_start_license_date"]);
        }

        if ($end_license_date != "unlimited") {
            if ($date_now->isAfter($end_license_date)) {
                return redirect()->route('license')->with(['error' => "today_after_end_license_date"]);
            }
        }


        $Wshshell = new COM('WScript.Shell', null, CP_UTF8);
        $MachineGuid = $Wshshell->regRead('HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Cryptography\MachineGuid');
        $key = $Wshshell->regRead('HKEY_LOCAL_MACHINE\SOFTWARE\ALALFY\GoodDoctor\key');

        // $hard_serial = ShellCommand::execute('wmic DISKDRIVE get SerialNumber');
        exec('wmic DISKDRIVE get SerialNumber', $hard_serial);
        // $UUID = ShellCommand::execute('wmic csproduct get UUID');
        exec('wmic csproduct get UUID', $UUID);


        if ($MachineGuid != $hard_info->MachineGuid) {
            return redirect()->route('license')->with(['error' => 'guid_not_equal']);
        }
        if ($UUID[1] != $hard_info->uuid) {
            return redirect()->route('license')->with(['error' => 'uuid_not_equal']);
        }

        // serial of the hard array
        if(is_array($hard_serial)){
            $hard_serial = array_diff($hard_serial , ["SerialNumber" , ""]);
            if (!in_array($hard_info->hard_serial , $hard_serial)) {
                return redirect()->route('license')->with(['error' => 'hard_serial_not_equal']);
            }
        }else{
            if ($hard_serial != $hard_info->hard_serial) {
                return redirect()->route('license')->with(['error' => 'hard_serial_not_equal']);
            }
        }
        if ($hard_serial[1] != $hard_info->hard_serial) {
            return redirect()->route('license')->with(['error' => 'hard_serial_not_equal']);
        }
        if ($key != $hard_info->key) {
            return redirect()->route('license')->with(['error' => 'key_not_equal']);
        }


        return $next($request);
    }
}
