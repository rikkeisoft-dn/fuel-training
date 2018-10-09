<?php

class Validate_Extension
{
	public static function _validation_valid_value($val, $arr)
	{
		if(empty($val) || empty($arr) || !is_array($arr))
		{
			return true;
		}

		if(array_key_exists($val, $arr))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function _validation_valid_in($val, $arr)
	{
		if(empty($val) || empty($arr) || !is_array($arr))
		{
			return true;
		}

		return in_array($val, $arr);
	}

	/**
	 * 日付チェック用ルール
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_date($val)
	{
		if(empty($val) || preg_match('/^([0-9]{4})[\/-]([0-9]{1,2})[\/-]([0-9]{1,2})$/', $val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * 日付時間チェック用ルール
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_datetime($val)
	{
		if(empty($val) || preg_match('/^([0-9]{4})[\/-]([0-9]{1,2})[\/-]([0-9]{1,2}) ([0-9]{1,2})\:([0-9]{1,2})$/', $val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * 予約希望日時1チェック用ルール
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_preferred_at($val)
	{
		if(is_null($val) || preg_match('/^([0-9]{4})[\/-]([0-9]{1,2})[\/-]([0-9]{1,2})$/', $val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * 予約希望日時2チェック用ルール
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_preferred_at2($val)
	{
		if(empty($val) || preg_match('/^([0-9]{1,2})\:([0-9]{1,2})$/', $val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * 電話番号チェック用ルール
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_valid_tel($val)
	{
		if(empty($val) || preg_match('/^\d{1,5}-?\d{1,5}-?\d{1,5}$/', $val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * 電話番号（ハイフンあり限定）チェックルール
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_valid_tel_hyphen($val)
	{
		if(empty($val) || preg_match('/^\d{1,5}-\d{1,5}-\d{1,5}$/', $val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * 郵便番号チェック用ルール
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_valid_zip($val)
	{
		if(empty($val) || preg_match('/^\d{3}-\d{4}$/', $val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * ひらがなチェック用ルール
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_valid_hiragana($val)
	{
		if(empty($val) || preg_match("/^[ぁ-ゞー\s]+$/u", $val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * カタカナチェック用ルール
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_valid_katakana($val)
	{
		if(empty($val) || preg_match("/^[ァ-ヶー\s]+$/u", $val))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/*
	 * チェックボックス値チェック
	 * @param $val
	 * @param $options
	 * @return bool
	 */
	public static function _validation_checkbox_val($val, $options)
	{
		if($val)
		{
			if(!is_array($val))
			{
				return false;
			}
			foreach($val as $v)
			{
				if(!array_key_exists($v, $options))
				{
					return false;
				}
			}
		}

		return true;
	}

	/**
	 * メール予約の予約日チェック
	 *
	 * @param $val
	 * @return bool
	 */
	public static function _validation_valid_reserve_date($val, $reserve_limit)
	{
		// 予約受付開始日
		$mail_reserve_start = strtotime(date('Y/m/d', strtotime('+'.$reserve_limit.' days')));

		//予約受付終了日（2ヶ月後）
		$mail_reserve_end = strtotime(date('Y/m/d', strtotime('+ 2 month')));

		// 予約希望日
		$reserve_date = strtotime($val);


		if($mail_reserve_start <= $reserve_date && $reserve_date <= $mail_reserve_end)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	/*
	 * 絵文字チェック
	 * @param $val
	 * @return bool
	 */
	public static function _validation_not_included_emoji($val)
	{
		if(empty($val) || !preg_match('/[\xF0-\xF7][\x80-\xBF][\x80-\xBF][\x80-\xBF]/', $val))
		{
			return true;
		}
		else
		{
			$val = preg_replace('/[\xF0-\xF7][\x80-\xBF][\x80-\xBF][\x80-\xBF]/', '', $val);

			return false;
		}
	}

	/**
	 * 指定時間より前かどうかチェック
	 * @param $val
	 * @param $time
	 * @return bool
	 */
	public static function _validation_valid_before_time($val, $time)
	{
		if(empty($val) or empty($time))
		{
			return true;
		}

		if(strtotime($val) >= strtotime($time))
		{
			return false;
		}

		return true;
	}

	/**
	 * 指定時間より後かどうかチェック
	 *
	 * @param $val
	 * @param $time
	 * @return bool
	 */
	public static function _validation_valid_after_time($val, $time)
	{
		if(empty($val) or empty($time))
		{
			return true;
		}

		if(strtotime($val) <= strtotime($time))
		{
			return false;
		}

		return true;
	}

	public static function _validation_valid_between_reception_time($val, $input)
	{
		\Config::load('reserve', true);

		if(empty($val))
		{
			return true;
		}

		if(\Arr::get($input, 'set_type') == \Config::get('reserve.set_type_default'))
		{
			// 通常設定の時
			if(!\Arr::get($input, 'reception_start_time') || !\Arr::get($input, 'reception_end_time'))
			{
				return true;
			}

			$start_time  = strtotime(\Arr::get($input, 'reception_start_time'));
			$end_time    = strtotime(\Arr::get($input, 'reception_end_time'));
			$select_time = strtotime($val);
			if($start_time >= $select_time || $end_time <= $select_time)
			{
				return false;
			}
		}
		else
		{
			// 曜日ごと設定の時
			if(!empty(\Arr::get($input, 'day')))
			{
				foreach(\Arr::get($input, 'day') as $key => $value)
				{
					if(!$value['reception_start_time'] || !$value['reception_end_time'])
					{
						return true;
					}

					if(\Input::post('holiday_type') == 0 && $key == \Config::get('reserve.public_holiday'))
					{
						continue;
					}

					$start_time  = strtotime($value['reception_start_time']);
					$end_time    = strtotime($value['reception_end_time']);
					$select_time = strtotime($val);
					if($start_time >= $select_time || $end_time <= $select_time)
					{
						return false;
					}
				}
			}
		}

		return true;
	}
}