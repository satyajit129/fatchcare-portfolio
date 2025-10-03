<?php

namespace App;

use App\Enums\AttendanceRemarkEnum;
use App\Models\AttendanceLog;
use App\Models\Season;
use App\Models\SeasonShiftDetail;
use App\Models\Setting;
use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;

class UtilityFunction
{

    public static function protocol()
    {
        if (env('APP_ENV') == "production") {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        return $protocol;
    }

    public static function serverURL()
    {
        if (env('APP_ENV') == "production") {
            $server_url = $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
        } else {
            $server_url = $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/';
        }
        return $server_url;
    }

    public static function globalImagePath($file_path, $image_name)
    {
        if (env('APP_ENV') == 'local') {
            $full_image_url = asset("images/{$file_path}/{$image_name}");
        } else {
            $full_image_url = asset("images/{$file_path}/{$image_name}");
        }
        return $full_image_url;
    }

    public function globalImagePathForPdf($file_path, $image_name)
    {
        if (env('APP_ENV') == 'local') {
            $full_image_url = public_path("images/{$file_path}/{$image_name}");
        } else {
            $full_image_url = asset("images/{$file_path}/{$image_name}");
        }
        return $full_image_url;
    }

    public static function serverPath()
    {
        if (env('APP_ENV') == "production") {
            $server_url = '#';
        } else {
            $server_url = '#';
        }
        return $server_url;
    }

    public static function secretKeyForApiAuthentication()
    {
        $secret_key = 'c17fedafcf8b0642f178718ba0e9c97544bdccf0';

        return $secret_key;
    }

    public static function websiteDetails()
    {
        $website_info = Setting::first();
        $result = isset($website_info) ? $website_info : '';
        return $result;
    }

    public static function make_slug($string)
    {
        // Replace spaces, commas, and special characters with a hyphen
        $slug = preg_replace('/[\s,]+/u', '-', trim($string));

        return $slug;
    }
    public static function assignConversation($user_id)
    {
        $assignedCount = User::where('conversation_assign_to', $user_id)->where('done', 1)->count();
        $remainingCount = max(0, 5 - $assignedCount);
        if ($remainingCount > 0) {
            User::whereNotNull('unique_facebook_id')
                ->where('role', 2)
                ->where('done', 1)
                ->whereNull('conversation_assign_to')
                ->oldest('updated_at')
                ->take($remainingCount)
                ->update(['conversation_assign_to' => $user_id]);
        }
        return true;
    }
    public static function encode($data)
    {
        if (empty($data)) {
            return false;
        }

        $key = "AFGTR%$%#$*&()67543ghkuy9056nhdr";
        $method = 'AES-256-CBC';
        $iv = "!@#$%FGTE&^%(986";
        $crypt = openssl_encrypt($data, $method, $key, 0, $iv);
        $encrypted = base64_encode($crypt);

        return $encrypted;
    }
    public static function getAttendanceRemark($employeeId, $checkIn, $checkOut, $date)
    {
        $employee = User::with('jobInfo')->findOrFail($employeeId);
        $running_season = Season::where('status', 1)->first();
        $employee_shift = $employee->jobInfo->shift_id;

        $carbonDate = Carbon::parse($date);
        $week_day = strtolower($carbonDate->format('D'));

        $get_day_details = SeasonShiftDetail::where('weekday', $week_day)
            ->where('season_id', $running_season->id)
            ->where('shift_id', $employee_shift)
            ->first();

        if (!$get_day_details) {
            return AttendanceRemarkEnum::ON_TIME;
        }

        $entryStart = $get_day_details->entry_allow_start_time ? Carbon::parse($get_day_details->entry_allow_start_time) : null;
        $entryEnd   = $get_day_details->entry_allow_end_time ? Carbon::parse($get_day_details->entry_allow_end_time) : null;
        $shiftEnd   = $get_day_details->shift_end_time ? Carbon::parse($get_day_details->shift_end_time) : null;

        // Use logs if manual input is empty
        if (!$checkIn || !$checkOut) {
            $logCheckIn = AttendanceLog::where('user_id', $employeeId)
                ->whereDate('timestamp', $carbonDate)
                ->where('in_out', 'IN')
                ->orderBy('timestamp', 'asc')
                ->first();

            $logCheckOut = AttendanceLog::where('user_id', $employeeId)
                ->whereDate('timestamp', $carbonDate)
                ->where('in_out', 'OUT')
                ->orderBy('timestamp', 'desc')
                ->first();

            $checkIn  = $checkIn ?? optional($logCheckIn)->timestamp;
            $checkOut = $checkOut ?? optional($logCheckOut)->timestamp;
        }

        $checkInTime  = $checkIn ? Carbon::parse($checkIn) : null;
        $checkOutTime = $checkOut ? Carbon::parse($checkOut) : null;

        $remark = AttendanceRemarkEnum::ON_TIME;

        $lateCheckIn    = $checkInTime && $entryEnd && $checkInTime->gt($entryEnd);
        $earlyCheckout  = $checkOutTime && $shiftEnd && $checkOutTime->lt($shiftEnd);

        if ($lateCheckIn && $earlyCheckout) {
            $remark = AttendanceRemarkEnum::BOTH;
        } elseif ($lateCheckIn) {
            $remark = AttendanceRemarkEnum::LATE_CHECKIN;
        } elseif ($earlyCheckout) {
            $remark = AttendanceRemarkEnum::EARLY_CHECKOUT;
        }

        return $remark;
    }
}
