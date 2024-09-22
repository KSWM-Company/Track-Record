<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Survey;
use App\Models\Customer;
use App\Models\Agreement;

trait Generate
{
   
    //*** Generate employee
    public function GenerateTrainNo()
    {
        $count = 0;
        $getTranNo = Survey::orderBy('trans_no', 'DESC')->get();
        if (!empty($getTranNo)) {
            for ($i = 0; $i < count($getTranNo); $i++) {
                $current = (int) substr(strrchr($getTranNo[$i]->trans_no, "-"), 1);
                if ($i + 1 < count($getTranNo)) {
                    $next = (int) substr(strrchr($getTranNo[$i + 1]->trans_no, "-"), 1);
                }
                
                if (isset($next) && $current + 1 != $next) {
                    $count = (int) substr(strrchr($getTranNo[$i]->trans_no, "-"), 1);
                    break;
                } else {
                    $count = (int) substr(strrchr($getTranNo[$i]->trans_no, "-"), 1);
                }
            }
        }
        do {
            $surveyTrannNo =  str_pad(($count + 1), 6, "0", STR_PAD_LEFT);
            $alreadyExist = Survey::select('trans_no')->where('trans_no', $surveyTrannNo)->first()->trans_no ?? null;
            $count++;
        } while ($alreadyExist);
        return $surveyTrannNo;
    }
    public function GenerateCustomerNo()
    {
        $count = 0;
        $getCustomerNo = Customer::orderBy('customer_no','DESC')->get();
        if (!empty($getCustomerNo)) {
            for ($i = 0; $i < count($getCustomerNo); $i++) {
                $current = (int) substr(strrchr($getCustomerNo[$i]->id, "-"), 1);
                if ($i + 1 < count($getCustomerNo)) {
                    $next = (int) substr(strrchr($getCustomerNo[$i + 1]->id, "-"), 1);
                }
                
                if (isset($next) && $current + 1 != $next) {
                    $count = (int) substr(strrchr($getCustomerNo[$i]->id, "-"), 1);
                    break;
                } else {
                    $count = (int) substr(strrchr($getCustomerNo[$i]->id, "-"), 1);
                }
            }
        }
        do {
            $customerNo =  'SHV'.'-'.str_pad(($count + 1), 6, "0", STR_PAD_LEFT);
            $alreadyExist = Customer::select('customer_no')->where('customer_no', $customerNo)->first()->customer_no ?? null;
            $count++;
        } while ($alreadyExist);
        return $customerNo;
    }

    public function GenerateUserID()
    {
        $count = 0;
        $getUserID = User::orderBy('cs_id','DESC')->get();
        if (!empty($getUserID)) {
            for ($i = 0; $i < count($getUserID); $i++) {
                $current = (int) substr(strrchr($getUserID[$i]->id, "-"), 1);
                if ($i + 1 < count($getUserID)) {
                    $next = (int) substr(strrchr($getUserID[$i + 1]->id, "-"), 1);
                }
                
                if (isset($next) && $current + 1 != $next) {
                    $count = (int) substr(strrchr($getUserID[$i]->id, "-"), 1);
                    break;
                } else {
                    $count = (int) substr(strrchr($getUserID[$i]->id, "-"), 1);
                }
            }
        }
        do {
            $UserID =  'CS'.'-'.str_pad(($count + 1), 3, "0", STR_PAD_LEFT);
            $alreadyExist = User::select('cs_id')->where('cs_id', $UserID)->first()->cs_id ?? null;
            $count++;
        } while ($alreadyExist);
        return $UserID;
    }
    public function GenerateAgreementNo()
    {
        $count = 0;
        $getAgreementNo = Agreement::orderBy('agreement_no','DESC')->get();
        if (!empty($getAgreementNo)) {
            for ($i = 0; $i < count($getAgreementNo); $i++) {
                $current = (int) substr(strrchr($getAgreementNo[$i]->id, "-"), 1);
                if ($i + 1 < count($getAgreementNo)) {
                    $next = (int) substr(strrchr($getAgreementNo[$i + 1]->id, "-"), 1);
                }
                
                if (isset($next) && $current + 1 != $next) {
                    $count = (int) substr(strrchr($getAgreementNo[$i]->id, "-"), 1);
                    break;
                } else {
                    $count = (int) substr(strrchr($getAgreementNo[$i]->id, "-"), 1);
                }
            }
        }
        do {
            $UserID =  'SHV'.'-'.'AG'.str_pad(($count + 1), 5, "0", STR_PAD_LEFT);
            $alreadyExist = Agreement::select('agreement_no')->where('agreement_no', $UserID)->first()->agreement_no ?? null;
            $count++;
        } while ($alreadyExist);
        return $UserID;
    }
}
