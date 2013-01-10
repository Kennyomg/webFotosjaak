<?php
	class DbFormat
	{
		public static function translate_color($color)
		{
			if($color == "color")
			{
				return "kleur";
			}
			else
			{
				return "Zwart-Wit";
			}
		}

		public static function translate_paid($paid)
		{
			if($paid == "yes")
			{
				return "ja";
			}
			else
			{
				return "nee";
			}
		}

		public static function translate_confirmed($confirmed)
		{
			return ($confirmed == "yes") ? "ja" : "nee";
		}
	}



?>