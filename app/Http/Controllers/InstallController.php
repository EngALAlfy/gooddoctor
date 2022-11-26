<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use COM;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class InstallController extends Controller
{

    function install()
    {


        return view('install.index');
    }

   
    function license()
    {
        $Wshshell = new COM('WScript.Shell', null, CP_UTF8);
        $MachineGuid = $Wshshell->regRead('HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Cryptography\MachineGuid');
        $key = $Wshshell->regRead('HKEY_LOCAL_MACHINE\SOFTWARE\ALALFY\GoodDoctor\key');

        // $hard_serial = ShellCommand::execute('wmic DISKDRIVE get SerialNumber');
        exec('wmic DISKDRIVE get SerialNumber', $hard_serial);
        // $UUID = ShellCommand::execute('wmic csproduct get UUID');
        exec('wmic csproduct get UUID', $UUID);


        $hard_info = [
            'uuid' => $UUID[1],
            'hard_serial' => $hard_serial[1],
            'MachineGuid' => $MachineGuid,
            'key' => $key,
        ];



        //  $code = Crypt::encrypt($hard_info);

        // $code = join('@' , $hard_info);
        $code = base64_encode(json_encode($hard_info));

        return view('license.index', compact('key', 'code'));
    }

    function makeSerialCodeLicense(Request $request)
    {
        $data = $request->validate(['code' => 'required', 'days_of_license' => 'required|numeric',]);

        $code = $data['code'];
        $days_of_license = $data['days_of_license'];

        $hard_info = json_decode(base64_decode($code));

        $hard_info->days_of_license = $days_of_license;

        $serial_code = Crypt::encrypt($hard_info);

        return redirect()->route('license.getSerialCode')->with('serial_code', $serial_code);
    }

    function verifyLicense(Request $request)
    {
        $serial_code = $request->validate(['serial_code' => 'required'])['serial_code'];


        $Wshshell = new COM('WScript.Shell', null, CP_UTF8);
        $MachineGuid = $Wshshell->regRead('HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Cryptography\MachineGuid');
        $key = $Wshshell->regRead('HKEY_LOCAL_MACHINE\SOFTWARE\ALALFY\GoodDoctor\key');

        // $hard_serial = ShellCommand::execute('wmic DISKDRIVE get SerialNumber');
        exec('wmic DISKDRIVE get SerialNumber', $hard_serial);
        // $UUID = ShellCommand::execute('wmic csproduct get UUID');
        exec('wmic csproduct get UUID', $UUID);

        $date_now = Carbon::today()->startOfDay();

        // $hard_info = [
        //     'uuid' => $UUID[1],
        //     'hard_serial' => $hard_serial[1],
        //     'MachineGuid' => $MachineGuid,
        //     'key' => $key,
        // ];

        try {
            $hard_info = Crypt::decrypt($serial_code);
        } catch (DecryptException $e) {
            dd($e);
            return view('license.error');
        };

        // try to ensure the date
        // get date from database (seed when install)
        // if failed -> error no license ( maybe user try to remove it)
        // if date now < database date (make no sense - maybe user try to change the date) -> error no license
        $date_db = Setting::find("install_date");

        if (!$date_db) {
            return view('license.error', ['error' => "no_date_db"]);
        }

        try {
            $date_db = Crypt::decrypt($date_db->value);
        } catch (DecryptException $e) {
            // decrype error -> error no license (maybe user change value)
                return view('install.error' , ['error' => "no_decrype_date_db"]);
        }

        $date_db = Carbon::parse($date_db)->startOfDay();

        // if date now < database date (make no sense - maybe user try to change the date) -> error no license
        if ($date_now->isBefore($date_db)) {
            return view('license.error', ['error' => "today_before_date_db"]);
        } else {
            // start the license from install date

            $start_license_date = clone $date_db;
            $end_license_date = clone $date_db;

            if ($hard_info->days_of_license > 0) {
                $end_license_date->addDays($hard_info->days_of_license);
            } else {
                $end_license_date = "unlimited";
            }
        }

        if ($MachineGuid != $hard_info->MachineGuid) {
            return view('license.error', ['error' => 'guid_not_equal']);
        }
        if ($UUID[1] != $hard_info->uuid) {
            return view('license.error', ['error' => 'uuid_not_equal']);
        }
        if ($hard_serial[1] != $hard_info->hard_serial) {
            return view('license.error', ['error' => 'hard_serial_not_equal']);
        }
        if ($key != $hard_info->key) {
            return view('license.error', ['error' => 'key_not_equal']);
        }

        Setting::create(['key' => 'license', 'value' => $serial_code]);
        Setting::create(['key' => 'start_license_date', 'value' => Crypt::encrypt($start_license_date)]);
        Setting::create(['key' => 'end_license_date', 'value' => Crypt::encrypt($end_license_date)]);

        return view('license.success', compact('start_license_date', 'end_license_date'));
    }

    function getSerialCode()
    {
        return view('license.get');
    }
}
